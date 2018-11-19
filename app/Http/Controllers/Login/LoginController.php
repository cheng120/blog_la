<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 10:52
 */

namespace App\Http\Controllers\Login;

use App\Http\Controllers\FBaseController;
use App\Model\Blog_user;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends FBaseController
{
    public function __call($method, $parameters)
    {
        parent::__call($method, $parameters); // TODO: Change the autogenerated stub

    }

    /*
     * login 页面
     */
    public function loginView(){

        return view("/login/loginview");
    }

    //loginstart
    /*
     * reg
     */
    public function regUser(Request $request) {
        $user_model = new Blog_user();
        $data = array(
            "username"=>$request->input("username"),
            "password"=>$request->input("password"),
            "nickname"=>$request->input("nickname")
        );
        //验证用户名唯一
        $userinfo = $user_model->getOneUserInfo(['username'=>$data['username']]);
        if($userinfo){
            showMsg(1002,"用户名已经存在,请更换用户名",[]);
        }
        $res = $user_model->regNewUser($data);
        if($res){
            showMsg(1000,"注册成功",$res);

        }else{
            showMsg(1001,"注册失败",[]);
        }
    }
    /*
     * login
     */
    public function login(Request $request)
    {
            //登陆操作
        $user_model = new Blog_user();
        $username = $request->input("username");
        $password = $request->input("password");
        $userinfo = $user_model->checkUser($username,$password);

        if(!$userinfo){
            showMsg(1001,"用户名或密码错误",[]);
            exit;
        }
        session()->put(["1122"=>"ceshi".time()]);

        //验证验证码
        $res = captcha_check($request->vercode);
        if(!$res){
            showMsg(1006,"验证码错误",[]);
            exit;
        }

        //验证通过 存入缓存 key为session id
        $userdata = ['username'=>$userinfo->username,"lastlogintime"=>$userinfo->lastlogintime,"nickname"=>$userinfo->nickname];
        //获取写入session
        $res = session(["username"=>$userinfo->username]);
        //保存session

        session()->save();
        //获取内存信息
        $cache_info = $this->userData;
        //获取客户端IP
        $userdata['ip_address'] = $this->ip_address;
        if($cache_info){
            //如果已经登陆判断 对比IP 记录日志
            if($cache_info["ip_address"] != $userdata['ip_address']){
                logger("login_complex","username:".$userdata['username']." old ip:".$cache_info["ip_address"]." new ip ".$userdata['ip_address']);
            }
        }
        //更新缓存
        $res = $this->redis->hmset($userinfo->username,$userdata);

        if($res){
            showMsg(1000,"登陆成功");exit;
        }else{
            showMsg(1001,"登陆失败");exit;
        }
    }
    //loginend
}