<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/17
 * Time: 21:23
 */
namespace app\api\controller\v1;
use think\Controller;
use app\api\controller\Common;

class Cat extends Common {

    /**
     * 获取配置文件中栏目数据
     */
    public function read(){
        $cats=config('cat.lists');
        $result[]=[
            'catid'=>0,
            'catname'=>'首页'
        ];
        foreach ($cats as $catid=>$catname){
            $result[]=[
                'catid'=>$catid,
                'catname'=>$catname
            ];
        }

        return show(config('statusCode.success'),'OK',$result,200);
    }
}