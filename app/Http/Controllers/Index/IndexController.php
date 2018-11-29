<?php

namespace App\Http\Controllers\Index;
use App\Http\Controllers\FBaseController;
use http\Env\Request;


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
        //TODO
        return view("index/blogIndex");
    }

    /*
     * 写博客
     */
    public function WriteBlog(){
        return view("index/WriteBlog",["userData"=>$this->userData]);
    }

    public function writeBlogApi(Request $request)
    {
        var_dump($request);

    }
}