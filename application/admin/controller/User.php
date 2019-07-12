<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/7/10
 * Time: 16:02
 */

namespace app\admin\controller;


use app\common\lib\IAuth;
use think\Controller;
use app\admin\model\User as UserModel;

class User extends Controller
{

    public function index(){
        $min=isset($_POST["logmin"])?strtotime($_POST["logmin"]):"";
        $max=isset($_POST["logmax"])?strtotime($_POST["logmax"]):"";
        $keyword=isset($_POST['keyword'])?$_POST['keyword']:'';
        $where=null;
        if (!empty($keyword)){
            $where["u.names"]=array("like","%$keyword%");
        }
        $user=new UserModel();
        $data=$user->user_list($where,$min,$max);
        $num=count($data);
        $this->assign("data",$data);
        $this->assign("num",$num);
        return $this->fetch("user-list");
    }

    public function  addUser(){

        if($this->request->isPost()){
            $insert_arr=[];
            $insert_arr["user_name"]=input("user_name");
            $insert_arr["password"]=IAuth::setPassword(input("passsword"));
            $insert_arr["email"]=input("email");
            $insert_arr["phone"]=input("phone");
            $insert_arr["age"]=input("age");
            $insert_arr["status"]=input("status");
            $insert_arr["last_login_ip"]=$this->request->ip();
            $insert_arr["last_login_time"]=date("Y-m-d H:i:s",time());
            $insert_arr["create_time"]=time();
            $insert_arr["update_time"]=time();
            $browser=$_SERVER['HTTP_USER_AGENT'];
            $insert_arr["user_browser"]=$browser;
            $insert_arr["user_logo"]=input("user_logo");
            if (!empty($browser)) {
                if (preg_match('/win/i', $browser)) {
                    $insert_arr["user_system"]="Windows";
                } else if (preg_match('/mac/i', $browser)) {
                    $insert_arr["user_system"]="Mac";
                } else if (preg_match('/linux/i', $browser)) {
                    $insert_arr["user_system"]="Linux";
                } else if (preg_match('/unix/i', $browser)) {
                    $insert_arr["user_system"]="Unix";
                } else if (preg_match('/bsd/i', $browser)) {
                    $insert_arr["user_system"]="BSD";
                } else {
                    $insert_arr["user_system"]="没有此系统";
                }
            } else {
                return 'unknow';
            }

            $result=model('User')->insert($insert_arr);

            if($result){
                $this->success("添加用户成功");
            }else{
                $this->error('添加用户失败');
            }





        }

        return $this->fetch("user-add");

    }

}