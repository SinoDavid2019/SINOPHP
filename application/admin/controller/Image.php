<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/14
 * Time: 13:41
 */
namespace app\admin\controller;
use think\Controller;

/**
 * 后台图片上传逻辑
 * Class Image
 * @package app\admin\controller
 */
class Image extends Base{
    public function upload(){
        $data=[
            'status'=>1,
            'message'=>'OK',
            'data'=>'https://cache.yisu.com/www/images/weixin_help.png'
        ];
        echo json_encode($data);
    }

}