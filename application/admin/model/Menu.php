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

        return self::whereLike('name', "%" . $keywords . "%")->where('type', '=', 'menu')->select();

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

    public static function getAllPermissionInfo()
    {

        $data = self::getMenu();
        foreach ($data as $key => $value) {
            if (!empty($value["cmenu"])) {
                foreach ($value['cmenu'] as $k => $v) {

                    $tmp = self::where(array('type' => 'per', 'parent_id' => $v['id']))
                        ->select();
                    if (!empty($tmp)) {
                        $v['per'] = $tmp;
                    } else {
                        $v['per'] = array();
                    }
                }
            }
        }
        return $data;
    }

    public static function delMenu($id)
    {
        $info = self::where('id', '=', $id)->find();
        if (empty($info)) {
            return array('code' => 0, 'message' => '信息错误');
        }
        $cmenu = self::where('parent_id', '=', $id)->select();
        if (!empty($cmenu)) {
            return array('code' => 0, 'message' => '当前菜单栏有子菜单或者子权限，不可删除');
        } else {
            $res = self::where('id', '=', $id)->delete();
            if ($res) {
                return array('code' => 1, 'message' => '删除成功');
            } else {
                return array('code' => 0, 'message' => '删除失败');
            }
        }

    }

    public static function del_permission($id)
    {
        $info = self::where(array("id" => $id))->find();
        if (empty($info)) {
            return array("code" => 0, "message" => "信息错误");
        }
        $data = Role::field("menu_id")->select();
        $tmp = array();
        foreach ($data as $key => $value) {
            $tmp[] = explode(",", $value["menu_id"]);
        }
        foreach ($tmp as $k => $v) {
            if (in_array($id, $v)) {
                return array("code" => 0, "message" => "当前的子权限已经绑定角色，需要解除绑定才可以删除");
            }
        }
        $res = self::where(array("id" => $id))->delete();
        if ($res) {
            return array("code" => 1, "message" => "删除成功");
        } else {
            return array("code" => 0, "message" => "删除失败");
        }
    }

    public static function getPermissionInfo($where)
    {
        $result = self::where($where)->select();
        foreach ($result as $key => $value) {
            $result[$key]['parent'] = self::where(array('id' => $value["parent_id"]))
                ->field("name")
                ->find();
        }
        return $result;
    }

    public static function getCmenuInfo()
    {
        $where["parent_id"] = array('neq', '0');
        $where["type"] = array('eq', 'menu');
        $menu = self::where($where)
            ->order("sort asc")
            ->select();
        return $menu;
    }

}