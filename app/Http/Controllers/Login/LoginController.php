<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 10:52
 */

namespace App\Http\Controllers\Login;

use App\Http\Controllers\FBaseController;

class LoginController extends FBaseController
{
    /*
     * login 页面
     */
    public function loginView(){
        echo "登陆";
        return view("/login/loginView");
    }
}