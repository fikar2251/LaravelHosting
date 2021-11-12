<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Pendidikan;
use App\Models\StatusPernikahan;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pegawai.index', [
            'pegawais' => Pegawai::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pegawai.create', [
            'pegawai' => new Pegawai(),
            'status_perkawinan' => StatusPernikahan::get(),
            'agama' => Agama::get(),
            'golongan' => Golongan::get(),
            'jabatan' => Jabatan::get(),
            'pendidikan' => Pendidikan::get(),
            'golongan' => Golongan::get()
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
            "nip" => "required|unique:pegawais",
            "nama" => "required",
            "nik" => "required|unique:pegawais",
            "jenis_kelamin" => "required",
            "tanggal_lahir" => "required|date",
            "tempat_lahir" => "required",
            "alamat" => "required",
            "no_hp" => "required",
            "email" => "required|unique:users",
            "password" => "required",
            "status_perkawinan_id" => "required|exists:status_pernikahans,id",
            "agama_id" => "required|exists:agamas,id",
            "jabatan_id" => "required|exists:jabatans,id",
            "foto" => "required|mimes:jpeg,jpg,png",
            "facebook" => "required",
            "instagram" => "required",
            "tmt" => "required",
            "tanggal_kenaikan_berkala_terakhir" => "required",
            "tanggal_kenaikan_pangkat_terakhir" => "required"
        ]);

        if (Role::findByName('pegawai')->name != 'pegawai') {
            Alert::error('Role', 'Role pegawai not found');
            return back();
        }
        DB::beginTransaction();
        try {
            $name = $request->file('foto')->getClientOriginalName();
            $name = Carbon::now()->format('YmdHis') . '_' . $name;
            $path = $request->file('foto')->storeAs('/pegawai/foto', $name);
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user->assignRole('pegawai');
            Pegawai::create([
                "nip" => $request->nip,
                "nama" => $request->nama,
                "nik" => $request->nik,
                "jenis_kelamin" => $request->jenis_kelamin,
                "tanggal_lahir" => $request->tanggal_lahir,
                "tempat_lahir" => $request->tempat_lahir,
                "alamat" => $request->alamat,
                "no_hp" => $request->no_hp,
                "status_perkawinan_id" => $request->status_perkawinan_id,
                "agama_id" => $request->agama_id,
                "jabatan_id" => $request->jabatan_id,
                'pendidikan_id' => 1,
                'golongan_id' => 1,
                "foto" => $path,
                "facebook" => $request->facebook,
                "instagram" => $request->instagram,
                "tmt" => $request->tmt,
                "tanggal_kenaikan_berkala_terakhir" => $request->tanggal_kenaikan_berkala_terakhir,
                "tanggal_kenaikan_pangkat_terakhir" => $request->tanggal_kenaikan_pangkat_terakhir,
                'status_pns' => 1,
                'status_user' => 1,
                'user_id' => $user->id
            ]);
            DB::commit();
            Alert::success('Success', 'Success Store Pegawai');
            return back();
        } catch (Exception $th) {
            Storage::delete($path);
            DB::rollBack();
            Alert::error('Error Exception', $th->getMessage());
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
        return view('admin.pegawai.show', [
            'pegawai' => Pegawai::findOrFail($id),
            'pendidikan' => Pendidikan::get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pegawai.edit', [
            'pegawai' => Pegawai::find($id),
            'status_perkawinan' => StatusPernikahan::get(),
            'agama' => Agama::get(),
            'golongan' => Golongan::get(),
            'jabatan' => Jabatan::get(),
            'pendidikan' => Pendidikan::get(),
            'golongan' => Golongan::get()
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
            "nip" => "required",
            "nama" => "required",
            "nik" => "required",
            "jenis_kelamin" => "required",
            "tanggal_lahir" => "required|date",
            "tempat_lahir" => "required",
            "alamat" => "required",
            "no_hp" => "required",
            "status_perkawinan_id" => "required|exists:status_pernikahans,id",
            "agama_id" => "required|exists:agamas,id",
            "jabatan_id" => "required|exists:jabatans,id",
            "facebook" => "required",
            "instagram" => "required",
            "tmt" => "required",
            "tanggal_kenaikan_berkala_terakhir" => "required",
            "tanggal_kenaikan_pangkat_terakhir" => "required"
        ]);

        if (Role::findByName('pegawai')->name != 'pegawai') {
            Alert::error('Role', 'Role pegawai not found');
            return back();
        }
        DB::beginTransaction();
        try {
            $pegawai = Pegawai::find($id);
            if ($request->foto != '') {
                $this->validate($request, [
                    "foto" => "required|mimes:jpeg,jpg,png"
                ]);
                Storage::delete($pegawai->foto);

                $name = $request->file('foto')->getClientOriginalName();
                $name = Carbon::now()->format('YmdHis') . '_' . $name;
                $path = $request->file('foto')->storeAs('/pegawai/foto', $name);

                $pegawai->update([
                    "foto" => $path,
                ]);
            }

            if ($request->password != '') {
                $this->validate($request, [
                    'email' => 'required',
                    'password' => 'required'
                ]);
                User::where('id', $pegawai->user_id)->update([
                    'name' => $request->nama,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
            }
            Pegawai::where('id', $id)->update([
                "nip" => $request->nip,
                "nama" => $request->nama,
                "nik" => $request->nik,
                "jenis_kelamin" => $request->jenis_kelamin,
                "tanggal_lahir" => $request->tanggal_lahir,
                "tempat_lahir" => $request->tempat_lahir,
                "alamat" => $request->alamat,
                "no_hp" => $request->no_hp,
                "status_perkawinan_id" => $request->status_perkawinan_id,
                "agama_id" => $request->agama_id,
                "jabatan_id" => $request->jabatan_id,
                'pendidikan_id' => 1,
                'golongan_id' => 1,
                "facebook" => $request->facebook,
                "instagram" => $request->instagram,
                "tmt" => $request->tmt,
                "tanggal_kenaikan_berkala_terakhir" => $request->tanggal_kenaikan_berkala_terakhir,
                "tanggal_kenaikan_pangkat_terakhir" => $request->tanggal_kenaikan_pangkat_terakhir,
                'status_pns' => 1,
                'status_user' => 1
            ]);
            DB::commit();
            Alert::success('Success', 'Success Update Pegawai');
            return back();
        } catch (Exception $th) {
            DB::rollBack();
            Alert::error('Error Exception', $th->getMessage());
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
        //
    }
}
