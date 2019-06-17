<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/17
 * Time: 10:32
 */
namespace app\api\controller;
use app\common\lib\exception\ApiException;
use think\Controller;
class Test extends Common {

    public function index(){
        return ['aaa','bbb'];
    }

    public function update($id=0){
        $data=input('put.');
        return $data;

    }

    public function delete($id=0){
        return $id."的用户删除成功";
    }

    public function save(){

        $data=input('post.');
//        if($data['mt']!=1){
//            throw  new ApiException('不合法',400);
//        }
//        return show(1,'OK',input('post.'),201);
    }
}
