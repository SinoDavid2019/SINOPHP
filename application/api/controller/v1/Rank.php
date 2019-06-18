<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/18
 * Time: 19:17
 */

namespace app\api\controller\v1;

use app\api\controller\Common;
use app\common\lib\exception\ApiException;

class Rank extends Common
{

    public function index()
    {

        try {
            $ranks = model('News')->getRankNews();
            $ranks=$this->getDealNews($ranks);
        } catch (\Exception $exception) {
            throw new ApiException('查询失败',400,$exception->getMessage());
        }

        return show(config('statusCode.success'), 'OK', $ranks, 200);


    }
}