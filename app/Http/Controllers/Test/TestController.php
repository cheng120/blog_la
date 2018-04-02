<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/2
 * Time: 11:06
 */
namespace App\Http\Controllers\Test;

use App\Model\Blog_seeker;
use App\Http\Controllers\FBaseController;
use Symfony\Component\HttpFoundation\Request;

class TestController extends FBaseController
{
    /*
     * save Url
     */
    public function saveUrl(){

        return view("Test/saveUrl");
    }

    /*
     * save Url
     */
    public function doSaveUrl(Request $request){

        $url = $request->input("url");
        $ip = $request->getClientIp();
        $seeker = new Blog_seeker();
        $seeker->url = $url;
        $seeker->ip = $ip;
        $saveRes = $seeker->save();
        if($saveRes){
            return redirect()->route('urlList');
        }else{
            return redirect()->route('save_url');
        }
    }

    /*
     * urllist
     */
    public function UrlList(Request $request) {
        $seeker = new Blog_seeker();
        $ip = $request->getClientIp();
        $dataList = $seeker->where(['ip'=>$ip])->get()->toArray();
        return view("test/urllist",["dataList"=>$dataList]);
    }
}