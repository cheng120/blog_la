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
    protected $salt_arr = array('GkJp','ViwH','nXyx','61VB',"3xds");

    public function __construct()
    {
        DB::connection()->enableQueryLog();

    }

    public function __destruct (){

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
            $data['updatetime'] = time();
            $uid = $this->model_table->insertGetId($data);
            $password = $this->verify_password($password,$uid,0);
            if($password == ""){
                DB::rollBack();
                return false;
            }
            $saveData = ['password'=>$password];
            $res = DB::table($this->table)->where(["id"=>$uid])->update($saveData);
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
        return DB::table($this->table)->where($where)->first();
    }


    /*
     * 验证或者生成密码
     * @type 1  验证 0 生成
     */
    private function verify_password($password , $userid , $type= 1,$old_password = "") {
        $index = $userid%5;
        $salt = $this->salt_arr[$index];
        $password = $password.$salt;
        if($type == 1 && $old_password){
            $password = Hash::check($password,$old_password);

        }else{
            $password = Hash::make($password);
        }
        return $password;
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
        return DB::table($this->table)->where(["id"=>$userid])->update($data);
    }

    /*
     * 验证登陆
     */
    public function checkUser( $username, $password ) {
        $userdata = $this->getOneUserInfo(['username'=>$username]);
        if(!$userdata){
            return false;
        }
        $userid = $userdata->id;
        $old_password =$userdata->password;
        $flag = $this->verify_password($password,$userid,1,$old_password);

        if(!$flag){
            return false;
        }else{
            return $userdata;
        }

    }

    /*
     * 根绝ID获取用户昵称
     */
    public function getUserInfoById($userid)
    {
        $where = array(
            'id'=>$userid
        );
        $field = array(
            "username",
            "nickname",
        );
        $res = DB::table($this->table)->where($where)->first($field);
        return $res;
    }

    /*
     * 更新用户头像
     */
    public function updateUserAvatar($avatar_url,$user_id)
    {
        $where = array(
            'id'=>$user_id
        );
        $data = array(
            "icon"=>$avatar_url
        );
        $res = DB::table($this->table)->where($where)->update($data);
        return $res;
    }

    /*
     * 更新用户信息
     */
    public function updateUserInfo($user_id,$data)
    {
        $res = DB::table($this->table)->where('id',$user_id)->update($data);
        return $res;
    }


    /*
     * 获取用户列表
     */
    public function getUserList($where)
    {
        $userInfo = DB::table($this->table)->where($where)->paginate(1,['*']);
        return $userInfo;
    }

    /*
     * 获取用户数量
     */
    public function getUserCount($where)
    {
        $userInfo = DB::table($this->table)->where($where)->count();
        return $userInfo;
    }

}