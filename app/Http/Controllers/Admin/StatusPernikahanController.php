<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatusPernikahan;
use Exception;
use Illuminate\Http\Request;
use Alert;
class StatusPernikahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.status_pernikahan.index',[
            'status_pernikahans' => StatusPernikahan::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status_pernikahan.create',[
            'status_pernikahan' =>  new StatusPernikahan()
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
        $this->validate($request,[
            'nama' => 'required',
            'aktifya' => 'required'
        ]);
        try {
            StatusPernikahan::create($request->all());
            Alert::success('Success', 'Success Store Status Pernikahan');
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
        return view('admin.status_pernikahan.edit',[
            'status_pernikahan' => StatusPernikahan::findOrFail($id)
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
        $this->validate($request,[
            'nama' => 'required',
            'aktifya' => 'required'
        ]);
        try {
            StatusPernikahan::where('id' ,$id)->update($request->except(['_token','_method']));
            Alert::success('Success' , 'Success Update Status Pernikahan');
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
            StatusPernikahan::findOrFail($id)->delete();
            Alert::success('Success', 'Success Delete Status Pernikahan');
            return back();            
        } catch (Exception $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }
}
