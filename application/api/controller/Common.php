<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/17
 * Time: 14:25
 */
namespace app\api\controller;
use app\common\lib\Aes;
use app\common\lib\exception\ApiException;
use app\common\lib\IAuth;
use think\Controller;


/**
 * API通用Controller
 * Class Common
 * @package app\api\controller
 */
class Common extends Controller{

    /**
     * 成员变量
     * @var string
     */
    public $headers='';

    /**
     * 初始化方法
     */
    public function _initialize(){
        $this->checkRequestAuth();
        //$this->testAes();
    }

    /**
     * 校验http请求头数据是否合法
     */
    public function checkRequestAuth(){
        //获取http请求头数据
        $headers=request()->header();

        if(empty($headers['sign'])){
            throw new ApiException('sign不存在',400);
        }
        if(!in_array($headers['app_type'],config('app.apptypes'))){
            throw new ApiException('app_type不存在',400);
        }

        if(!IAuth::checkSignPass($headers)){
            throw new ApiException('授权码sign失败',401);
        }

        $this->headers=$headers;

    }

    public function testAes(){
        $data=[
            'admin'=>'dasdadasd',
            'password'=>'123456'
        ];
        $str='7ecb9b129dd4ad0a6975e0bff0693505ab12180a570a6e93f1dcdfaffa2f3ae9';
        //$str=IAuth::setSign($data);
        echo (new Aes())->decrypt($str);
    }

}