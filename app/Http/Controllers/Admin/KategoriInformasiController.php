<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use Alert;

class KategoriInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_informasis = KategoriArtikel::get();
        return view('admin.kategori_informasi.index', [
            'kategori_informasis' => $kategori_informasis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori_informasi.create', [
            'kategori_informasi' => new KategoriArtikel()
        ]);
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
            'deskripsi' => 'required',
            'status' => 'required',
            'inggris' => 'required'
        ]);
        KategoriArtikel::create($request->except(['_token']));
        Alert::success('Success', 'Success Create Kategori Informasi');
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
        return view('admin.kategori_informasi.edit', [
            'kategori_informasi' => KategoriArtikel::findOrFail($id)
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
            'deskripsi' => 'required',
            'status' => 'required',
            'inggris' => 'required'
        ]);
        KategoriArtikel::where('id',$id)->update($request->except(['_token','_method']));
        Alert::success('Success', 'Success Update Artikel Informasi');
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
            KategoriArtikel::findOrFail($id)->delete();
            Alert::success('Success', 'Success Delete Kategori Informasi');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }
}
