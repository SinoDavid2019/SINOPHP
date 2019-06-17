<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/14
 * Time: 10:04
 */
namespace app\admin\controller;
use think\Controller;

/**
 * 后台基础类库
 * Class Base
 * @package app\admin\controller
 */
class Base extends Controller{
    /**
     * page
     * @var string
     */
    public $page='';
    /**
     * 每页显示多少条
     * @var string
     */
    public $size='';
    /**
     * 定义model
     * @var string
     */
    public $model='';
    /**
     * 查询条件的起始值
     * @var int
     */
    public $from=0;

    /**
     * 重写_initialize()方法
     */
    public function _initialize(){
        $isLogin=$this->isLogin();
        if(!$isLogin){
            return $this->redirect('login/index');
        }

    }

    /**
     * 判断用户是否登录
     * @return bool
     */
    public function isLogin(){
        $user=session(config('admin.session_user'),'',config('admin.session_user_scope'));
        if($user && $user->id){
            return true;

        }else{
            return false;
        }
    }

    /**
     * 获取分页的page和size
     */
    public function  getPageAndSize($data){
        $this->page=!empty($data['page'])?$data['page']:1;
        $this->size=!empty($data['size'])?$data['size']:config('paginate.list_rows');
        $this->from=( $this->page-1)*$this->size;
    }
    /**
     * 删除
     */
    public function delete($id=0){
        if(!intval($id)){
            return $this->result('',0,'ID不合法');
        }
        $model=$this->model?$this->model:request()->controller();
        try{
            $result=model($model)->save(['status'=>-1],['id'=>$id]);
        }catch (\Exception $exception){

            return $this->result('',0,$exception->getMessage());
        }
        if($result){
            return $this->result(['jump_url'=>$_SERVER['HTTP_REFERER']],1,'删除成功');
        }
        return $this->result('',0,'删除失败');

    }

    /**
     * 修改状态
     */
    public function status(){
        $data=input('param.');

        $model=$this->model?$this->model:request()->controller();
        try{
            $result=model($model)->save(['status'=>$data['status']],['id'=>$data['id']]);
        }catch (\Exception $exception){

            return $this->result('',0,$exception->getMessage());
        }
        if($result){
            return $this->result(['jump_url'=>$_SERVER['HTTP_REFERER']],1,'修改成功');
        }
        return $this->result('',0,'修改失败');

    }

    /**
     * 修改状态
     */
    public function update(){
        $data=input('param.');
        $model=$this->model?$this->model:request()->controller();
        try{
            $result=model($model)->save([
                'title'=>$data['title'],
                'small_title'=>$data['small_title'],
                'content'=>$data['content'],
                'image'=>$data['image'],
                'is_position'=>!empty($data['is_position'])?1:0,
                'is_head_figure'=>!empty($data['is_head_figure'])?1:0,
                'is_allowcomments'=>!empty($data['is_allowcomments'])?1:0
            ],['id'=>$data['id']]);
        }catch (\Exception $exception){

            return $this->result('',0,$exception->getMessage());
        }
        if($result){
            return $this->result(['jump_url'=>url('news/index')],1,'OK');
        }
        return $this->result('',0,'修改失败');

    }


}