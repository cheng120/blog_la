<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/30
 * Time: 11:21
 */

namespace App\Model;


use Illuminate\Support\Facades\DB;

class Admin_user extends model_base
{
    public $timestamps = false;
    public $table = "admin_user";
    public function __construct()
    {
        parent::__construct();
    }
    //获取管理员信息
    public function findUser($where){
        $userInfo =  DB::table($this->table)->where($where)->first();
        return $userInfo;
    }

    /*
     * 获取管理员列表
     */
    public function getAdminList($where)
    {
        $userInfo = DB::table($this->table)->where($where)->paginate(10);
        return $userInfo;
    }
}