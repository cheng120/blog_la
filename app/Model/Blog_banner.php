<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2019/1/9
 * Time: 7:34 PM
 */

namespace App\Model;


use Illuminate\Support\Facades\DB;

class Blog_banner extends model_base
{
    protected $table = 'blog_banner';
    public function getBannerList($where)
    {
        $banner_list = DB::table($this->table)->where($where)->orderByDesc('sort')->paginate(1,['*']);
        return $banner_list;
    }

    public function getBannerCount($where)
    {
        $count = DB::table($this->table)->where($where)->count();
        return $count;
    }

    /**
     * 新增banner
     */
    public function addBanner($data)
    {
        $res = DB::table($this->table)->insert($data);
        return $res;
    }

    /**
     * 获取一个bannerinfo
     */
    public function getBannerInfo($id)
    {
        $banner_info = DB::table($this->table)->where(['id'=>$id])->find();
        return $banner_info;
    }



}