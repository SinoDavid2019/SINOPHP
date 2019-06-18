<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//get
Route::get('test','api/test/index');
Route::put('test/:id','api/test/update');
Route::delete('test/:id','api/test/delete');

/**
 * resource对于7种形式的访问方式,根据路由地址及携带的参数对应不同控制器的方法
 */
Route::resource('test','api/test');//对应save方法

Route::get('api/:ver/cat','api/:ver.cat/read');


//获取首页头图路由
Route::get('api/:ver/index','api/:ver.index/index');

//获取栏目对应的数据
Route::get('api/:ver/news','api/:ver.news/index');

//获取浏览次数排行前十的新闻数据

Route::get('api/:ver/rank','api/:ver.rank/index');

//News的资源路由
Route::resource('api/:ver/news','api/:ver.news');
