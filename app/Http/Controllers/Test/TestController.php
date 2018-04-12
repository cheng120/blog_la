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
use Symfony\Component\DomCrawler\Crawler;

class TestController extends FBaseController
{
    /*
     * save Url
     */
    public function saveUrl(){

        return view("test/saveUrl");
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
            return redirect()->route('HtmlDetail',array("url"=>$url));
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


    /*
     * goHtml
     */
    public function goHtml(Request $request) {

        $url = $request->input("url");
        $html = $this->getHtml($url);
        //初始化HTML识别类
        $crawler = new Crawler();
        //灌入页面数据
        $crawler->addHtmlContent($html);
        $crawler = new Crawler($html);
        $title =  $crawler->filterXPath('//h1[@class="product-header__title"]')->text();
        $username =  $crawler->filterXPath('//h2[@class="product-header__identity product-header__identity--app-header product-header__identity--spaced"]')->filter('a')->text();

        foreach($crawler->filterXPath('//dd[@class="information-list__item__definition l-column medium-9 large-10"]') as $i=>$node){
            $c = new Crawler($node);
            if($i == 1){
                $size = $c->text();
            }
        }
//        foreach($crawler->filterXPath('//picture[@class="we-artwork--fullwidth we-artwork--screenshot-platform-iphone we-artwork--screenshot-version-iphone6+ we-artwork--screenshot-orientation-portrait we-artwork ember-view"]') as $k=>$pnode){
//            $p = new Crawler($pnode);
//            foreach($p as $kp=>$vp){
//                echo $p->filter("img")->attr("src");
//                echo "<br>";
//                echo "<img src='".$p->filter("img")->attr("src")."'>";
//                echo "<hr/>";
//            }
//        }
//        echo "<hr/>";
        return view("test/htmldetail",array("title"=>$title,"username"=>$username,"size"=>$size));
    }

    /*
     * getHtml
     */
    private function getHtml($url){
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        $html = file_get_contents($url,false,stream_context_create($arrContextOptions));
        return $html;
    }

    /*
     * 抓取MP3 并保存
     */
    public function getMp3() {
        $str = "黄巾之乱";
        $str = mb_convert_encoding($str,"gbk","utf-8");
        $str = urlencode($str);
        $url_pre = "http://down03.pingshu8.com:8000/03/ys/%CC%DA%B7%C9%CB%B5%C8%FD%B9%FA(51%BC%AF)/";
        $url_prx = ".mp3";
        $dir = "../download/";
        $mp3_file = file_get_contents($url_pre."01.$str$url_prx");
        if($mp3_file){
            $res = file_put_contents($dir.$str.$url_prx,$mp3_file);
            if($res){
                showMsg(1000,"成功");
            }
        }
    }
}