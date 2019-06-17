<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/17
 * Time: 11:40
 */
namespace app\common\lib\exception;

use think\exception\Handle;

class ApiHandleException extends Handle{

    /**
     * http状态码
     * @var int
     */
    public $httpCode=500;

    public function render(\Exception $e){
        if(config('app_debug')==true){
            return parent::render($e);
        }
        if($e instanceof ApiException){
            $this->httpCode=$e->httpCode;
        }
        return show(0,$e->getMessage(),[],$this->httpCode);
    }
}
