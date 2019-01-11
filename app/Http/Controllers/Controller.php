<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    public function uploadPic(Request $request){
        $domain = "http://" . config('filesystems.disks.upyun.domain');
        $file_path = Storage::disk('upyun')->put('/image', $request->file('file'));
        return $domain . "/$file_path";
    }


}
