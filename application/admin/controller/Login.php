<?php
/**
 * Created by PhpStorm.
 * User: lzp
 * Date: 2018/2/23
 * Time: 9:59
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;
class Login extends Controller
{

    /**
     * @return mixed
     * 后台登入页
     */
    public function login(){
        return $this->fetch('/login');
    }

    /**
     *
     * 后台登入
     */
    public function toLogin(){
        $data = input('');
        if(!empty(session("superadmin"))){
            $user = session('superadmin');
            if($user['userPhone'] == $data['admin']){
                $status = 1;
                return $status;
            }
        }
        $admin = Db::name('users')->where(['userPhone'=>$data['admin'],'loginPass'=>md5($data['pass'])])->find();
        if($admin){
            session('superadmin',$admin,600);
            $status = 2;
            return $status;
        }else{
            $status = 3;
            return $status;
        }

    }

}