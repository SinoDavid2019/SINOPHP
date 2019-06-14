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
}