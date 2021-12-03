<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\KategoriCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CutiController extends Controller
{
    public function GetKategoriCuti()
    {
        $resource = KategoriCuti::get();
        return response()->json($resource);
    }
    public function GetCuti()
    {
        $resource = Cuti::with('pegawai', 'kategori_cuti')->where('pegawai_id',auth()->user()->pegawai->id)->get();
        return response()->json($resource);
    }
    public function PostCuti(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_akhir' => ['required', 'date'],
            'kategori_cuti_id' => ['required','exists:kategori_cutis,id'],
            'keterangan' => ['required', 'string']
        ]);

        if($validator->fails()){
            return response()->json($validator->getMessageBag(),403);
        }
        $attr = $request->all();
        
        $attr['pegawai_id'] = auth()->user()->pegawai->id;

        Cuti::create($attr);
        return response()->json('Success Create Pengajuan Cuti');
    }
    public function ShowCuti($id)
    {
        $resource = Cuti::with('pegawai', 'kategori_cuti')->findOrFail($id);
        return response()->json($resource);
    }
}
