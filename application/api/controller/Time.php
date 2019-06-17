<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/17
 * Time: 21:12
 */
namespace app\api\controller;
use think\Controller;
class Time extends Controller{

    public function index(){
        return show(1,'服务器时间OK',time());
    }
}