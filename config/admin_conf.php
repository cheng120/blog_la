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
        ['title'=>'测试菜单1','icon'=>'fa-cubes',"spread"=> true,'children'=>[
            ['title'=>'管理员列表','icon'=>'fa-cubes',"href"=> PHP_SAPI === 'cli' ? false : url('admin/admin_user_list')],
            ['title'=>'用户列表','icon'=>'fa-cubes',"href"=>"admin/Index"],
        ]],
    ],
];