<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FileRapat;
use App\Models\Pegawai;
use App\Models\PesertaRapat;
use App\Models\Rapat;
use Carbon\Carbon;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class RapatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rapat.index', [
            'rapats' => Rapat::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rapat.create', [
            'rapat' => new Rapat(),
            'pegawais' => Pegawai::get()
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
            'tanggal' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'tempat' => 'required',
            'agenda' => 'required',
            'pegawais' => 'required',
            'files' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $rapat = Rapat::create([
                'tanggal' => $request->tanggal,
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
                'tempat' => $request->tempat,
                'agenda' => $request->agenda,
            ]);
            foreach ($request->pegawais as $pegawai) {
                PesertaRapat::create([
                    'pegawai_id' => $pegawai,
                    'rapat_id' => $rapat->id
                ]);
            }
            foreach ($request->file('files') as $file) {
                $name_file = Carbon::now()->format('YmdHis') . '_' . $file->getClientOriginalName();
                $path_file = $file->storeAs('pegawai/file_pegawai', $name_file);
                FileRapat::create([
                    'path' => $path_file,
                    'rapat_id' => $rapat->id
                ]);
            }
            DB::commit();
            Alert::success('success');
            return back();
        } catch (\Throwable $th) {
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
        return view('admin.rapat.show',[
            'rapat' => Rapat::findOrFail($id)
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
        return view('admin.rapat.edit', [
            'rapat' => Rapat::findOrFail($id),
            'pegawais' => Pegawai::get()
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
            'tanggal' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'tempat' => 'required',
            'agenda' => 'required',
            'pegawais' => 'required'
        ]);
        DB::beginTransaction();
        try {
            Rapat::findOrFail($id)->update([
                'tanggal' => $request->tanggal,
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
                'tempat' => $request->tempat,
                'agenda' => $request->agenda,
            ]);

            PesertaRapat::where('rapat_id', $id)->delete();
            foreach ($request->pegawais as $pegawai) {
                PesertaRapat::create([
                    'pegawai_id' => $pegawai,
                    'rapat_id' => $id
                ]);
            }
            if ($request->files) {
                foreach(FileRapat::where('rapat_id',$id)->get() as $file){
                    Storage::delete($file->path);
                }
                FileRapat::where('rapat_id',$id)->delete();
                foreach ($request->file('files') as $file) {
                    $name_file = Carbon::now()->format('YmdHis') . '_' . $file->getClientOriginalName();
                    $path_file = $file->storeAs('rapat/', $name_file);
                    FileRapat::create([
                        'path' => $path_file,
                        'rapat_id' => $id
                    ]);
                }
            }
            DB::commit();
            Alert::success('success');
            return back();
        } catch (\Throwable $th) {
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
        DB::beginTransaction();
        try {
            $rapat = Rapat::findOrFail($id);
            
            foreach(FileRapat::where('rapat_id',$rapat->id)->get() as $file){
                Storage::delete($file->path);
            }
            FileRapat::where('rapat_id',$rapat->id)->delete();
            PesertaRapat::where('rapat_id', $rapat->id)->delete();
            $rapat->delete();
            Alert::success('success');
            DB::commit();
            return back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error($th->getMessage());
            return back();
        }
    }
}
