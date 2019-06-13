<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/13
 * Time: 8:52
 */

namespace app\admin\controller;

use think\Controller;
use app\common\lib\IAuth;

class Admin extends Controller
{
    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            $validate = validate('AdminUser');
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $data['password'] = IAuth::setPassword($data['password']);
            $data['status'] = 1;
            try {
                $id = model('AdminUser')->add($data);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
            if ($id) {
                $this->success('id=' . $id . '的用户插入成功！！！');
            } else {
                $this->error('用户插入失败');
            }


        } else {
            return $this->fetch();
        }

    }
}