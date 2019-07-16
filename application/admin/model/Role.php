<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/7/15
 * Time: 14:55
 */

namespace app\admin\model;


use think\Model;


class Role extends Model
{
    public static function getAdminRole(){
        $result=self::select();
        foreach ($result as $key=>$value){
            $admin_user=AdminUser::field('username')->where('role_id','=',$value['role_id'])->select();
            $tmp=array();
            if(!empty($admin_user)){
                foreach ($admin_user as $k=>$v){
                    $tmp[]=$v['username'];
                }
                $result[$key]['admin']=implode(',',$tmp);
            }else{
                $result[$key]['admin']='无用户';
            }
        }
        return $result;
    }

    public static function role_delete($roleID){
        $info=self::where('role_id','=',$roleID)->find();
        if(empty($info)){
            return array('code'=>0,'message'=>'信息错误');
        }
        $admin=AdminUser::where('role_id','=',$roleID)->select();
        if(!empty($admin)){
            return array('code'=>0,'message'=>'该角色有用户使用，不可删除，要删除请将该角色下的用户移除');
        }
        $res=self::where('role_id','=',$roleID)->delete();
        if($res){
            return array('code'=>1,'message'=>'删除成功');
        }else{
            return array('code'=>0,'message'=>'删除失败');
        }
    }

    public static function getRoleInfo($roleID){
        $info=self::where('role_id','=',$roleID)->find();
        if(empty($info)){
            return false;
        }else{
            $menuID_arr=explode(',',$info['menu_id']);
            $info['menu']=$menuID_arr;
            return $info;
        }
    }

}