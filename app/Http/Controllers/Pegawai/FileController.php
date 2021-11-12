<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\FilePegawai;
use App\Models\Pegawai;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        $file = FilePegawai::orderBy('created_at', 'desc')->whereHas('access',function($qr){ return $qr->where('user_id', auth()->user()->id);  })->orWhere('pegawai_id',auth()->user()->pegawai->id)->get();
        $pegawai = Pegawai::findOrFail(auth()->user()->pegawai->id);
        return view('pegawai.file.index', [
            'pegawai' => $pegawai,
            'file' => $file,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_file' => 'required',
            'tanggal_file' => 'required'
        ]);
        $files = $request->file('file');
        foreach ($files as $file) {
            try {
                $name_file = Carbon::now()->format('YmdHis') . '_' . $file->getClientOriginalName();
                $path_file = $file->storeAs('pegawai/file_pegawai', $name_file);
                FilePegawai::create([
                    'name' => $request->nama_file,
                    'file' => $path_file,
                    'date' => Carbon::parse($request->tanggal_file)->format('Y-m-d H:i:s'),
                    'pegawai_id' => auth()->user()->pegawai->id,
                    'aktifya' => 1,
                    'password' => $request->password
                ]);
            } catch (\Throwable $th) {
                Storage::delete($path_file);
                Alert::error('error',$th->getMessage());
                return back();
            }
        }
        Alert::success('Success', 'Success Upload File');
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
        //
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
            'file_pegawai_id' => 'required',
            'pegawai_id' => 'required',
            'comment' => 'required'
        ]);
        Comment::create($attr);
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
        dd($id);
    }
    public function delete($id)
    {
        $file = FilePegawai::findOrFail($id);
        $path = $file->file;
        Comment::where('file_pegawai_id',$file->id)->delete();
        $file->delete();
        Storage::delete($path);
        Alert::success('Success', 'Success Delete File And Comment');
        return redirect()->route('home');
    }
}
