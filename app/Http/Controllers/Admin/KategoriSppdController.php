<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriSppd;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriSppdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_sppds = KategoriSppd::orderBy('created_at', 'desc')->get();
        return view('admin.kategori_sppd.index', [
            'kategori_sppds' => $kategori_sppds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori_sppd.create', [
            'kategori_sppd' => new KategoriSppd()
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
        $attr = $this->validate($request, [
            'tujuan' => 'required',
            'harian' => 'required',
            'penginapan' => 'required',
            'transportasi' => 'required',
            'dll' => 'required',
            'jenis' => 'required'
        ]);
        KategoriSppd::create($attr);
        Alert::success('Success','Success Create Kategori Sppd');
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
        return view('admin.kategori_sppd.edit', [
            'kategori_sppd' => KategoriSppd::findOrFail($id)
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
        $attr = $this->validate($request, [
            'tujuan' => 'required',
            'harian' => 'required',
            'penginapan' => 'required',
            'transportasi' => 'required',
            'dll' => 'required',
            'jenis' => 'required'
        ]);
        KategoriSppd::findOrFail($id)->update($attr);
        Alert::success('Success','Success Update Kategori Sppd');
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
            KategoriSppd::findOrFail($id)->delete();
            Alert::success('Succes','Success Delete Kategori Sppd');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error',$th->getMessage());
            return back();  
        }
    }
}
