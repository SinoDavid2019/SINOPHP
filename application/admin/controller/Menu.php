<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/7/15
 * Time: 9:09
 */

namespace app\admin\controller;


use think\Controller;
use app\admin\model\Menu as MenuModel;

class Menu extends Base
{

    public function index(){
        $keyword=isset($_POST["keyword"])?$_POST["keyword"]:"";
        if (!empty($keyword)){
            $menuInfo= MenuModel::getMenuByKeyWords($keyword);
            $num=count($menuInfo);
        }else{

            $menuInfo=MenuModel::getMenu();
            $num = count(MenuModel::where('type','=','menu')->select());
        }
        $this->assign("menuInfo",$menuInfo);
        $this->assign("keyword",$keyword);
        $this->assign("num",$num);
        return $this->fetch('menu-index');
    }

    public function addMenu(){
        if(request()->isPost()){
            $insert_data=array();
            $insert_data["name"]=input("name");
            $insert_data["icon"]=input("ico");
            $insert_data["parent_id"]=input("parent_id");
            if ($insert_data["parent_id"]!=0){
                $insert_data["url"]=input("url");
            }
            $insert_data["sort"]=input("sort");
            $insert_data['status'] = input('is_show');
            $info=MenuModel::where('name','=',input("name"))->find();
            if(!empty($info)){
                $this->error('当前名称已存在');
            }
            $res=MenuModel::insert($insert_data);
            if(!empty($res)){
                $this->success('新增成功');
            }else{
                $this->error('新增失败');
            }
        }

        $menuInfo=MenuModel::getMenu();
        $this->assign('menuInfo',$menuInfo);
        return $this->fetch('menu-add');

    }

    public function editMenu(){
        $id=input('id');
        if(request()->isPost()){
            $update_data=array();
            $update_data["name"]=input("name");
            $update_data["icon"]=input("ico");
            $update_data["parent_id"]=input("parent_id");
            if ($update_data["parent_id"]!=0){
                $update_data["url"]=input("url");
            }
            $update_data["sort"]=input("sort");
            $update_data['status'] = input('is_show');
            $info=MenuModel::where('name','=',input("name"))->find();
            if(($info->id)!==intval($id)){
                $this->error('当前名称已存在');
            }
            $res=MenuModel::where('id','=',$id)->update($update_data);
            if($res){
                $this->success('更新成功');
            }else{
                $this->success('更新失败');
            }

        }
        $menu_editing=MenuModel::where('id','=',$id)->find();

        $menuInfo=MenuModel::getMenu();
        $this->assign('menuInfo',$menuInfo);
        $this->assign('info',$menu_editing);
        return $this->fetch("menu-add");
    }

    public function delMenu(){

        $id=input('id');
        $data=MenuModel::delMenu($id);
        if($data['code']==1){
            $this->success($data['message']);
        }else{
            $this->error($data['message']);
        }

    }

}