<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/14
 * Time: 10:46
 */
namespace app\admin\controller;
use think\Controller;
class News extends Base{
    public function index(){
        $data=input('param.');
        $query=http_build_query($data);
        //halt($data);
        $whereData=[];
        //转换查询条件
        if(!empty($data['start_time'])&& !empty($data['end_time']) && $data['end_time']>$data['start_time']){
            $whereData['create_time']=[
                ['gt',strtotime($data['start_time'])],
                ['lt',strtotime($data['end_time'])]
            ];
        }
        if(!empty($data['catid'])){
            $whereData['catid']=intval($data['catid']);
        }
        if(!empty($data['title'])){
            $whereData['title']=['like','%'.$data['title'].'%'];
        }

        $this->getPageAndSize($data);
        $news=model('News')->getNewsByCondition($whereData,$this->from,$this->size);
        $total=model('News')->getNewsCountByCondition($whereData);
        $pageTotal=ceil($total/$this->size);
        return $this->fetch('',['news'=>$news,
            'cats'=>config('cat.lists'),
            'total'=>$total,
            'pageTotal'=>$pageTotal,
            'size'=>$this->size,
            'curr'=>$this->page,
            'start_time'=>empty($data['start_time'])?'':$data['start_time'],
            'end_time'=>empty($data['end_time'])?'':$data['end_time'],
            'catid'=>empty($data['catid'])?'':$data['catid'],
            'title'=>empty($data['title'])?'':$data['title'],
            'query'=>$query
        ]);
    }

    /**
     * 新增资讯
     * @return mixed|void
     */
    public function add(){
        if(request()->ispost()){
            $data=input('post.');
            try{
                $id=model('News')->add($data);
            }catch (\Exception $exception){
                return $this->result('',0,'新增失败');
            }
            if($id){
                return $this->result(['jump_url'=>url('news/index')],1,'OK');
            }else{
                return $this->result('',0,'新增失败');
            }

        }
        return $this->fetch('',[
            'cats'=>config('cat.lists')
        ]);
    }

    /**
     * 查询资讯信息（编辑查询）
     * @return mixed|void
     */
    public function edit(){
        //return $this->fetch();
        $data=input('param.');
        $whereData=[];
        //halt($data['id']);
        if(!empty($data['id'])){
            $whereData['id']=intval($data['id']);
        }
        try{
            $new=model('News')->getNewsByID($whereData);
        }catch (\Exception $exception){
            return $this->result('',0,'查询失败');
        }
        if($new){

            return $this->fetch('',[
                'cats'=>config('cat.lists'),
                'new'=>$new
            ]);
        }else{
            return $this->result('',0,'查询失败');
        }

    }




}