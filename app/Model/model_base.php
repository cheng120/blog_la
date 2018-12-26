<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/8
 * Time: 17:19
 */

namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class model_base extends Model
{
    protected $table = '';
    protected $model_table = "";

    //禁用默认时间戳时间
    public $timestamps = false;
    public function __construct()
    {
        DB::connection()->enableQueryLog();
        if(empty($this->model_table)){
            $this->model_table = DB::table($this->table);
        }
    }

    public function showSqlLog(){
        return DB::getQueryLog();
    }
}