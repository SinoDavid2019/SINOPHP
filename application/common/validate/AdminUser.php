<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/13
 * Time: 9:47
 */

namespace app\common\validate;

use think\Validate;

class AdminUser extends Validate
{
    protected $rule = [
        'username' => 'require|max:20',
        'password' => 'require|max:20'
    ];

}