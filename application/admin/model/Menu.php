<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/7/15
 * Time: 9:09
 */

namespace app\admin\model;


use think\Model;

class Menu extends Model
{

    public static function getMenuByKeyWords($keywords)
    {

        return self::whereLike('name',"%".$keywords."%")->where('type', '=', 'menu')->select();

    }

    public static function getMenu($menuid_arr = null)
    {
        if (!empty($menuid_arr)) {
            $menu = self::where('parent_id', '=', 0)
                ->where('type', '=', 'menu')
                ->where('id', 'in', $menuid_arr)
                ->order('sort asc')
                ->select();
        } else {
            $menu = self::where('parent_id', '=', 0)
                ->where('type', '=', 'menu')
                ->order('sort asc')
                ->select();
        }
        $nmenu = array();
        if (!empty($menu)) {
            foreach ($menu as $key => $value) {
                $pid = $value['id'];
                $nmenu[$key] = $value;
                if (!empty($menuid_arr)) {
                    $cmenu = self::where('parent_id', '=', $pid)
                        ->where('type', '=', 'menu')
                        ->where('id', 'in', $menuid_arr)
                        ->order('sort asc')
                        ->select();
                } else {
                    $cmenu = self::where('parent_id', '=', $pid)
                        ->where('type', '=', 'menu')
                        ->order('sort asc')
                        ->select();
                }
                if (!empty($cmenu)) {
                    $nmenu[$key]['cmenu'] = $cmenu;
                } else {
                    $nmenu[$key]['cmenu'] = array();
                }
            }

        }

        return $nmenu;

    }

    public static function delMenu($id){
        $info=self::where('id','=',$id)->find();
        if(empty($info)){
            return array('code'=>0,'message'=>'信息错误');
        }
        $cmenu=self::where('parent_id','=',$id)->select();
        if(!empty($cmenu)){
            return array('code'=>0,'message'=>'当前菜单栏有子菜单或者子权限，不可删除');
        }else{
            $res=self::where('id','=',$id)->delete();
            if($res){
                return array('code'=>1,'message'=>'删除成功');
            }else{
                return array('code'=>0,'message'=>'删除失败');
            }
        }




    }

}