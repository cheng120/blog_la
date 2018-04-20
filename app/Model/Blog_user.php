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

    public function __construct()
    {
        if(empty($this->model_table)){
            $this->model_table = DB::table($this->table);
        }
    }


    /*
     * 新增用户
     */
    public function regNewUser(array $data) {
        if($this->getOneUserInfo(['username'=>$data['username']])){
            return false;
        }
        $data['createtime']=time();
        $data['password'] = password_hash($data['password']);
        $data['updatetime'] = time();
        return $this->model_table->insertGetId($data);
    }

    /*
     * 验证是否已经存在用户
     * @username
     */
    public function getOneUserInfo($where) {
        return $this->model_table->where($where)->first();
    }

    /*
     * 更新用户登陆信息
     */
    public function updateUserLoginStatus($userid) {

    }


}