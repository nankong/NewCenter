<?php
/**
 * Created by PhpStorm.
 * User: lzp
 * Date: 2018/2/22
 * Time: 16:32
 */

namespace app\admin\controller;


use think\Controller;

class Base extends Controller
{
    public function __construct(){
        parent::__construct();
        if(!session('superadmin')){
            return $this->fetch('/login');
        }
    }
}