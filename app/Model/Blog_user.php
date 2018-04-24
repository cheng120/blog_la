<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 11:34
 */

namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mockery\CountValidator\Exception;


class Blog_user extends  model_base
{
    protected $table = 'blog_user';
    protected $model_table = "";
    protected $salt_arr = array('GkJp','ViwH','nXyx','61VB',"3xds");

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
        DB::beginTransaction();
        try{
            $data['createtime']=time();
            //加密
            $password = $data['password'];
            unset($data['password']);
            $data['updatetime'] = time();
            $uid = $this->model_table->insertGetId($data);
            $index = $uid%5;
            $salt = $this->salt_arr[$index];
            $password = $password.$salt;
            $password = Hash::make($password);
            $saveData = ['password'=>$password];
            $res = $this->model_table->where(["id"=>$uid])->save($saveData);
            if($res){
                DB::commit();
            }else{
                DB::rollBack();
            }

        }catch (Exception $e){
            logger($e->getMessage());
            DB::rollBack();
        }

        return $res;
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
        $time = time();
        $data = array(
            "updatetime"=>$time,
            "lastlogintime"=>$time,
        );
        return $this->model_table->where(["id"=>$userid])->save($data);
    }


}