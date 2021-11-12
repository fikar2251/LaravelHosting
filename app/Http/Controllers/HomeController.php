<?php

namespace App\Http\Controllers;

use App\Models\FilePegawai;
use App\Models\Pegawai;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $surat_masuk = SuratMasuk::get()->count();
            $surat_keluar = SuratKeluar::get()->count();
            $pegawai = Pegawai::get()->count();
            $dokumen = FilePegawai::get()->count();
            return view('home', [
                'surat_masuk' => $surat_masuk,
                'surat_keluar' => $surat_keluar,
                'pegawai' => $pegawai,
                'dokumen' => $dokumen,
            ]);
        } else {
            $pegawai = auth()->user()->pegawai;
            return view('home', [
                'pegawai' => $pegawai
            ]);
        }
    }
}
