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

    }
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
}