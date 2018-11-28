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
use Illuminate\Validation\Validator;
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
        ob_clean();
        var_dump($_COOKIE);
        return view("/login/loginview");
    }
    /*
     * reg 页面
     */
    public function regView(){

        return view("/login/regview");
    }

    //loginstart
    /*
     * reg
     */
    public function regUser(Request $request) {
        $msg = "注册成功";
        $error_key = false;
        $data = array(
            "username"=>$request->input("username"),
            "password"=>$request->input("password"),
            "nickname"=>$request->input("nickname")
        );
        if($request->input("password") != $request->input("re_password")){
            $msg = "两次输入的密码不一致";
            showMsg(1005,$msg);
        }
        foreach ($data as $d_k => $d_v){
            if(empty($d_v)){
                switch ($d_k){
                    case "username":
                        $msg = "用户名不能为空";
                        break;
                    case "password":
                        $msg = "密码不可以为空";
                        break;
                    case "nickname":
                        $msg = "请填写昵称";
                        break;
                }
                showMsg(1004,$msg);
            }
            if($d_k == "username" && (mb_strlen($d_v) < 4 or  mb_strlen($d_v) > 20)) {
                $msg = "用户名长度不能少于4个字或大于20个字";
                $error_key = 'true';
            }
            if($d_k == "password" && (mb_strlen($d_v) < 6 or  mb_strlen($d_v) > 32) ){
                $msg = "密码长度不能少于6个字或大于32个字";
                $error_key = 'true';
            }
            if($d_k == "nickname" && (mb_strlen($d_v) < 3 or  mb_strlen($d_v) > 20) ){
                $msg = "昵称长度不能少于3个字或大于20个字";
                $error_key = 'true';
            }
            if($error_key){
                showMsg(1005,$msg);
            }
        }
        $user_model = new Blog_user();
        //验证用户名唯一
        $userinfo = $user_model->getOneUserInfo(['username'=>$data['username']]);
        if($userinfo){
            showMsg(1002,"用户名已经存在,请更换用户名",[]);
        }
        $res = $user_model->regNewUser($data);
        if($res){
            showMsg(1000,"注册成功",array('url'=>url('user/login'),'source'=>$res));

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
        //验证验证码
        $res = captcha_check($request->vcode);
        if(!$res){
            showMsg(1006,"验证码错误",[]);
            exit;
        }


        //验证通过 存入缓存 key为session idrm -rf vendor
        $userdata = ['username'=>$userinfo->username,"logintime"=>$userinfo->lastlogintime,"nickname"=>$userinfo->nickname,'userid'=>$userinfo->id];
        //获取写入session
        session(["userinfo"=>$userdata]);
        //保存session
        $res = session()->get("userinfo");
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

        if($res){
            showMsg(1000,"登陆成功",array('url'=>url('blog/index')));exit;
        }else{
            showMsg(1001,"登陆失败");exit;
        }
    }
    //loginend
}