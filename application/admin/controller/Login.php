<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/13
 * Time: 10:52
 */

namespace app\admin\controller;

use app\common\lib\IAuth;
use think\Controller;
use think\Cookie;
use think\Session;

class Login extends Controller
{


    public function login()
    {

        if(Session::get(config('admin.session_user'))){
            $this->redirect('admin/index/index');
        }else{

            if(request()->isPost()){
                $name=input("name");
                $pwd=input("pwd");
                $is_rem=input("is_rem");
                if ($is_rem!=1){
                    $pwd=IAuth::setPassword($pwd);
                }
                $captcha=input("captcha");
                $rempsw=input("rempsw");
                if (empty($name)||empty($pwd)||empty($captcha)){
                    $this->error("用户名或密码,验证码不可为空");
                }

                $userInfo = model('AdminUser')->get(['username' => $name]);

                if(empty($userInfo)){
                    $this->error("当前用户不存在或者用户名错误");
                }

                //验证密码
                if($pwd!=$userInfo->password){
                    $this->error("密码错误请重新输入");
                }

                if(!captcha_check($captcha)){
                    $this->error('验证码错误');
                }

                //判断用户是否记住密码
                if ($rempsw==1){
                    //记住密码   存cookie中
                    cookie('cu',trim($name),3600*24*30);
                    cookie('CSDFDSA',trim($pwd),3600*24*30);
                }else{
                    //删除cookie、
                    Cookie::delete('cu');
                    Cookie::delete("CSDFDSA");
                }

                $update=[
                    'last_login_time'=>date('Y-m-d H:i:s', time()),
                    'last_login_ip'=>request()->ip()
                ];
                model('AdminUser')->save($update, ['id' => $userInfo->id]);

                Session::set(config('admin.session_user'),$userInfo);
                $this->success("登录成功");



            }else{
                $name = Cookie::get('cu');
                $pwd = Cookie::get('CSDFDSA');
                if($name && $pwd) {
                    $this->assign('name',$name);
                    $this->assign('pwd',$pwd);
                }
                return $this->fetch("login");
            }
        }

    }

    public function  logout(){
      Session::delete(config('admin.session_user'));
        $this->redirect('admin/login/login');
    }

    public function welcome()
    {
        return "API CUSTOM";
    }
}