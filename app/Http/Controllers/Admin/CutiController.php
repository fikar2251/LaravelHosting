<?php

namespace App\Http\Controllers\Admin;

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
        $cutis = Cuti::orderBy('created_at','desc')->get();
        return view('admin.cuti.index',[
            'cutis' => $cutis,
            'kategori_cutis' => KategoriCuti::get()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.cuti.show',[
            'cuti' => Cuti::findOrFail($id)
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
        return view('admin.cuti.edit',[
            'cuti' => Cuti::findOrFail($id)
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
        Cuti::findOrFail($id)->update([
            'status' => $request->status,
            'approve_by_id' => auth()->user()->id
        ]);
        Alert::success('Success','Success Change Status');
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
        //
    }
    public function filter(Request $request)
    {
        $this->validate($request,[
            'start' => 'required|date',
            'end' => 'required|date'
        ]);
        if($request->filter == 'all'){
            $cutis = Cuti::whereBetween('tanggal_mulai',[$request->start,$request->end])->orderBy('created_at','desc')->get();
        }else{
            $cutis = Cuti::whereBetween('tanggal_mulai',[$request->start,$request->end])->orderBy('created_at','desc')->where('kategori_cuti_id', $request->filter)->get();
        }
        return view('admin.cuti.index',[
            'cutis' => $cutis,
            'kategori_cutis' => KategoriCuti::get()
        ]);
    }
}
