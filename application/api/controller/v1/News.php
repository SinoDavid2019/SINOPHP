<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/18
 * Time: 16:07
 */
namespace app\api\controller\v1;

use app\api\controller\Common;

class News extends Common{

    public function index(){

        $data=input('get.');
        $whereData=[];
        $whereData['status']=config('statusCode.status_normal');
        $whereData['catid']=input('get.catid');

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

}