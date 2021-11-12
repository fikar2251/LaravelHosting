<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Alert;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.index',[
            'settings' => Setting::get()->first()
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
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'logo' => 'required|mimes:jpg,jpeg,png,svg'
        ]);
        try {
            $name = 'logo'.'_'.$request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->storeAs('/setting',$name);
            Setting::create([
                'title' => $request->title,
                'description' => $request->description,
                'logo' => $path
            ]);
            Alert::success('success', 'Success Store Setting');
            return redirect()->route('home');
        } catch (\Throwable $th) {
            Storage::delete($path);
            Alert::error('error', $th->getMessage());
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
        $setting = Setting::get()->count();
        if($setting == 0){
            return view('admin.setting.create',[
                'setting' => new Setting()
            ]);
        }else{
            return view('admin.setting.edit',[
                'setting' => Setting::findOrFail($id)
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
            'title' => 'required',
            'description' => 'required'
        ]);
        try {
            $setting = Setting::findOrFail($id);
            $setting->update([
                'title' => $request->title,
                'description' => $request->description
            ]);
            if($request->logo){
                $this->validate($request,[
                    'logo' => 'required|mimes:jpg,jpeg,png,svg'
                ]);
                Storage::delete($setting->logo);
                $name = 'logo'.'_'.$request->file('logo')->getClientOriginalName();
                $path = $request->file('logo')->storeAs('/setting',$name);
                $setting->update([
                    'logo' => $path
                ]);
            }
            Alert::success('success', 'Success Update Setting');
            return back();
        } catch (\Throwable $th) {

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
        //
    }
}
