<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 15:02
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BBaseController;

class IndexController extends BBaseController
{
    /*
     * 后台首页
     */
    public function adminIndex() {
        echo "后台主页";
    }
}