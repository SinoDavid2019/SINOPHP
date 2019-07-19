<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/18
 * Time: 14:11
 */
namespace app\api\controller\v1;

use app\api\controller\Common;
use app\admin\model\News as NewsModel;

class Index extends Common{

    /**
     * 获取首页头图及推荐新闻列表
     * @return \think\response\Json
     */
    public function index(){
        $head=NewsModel::getIndexHeadNormalNews();

        $head=$this->getDealNews($head);
        $position=NewsModel::getPositionNormalNews();
        $position=$this->getDealNews($position);

        $result=[
            'head'=>$head,
            'position'=>$position
        ];


        return show(config('statusCode.success'),'OK',$result,200);
    }

}
