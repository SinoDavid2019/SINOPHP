<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/7/10
 * Time: 16:02
 */

namespace app\admin\controller;


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

}