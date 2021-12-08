<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MstPenerimaan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MstPenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerimaans = MstPenerimaan::orderBy('created_at', 'desc')->get();
        return view('admin.penerimaan.index', [
            'penerimaans' => $penerimaans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerimaan = new MstPenerimaan();
        return view('admin.penerimaan.create', [
            'penerimaan' => $penerimaan
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

        MstPenerimaan::create($attr);

        Alert::success('Success', 'Success Create MstPenerimaan');
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
        $penerimaan = MstPenerimaan::findOrFail($id);
        return view('admin.penerimaan.edit', [
            'penerimaan' => $penerimaan
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

        MstPenerimaan::findOrFail($id)->update($attr);
        Alert::success('Success', 'Success Update MstPenerimaan');

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
            MstPenerimaan::findOrFail($id)->delete();
            Alert::success('Success', 'Success Delete MstPenerimaan');
            return back();
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }
}
