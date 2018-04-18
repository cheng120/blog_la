<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->username){
            showMsg(1001,"用户名不能为空");
            exit;
        }
        if(mb_strlen($request->username)>30){
            showMsg(1002,"用户名不能超过30字");
            exit;
        }
        $request->password=trim($request->password);
        $request->repass=trim($request->repass);
        if(!$request->password){
            showMsg(1003,"密码不能为空");
            exit;
        }

        if(strlen($request->password)> 20){
            showMsg(1003,"密码不能超过20字");
            exit;
        }
        if($request->password !== $request->repass){
            showMsg(1004,"两次密码不一致");
            exit;
        }
        $request->nickname=trim($request->nickname);

        if(!$request->nickname){
            showMsg(1005,"昵称不能为空");
            exit;
        }
        if(mb_strlen($request->nickname) > 30){
            showMsg(1005,"昵称不能超过30字");
            exit;
        }

        return $next($request);
    }
}
