<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 10:53
 */

namespace App\Http\Controllers;

use App\Helper\PrivateLogger;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
class FBaseController extends BaseController
{
    public $ip_address = "";
    public $userData = "";
    public $redis = "";
    public function __construct(Request $request)
    {
        if(isset($request)){
            $this->ip_address = $request->getClientIp();
        }
        $this->userData =  $request->session()->get('userinfo');
    }


    /*
     * 记录日志
     * @name 日志名字
     * @
     */
    public function write_log($content=[],$type="info") {
        $className = $this->getCurrentControllerName();
        $log = new PrivateLogger($className);
        $message = $this->getCurrentMethodName();
        $log->getLogger($message,$className,$content,$type);
    }

    /**
     * 获取当前控制器名
     *
     * @return string
     */
    public function getCurrentControllerName()
    {
        return $this->getCurrentAction()['controller'];
    }

    /**
     * 获取当前方法名
     *
     * @return string
     */
    public function getCurrentMethodName()
    {
        return $this->getCurrentAction()['method'];
    }

    /**
     * 获取当前控制器与方法
     *
     * @return array
     */
    public function getCurrentAction()
    {
        $action = \Route::current()->getActionName();
        list($class, $method) = explode('@', $action);
        $class = explode('\\',$class);
        $className = array_pop($class);
        $className = str_replace("controller","",strtolower($className));
        return ['controller' => $className, 'method' => $method];
    }

    public function uploadFromStream($fileStream,$path_name){
        $pic = pic_decode_base64($fileStream);
        $domain = "http://" . config('filesystems.disks.upyun.domain');
        $up_res = Storage::disk('upyun')->writeStream($path_name.$pic['name'], fopen($pic['all_path'],'r'));
        if($up_res){
            $pic_path = $domain .'/'.$path_name.$pic['name'];
            //删除临时文件
            @unlink($pic['all_path']);
            return $pic_path;
        }else{
            return false;
        }
    }

    public function uploadPic(Request $request){
        $domain = "http://" . config('filesystems.disks.upyun.domain');
        $file_path = Storage::disk('upyun')->put('/image', $request->file('file'));
        return $domain . "/$file_path";
    }
}