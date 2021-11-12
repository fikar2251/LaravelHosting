<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KlasifikasiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikasis = Klasifikasi::get();
        return view('admin.klasifikasi.index', [
            'klasifikasis' => $klasifikasis
        ]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.klasifikasi.create', [
            'klasifikasi' => new Klasifikasi()
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
            'kode' => 'required|unique:klasifikasis',
            'nama' => 'required',
            'uraian' => 'required'
        ]);
        try {
            Klasifikasi::create($request->except(['_token']));
            Alert::success('Success','Success Create Klasifikasi');
            return back();
        } catch (\Throwable $th) {
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
        return view('admin.klasifikasi.edit',[
            'klasifikasi' => Klasifikasi::findOrFail($id)
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
        $old = Klasifikasi::findOrFail($id)->kode;
        $new = $request->kode;
        if($old == $new)
        {
            $this->validate($request,[
                'kode' => 'required',
                'nama' => 'required',
                'uraian' => 'required'
            ]);
        }else{
            $this->validate($request,[
                'kode' => 'required|unique:klasifikasis',
                'nama' => 'required',
                'uraian' => 'required'
            ]);
        }
        try {
            Klasifikasi::findOrFail($id)->update($request->except(['_token','_method']));
            Alert::success('Success', 'Success Update Klasifikasi');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
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
            Klasifikasi::findOrFail($id)->delete();
            Alert::success('Success', 'Success Delete Klasifikasi');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }
}
