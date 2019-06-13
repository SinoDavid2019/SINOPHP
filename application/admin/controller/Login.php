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

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
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