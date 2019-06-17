<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/13
 * Time: 14:11
 */

namespace app\common\lib;
class IAuth
{
    /**
     * 密码加密校验
     * @param $password
     * @return string
     */
    public static function setPassword($password)
    {
        return md5($password . config('app.password_pre_halt'));
    }

    /**
     * 生成每次请求的sign值
     * @param array $data
     * @return string
     */
    public static  function  setSign($data=[]){
        //1、按字段排序
        ksort($data);
        //2、拼接字符串数据串
        $string=http_build_query($data);
        //3、aes加密
        $string=(new Aes())->encrypt($string);
        return $string;
    }

    /**
     * 检验sign是否正常
     * @param $data
     * @return bool
     */
    public static function checkSignPass($data){

        $str=(new Aes())->decrypt($data['sign']);

        if(empty($str)){
            return false;
        }

        parse_str($str,$arr);
        if(!is_array($arr) || empty($arr['admin']) || $arr['admin']!=$data['admin']){
            return false;
        }

        return true;

    }
}