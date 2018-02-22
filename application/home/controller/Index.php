<?php
namespace app\home\controller;

/**
 * Created by PhpStorm.
 * User: lzp
 * Date: 2018/1/23
 * Time: 13:54
 */

class index extends Base
{
    /**
     * @return mixed
     *  首页
     */
    public function index(){
        return $this->fetch("index");
    }

    /**
     * @return mixed
     *  分类页
     */
    public function catList(){
        return $this->fetch('/category');
    }

    /**
     *
     * 登入
     */
    public function login(){
        return $this->fetch('/login');
    }

    /**
     * @return mixed
     * 注册
     */
    public function register(){
        return $this->fetch('/register');
    }
}