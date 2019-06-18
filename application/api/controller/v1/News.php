<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/18
 * Time: 16:07
 */
namespace app\api\controller\v1;

use app\api\controller\Common;
use app\common\lib\exception\ApiException;

class News extends Common{

    public function index(){

        $data=input('get.');
        $whereData=[];
        $whereData['status']=config('statusCode.status_normal');
        if(!empty($data['catid'])){
            $whereData['catid']=input('get.catid',0,'intval');
        }


        if(!empty($data['title'])){
            $whereData['title']=['like','%'.$data['title'].'%'];
        }

        $this->getPageAndSize($data);
        $total=model('News')->getNewsCountByCondition($whereData);
        $news=model('News')->getNewsByCondition($whereData,$this->from,$this->size);


        $result=[
            'total'=>$total,
            'page_num'=>ceil($total/$this->size),
            'news_list'=>$this->getDealNews($news)
        ];

        return show(config('statusCode.success'),'OK',$result,200);
    }


    /**
     * 获取详情接口数据
     * @return ApiException|\think\response\Json
     * @throws \think\Exception
     */
    public function read(){

        $id=input('param.id',0,'intval');

        if(empty($id)){
            return new ApiException('此新闻不存在',400);
        }
        try{
            $new=model('News')->get($id);
        }catch (\Exception $exception){
            return new ApiException('此新闻不存在',400);
        }

        if(empty($new)|| $new->status!=1){
            return new ApiException('error',400);
        }

        model('News')->where(['id'=>$id])->setInc('read_count');

        $cats=config('cat.lists');
        $new->catname=$cats[$new->catid];

        return show(config('statusCode.success'),'OK',$new,200);

    }

}