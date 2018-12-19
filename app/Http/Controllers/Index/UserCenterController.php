<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2018/11/29
 * Time: 下午6:24
 */

namespace App\Http\Controllers\Index;


use App\Http\Controllers\FBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserCenterController extends FBaseController
{
    public function showUserInfo()
    {
        //TODO 设计用户信息页面
        $user_info = array();
        return view('index/showUserInfo');
    }

    public function uploadAvatar(Request $request)
    {
        
        $pic = pic_decode_base64($request->input('image'));
        $domain = "http://" . config('filesystems.disks.upyun.domain');
        $bullet = "/avatar/";
        $up_res = Storage::disk('upyun')->writeStream($bullet.$pic['name'], fopen($pic['all_path'],'r'));
        if($up_res){
            $pic_path = $domain .'/'.$bullet.$pic['name'];
            //删除临时文件
            @unlink($pic['all_path']);
            showMsg(10000,'头像上传成功',['pic_url'=>$pic_path]);

        }else{
            showMsg(10001,'上传失败',[]);

        }
    }
}