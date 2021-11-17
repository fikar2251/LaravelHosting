<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriCuti;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriCutiControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_cutis = KategoriCuti::get();
        return view('admin.kategori_cuti.index',[
            'kategori_cutis' => $kategori_cutis
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori_cuti.create',[
            'kategori_cuti' => new KategoriCuti()
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
        $attr = $this->validate($request,[
            'nama' => 'required'
        ]);

        KategoriCuti::create($attr);
        Alert::success('Success' ,'Success Create Kategori Cuti');
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
        return view('admin.kategori_cuti.edit',[
            'kategori_cuti' => KategoriCuti::findOrFail($id)
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
            'nama' => 'required'
        ]);
        KategoriCuti::findOrFail($id)->update($attr);
        Alert::success('Success', 'Success Update Kategori Cuti');
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
            KategoriCuti::findOrFail($id)->delete();
            Alert::success('Success','Success Delete Kategori cuti');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error',$th->getMessage());
            return back();
        }
    }
}
