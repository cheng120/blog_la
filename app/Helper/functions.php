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


/**TODO 上传图片base64
 * 上传的base64图片进行转换并上传
 * @param  resource 图片的base64代码，包含头文件
 * @param  string 上传的路径
 * @return 图片地址
 *
 */
function pic_decode_base64($file,$path='../tmp/')
{
    // 获取图片
    list($type, $data) = explode(',', $file);
    // 判断图片类型
    if(strstr($type,'image/jpeg')!=''){
        $ext = '.jpg';
    }elseif(strstr($type,'image/gif')!=''){
        $ext = '.gif';
    }elseif(strstr($type,'image/png')!=''){
        $ext = '.png';
    }
    if(!is_dir($path)){
        mkdir($path);
    }
    // 生成的文件名
    $name = uniqid().$ext;
    $photo = $path.$name;
    // 生成文件
    $Temp = base64_decode($data);

    file_put_contents($photo, $Temp, true);
    $data = array(
        "dir"=>$path,
        "name"=>$name,
        "all_path"=>$photo,
    );
    return $data;
}

/**
 * 获取当前控制器与方法
 *
 * @return array
 */
function getCurrentAction()
{
    $action = \Route::current()->getActionName();
    list($class, $method) = explode('@', $action);
    $class = explode('\\',$class);
    $className = array_pop($class);
    $className = str_replace("controller","",strtolower($className));
    return ['controller' => $className, 'method' => $method];
}