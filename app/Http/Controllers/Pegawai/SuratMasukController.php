<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\Pegawai;
use App\Models\Response;
use App\Models\SuratMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::findOrFail(auth()->user()->pegawai->id);
        $id = auth()->user()->pegawai->id;
        $surat = SuratMasuk::whereHas('disposisi', function ($data) use ($id) {
            return $data->where('pegawai_id', $id);
        })->orderBy('created_at', 'desc')->paginate(5);
        return view('pegawai.surat_masuk.index', [
            'surat' => $surat,
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $this->validate($request, [
            'pegawai_id' => 'required',
            'disposisi_id' => 'required',
            'response' => 'required'
        ]);
        Response::create([
            'response' => $attr['response'],
            'disposisi_id' => $attr['disposisi_id'],
            'pegawai_id' => $attr['pegawai_id']
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
