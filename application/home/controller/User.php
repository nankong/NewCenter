<?php
/**
 * Created by PhpStorm.
 * User: lzp
 * Date: 2018/1/24
 * Time: 16:46
 */

namespace app\home\controller;
use app\common\model\User as M ;


class User extends Base
{
    /**
     *
     * 注册
     */
    public  function register(){
        $u = new M();
        $rs = $u->register();
        return $rs;
    }

    /**
     * @return \think\response\Json
     * 登录
     */
    public function login(){
        $u = new M();
        $rs = $u->login();
        return $rs;
    }

}