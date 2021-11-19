<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriSppd;
use App\Models\Pegawai;
use App\Models\Sppd;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SppdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sppds = Sppd::orderBy('created_at', 'desc')->get();
        return view('admin.sppd.index', [
            'sppds' => $sppds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sppd.create', [
            'sppd' => new Sppd(),
            'pegawais' => Pegawai::get(),
            'kategori_sppds' => KategoriSppd::get()
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
            'nomor' => 'required',
            'asal' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_berangkat' => 'required',
            'tanggal_kembali' => 'required',
            'pemberi' => 'required',
            'pegawai_id' => 'required',
            'kategori_sppd_id' => 'required',
        ]);
        Sppd::create($attr);
        Alert::success('Success', 'Succes Create Sppd');
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
        return view('admin.sppd.edit',[
            'sppd' => Sppd::findOrFail($id),
            'pegawais' => Pegawai::get(),
            'kategori_sppds' => KategoriSppd::get()
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
        $attr = $this->validate($request,[
            'nomor' => 'required',
            'asal' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_berangkat' => 'required',
            'tanggal_kembali' => 'required',
            'pemberi' => 'required',
            'pegawai_id' => 'required',
            'kategori_sppd_id' => 'required',
        ]);
        Sppd::findOrFail($id)->update($attr);
        Alert::success('Success', 'Success Update Sppd');
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
            Sppd::findOrFail($id)->delete();
            Alert::success('Success','Succes Delete Sppd');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error',$th->getMessage());
            return back();
        }
    }
}
