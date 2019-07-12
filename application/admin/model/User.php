<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/7/10
 * Time: 16:04
 */

namespace app\admin\model;


use think\Model;

class User extends Model
{

    public function user_list($where,$min,$max){
        if($min&&$max){
            $result=$this->where($where)->whereTime("create_time","between",[$min,$max])->where('status','=',1)->select();

            return $result;
        }else{
            $result=$this->where($where)->where('status','=',1)->select();

            return $result;
        }

    }

}