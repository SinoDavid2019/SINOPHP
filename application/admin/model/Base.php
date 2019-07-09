<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/13
 * Time: 10:23
 */

namespace app\admin\model;

use think\Model;

class Base extends Model
{
    protected $autoWriteTimestamp = true;

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function add($data)
    {
        if (!is_array($data)) {
            exception('传递参数不合法');
        } else {
            $this->allowField(true)->save($data);
            return $this->id;
        }
    }
}