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
        $userInfo = DB::table($this->table)->where($where)->paginate(1,['*']);
        return $userInfo;
    }

    /*
     * 获取管理员数量
     */
    public function getAdminCount($where)
    {
        $userInfo = DB::table($this->table)->where($where)->count();
        return $userInfo;
    }
    /*
     * 新增管理员
     */
    public function addAdminUser($logname,$logpass)
    {
        //验证用户名唯一
        $data = array(
            'logname'=>$logname,
            'logpass'=>md5(md5($logpass)),
            'create_time'=>time(),
        );
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
}