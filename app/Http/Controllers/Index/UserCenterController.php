<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2018/11/29
 * Time: 下午6:24
 */

namespace App\Http\Controllers\Index;


use App\Http\Controllers\FBaseController;
use App\Model\Blog_user;
use Illuminate\Http\Request;

class UserCenterController extends FBaseController
{
    public function showUserInfo()
    {
        //TODO 设计用户信息页面
        //获取用户详细信息
        $model_user = new Blog_user();
        $user_info = $model_user->getOneUserInfo(['id'=>$this->userData['userid']]);
        return view('index/showUserInfo',['user_data'=>$user_info]);
    }

    public function uploadAvatar(Request $request)
    {
        if(empty($this->userData)){
            showMsg(10002,'请登录后再修改');
        }
        //上传头像
        $bullet = "avatar/";
        $pic_url = $this->uploadFromStream($request->input('image'),$bullet);
        //更改用户头像
        $model_user = new Blog_user();
        $res = $model_user->updateUserAvatar($pic_url,$this->userData['userid']);
        //变更头像后更新session
        $user_data = $request->session()->get('userinfo');
        $user_data['avatar'] = $pic_url;
        $request->session(['userinfo'=>$user_data]);
        if(!$res){
            showMsg(10003,"头像替换失败",[]);
        }
        if($pic_url){
            showMsg(10000,"头像上传成功",["pic_url"=>$pic_url]);
        }else{
            showMsg(10001,"头像上传失败",[]);

        }
    }

    public function updataUserInfo(Request $request)
    {
        $nickname = $request->input('nickname');
        $description = $request->input("description");
        //验证昵称唯一
        $model_user = new Blog_user();
        $where_has_nick = array(
            "nickname"=>$nickname
        );
        $check_nick = $model_user -> getOneUserInfo($where_has_nick);
        if($check_nick){
            showMsg(10001,"昵称已经存在",[]);
        }
        //验证数据长度
        if(mb_strlen($nickname)>=10){
            showMsg(10002,"昵称不能超过10个字",[]);
        }
        if(!trim($nickname)){
            showMsg(10003,"昵称不能为空",[]);
        }
        if(empty($description)){
            showMsg(10004,"简介不能为空",[]);
        }
        $up_data = [
            "nickname"=>$nickname,
            "description"=>$description,
            "updatetime"=>time(),
        ];
        $up_res = $model_user->updateUserInfo($this->userData['userid'],$up_data);
        //更新session
        $user_data = $request->session()->get('userinfo');
        $user_data['nickname'] = $nickname;
        $request->session(['userinfo'=>$user_data]);
        if($up_res){
            showMsg(10000,'保存成功',['user_data'=>json_encode($user_data)]);
        }else{
            showMsg(10005,'保存失败',[]);
        }
    }
}