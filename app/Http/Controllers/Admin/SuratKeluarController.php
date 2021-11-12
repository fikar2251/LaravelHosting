<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Klasifikasi;
use App\Models\SuratKeluar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_keluars = SuratKeluar::get();
        return view('admin.surat_keluar.index', [
            'surat_keluars' => $surat_keluars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klasifikasi = Klasifikasi::get();
        return view('admin.surat_keluar.create', [
            'surat_keluar' => new SuratKeluar(),
            'klasifikasi' => $klasifikasi
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
            'tujuan' => 'required',
            'nomor' => 'required',
            'ringkas' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'klasifikasi_id' => 'required',
            'file' => 'required|mimes:pdf,docx,png,jpg,jpeg,svg'
        ]);
        try {
            $name_file = Carbon::now()->format('YmdHis') . '_' . $request->file('file')->getClientOriginalName();
            $path_file = $request->file('file')->storeAs('surat/keluar', $name_file);
            SuratKeluar::create([
                'tujuan' => $request->tujuan,
                'nomor' => $request->nomor,
                'ringkas' => $request->ringkas,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'klasifikasi_id' => $request->klasifikasi_id,
                'file' => $path_file
            ]);
            Alert::success('Success', 'Success Create Surat Keluar');
            return back();
        } catch (\Throwable $th) {
            Storage::delete($path_file);
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.surat_keluar.show',[
            'surat_keluar' => SuratKeluar::findOrFail($id)
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
        $klasifikasi = Klasifikasi::get();
        $surat_keluar = SuratKeluar::findOrFail($id);
        return view('admin.surat_keluar.edit', [
            'surat_keluar' => $surat_keluar,
            'klasifikasi' => $klasifikasi
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
            'nomor' => 'required',
            'ringkas' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'klasifikasi_id' => 'required',
        ]);
        $surat_keluar = SuratKeluar::findOrFail($id);
        if ($request->file) {
            $this->validate($request, [
                'file' => 'required|mimes:pdf,docx,png,jpg,jpeg,svg'
            ]);
            try {
                $name_file = Carbon::now()->format('YmdHis') . '_' . $request->file('file')->getClientOriginalName();
                $path_file = $request->file('file')->storeAs('surat/keluar', $name_file);
                Storage::delete($surat_keluar->file);
                $surat_keluar->update([
                    'file' => $path_file
                ]);
            } catch (\Throwable $th) {
                Storage::delete($path_file);
                Alert::error('Error', $th->getMessage());
                return back();
            }
        }
        try {
            //code...
            $surat_keluar->update([
                'tujuan' => $request->tujuan,
                'nomor' => $request->nomor,
                'ringkas' => $request->ringkas,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'klasifikasi_id' => $request->klasifikasi_id,
            ]);
            Alert::success('Success', 'Success Update Surat Keluar');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error' ,$th->getMessage());
            return back();
        }
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
            $surat_keluar = SuratKeluar::findOrFail($id);
            Storage::delete($surat_keluar->file);
            $surat_keluar->delete();
            Alert::success('Success', 'Success Delete Surat Keluar');
            return back();
        } catch (\Throwable $th) {
            Alert::success('Error', $th->getMessage());
            return back();
        }
    }
}
