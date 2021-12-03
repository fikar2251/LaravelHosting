<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('pegawai.absensi.index',[
            'absensis' => Absensi::where('pegawai_id',auth()->user()->pegawai->id)->get(),
            'pegawai' => auth()->user()->pegawai,
            'month' => Carbon::now()
        ]);
    }
    public function filter(Request $request)
    {
        return view('pegawai.absensi.index',[
            'absensis' => Absensi::where('pegawai_id',auth()->user()->pegawai->id)->get(),
            'pegawai' => auth()->user()->pegawai,
            'month' => Carbon::parse($request->month)
        ]);
    }
}
