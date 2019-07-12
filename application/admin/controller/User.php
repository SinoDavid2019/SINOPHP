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

    public function userExcel(){
        import('phpoffice.phpexcel.Classes.PHPExcel',VENDOR_PATH,'.php');
        $users = UserModel::all();     //数据库查询
        $path = dirname(__FILE__); //找到当前脚本所在路径



        $PHPExcel =new \PHPExcel();
        $PHPSheet = $PHPExcel->getActiveSheet();
        $PHPSheet->setTitle("demo"); //给当前活动sheet设置名称
        $PHPSheet->setCellValue("A1", "ID")
            ->setCellValue("B1", "用户名")
            ->setCellValue("C1", "邮箱")
            ->setCellValue("D1", "手机")
            ->setCellValue("E1", "头像地址")
            ->setCellValue("F1", "登录ip")
            ->setCellValue("G1", "登录时间");
        $i = 2;
        foreach($users as $data){
            $PHPSheet->setCellValue("A" . $i, $data['id'])
                ->setCellValue("B" . $i, $data['user_name'])
                ->setCellValue("C" . $i, $data['email'])
                ->setCellValue("D" . $i, $data['phone'])
                ->setCellValue("E" . $i, $data['user_logo'])
                ->setCellValue("F" . $i, $data['last_login_ip'])
                ->setCellValue("G" . $i, $data['last_login_time']);
            $i++;
        }

        $PHPWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, "Excel2007");
        header('Content-Disposition: attachment;filename="会员表单数据.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }

}