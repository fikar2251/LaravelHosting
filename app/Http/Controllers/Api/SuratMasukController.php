<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SuratMasukResource;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratMasukController extends Controller
{
    public function get()
    {
        $surat_masuk = SuratMasuk::get();
        $response = SuratMasukResource::collection($surat_masuk);
        return response()->json($response);
    }
}