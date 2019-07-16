<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/13
 * Time: 8:52
 */

namespace app\admin\controller;

use app\admin\model\Menu as MenuModel;
use app\admin\model\Role as RoleModel;
use app\admin\model\AdminUser as AdminUserModel;
use app\common\lib\IAuth;
use think\Controller;

class Admin extends Controller
{

    public function index(){
        $min=isset($_POST["logmin"])?strtotime($_POST["logmin"]):"";
        $max=isset($_POST["logmax"])?strtotime($_POST["logmax"]):"";
        $keyword=isset($_POST['keyword'])?$_POST['keyword']:'';
        $where=null;
        if (!empty($keyword)){
            $where["u.names"]=array("like","%$keyword%");
        }

        $data=AdminUserModel::getAdminUser($where,$min,$max);
        $num=count($data);
        $this->assign("data",$data);
        $this->assign("num",$num);
        //
        return $this->fetch("admin-list");
    }
    public function addAdmin()
    {

        if(\request()->isPost()){
            $insert_data=array();
            $insert_data["username"]=input("names");
            $insert_data["email"]=input("email");
            $insert_data["phone"]=input("phone");
            $insert_data["password"]= IAuth::setPassword(input("password"));
            $insert_data["create_time"]=time();
            $insert_data["status"]=input("status");
            $insert_data["role_id"]=input("role_id");
            $info=AdminUserModel::where(array("username"=>input("names")))->select();
            if (!empty($info)){
                $this->error("该管理员已存在");
            }
            $result=AdminUserModel::insert($insert_data);
            if ($result){
                $this->success("添加成功");
            }else{
                $this->error("添加失败");
            }
        }else{

            $data=RoleModel::getAdminRole();
            $this->assign("data",$data);
            return $this->fetch("admin-add");
        }


    }
    public function editAdmin(){
        $id=input("id");
        $data=AdminUserModel::where(array("id"=>$id))->find();
        if(\request()->isPost()){
            $insert_data=array();
            $insert_data["username"]=input("names");
            $insert_data["email"]=input("email");
            $insert_data["phone"]=input("phone");
            $insert_data["password"]=IAuth::setPassword(input("password"));
            $insert_data["create_time"]=time();
            $insert_data["status"]=input("status");
            $insert_data["role_id"]=input("role_id");
            $results=AdminUserModel::where(array("id"=>$id))->update($insert_data);
            if ($results){
                $this->success("编辑成功");
            }else{
                $this->error("编辑失败");
            }
        }

        $admins=RoleModel::getAdminRole();
        $this->assign("admins",$admins);
        $this->assign("data",$data);
        return $this->fetch("admin-edit");
    }

    public function delAdmin(){
        $id=input("id");

        $data=AdminUserModel::del_admin($id);
        if ($data["code"]==1){
            $this->success($data["msg"]);
        }else{
            $this->error($data["msg"]);
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


        $admins=MenuModel::getAllPermissionInfo();
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

    public function editRole(){
        $role_id=input('role_id');
        if(request()->isPost()){
            $update_arr=array();
            $update_arr['role_name']=input('name');
            $update_arr['desc']=input('desc');
            $update_arr['update_time']=time();
            $update_arr['menu_id']=trim(input('menuid'),',');
            $result=RoleModel::where('role_id','=',$role_id)->update($update_arr);
            if($result){
                $this->success('编辑角色成功');
            }else{
                $this->error('编辑角色失败');
            }
        }

        $data=RoleModel::getRoleInfo($role_id);
        $admins=MenuModel::getAllPermissionInfo();
        $this->assign("admins",$admins);
        $this->assign("data",$data);

        return $this->fetch('admin-role-edit');
    }

    public function permission(){

        $keyword=isset($_POST['keyword'])?$_POST['keyword']:'';
        $where["type"]=array("eq","per");
        if (!empty($keyword)){
            $where["name"]=array("like","%$keyword%");
        }
        $data=MenuModel::getPermissionInfo($where);
        $num=count($data);
        $this->assign('num',$num);
        $this->assign('admins',$data);
        $this->assign('keyword',$keyword);
        return $this->fetch('admin-permission');


    }

    public function addPermission(){
        if(request()->isPost()) {
            $insert_data = array();
            $insert_data['parent_id'] = input('parent_id');
            $insert_data['url'] = input('url');
            $insert_data['name'] = input('name');
            $insert_data['type'] = 'per';
            $info = MenuModel::where(array('name' => input("name")))
                ->select();
            if (!empty($info)) {
                $this->error("当前名称已存在");
            }
            $res = MenuModel::insert($insert_data);
            if ($res) {
                $this->success("添加权限成功");
            } else {
                $this->error("添加权限失败");
            }
        }
        $data=MenuModel::getCmenuInfo();
        $this->assign('data',$data);
        return $this->fetch('admin-permission-add');

    }
    public function editPermission(){
        $id=input("id");
        $info=MenuModel::where(array("id"=>$id))->find();
        if (empty($info)){
            $this->error("信息有误");
        }
        if (\request()->isPost()){
            $insert_data=array();
            $insert_data['parent_id'] = input('parent_id');
            $insert_data['url'] = input('url');
            $insert_data['name'] = input('name');
            $insert_data['type'] = 'per';
            $result=MenuModel::where(array("name"=>input("name")))
                ->where(array("id"=>$id))
                ->find();
            if($result){
                $this->error('当前权限名称已存在');
            }
            $res=MenuModel::where(array("id"=>$id))->update($insert_data);
            if ($res){
                $this->success("权限修改成功");
            }else{
                $this->error("权限修改失败");
            }
        }

        $data =MenuModel::getCmenuInfo();
        $this->assign("info",$info);
        $this->assign('data',$data);
        return $this->fetch('admin-permission-edit');
    }

    public function delPermission(){
        $id=input("id");

        $data=MenuModel::del_permission($id);
        if ($data["code"]==1){
            $this->success($data["message"]);
        }else{
            $this->error($data["message"]);
        }
    }
}