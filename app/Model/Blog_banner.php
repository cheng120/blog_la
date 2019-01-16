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
        $userInfo = DB::table($this->table)->where($where)->paginate(1,['*']);
        return $userInfo;
    }

    public function getBannerCount($where)
    {
        $userInfo = DB::table($this->table)->where($where)->count();
        return $userInfo;
    }
}