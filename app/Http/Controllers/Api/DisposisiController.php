<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DisposisiResource;
use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisposisiController extends Controller
{
    public function GetDisposisi()
    {

        $disposisi = Disposisi::with('surat_masuk', 'response')->where('pegawai_id', Auth::user()->pegawai->id)->get();
        $resource = DisposisiResource::collection($disposisi);
        return response()->json($resource);
    }
    public function ShowDisposisi($id)
    {
        $disposisi = Disposisi::with('surat_masuk', 'response')->findOrFail($id);
        $disposisi->update([
            'is_read' => 1
        ]);
        $response = new DisposisiResource($disposisi);
        return response()->json($response);
    }
}
