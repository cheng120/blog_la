<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/30
 * Time: 11:21
 */

namespace App\Model;


class Admin_user extends model_base
{
    public $timestamps = false;
    public $table = "admin_user";
    public function __construct()
    {
        if(empty($this->model_table)){
            $this->model_table = DB::table($this->table);
        }
    }
    //获取管理员信息
    public function findUser($where){
        $userInfo = $this->model_table->where($where)->first();
        return $userInfo;
    }
}