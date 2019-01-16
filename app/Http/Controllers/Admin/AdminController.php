<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/30
 * Time: 14:47
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BBaseController;
use App\Model\Admin_user;
use Illuminate\Http\Request;

class AdminController extends BBaseController
{

    /*
     * 后台登陆页面
     */
    public function adminLogin() {

        //ip限制非IP列表不能进入
        return view("admin/login/adminLogin");
    }
    /*
     * 后台登陆
     */
    public function dologin(Request $request) {
        $username=trim($request->input("username"));
        $password=trim($request->input("password"));
        $msg = array("code"=>1000,"msg"=>"登陆成功","jump_url"=>url('admin/Index'));

        if(!$username || !$password){
            $msg = array("code"=>1002,"msg"=>"登录名或密码不能为空");
            return $msg;
        }
        $ad_user_model = new Admin_user();
        $where = array(
            "logname"=>$username,
            "logpass"=>md5(md5($password)),
        );
        $userInfo = $ad_user_model->findUser($where);
        if(!$userInfo){
            $msg = array("code"=>1001,"msg"=>"登陆失败","debug"=>"密码错误");
            return $msg;
        }else{
            $msg['data'] = $userInfo;
            //写入登陆状态
            $this->writeDataForLogin($userInfo);
            //执行登陆
            return $msg;
        }
    }
    
    /*
     * 登陆写入session 并更新登陆信息
     */
    private function writeDataForLogin($userInfo) {
        $res = session(["admin_userInfo"=>$userInfo]);
        session()->save();
        return $res;
    }

}