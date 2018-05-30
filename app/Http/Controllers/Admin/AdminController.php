<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/30
 * Time: 14:47
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BBaseController;

class AdminController extends BBaseController
{
    /*
     * 后台登陆页面
     */
    public function adminLogin() {
        return view("admin/login/adminLogin");
    }
}