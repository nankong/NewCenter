<?php
/**
 * Created by PhpStorm.
 * User: lzp
 * Date: 2018/2/22
 * Time: 16:31
 */

namespace app\admin\controller;




class Index extends Base
{

    /**
     * @return mixed
     * 后台首页
     */
    public function index(){
        return $this->fetch('/index');
    }


}