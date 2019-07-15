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
use app\admin\model\Role as RoleModel;
use app\admin\model\Menu as MenuModel;

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

    public function role(){

        $admins=RoleModel::getAdminRole();
        $num=count($admins);
        $this->assign("admins",$admins);
        $this->assign("num",$num);
        return $this->fetch("admin-role");

    }

    public function addRole(){
        if(\request()->isPost()){
            $insert_data=array();
            $insert_data["role_name"]=input("name");
            $insert_data["desc"]=input("desc");
            $insert_data["menu_id"]=trim(input("menuid"),",");
            $info=RoleModel::where("role_name",'=',input('name'))->select();
            if(!empty($info)){
                $this->error("角色名称已存在");
            }
            $result=RoleModel::insert($insert_data);
            if($result){
                $this->success("添加成功");
            }else{
                $this->error("添加失败");
            }
        }


        $admins=MenuModel::getMenu();
        $this->assign("admins",$admins);
        return $this->fetch('admin-role-add');
    }

    public function delRole(){
        $role_id=input('role_id');
        $data=RoleModel::role_delete($role_id);
        if($data['code']==1){
            $this->success($data['message']);
        }else{
            $this->error($data['message']);
        }

    }
}