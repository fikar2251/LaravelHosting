<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SuratMasukResource;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratMasukController extends Controller
{
    public function GetSuratMasuk()
    {
        $surat_masuk = SuratMasuk::get();
        $response = SuratMasukResource::collection($surat_masuk);
        return response()->json($response);
    }
    public function ShowSuratMasuk($id)
    {
        $resource = SuratMasuk::findOrFail($id);
        $response = new SuratMasukResource($resource);
        return response()->json($response);

    }
}