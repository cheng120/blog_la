<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2018/12/11
 * Time: 下午4:39
 */

namespace App\Model;


use Illuminate\Support\Facades\DB;

class blog_comment extends model_base
{
    protected $table = '';
    public function __construct()
    {
        $this->table='blog_comment';
        parent::__construct();
    }


    /*
     * 添加评论
     */
    public function addComment($data)
    {
        $data['create_time'] = time();
        $data['is_del'] = 0;
        $data['del_time'] = 0;
        $comment_id = $this->model_table->insert($data);
        return $comment_id;
    }


    /*
     * 获取评论列表
     */
    public function getCommentList($art_id)
    {
        $where = array("art_id"=>$art_id);
        $list = DB::table($this->table)->where($where)->paginate(10);
        return $list;
    }
}