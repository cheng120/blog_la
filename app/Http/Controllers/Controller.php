<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    public function uploadPic(Request $request){
        $domain = "http://" . config('filesystems.disks.upyun.domain');
        $file_path = Storage::disk('upyun')->put('/image', $request->file('file'));
        return $domain . "/$file_path";
    }


}
