<?php
/**
 * Created by PhpStorm.
 * User: lzp
 * Date: 2018/2/23
 * Time: 9:59
 */

namespace app\admin\controller;


use think\Controller;

class Login extends Controller
{
    /**
     * @return mixed
     * 后台登入页
     */
    public function login(){
        return $this->fetch('/login');
    }

    public function toLogin(){
        $data = input('.');
    }
}