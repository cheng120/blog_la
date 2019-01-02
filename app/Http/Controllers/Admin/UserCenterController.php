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

class UserCenterController extends BBaseController
{
    public function adminList()
    {
        //获取管理员列表
        $model_user = new Admin_user();
        $user_list = $model_user->getAdminList([]);
        return view('admin.user.user_list',['user_list'=>$user_list]);
    }
}