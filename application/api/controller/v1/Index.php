<?php
/**
 * Created by PhpStorm.
 * User: sino
 * Date: 2019/6/18
 * Time: 14:11
 */
namespace app\api\controller\v1;

use app\api\controller\Common;

class Index extends Common{

    /**
     * 获取首页头图及推荐新闻列表
     * @return \think\response\Json
     */
    public function index(){
        $head=model('News')->getIndexHeadNormalNews();

        $head=$this->getDealNews($head);
        $position=model('News')->getPositionNormalNews();
        $position=$this->getDealNews($position);

        $result=[
            'head'=>$head,
            'position'=>$position
        ];


        return show(config('statusCode.success'),'OK',$result,200);
    }

}
