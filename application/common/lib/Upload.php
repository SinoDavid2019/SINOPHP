<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/18
 * Time: 10:34
 */
namespace app\common\lib;

//引入鉴权类
use Qiniu\Auth;

//引入上传类
use Qiniu\Storage\UploadManager;

/**
 * 七牛云图片上传基础类
 * Class Upload
 * @package app\common\lib
 */
class Upload{

    public static function image(){
        if(empty($_FILES['file']['tmp_name'])){
            exception('您上传的图片不合法',404);
        }

        $filePath=$_FILES['file']['tmp_name'];
//        $ext=explode(".",$_FILES['file']['name']);
//        $ext=$ext[1];
        $path=pathinfo($_FILES['file']['name']);
        $ext=$path['extension'];
        $config=config('qiniu');
        $auth=new Auth($config['ak'],$config['sk']);

        $token= $auth->uploadToken($config['bucket']);

        //组装文件名
        $key=date('Y')."/".date('md')."/".substr(md5($filePath),0,5).date('YmdHis').rand(0,9999).".".$ext;

        $uploadMgr=new UploadManager();
        list($res,$error)=$uploadMgr->putFile($token,$key,$filePath);

        if($error!=null){
            return null;
        }else{
            return $key;
        }

    }

}

