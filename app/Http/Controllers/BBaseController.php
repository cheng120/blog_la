<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/30
 * Time: 10:41
 */

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class BBaseController extends BaseController
{
    public $ip_address = "";
    public $userData = "";
    public $redis = "";
    public function __construct()
    {
        if(isset($request)){
            $this->ip_address = $request->getClientIp();
        }
        $this->redis = app('redis.connection');
        if(session()->get("admin_userInfo")){
            $this->userData = session()->get("admin_userInfo");
        }
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


}