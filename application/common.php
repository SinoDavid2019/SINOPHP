<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * 获取栏目名称
 * @param $catId
 */
function getCatName($catId) {
    if(!$catId) {
        return '';
    }
    $cats = config('cat.lists');

    return !empty($cats[$catId]) ? $cats[$catId] : '';
}

/**
 * 判断是否是推荐
 * @param $str
 * @return string
 */
function isYesNo($str) {
    return $str ? '<span style="color:red"> 是</span>' : '<span > 否</span>';
}

/**
 * 发布状态
 */
function publish_status($id,$status){
    $controller=request()->controller();
    $sta=$status==1?0:1;
    $url=url($controller.'/status',['id'=>$id,'status'=>$sta]);
    if($status==1){
        $str="<a href='javascript:;' title='修改发布状态' status_url='".$url."' onclick='change_status(this)'>
              <span class='label label-success radius'>正常</span>
              </a>";
    }elseif ($status==0){
        $str="<a href='javascript:;' title='修改发布状态' status_url='".$url."' onclick='change_status(this)'>
              <span class='label label-danger radius'>待审</span>
              </a>";
    }

    return $str;

}

/**
 * 通用API返回客户端数据
 * @param $status
 * @param $message
 * @param array $data
 * @param int $httpCode
 * @return \think\response\Json
 */
function show($status,$message,$data=[],$httpCode=200){
    $result=[
        'status'=>$status,
        'message'=>$message,
        'data'=>$data
    ];
    return json($result,$httpCode);
}