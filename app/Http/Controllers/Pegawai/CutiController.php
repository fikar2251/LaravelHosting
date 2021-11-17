<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\KategoriCuti;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cutis = Cuti::where('pegawai_id', auth()->user()->pegawai->id)->orderBy('created_at', 'desc')->get();
        return view('pegawai.cuti.index', [
            'cutis' => $cutis,
            'pegawai' => auth()->user()->pegawai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.cuti.create', [
            'cuti' => new Cuti(),
            'pegawai' => auth()->user()->pegawai,
            'kategori_cuti' => KategoriCuti::get()
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
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'kategori_cuti_id' => 'required',
            'keterangan' => 'required'
        ]);

        $attr['pegawai_id'] = auth()->user()->pegawai->id;

        Cuti::create($attr);
        Alert::success('Success','Success Create Pengajuan Cuti');
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
        return view('pegawai.cuti.edit', [
            'cuti' => Cuti::findOrFail($id),
            'pegawai' => auth()->user()->pegawai,
            'kategori_cuti' => KategoriCuti::get()
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

            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'kategori_cuti_id' => 'required',
            'keterangan' => 'required'
        ]);
        Cuti::findOrFail($id)->update($attr);
        Alert::success('Success','Success Update Cuti');
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
            Cuti::findOrFail($id)->delete();
            Alert::success('Success','Success Delete Cuti');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error',$th->getMessage());
            return back();
        }
    }
}
