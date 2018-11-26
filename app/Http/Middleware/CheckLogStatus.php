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
    public function handle($request, Closure $next) {
        return $next($request);
    }
}