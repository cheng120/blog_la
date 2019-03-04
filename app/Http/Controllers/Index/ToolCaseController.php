<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2019/3/4
 * Time: 4:01 PM
 */

namespace App\Http\Controllers\Index;


use App\Http\Controllers\FBaseController;

class ToolCaseController extends  FBaseController
{
    //TODO 工具箱

    /**
     * 工具列表页
     */
    public function index()
    {
        //工具箱

        return view('toolcase.index');
    }


    /**
     * 时间戳转换
     */
    public function toolForTime()
    {
        return view('toolcase.timetool');
    }

}