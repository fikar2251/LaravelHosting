<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function ShowProfile()
    {
        return response()->json(auth()->user()->pegawai);
    }
    public function UpdateProfile(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->getMessageBag());
        }
        $attr = $request->all();
        try {
            $response = Pegawai::findOrFail(Auth::user()->pegawai->id)->update($attr);
            return response()->json($response);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
}
