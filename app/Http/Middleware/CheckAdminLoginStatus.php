<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2019/1/14
 * Time: 7:02 PM
 */

namespace App\Http\Middleware;
use Closure;

class CheckAdminLoginStatus
{

    public $userInfo;

    public function handle($request, Closure $next) {
        $this->userInfo = $request->session()->get('admin_userInfo');
        if(!empty($this->userInfo)){
            //已登录
            return $next($request);
        }else{
            return redirect('admin/login_user');
        }
    }
}