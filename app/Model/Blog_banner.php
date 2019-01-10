<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2019/1/9
 * Time: 7:34 PM
 */

namespace App\Model;


class Blog_banner extends model_base
{
    protected $table = 'blog_banner';
    public function getBannerList($where)
    {
        $userInfo = DB::table($this->table)->where($where)->paginate(1,['*'],'pageIndex');
        return $userInfo;
    }
}