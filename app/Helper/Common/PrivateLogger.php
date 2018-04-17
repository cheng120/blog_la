<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/16
 * Time: 16:48
 */

namespace App\Helper;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class PrivateLogger
{
    private static $logname = "";
    public function __construct($logname)
    {
        self::$logname = $logname;
    }

    private static $debugLevel = [
        "debug"=>100,
        "info"=>200,
        "notice"=>250,
        "warning"=>300,
        "error"=>400,
        "critical"=>500,
        "alert"=>550,
        "emergency"=>600,
    ];


    public static function getLogger($message="",$dir = null,$data=[], $log_type = "info") {
        $logger = new Logger(self::$logname);
        $date = date('Ymd', time());
        $file_name = self::$name."_".$log_type . '_' . $date . '.log';
        $path = storage_path() . '/logs/' . ($dir ? ($dir . '/') : '') . $file_name;
        $type = self::$debugLevel[$log_type];
        $stream = new StreamHandler($path, $type);
        $firephp = new FirePHPHandler();
        $logger->pushHandler($stream);
        $logger->pushHandler($firephp);
        $logger->addRecord($type,$message,$data);
        return $logger;
    }
}