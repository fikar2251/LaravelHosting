<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FilePegawai;
use Exception;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function get()
    {
        $resource = FilePegawai::where('pegawai_id', Auth::user()->pegawai->id)->get();
        $response = $resource;
        return response()->json($response);
    }
    public function download($id)
    {
        try {
            $file_pegawai = FilePegawai::findOrFail($id);
            $to_array = Auth::user()->pegawai->file_pegawai->pluck('id')->toArray();
            if(!in_array($file_pegawai->id,$to_array)){
                return response()->json('access is prohibited, this file is not yours',403);
            }
            $path = $file_pegawai->file;
            $file = Storage::get($path);
            $file_decrypt = decrypt($file);
            Storage::put('decrypt/'.$file_pegawai->original, $file_decrypt);
            return response()->download('storage/decrypt/'.$file_pegawai->original)->deleteFileAfterSend(true);
        } catch (Exception $error) {
            return response()->json($error->getMessage());
        }
    }
}
