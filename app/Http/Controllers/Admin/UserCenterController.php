<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2019/1/2
 * Time: 3:13 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BBaseController;
use App\Model\Admin_user;
use App\Model\Blog_user;
use Illuminate\Http\Request;

class UserCenterController extends BBaseController
{
    public function adminList()
    {

        $model_admin = new Admin_user();
        $data = $model_admin->getAdminList([]);
        $data_count = $model_admin->getAdminCount([]);
        $page = ceil($data_count/1);

        return view('admin.user.admin_user_list',['admin_user_list'=>$data,"page"=>$page]);
    }

    /**
     * @param Request $request
     */
    public function showAddAdminUser()
    {

        return view("admin.user.addAdminUser");
    }

    /*
     * 添加管理员
     */
    public function addAdminUser(Request $request)
    {
        $logname = trim($request->input('logname'));
        $logpass = trim($request->input('password'));
        if(empty($logpass) || empty($logname)){
            showMsg(10001);
        }
        $model_admin = new Admin_user();
        //验证唯一
        $admin_info = $model_admin->findUser(['logname'=>$logname]);
        if($admin_info){
            showMsg(10003,'已经存在的用户名');
        }
        //添加管理员
        $res = $model_admin->addAdminUser($logname,$logpass);
        if($res){
            showMsg(10000,"添加成功");
        }else{
            showMsg(10002,"添加失败");
        }
    }

    /*
     * 用户列表
     */
    public function getUserList()
    {
        $model_user = new Blog_user();
        $data = $model_user->getUserList([]);
        $data_count = $model_user->getUserCount([]);
        $page = ceil($data_count/1);
        return view('admin.user.user_list',['user_list'=>$data,"page"=>$page]);
    }
}