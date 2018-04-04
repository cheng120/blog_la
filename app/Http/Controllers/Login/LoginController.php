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
use Symfony\Component\HttpFoundation\Request;

class LoginController extends FBaseController
{
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

    }
    /*
     * login
     */
    public function login(Request $request)
    {

    }
    //loginend
}