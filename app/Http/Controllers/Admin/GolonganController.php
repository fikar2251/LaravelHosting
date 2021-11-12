<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Alert;
use Exception;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.golongan.index', [
            'golongans' => Golongan::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.golongan.create', [
            'golongan' => new Golongan()
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
            "nama" => "required",
            "pangkat" => "required",
            "ruang" => "required",
            "aktifya" => "required"
        ]);
        try {
            Golongan::create($request->all());
            Alert::success('Success', 'Success Store Golongan');
            return back();
        } catch (Exception $err) {
            Alert::error('Error', $err->getMessage());
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
        return view('admin.golongan.edit', [
            'golongan' => Golongan::findOrFail($id)
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
            "nama" => "required",
            "pangkat" => "required",
            "ruang" => "required",
            "aktifya" => "required"
        ]);
        try {
            Golongan::where('id',$id)->update($request->except(['_token','_method']));
            Alert::success('Success' ,'Success Update Golongan');
            return back(); 
        } catch (Exception $th) {
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
            Golongan::findOrFail($id)->delete();
            Alert::success('Success' ,'Success Delete Golongan');
            return back(); 
        } catch (Exception $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }
}
