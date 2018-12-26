<?php

namespace App\Http\Controllers\Index;
use App\Http\Controllers\FBaseController;
use App\Model\Blog_article;
use App\Model\blog_comment;
use App\Model\Blog_user;
use DemeterChain\B;
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
        //TODO 展示用户信息
        $model_art = new Blog_article();
        $model_user = new Blog_user();
        $art_list = $model_art->getArticleList();
        foreach ($art_list as $art_key => $art_info){
            $author_info = $model_user->getUserInfoById($art_info->userid);
            if(!$author_info){
                $art_list[$art_key]->author_info = array(
                    "username"=>"匿名",
                    "nickname"=>"匿名",
                );
            }else{
                $art_list[$art_key]->author_info = array(
                    "username"=>$author_info->username,
                    "nickname"=>$author_info->nickname,
                );
            }
        }
        return view("index/blogIndex",["artData"=>$art_list]);
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
        if(!$request->input('artid')){
            return redirect('index/404',404);
        }
        $artid = $request->input('artid');
        $model_art = new Blog_article();
        $model_user = new Blog_user();
        $art_info = $model_art->getaticleInfo($artid);
        //获取作者信息
        $author_info = $model_user->getOneUserInfo(['id'=>$art_info->userid]);
        if(!$art_info){
            return redirect('index/404',404);
        }

        //非本人文章 阅读权限
        if($art_info->is_personal == 1 && $this->userData['userid']!=$art_info['userid']){
            return redirect('index/403',403);
        }
        //获取评论列表
        $model_comment = new blog_comment();
        $comment_list = $model_comment->getCommentList($artid);
        return view("index/article",["userData"=>$this->userData,"artData"=>$art_info,"author_info"=>$author_info,"comment_list"=>$comment_list]);
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

    /*
     * 发表评论
     */
    public function addComment(Request $request)
    {
        if(empty($this->userData)){
            showMsg(10001,'请登录后再评论');
        }
        $model_comment = new blog_comment();
        $content = $request->input("content");
        $user_id = (int)$this->userData['userid'];
        $to_user_id = (int)$request->input('author_id');
        $art_id = $request->input('art_id');
        $data = array(
            'content'=>$content,
            'userid'=>$user_id,
            'to_userid'=>$to_user_id,
            'art_id'=>$art_id,
        );
        $res = $model_comment->addComment($data);
        if($res){
            showMsg(10000,"评论成功");
        }else{
            showMsg(10001,"评论失败，请稍后重试");
        }
    }


}