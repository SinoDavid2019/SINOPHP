<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/14
 * Time: 22:40
 */

namespace app\admin\model;

use think\Model;

class News extends Base
{

    /**
     * 按分页查询符合条件的新闻数据
     * @param array $condition
     * @param int $from
     * @param int $size
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getNewsByCondition($condition=[],$from=0,$size=10){
        if(!isset($condition['status'])){
            $condition['status'] = [
                'neq', config('statusCode.status_delete')
            ];
        }

        $order = ['id' => 'desc'];
        $result=$this->field($this->_getQueryList())->where($condition)->limit($from,$size)->order($order)->select();
        //echo $this->getLastSql();
        return $result;
    }

    /**
     * 获取符合条件的新闻总数
     * @param array $condition
     * @return int|string
     * @throws \think\Exception
     */
    public function getNewsCountByCondition($condition=[]){
        if(!isset($condition['status'])){
            $condition['status'] = [
                'neq', config('statusCode.status_delete')
            ];
        }

        return $this->field($this->_getQueryList())->where($condition)->count();
    }

    public function getNewsByID($condition=[]){
        $condition['status'] = [
            'neq', config('statusCode.status_delete')
        ];

        return $this->where($condition)->select();


    }

    /**
     * 获取首页头图
     * @param int $num
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getIndexHeadNormalNews($num=4){
        $condition=[
            'status'=>1,
            'is_head_figure'=>1,
        ];
        $order=['id'=>'desc'];
        return $this->where($condition)->order($order)->field($this->_getQueryList())->limit($num)->select();

    }

    /**
     * 获取10条新闻列表数据
     * @param int $num
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getPositionNormalNews($num=10){
        $condition=[
            'status'=>1,
            'is_position'=>1,
        ];
        $order=['id'=>'desc'];
        return $this->where($condition)->order($order)->field($this->_getQueryList())->limit($num)->select();
    }

    private function _getQueryList(){
        return ['id','catid','title','status','image','read_count','create_time','is_position'];
    }

    /**
     * 获取排行前十的新闻数据
     * @param int $num
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getRankNews($num=10){
        $condition=[
            'status'=>1
        ];
        $order=['read_count'=>'desc'];
        return $this->where($condition)->order($order)->field($this->_getQueryList())->limit($num)->select();
    }

}