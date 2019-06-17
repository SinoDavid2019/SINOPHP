<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/17
 * Time: 13:31
 */
namespace app\common\lib\exception;
use think\Exception;

class ApiException extends Exception{

    public $message='';
    public $httpCode=500;
    public $code=0;

    /**
     * ApiException constructor.
     * @param string $message
     * @param int $httpCode http状态码
     * @param int $code 业务逻辑状态码
     */
    public function __construct($message = "", $httpCode = 0, $code=0)
    {
       $this->message=$message;
       $this->httpCode=$httpCode;
       $this->code=$code;
    }
}