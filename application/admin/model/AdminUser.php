<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/13
 * Time: 10:23
 */

namespace app\admin\model;

use think\Model;

class AdminUser extends Base
{
    public static function getAdminUser($where,$min,$max){
        if ($min && $max){
            $result=AdminUser::alias('u')->join('tp_role r','r.role_id=u.role_id','left')
                ->where($where)
                ->whereTime('u.create_time', 'between', [$min, $max])
                ->select();
            return $result;

        }else{
            $result=AdminUser::alias('u')->join('tp_role r','r.role_id=u.role_id','left')
                ->where($where)
                ->select();
            return $result;
        }

    }

    public static function del_admin($id){
        $info=self::where(array("id"=>$id))->find();
        if(empty($info)){
            return array("code"=>0,"msg"=>"信息有误");
        }
        if ($info["username"]=="admin"){
            return array("code"=>0,"msg"=>"admin用户不能删除");
        }
        $result=self::where(array("id"=>$id))->delete();
        if($result){
            return array("code"=>1,"msg"=>"删除成功");
        }else{
            return array("code"=>0,"msg"=>"删除失败");
        }
    }

}