<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasis = Artikel::get();
        return view('admin.informasi.index', [
            'informasis' => $informasis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.informasi.create', [
            'informasi' => new Artikel(),
            'kategori_artikel' => KategoriArtikel::get()
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
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'kategori_artikel_id' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg,svg',
            'file' => 'required|mimes:pdf,docx,png,jpg,jpeg,svg'
        ]);
        try {
            $nama_foto = Carbon::now()->format('YmdHis') . '_' . $request->file('foto')->getClientOriginalName();
            $path_foto = $request->file('foto')->storeAs('informasi/foto/', $nama_foto);
            $nama_file = Carbon::now()->format('YmdHis') . '_' . $request->file('file')->getClientOriginalName();
            $path_file = $request->file('file')->storeAs('/informasi/file', $nama_file);
            Artikel::create([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => $request->tanggal,
                'kategori_artikel_id' => $request->kategori_artikel_id,
                'foto' => $path_foto,
                'file' => $path_file,
                'user_id' => auth()->user()->id,
                'aktifya' => 1
            ]);
            Alert::success('Success', 'Success Create Informasi');
            return back();
        } catch (\Throwable $th) {
            Storage::delete($path_file);
            Storage::delete($path_foto);
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
        return view('admin.informasi.edit', [
            'informasi' => Artikel::findOrFail($id),
            'kategori_artikel' => KategoriArtikel::get()
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
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'kategori_artikel_id' => 'required'
        ]);
        $informasi = Artikel::findOrFail($id);
        if ($request->foto) {
            try {
                Storage::delete($informasi->foto);
                $nama_foto = Carbon::now()->format('YmdHis') . '_' . $request->file('foto')->getClientOriginalName();
                $path_foto = $request->file('foto')->storeAs('informasi/foto/', $nama_foto);
                $informasi->update([
                    'foto' => $path_foto
                ]);
            } catch (\Throwable $th) {
                Alert::error('Error', $th->getMessage());
                return back();
            }
        }
        if ($request->file) {
            try {
                Storage::delete($informasi->file);
                $nama_file = Carbon::now()->format('YmdHis') . '_' . $request->file('file')->getClientOriginalName();
                $path_file = $request->file('file')->storeAs('/informasi/file', $nama_file);
                $informasi->update([
                    'file' => $path_file
                ]);
            } catch (\Throwable $th) {
                Alert::error('Error', $th->getMessage());
                return back();
            }
        }
        $informasi->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'kategori_artikel_id' => $request->kategori_artikel_id
        ]);
        Alert::success('Success','Success Update Artikel');
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
        $informasi = Artikel::findOrFail($id);
        Storage::delete($informasi->foto);
        Storage::delete($informasi->file);
        $informasi->delete();
        Alert::success('Success' ,'Success Delete Artikel');
        return back();
    }
}
