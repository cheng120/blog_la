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

        $strALL = "黄巾之乱,谋诛宦官,引狼入室,武夫乱国,酸枣联盟,讨董英雄,吕布与貂蝉,群雄割据,桃园结义,阿瞒复仇,刘备得徐州,吕布之死,献帝东归,迁都许昌,江东小霸王,将星陨落,战宛城,衣带诏,官渡之战,统一北方,三顾茅庐,下载荆州降曹,下载火烧赤壁,下载玄德入蜀,下载马超归刘,下载争夺汉中,下载有借无还,下载铜雀承天,下载合肥之战,下载刘备称王,败走麦城,下载曹丕篡汉,下载刘备称帝,下载火烧连营,下载白帝城托孤,下载七擒孟获,下载诸葛北伐,下载鞠躬尽瘁,下载诸葛亮之死,下载三代祸国,司马使诈,下载孙权立储,下载小诸葛辅政,下载吴国血斗,下载孔明身后,下载姜维避祸,下载乐不思蜀,下载司马氏乱政,下载司马昭之心,下载东吴暴君,三国归晋";
        $arr = explode(',',$strALL);
        foreach( $arr as $v){
            $name = $v;
            $str = mb_convert_encoding($v,"gbk","utf-8");
            $str = urlencode($str);
            $url_pre = "http://down03.pingshu8.com:8000/03/ys/%CC%DA%B7%C9%CB%B5%C8%FD%B9%FA(51%BC%AF)/";
            $url_prx = ".mp3";
            $dir = "../download/";
            $mp3_file = file_get_contents($url_pre."01.$str$url_prx");
            if($mp3_file){
                $res = file_put_contents($dir.$name.$url_prx,$mp3_file);
            }
            //日志记录
            $this->write_log($res,"debug");

        }

    }
}