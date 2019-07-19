<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/17
 * Time: 14:25
 */
namespace app\api\controller;
use app\common\lib\exception\ApiException;
use app\common\lib\IAuth;
use think\Cache;
use think\Controller;
use app\common\lib\Aes;


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

    public $page=1;
    public $size=10;
    public $from=0;

    /**
     * 初始化方法
     */
    public function _initialize(){
        $this->checkRequestAuth();
        //$this->TestAes();
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
            throw new ApiException('授权码sign失效',401);
        }

        //sign写入缓存
        Cache::set($headers['sign'],1,config('app.app_sign_cache_time'));

        $this->headers=$headers;

    }

    public function TestAes(){
        $data=[
           'admin'=>'weihl'
        ];
        $string=IAuth::setSign($data);
        //$as="eec0b8bce74f5c23128eb376d0d6e368";
        echo $string;exit();
       // echo (new Aes())->decrypt($as);


    }

    /**
     * 组装返回的数据
     * @param $news
     * @return array
     */
    public function getDealNews($news){
        if(empty($news)){
            return [];
        }

        $cats=config('cat.lists');
        foreach ($news as $key=>$new){
            $news[$key]['catname']=$cats[$new['catid']];
        }

        return $news;
    }

    /**
     * 获取分页的page和size
     */
    public function  getPageAndSize($data){
        $this->page=!empty($data['page'])?$data['page']:1;
        $this->size=!empty($data['size'])?$data['size']:config('paginate.list_rows');
        $this->from=( $this->page-1)*$this->size;
    }

}