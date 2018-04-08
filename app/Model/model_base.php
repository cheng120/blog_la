<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/8
 * Time: 17:19
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class model_base extends Model
{


    //禁用默认时间戳时间
    public $timestamps = false;
}