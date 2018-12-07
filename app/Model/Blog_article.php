<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2018/12/7
 * Time: 上午11:01
 */

namespace App\Model;


class Blog_article extends model_base
{
    protected $table = '';
    public function __construct()
    {
        $this->table='blog_content';
        parent::__construct();
    }

    public function addArticle($data)
    {
        $data['create_time'] = time();
        $data['is_del'] = 0;
        $data['del_time'] = 0;
        $id = $this->model_table->insertGetId($data);
        if($id){
            return $id;
        }else{
            return false;
        }
    }

    public function getaticleInfo($art_id)
    {
        $where = array(
            'id'=>$art_id
        );
        $art_info = $this->model_table->where($where)->first();
        return $art_info;
    }
}