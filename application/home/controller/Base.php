<?php
/**
 * Created by PhpStorm.
 * User: lzp
 * Date: 2018/1/23
 * Time: 13:59
 */

namespace app\home\controller;
use think\Controller;
use Gregwar\Captcha\CaptchaBuilder;
//use Vaptcha\Vaptcha;

class Base extends Controller
{
    /**
     * 生成验证码
     */
    public function verifCode(){
        $builder = new CaptchaBuilder();
        $builder->build(200,50)->output();
        session('verify_code', $builder->getPhrase());
    }

    /**
     * 检测验证码是否正确
     * @param $code
     * @return bool
     */
    public function check()
    {
        $code = input('idcode');
        return ($code == session('verify_code') && $code != '') ? true : false;
    }

    /**
     *
     * 显示验证码
     */
    public function  showVerif(){
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $this->verifCode();
    }
}