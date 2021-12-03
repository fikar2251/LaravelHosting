<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriCuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function GetKategoriCuti()
    {
        $resource = KategoriCuti::get();
        return response()->json($resource);
    }
}
