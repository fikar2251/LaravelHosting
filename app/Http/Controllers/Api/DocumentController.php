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
    public function GetDocument()
    {
        $resource = FilePegawai::where('pegawai_id', Auth::user()->pegawai->id)->get();
        $response = $resource;
        return response()->json($response);
    }
    public function DownloadDocument($id)
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
            $path = 'decrypt/'.$file_pegawai->original;
            return response()->json(asset('storage/'.$path));
        } catch (Exception $error) {
            return response()->json($error->getMessage());
        }
    }
    public function ShowDocument($id)
    {
        $resource = FilePegawai::findOrFail($id);
        return response()->json($resource);
    }
}
