<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/14
 * Time: 10:46
 */
namespace app\admin\controller;
use think\Controller;
class News extends Base{
    public function add(){
        return $this->fetch();
    }
}