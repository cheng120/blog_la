<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2019/1/9
 * Time: 7:08 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BBaseController;
use App\Model\Blog_banner;
use Illuminate\Http\Request;

class ImgRoomController extends BBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     * banner 列表
     */
    public function showBannerList()
    {
        $model_user = new Blog_banner();
        $data = $model_user->getBannerList([]);
        $data_count = $model_user->getBannerCount([]);
        $page = ceil($data_count/1);
        return view('admin.img_room.banner_list',['data_list'=>$data,"page"=>$page]);
    }

    /*
     * banner 编辑
     */
    public function showEditBannerList(Request $request)
    {
        $title = "添加banner";
        $type = "add";
        $id = $request->input('id');
        if(!empty($id)){

            $type = 'edit';
            $title = "修改banner_id：".$id;
            $model_banner = new Blog_banner();
            $banner_info = $model_banner->getBannerInfo($id);
            if(!$banner_info){
                redirect('admin/showBannerList','404');
            }
        }

        return view('admin.img_room.add_banner',['data'=>["type"=>$type,"title"=>$title,"banner_id"=>$request->input('id')?$request->input('id'):0,"data"=>isset($banner_info)?$banner_info:[]]]);
    }

    /*
     * 添加BANNER
     */
    public function editBanner(Request $request)
    {
        $type = $request->input('type');
        $title = $request->input('title');
        $banner_check = $request->input('banner_check');
        $sort= $request->input('sort');
        $des= $request->input('des')?$request->input('des'):"";
        $starttime = $request->input('starttime')?$request->input('starttime'):0;
        //上传图片
        $banner_img = $this->uploadPic($request);
        $model_banner = new Blog_banner();
        if($type == 'add'){
            $msg = "添加";
            //新增
            $data = array(
                "title"=>$title,
                "create_time"=>time(),
                "is_hide"=>$banner_check,
                "start_time"=>$starttime,
                "sort"=>$sort,
                "describe"=>$des,
                "src"=>$banner_img,
            );
            $res = $model_banner->addBanner($data);
        }else{
            $msg = "修改";
            //修改
            $update_time = time();
            $data = array(
                "title"=>$title,
                "update_time"=>time(),
                "is_hide"=>$banner_check,
                "start_time"=>$starttime,
                "sort"=>$sort,
                "describe"=>$des,
                "src"=>$banner_img,
            );
        }
        if($res ){
            return response()->json(['msg'=>$msg."成功"]);
        }else{
            return response()->json(['msg'=>$msg."失败"]);
        }
    }
}