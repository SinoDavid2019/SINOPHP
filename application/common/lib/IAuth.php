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
    public static function setPassword($password)
    {
        return md5($password . config('app.password_pre_halt'));
    }
}