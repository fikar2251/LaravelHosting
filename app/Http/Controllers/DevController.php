<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DevController extends Controller
{
    public static function encrypt(Request $request)
    {
        $file_encrypt = encrypt($request->file('file')->get());
        $original_file_name = $request->file('file')->getClientOriginalName();
        $fake = preg_replace('/\\.[^.\\s]{3,4}$/','',$original_file_name);
        $fake_file_name = rand().'_'.Carbon::now()->format('Ymd').'_'.$fake.'.rda';
        Storage::put('encrypt/'.$fake_file_name,$file_encrypt);
    }
    public static function decrypt($name)
    {
        $file = Storage::get('encrypt/'.$name);
        $file_decrypt = decrypt($file);
        return response()->streamDownload(function()use($file_decrypt){
            echo $file_decrypt;
        },$name);
    }
}
