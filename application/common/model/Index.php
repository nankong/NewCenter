<?php
/**
 * Created by PhpStorm.
 * User: lzp
 * Date: 2018/2/5
 * Time: 16:04
 */

namespace app\common\model;
use think\Db;

class Index extends Base
{
    public function getCats(){
        //一级
        $cats = Db::('goodsCats')->where('parentId',0)->select();

    }
}