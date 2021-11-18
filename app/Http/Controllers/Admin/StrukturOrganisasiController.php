<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChildStruktur;
use App\Models\ParentStruktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parents = ParentStruktur::all();
        $parent = ParentStruktur::first();
        return view('admin.struktur.index', [
            'strukturs' => $parents,
            'parent' => $parent
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.struktur.create', [
            'parents' => ParentStruktur::get(),
            'childs' => ChildStruktur::get()
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
        // dd($request->all());
        DB::beginTransaction();
        try {
            if (ParentStruktur::find($request->parent)) {
                dd('masuk');
                dd(ChildStruktur::find($request->parent)->name);
                dd(ParentStruktur::find($request->parent)->hasMany(ChildStruktur::class)->exists());
            } else {
                if(ParentStruktur::find($request->parent)){
                    $parent = ParentStruktur::create([
                        'name' => ParentStruktur::find($request->parent)->name
                    ]);
                }else{
                    if(ChildStruktur::find($request->parent)){
                        $parent = ParentStruktur::create([
                            'name' => ChildStruktur::find($request->parent)->name
                        ]);
                    }else{
                        $parent = ParentStruktur::create([
                            'name' => $request->parent
                        ]);
                    }
                }
                foreach ($request->child as $data) {
                    if(ChildStruktur::find($data)){
                        ChildStruktur::create([
                            'name' => ChildStruktur::find($data)->name,
                            'parent_struktur_id' => $parent->id
                        ]);
                    }else{
                        ChildStruktur::create([
                            'name' => $data,
                            'parent_struktur_id' => $parent->id
                        ]);
                    }
                }
            }
            DB::commit();
            return back();
        } catch (\Throwable $th) {
            DB::rollBack();
            echo $th->getMessage();
        }
    }

    /**
     * Display the specified rex`urce.
     *
     * @param  int  $id
     * @return \Illuminate\Httpx`esponse
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
        return view('admin.struktur.edit', [
            'parent' => ParentStruktur::findOrFail($id),
            'childs' => ChildStruktur::get()
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
        DB::beginTransaction();
        try {
            $parent = ParentStruktur::findOrFail($id);
            $delete = $parent->child_struktur->pluck('id');
            $parent->update([
                'name' => $request->parent
            ]);
            foreach($request->child as $data){
                if(ChildStruktur::find($data)){
                    ChildStruktur::create([
                        'name' => ChildStruktur::find($data)->name,
                        'parent_struktur_id' => $id
                    ]);
                }else{
                    ChildStruktur::create([
                        'name' => $data,
                        'parent_struktur_id' => $id
                    ]);
                }
            }
            foreach($delete as $id){
                ChildStruktur::where('id',$id)->delete();
            }
            DB::commit();
            return back();
        } catch (\Throwable $th) {
            DB::rollBack();
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
        $parent = ParentStruktur::findOrFail($id);
        ChildStruktur::where('parent_struktur_id',$parent->id)->delete();
        $parent->delete();
        Alert::success('Success','Success Delete Parent And Child');
        return back();
    }
}
