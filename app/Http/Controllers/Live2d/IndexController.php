<?php
/**
 * Created by PhpStorm.
 * User: cheng
 * Date: 2019/3/1
 * Time: 5:42 PM
 */

namespace App\Http\Controllers\Live2d;


use App\Http\Controllers\FBaseController;

class IndexController extends  FBaseController
{
    /*
     * live2d message
     */
    public function getLive2dMessage()
    {
        $message = array(
            "mouseover"=>[[
                'selector'=>".title a",
                "text"=>"要看看 {text} 么？",
            ]],
            "click"=>[[
                'selector'=>"#landlord #live2d",
                "text"=>["不要动手动脚的！快把手拿开~~", "真…真的是不知羞耻！","Hentai！", "再摸的话我可要报警了！⌇●﹏●⌇", "110吗，这里有个变态一直在摸我(ó﹏ò｡)"],
            ]]
        );
        return response()->json($message);
    }
}