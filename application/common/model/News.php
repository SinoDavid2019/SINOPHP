<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/14
 * Time: 22:40
 */

namespace app\common\model;

use think\Model;

class News extends Base
{
    /**
     * 后台自动化查询分页
     * @param array $data
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getNews($data = [])
    {
        $data['status'] = [
            'neq', config('statusCode.status_delete')
        ];
        $order = ['id' => 'desc'];
        $result = $this->where($data)->order($order)->paginate();
        return $result;

    }
    public function getNewsByCondition($condition=[],$from=0,$size=10){
        $condition['status'] = [
            'neq', config('statusCode.status_delete')
        ];
        $order = ['id' => 'desc'];
        $result=$this->where($condition)->limit($from,$size)->order($order)->select();
        //echo $this->getLastSql();
        return $result;
    }

    public function getNewsCountByCondition($condition=[]){
        $condition['status'] = [
            'neq', config('statusCode.status_delete')
        ];
        return $this->where($condition)->count();
    }

}