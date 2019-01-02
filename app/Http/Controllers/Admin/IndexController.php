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
        $left_nav = config('admin_conf.left_nav');
        return view("admin/index/index",['left_nav'=>$left_nav]);
    }

    /*
     * 展示页
     */
    public function adminMain() {
        echo "后台主区域";
        return view("admin/index/main");
    }

    /*
     * 后台导航
     */
    public function adminNav(){

        return view("admin/index/nav");
    }

}