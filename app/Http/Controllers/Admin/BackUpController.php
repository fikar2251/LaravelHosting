<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;

class BackUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.backup.index', [
            'user_backups' => User::onlyTrashed()->get()
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
        try {
            if ($id == 'all') {
                User::onlyTrashed()->restore();
                Alert::success('success', 'Success Restore All User');
                return back();
            } else {
                User::onlyTrashed()->where('id', $id)->restore();
                Alert::success('success', 'Success Restore User');
                return back();
            }
            return back();
        } catch (\Throwable $th) {
            Alert::error('error', $th->getMessage());
            return back();
        }
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
        //
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
            //code...
            if ($id == 'all') {
                User::onlyTrashed()->forceDelete();
                Alert::success('success', 'Success Restore All User');
                return back();
            } else {
                User::onlyTrashed()->where('id', $id)->forceDelete();
                Alert::success('success', 'Success Restore User');
                return back();
            }
            return back();
        } catch (\Throwable $th) {
            Alert::error('error', $th->getMessage());
            return back();
        }
    }
}
