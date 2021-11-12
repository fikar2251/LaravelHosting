<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.permission.index', [
            'permissions' => Permission::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create', [
            'permission' => new Permission()
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
        $attr = $request->all();
        $attr['name'] = Str::slug($request->name);
        $validator = Validator::make($attr, [
            'name' => ['required', 'unique:permissions']
        ]);
        if ($validator->fails()) {
            Alert::warning('Warning', $validator->errors()->first());
            throw ValidationException::withMessages([
                'name' => $validator->errors()->first()
            ]);
        }
        try {
            Permission::create($attr);
            Alert::success('Success', 'Success Store Permission');
            return back();
        } catch (Exception $exc) {
            Alert::error('Error', $exc->getMessage());
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
        return view('admin.permission.edit', [
            'permission' => Permission::find($id)
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
            Permission::findOrFail($id)->delete();
            Alert::success('Success', 'Success Delete Permission');
            return back();
        } catch (Exception $error) {
            Alert::error('Error', $error->getMessage());
            return back();
        }
    }
}
