<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstPotongan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MstPotonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $potongans = MstPotongan::orderBy('created_at', 'desc')->get();
        return view('admin.potongan.index', [
            'potongans' => $potongans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $potongan = new MstPotongan();
        return view('admin.potongan.create', [
            'potongan' => $potongan
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
        $attr = $this->validate($request, [
            'nama' => 'required'
        ]);

        MstPotongan::create($attr);

        Alert::success('Success', 'Success Create MstPotongan');
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
        $potongan = MstPotongan::findOrFail($id);
        return view('admin.potongan.edit', [
            'potongan' => $potongan
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
        $attr = $this->validate($request, [
            'nama' => 'required'
        ]);

        MstPotongan::findOrFail($id)->update($attr);
        Alert::success('Success', 'Success Update MstPotongan');

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
            MstPotongan::findOrFail($id)->delete();
            Alert::success('Success', 'Success Delete MstPotongan');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }
}
