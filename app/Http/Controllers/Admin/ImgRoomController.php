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
     * banner 列表
     */
    public function showAddBannerList()
    {

        return view('admin.img_room.add_banner');
    }

    /*
     * 获取列表数据
     */
    public function getBannerList(Request $request)
    {
        $model_banner = new Blog_banner();
        $res = $model_banner->getBannerList([]);
        return response()->json();
    }

    /*
     * 添加BANNER
     */
    public function addBanner(Request $request)
    {


    }
}