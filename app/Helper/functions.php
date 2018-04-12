<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/11
 * Time: 14:58
 */
class functions
{
    function showMsg($code,$message = '',$data = array()){
        $result = array(
            'code' => $code,
            'message' =>$message,
            'data' =>$data
        );
        exit(json_encode($result));
    }
}