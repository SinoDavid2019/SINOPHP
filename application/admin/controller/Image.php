<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/14
 * Time: 13:41
 */
namespace app\admin\controller;
use think\Controller;
use think\Request;

/**
 * 后台图片上传逻辑
 * Class Image
 * @package app\admin\controller
 */
class Image extends Base{
    public function upload(){

        $file=Request::instance()->file('file');
        $info=$file->move('upload');
        if($info && $info->getPathname()){
            $data=[
                'status'=>1,
                'message'=>'OK',
                'data'=>'/'.str_replace('\\', '/', $info->getPathname())
            ];
            echo json_encode($data);exit;
        }
       echo json_encode(['status'=>0,'message'=>'上传失败']);
    }

}