<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2019/1/2
 * Time: 3:13 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BBaseController;
use App\Model\Admin_user;
use App\Model\Blog_user;
use Illuminate\Http\Request;

class UserCenterController extends BBaseController
{
    public function adminList()
    {

        $model_admin = new Admin_user();
        $data = $model_admin->getAdminList([]);
        $data_count = $model_admin->getAdminCount([]);
        $page = ceil($data_count/1);

        return view('admin.user.admin_user_list',['admin_user_list'=>$data,"page"=>$page]);
    }

    /**
     * @param Request $request
     */
    public function showAddAdminUser()
    {

        return view("admin.user.addAdminUser");
    }

    /*
     * 添加管理员
     */
    public function addAdminUser(Request $request)
    {
        $logname = trim($request->input('logname'));
        $logpass = trim($request->input('password'));
        if(empty($logpass) || empty($logname)){
            showMsg(10001);
        }
        $model_admin = new Admin_user();
        //验证唯一
        $admin_info = $model_admin->findUser(['logname'=>$logname]);
        if($admin_info){
            showMsg(10003,'已经存在的用户名');
        }
        //添加管理员
        $res = $model_admin->addAdminUser($logname,$logpass);
        if($res){
            showMsg(10000,"添加成功");
        }else{
            showMsg(10002,"添加失败");
        }
    }

    /*
     * 表单弹窗
     */
    public function form_layer(Request $request)
    {
        $view_name = $request->input('view_name');
        return view('admin.layout_admin.form_layer_'.$view_name);
    }

    /*
     * 用户列表
     */
    public function getUserList()
    {

        return view('admin.user.users_list');
    }

    public function getUsersList(Request $request)
    {
        $model_user = new Blog_user();
        $data = $model_user->getUserList([]);
        $data_count = $model_user->getUserCount([]);
        $json_data = array();
        if(!empty($data)){
            foreach ($data as $key=>$dval){
                $tmp = array(
                    'id'=>$dval->id,
                    'name'=>$dval->username,
                    'nickname'=>$dval->nickname,
                    'createtime'=>date('Y-m-d H:i:s',$dval->createtime),
                    'lastlogtime'=>date('Y-m-d H:i:s',$dval->lastlogintime),
                    'icon'=>$dval->icon?$dval->icon:urldecode(config('app.default_avatar')),
                    'description'=>$dval->description,
                );
                $json_data['list'][] = $tmp;
            }
            $json_data['rel'] = true;
            $json_data['msg'] = "success";
            $json_data['count'] = $data_count;
        }else{
            $json_data['rel'] = false;
            $json_data['msg'] = "no data";
            $json_data['list'] = [];
            $json_data['count'] = 0;
        }
        return response()->json($json_data);
    }

}