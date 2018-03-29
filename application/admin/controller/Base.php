<?php
/**
 * Created by PhpStorm.
 * User: lzp
 * Date: 2018/2/22
 * Time: 16:32
 */

namespace app\admin\controller;
use think\Session;

use think\Controller;

class Base extends Controller
{
    /**
     * Base constructor.
     * 验证管理员
     */
    public function __construct(){
        parent::__construct();
        if(empty(session("superadmin"))){
             $this->redirect('login/login');
        }
    }


}