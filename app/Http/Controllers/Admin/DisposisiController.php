<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disposisi;
use App\Models\Pegawai;
use App\Models\SuratMasuk;
use RealRashid\SweetAlert\Facades\Alert;

class DisposisiController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tujuan' => 'required',
            'isi' => 'required',
            'batas_waktu' => 'required',
            'catatan' => 'required',
            'tipe' => 'required',
            'pegawai_id' => 'required',
            'surat_masuk_id' => 'required'
        ]);
        Disposisi::create($request->except(['_token']));
        Alert::success('Success', 'Success Create Disposisi Surat Masuk');
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
        $surat_masuk = SuratMasuk::findOrFail($id);
        return view('admin.disposisi.show', [
            'surat_masuk' => $surat_masuk,
            'disposisi' => new Disposisi(),
            'pegawai' => Pegawai::get(),
            'tipe' => Disposisi::getPossibleStatuses()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disposisi = Disposisi::findOrFail($id);
        return view('admin.disposisi.edit', [
            'disposisi' => $disposisi,
            'surat_masuk' => SuratMasuk::findOrfail($disposisi->surat_masuk_id),
            'pegawai' => Pegawai::get(),
            'tipe' => Disposisi::getPossibleStatuses()
        ]);
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
        $this->validate($request, [
            'tujuan' => 'required',
            'isi' => 'required',
            'batas_waktu' => 'required',
            'catatan' => 'required',
            'tipe' => 'required',
            'pegawai_id' => 'required',
            'surat_masuk_id' => 'required'
        ]);
        Disposisi::findOrFail($id)->update($request->except(['_token','_method']));
        Alert::success('Success', 'Success Update Disposisi Surat Masuk');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Disposisi::findOrFail($id)->delete();
            Alert::success('Success' ,'Success Delete Row');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }

    public function createBySuratMasuk($id)
    {
        return view('admin.disposisi.create', [
            'surat_masuk' => SuratMasuk::findOrfail($id),
            'pegawai' => Pegawai::get(),
            'tipe' => Disposisi::getPossibleStatuses()
        ]);
    }
}
