<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstPenerimaan;
use App\Models\MstPotongan;
use App\Models\Pegawai;
use App\Models\Penggajian;
use App\Models\RincianGaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gaji.index', [
            'penggajians' => Penggajian::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gaji.create', [
            'pegawais' => Pegawai::get(),
            'penerimaan' => MstPenerimaan::get(),
            'potongan' => MstPotongan::get()
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
            'pegawai' => 'required|exists:pegawais,id',
            'tanggal' => 'required|date',
            'total_penerimaan' => 'required',
            'total_potongan' => 'required',
            'total' => 'required'
        ]);
        $pegawai = Pegawai::findOrFail($request->pegawai);
        DB::beginTransaction();
        try {
            $penggajian = Penggajian::create([
                'pegawai_id' => $request->pegawai,
                'tanggal' => $request->tanggal,
                'gaji_pokok' => str_replace(',', '', $request->penerimaan['gaji pokok']),
                'jabatan' => $pegawai->jabatan->nama,
                'golongan' => $pegawai->golongan->nama,
                'admin' => auth()->user()->name,
            ]);
            foreach ($request->penerimaan as $key => $value) {
                RincianGaji::create([
                    'penggajian_id' => $penggajian->id,
                    'nama' => $key,
                    'tipe' => 'penerimaan',
                    'nominal' => str_replace(',', '', $value)
                ]);
            }
            foreach ($request->potongan as $key => $value) {
                RincianGaji::create([
                    'penggajian_id' => $penggajian->id,
                    'nama' => $key,
                    'tipe' => 'potongan',
                    'nominal' => str_replace(',', '', $value)
                ]);
            }
            DB::commit();
            Alert::success('success');
            return back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error($th->getMessage());
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
        return view('admin.gaji.show', [
            'penggajian' => Penggajian::findOrFail($id)
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
        return view('admin.gaji.edit', [
            'pegawais' => Pegawai::get(),
            'penggajian' => Penggajian::findOrFail($id)
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
            'pegawai' => 'required|exists:pegawais,id',
            'tanggal' => 'required|date',
            'total_penerimaan' => 'required',
            'total_potongan' => 'required',
            'total' => 'required'
        ]);
        $pegawai = Pegawai::findOrFail($request->pegawai);
        DB::beginTransaction();
        try {
            Penggajian::findOrFail($id)->update([
                'pegawai_id' => $request->pegawai,
                'tanggal' => $request->tanggal,
                'gaji_pokok' => str_replace(',', '', $request->penerimaan['gaji pokok']),
                'jabatan' => $pegawai->jabatan->nama,
                'golongan' => $pegawai->golongan->nama,
                'admin' => auth()->user()->name,
            ]);
            RincianGaji::where('penggajian_id', $id)->where('tipe','penerimaan')->delete();
            foreach ($request->penerimaan as $key => $value) {
                RincianGaji::create([
                    'penggajian_id' => $id,
                    'nama' => $key,
                    'tipe' => 'penerimaan',
                    'nominal' => str_replace(',', '', $value)
                ]);
            }
            RincianGaji::where('penggajian_id', $id)->where('tipe', 'potongan')->delete();
            foreach ($request->potongan as $key => $value) {
                RincianGaji::create([
                    'penggajian_id' => $id,
                    'nama' => $key,
                    'tipe' => 'potongan',
                    'nominal' => str_replace(',', '', $value)
                ]);
            }
            DB::commit();
            Alert::success('success');
            return back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error($th->getMessage());
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
            //code...
            RincianGaji::where('penggajian_id', $id)->delete();
            Penggajian::findOrFail($id)->delete();
            Alert::success('success');
            return back();
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error($th->getMessage());
            return back();
        }
    }
    public function filter(Request $request)
    {
        $this->validate($request,[
            'start' => 'required',
            'end' => 'required'
        ]);
        return view('admin.gaji.index', [
            'penggajians' => Penggajian::whereBetween('tanggal',[$request->start,$request->end])->get()
        ]);
    }
    public function print($id)
    {
        return view('admin.gaji.print',[
            'gaji' => Penggajian::findOrFail($id)
        ]);
    }
}
