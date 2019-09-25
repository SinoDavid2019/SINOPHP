<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/14
 * Time: 13:41
 */
namespace app\admin\controller;
use app\common\lib\Upload;
use think\Controller;
use think\Request;

/**
 * 后台图片上传逻辑
 * Class Image
 * @package app\admin\controller
 */
class Image extends Base{
    /**
     * 上传图片到本地服务器
     */
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

    /**
     * 上传文件到七牛云
     */
    public function upload0(){

        $img=Upload::image();
        if($img){
            $data=[
                'status'=>1,
                'message'=>'OK',
                'data'=>config('qiniu.image_url')."/".$img
            ];
            echo json_encode($data);exit;
        }else{
            echo json_encode(['status'=>0,'message'=>'上传失败']);
        }

    }

}