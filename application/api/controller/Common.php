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
use app\common\lib\Time;
use think\Cache;
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

        //基础参数校验
        if(empty($headers['sign'])){
            throw new ApiException('sign不存在',400);
        }
        if(!in_array($headers['app_type'],config('app.apptypes'))){
            throw new ApiException('app_type不存在',400);
        }

        if(!IAuth::checkSignPass($headers)){
            throw new ApiException('授权码sign失败',401);
        }

        //sign写入缓存
        Cache::set($headers['sign'],1,config('app.app_sign_cache_time'));

        $this->headers=$headers;

    }

    public function testAes(){
        $data=[
            'admin'=>'dasdadasd',
            'password'=>'123456',
            'time'=>Time::get13TimeStamp()
        ];
        halt($data);
        //$str='7ecb9b129dd4ad0a6975e0bff0693505d48399696ac99b042269b39957fbb2ba161ce379ac6b3ef5e60c03f29ad69f97ff7984314f477dd993e6deb4d8f0e21a';
        //$str=IAuth::setSign($data);
        //echo $str;
        //echo (new Aes())->decrypt($str);
    }

}