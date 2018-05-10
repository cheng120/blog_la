<?php

namespace App\Http\Controllers\Index;
use App\Http\Controllers\FBaseController;


/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/2
 * Time: 11:17
 * 首页博客
 */
class IndexController extends FBaseController
{
    /*
     * 首页
     */
    public function blogIndex() {

        return view("index/blogIndex");
    }
}