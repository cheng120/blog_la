<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2018/12/11
 * Time: 下午4:39
 */

namespace App\Model;


class blog_comment extends model_base
{
    protected $table = '';
    public function __construct()
    {
        $this->table='blog_content';
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

}