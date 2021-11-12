<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Klasifikasi;
use App\Models\SuratMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $surat_masuks = SuratMasuk::get();
        return view('admin.surat_masuk.index', [
            'surat_masuks' => $surat_masuks
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
        return view('admin.surat_masuk.create', [
            'surat_masuk' => new SuratMasuk(),
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
            'asal' => 'required',
            'nomor' => 'required',
            'ringkas' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'index' => 'required',
            'klasifikasi_id' => 'required',
            'file' => 'required|mimes:pdf,docx,png,jpg,jpeg,svg'
        ]);
        try {
            $name_file = Carbon::now()->format('YmdHis') . '_' . $request->file('file')->getClientOriginalName();
            $path_file = $request->file('file')->storeAs('surat/masuk', $name_file);
            SuratMasuk::create([
                'asal' => $request->asal,
                'nomor' => $request->nomor,
                'ringkas' => $request->ringkas,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'index' => $request->index,
                'klasifikasi_id' => $request->klasifikasi_id,
                'file' => $path_file
            ]);
            Alert::success('Success', 'Success Create Surat Masuk');
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
        return view('admin.surat_masuk.show',[
            'surat_masuk' => SuratMasuk::findOrFail($id)
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
        $surat_masuk = SuratMasuk::findOrFail($id);
        return view('admin.surat_masuk.edit', [
            'surat_masuk' => $surat_masuk,
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
            'asal' => 'required',
            'nomor' => 'required',
            'ringkas' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'index' => 'required',
            'klasifikasi_id' => 'required',
        ]);
        $surat_masuk = SuratMasuk::findOrFail($id);
        if ($request->file) {
            $this->validate($request, [
                'file' => 'required|mimes:pdf,docx,png,jpg,jpeg,svg'
            ]);
            try {
                $name_file = Carbon::now()->format('YmdHis') . '_' . $request->file('file')->getClientOriginalName();
                $path_file = $request->file('file')->storeAs('surat/masuk', $name_file);
                Storage::delete($surat_masuk->file);
                $surat_masuk->update([
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
            $surat_masuk->update([
                'asal' => $request->asal,
                'nomor' => $request->nomor,
                'ringkas' => $request->ringkas,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'index' => $request->index,
                'klasifikasi_id' => $request->klasifikasi_id,
            ]);
            Alert::success('Success', 'Success Update Surat Masuk');
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
            $surat_masuk = SuratMasuk::findOrFail($id);
            $path = $surat_masuk->file;
            $surat_masuk->delete();
            Storage::delete($path);
            Alert::success('Success', 'Success Delete Surat Masuk');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }
}
