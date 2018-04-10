<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 11:34
 */

namespace App\Model;

use Illuminate\Support\Facades\DB;


class Blog_user extends  model_base
{
    protected $table = 'blog_user';
    protected $model_table = "";

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
        if(empty($this->model_table)){
            $this->model_table = DB::table($this->table);
        }
    }


    /*
     * 新增用户
     */
    public function regNewUser(array $data) {
        return $this->model_table->insertGetId($data);
    }

}