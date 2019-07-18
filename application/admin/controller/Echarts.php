<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/7/18
 * Time: 8:49
 */

namespace app\admin\controller;
use app\admin\model\User as UserModel;
use think\Db;

class Echarts extends Base
{
    public function user(){
        $data=UserModel::where('status','=',1)->field('user_name,age')->select();
        $sql=Db::query("SELECT user_system,count(*) as num FROM `tp_user` GROUP BY user_system");
        $this->assign('data',$data);
        $this->assign('sql',$sql);
        return $this->fetch('echarts-user');

    }

}