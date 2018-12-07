<?php

namespace App\Http\Controllers\Index;
use App\Http\Controllers\FBaseController;
use App\Model\Blog_article;
use Symfony\Component\HttpFoundation\Request;


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

    /*
     * 文章页
     */
    public function articleInfo(Request $request)
    {
        $comment_flag = true;
        if(!$request->input('artid')){
            return redirect('index/404',404);
        }
        $model_art = new Blog_article();
        $art_info = $model_art->getaticleInfo($request->input('artid'));
        if(!$art_info){
            return redirect('index/404',404);
        }
        if($this->userData['userid'] == $art_info->userid){
            //本人文章 关闭自评
            $comment_flag = false;
        }else{
            //非本人文章 阅读权限
            if($art_info['is_personal'] == 1){
                return redirect('index/403',403);
            }else{
                //非本人 开启评论
                $comment_flag = true;
            }
        }
        return view("index/article",["userData"=>$this->userData,"artData"=>$art_info,'comment'=>$comment_flag]);
    }

    public function writeBlogApi(Request $request)
    {
        $content = $request->input("content");
        $title = $request->input("title");
        $detail = $request->input("detail");
        $pic_url = $this->uploadPic($request);
        $userid = $this->userData['userid'];
        if(empty($userid)){
            showMsg(10086,'登录过期');
        }
        $data = array(
            'content'=>$content,
            'title'=>$title,
            'detail'=>$detail,
            'pic' => $pic_url,
            'userid'=>$userid,
        );
        $model_art = new Blog_article();
        $art_id = $model_art->addArticle($data);
        if($art_id){
            showMsg(10000,"发布成功",array('url'=>url('blog/art',array('id'=>$art_id))));
        }else{
            showMsg(10001,'发布失败',array('url'=>url('blog/index')));
        }
    }



}