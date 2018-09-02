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
        return view("admin/index/index");
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
        echo "后台导航";
        return view("admin/index/nav");
    }

    /*
     * 获取左导航
     */
    private function getNav(){

    }
}