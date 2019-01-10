<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2018/12/29
 * Time: 1:54 PM
 */
return [
    "top_nav"=>[
        ['name'=>'测试菜单',"url"=>"admin/Index"],
        ['name'=>'测试菜单',"url"=>"admin/Index"],
    ],
    "left_nav"=>[
        ['title'=>'用户管理','icon'=>'&#xe60a;',"spread"=> true,'children'=>[
            ['title'=>'管理员列表','icon'=>'&#xe60a;',"href"=> PHP_SAPI === 'cli' ? false : url('admin/admin_user_list')],
            ['title'=>'用户列表','icon'=>'&#xe60a;',"href"=> PHP_SAPI === 'cli' ? false : url('admin/getUserList')],
        ]],
        ['title'=>'图库','icon'=>'&#xe64a;',"spread"=> true,'children'=>[
            ['title'=>'图库列表','icon'=>'&#xe64a;',"href"=> PHP_SAPI === 'cli' ? false : url('admin/showBannerList')],
            ['title'=>'banner','icon'=>'&#xe64a;',"href"=> PHP_SAPI === 'cli' ? false : url('admin/showBannerList')],
        ]],
    ],
];