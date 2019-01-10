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
        return view('admin.img_room.banner_list');
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
}