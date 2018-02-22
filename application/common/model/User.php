<?php
/**
 * Created by PhpStorm.
 * User: lzp
 * Date: 2018/1/25
 * Time: 9:29
 */

namespace app\common\model;
use think\Db;

class User extends Base
{
    /**
     * @return array
     * 注册
     */
    public function register(){
        $data = input('');
        $array = [];
        $array['userName'] = $data['userName'];
        $array['userPhone'] = $data['userPhone'];
        //$array['userEmail'] = $data['userEmail'];
        $array['loginPass'] = md5($data['loginPass']);
        $array['createTime'] = time();
        $rs = Db::name('users')->insert($array);
        if($rs){
            $arr = [
                'status'=>'success',
                'data'=>1,
            ];
            return $arr;
        }else{
            $arr = [
                'status'=>'failed',
                'data'=>0,
            ];
            return $arr;
        }
    }

    /**
     * 登录
     *
     */
    public function login(){
        $data = input('');
        $arr = [];
        $arr['userPhone'] = $data['userPhone'];
        $arr['loginPass'] = md5($data['loginPass']);
        $re = Db::name('users')->where(['userPhone'=>$arr['userPhone'],'loginPass'=>$arr['loginPass']])->field('userId')->find();
        if($re){
            session('userId',$re['userId']);
            return json(['status'=>1]);
        }else{
            return json(['status'=>0]);
        }

    }
}