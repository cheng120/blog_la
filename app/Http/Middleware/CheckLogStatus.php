<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2018/11/23
 * Time: 上午11:43
 */

namespace App\Http\Middleware;
use Closure;
class CheckLogStatus
{
    public $userInfo;

    public function handle($request, Closure $next) {
        $this->userInfo = $request->session()->get('userinfo');
        if($this->userInfo){
            //已登录
            return $next($request);
        }else{
            redirect('user/login',302);
        }
    }
}