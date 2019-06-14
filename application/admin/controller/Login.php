<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/13
 * Time: 10:52
 */

namespace app\admin\controller;

use think\Controller;
use app\common\lib\IAuth;

class Login extends Base
{
    /**
     * 覆盖Base下的_initialize()方法，以防重定向次数死循环
     */
    public  function _initialize()
    {

    }

    public function index()
    {
        //判断用户是否登录，如果登录则跳转到后台页面，否则渲染Login模板页面
        $isLogin=$this->isLogin();
        if($isLogin){
           return    $this->redirect('index/index');
        }else{
            return $this->fetch();
        }
    }

    public function check()
    {
        if (request()->isPost()) {
            $data = input('post.');
            if (!captcha_check($data['code'])) {
                $this->error('验证码错误');
            }
            $validate = validate('AdminUser');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            } else {
                try {
                    $user = model('AdminUser')->get(['username' => $data['username']]);

                } catch (\Exception $exception) {
                    $this->error($exception->getMessage());
                }
                if (!$user || $user->status != config('statusCode.status_normal')) {
                    $this->error('该用户不存在');
                } else {
                    if (IAuth::setPassword($data['password']) != $user->password) {
                        $this->error('密码不正确');
                    } else {

                        $update = [
                            'last_login_time' => time(),
                            'last_login_ip' => request()->ip()
                        ];
                        try {
                            model('AdminUser')->save($update, ['id' => $user->id]);
                        } catch (\Exception $exception) {
                            $this->error($exception->getMessage());
                        }

                    }
                }

                session(config('admin.session_user'), $user,config('admin.session_user_scope'));
                $this->success('登录成功', 'index/index');
            }

        } else {
            $this->error('请求不合法');
        }

    }

    public function  logout(){
        session(null,config('admin.session_user_scope'));
        $this->redirect('login/index');
    }

    public function welcome()
    {
        return "API CUSTOM";
    }
}