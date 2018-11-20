<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/11
 * Time: 14:58
 * 公共函数
 */

    function showMsg($code = 10086,$message = '参数异常',$data = array()){
        $result = array(
            'code' => $code,
            'msg' =>$message,
            'data' =>$data
        );
        exit(json_encode($result));
}