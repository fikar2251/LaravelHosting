<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Agama;
use Illuminate\Http\Request;
use Alert;
use Exception;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.agama.index',[
            'agamas' => Agama::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.agama.create',[
            'agamas' => new Agama()
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
            'status' => 'required'
        ]);
        try {
            Agama::create($request->all());
            Alert::success('Success', 'Success Store Agama');
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
        return view('admin.agama.edit',[
            'agama' => Agama::findOrFail($id)
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
            'status' => 'required'
        ]);
        try {
            Agama::where('id',$id)->update($request->except(['_token','_method']));
            Alert::success('Success', 'Success Update Agama');
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
            Agama::findOrFail($id)->delete();
            Alert::success('Success' ,'Success Delete Agama');
            return back();
        } catch (Exception $err) {
            Alert::error('Error', $err->getMessage());
            return back();
        }
    }
}
