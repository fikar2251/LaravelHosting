<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DevController;
use App\Models\Absensi;
use App\Models\Access;
use App\Models\Comment;
use App\Models\Disposisi;
use App\Models\FilePegawai;
use App\Models\Jam;
use App\Models\Pegawai;
use App\Models\Pendidikan;
use App\Models\Response;
use App\Models\RiwayatPendidikan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Prophecy\Call\Call;

class PegawaiController extends Controller
{
    public function Photo(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'foto' => ['required', 'mimes:jpeg,jpg,png,svg']
        ]);
        if ($validator->fails()) {
            $error = ValidationException::withMessages([
                'foto' => ['Fails'],
            ]);
            throw $error;
        }
        $pegawai = Pegawai::findOrFail($id);
        Storage::delete($pegawai->foto);

        $response = $request->file('foto')->storeAs('/pegawai/foto', $request->file('foto')->getClientOriginalName());
        $pegawai->update([
            'foto' => $response
        ]);
        $response = asset('storage/' . $response);

        return response()->json($response);
    }
    public function PhotoDelete($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        Storage::delete($pegawai->foto);
        $pegawai->update([
            'foto' => ''
        ]);
        $response = asset('assets/img/brand/icon-2.png');
        return response()->json($response);
    }
    public function RiwayatPendidikanStore(Request $request, $id)
    {
        $attr = $request->validate([
            'jurusan' => "required",
            'lokasi' => "required",
            'nama' => "required",
            'nama_kepsek_rektor' => "required",
            'nomor_ijazah' => "required",
            'pendidikan_id' => "required",
            'tanggal_ijazah' => "required"
        ]);
        $attr['pegawai_id'] = $id;
        $attr['status'] = 1;
        RiwayatPendidikan::create($attr);
        return response()->json('success');
    }
    public function RiwayatPendidikanIndex($id)
    {
        $query = RiwayatPendidikan::where('pegawai_id', $id)->get();
        return datatables()->of($query)->editColumn('pendidikan_id', function ($qr) {
            return $qr->pendidikan->nama;
        })->editColumn('action', function ($qr) {
            return "<button class='btn btn-sm btn-danger' onclick='buttonriwayatpendidikandelete(this)' data-id='" . $qr->id . "'>delete</button>";
        })->rawColumns(['action'])->make(true);
    }
    public function RiwayatPendidikanDelete($id)
    {
        RiwayatPendidikan::find($id)->delete();
        return response()->json($id);
    }
    public function File(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'file' => ['required', 'mimes:jpg,jpeg,png,svg,pdf,docx,xlsx']
        ]);
        if ($validator->fails()) {
            $error = ValidationException::withMessages([
                'file' => 'fails'
            ]);
            throw $error;
        }
        try {
            $file_encrypt = encrypt($request->file('file')->get());
            $original_file_name = $request->file('file')->getClientOriginalName();
            $fake = preg_replace('/\\.[^.\\s]{3,4}$/', '', $original_file_name);
            $fake_file_name = rand() . '_' . Carbon::now()->format('Ymd') . '_' . $fake . '.rda';
            $path_file = '/pegawai/file_pegawai/' . $fake_file_name;
            Storage::put($path_file, $file_encrypt);

            FilePegawai::create([
                'name' => $request->nama_file,
                'file' => $path_file,
                'fake' => $fake_file_name,
                'original' => $original_file_name,
                'date' => Carbon::parse($request->tanggal_file)->format('Y-m-d H:i:s'),
                'pegawai_id' => $id,
                'aktifya' => 1
            ]);
            return response()->json($path_file);
        } catch (\Throwable $th) {
            Storage::delete($path_file);
            $error = ValidationException::withMessages([
                'file' => 'fails'
            ]);
            throw $error;
        }
    }
    public function FilePegawaiIndex($id)
    {
        $query = FilePegawai::where('pegawai_id', $id)->get();
        return datatables()->of($query)->editColumn('file', function ($qr) {
            return '<form method="post" action="' . route('downloadorview', $qr->id) . '"> ' . csrf_field() . ' <button type="submit" class="btn btn-indigo"><i class="fas fa-folder-open"></i></button> </form>';
        })->editColumn('action', function ($qr) {
            return '<button class="btn btn-sm btn-danger" onclick="buttonfilepegawaidelete(this)" data-id="' . $qr->id . '">Delete</button>';
        })->editColumn('date', function ($qr) {
            return Carbon::parse($qr->date)->format('d-M-Y H:i:s');
        })->rawColumns(['file', 'action'])->make(true);
    }
    public function FilePegawaiDelete($id)
    {
        try {
            $query = FilePegawai::findOrFail($id);
            $path = $query->file;
            Access::where('file_pegawai_id', $query->id)->delete();
            Comment::where('file_pegawai_id', $query->id)->delete();
            $query->delete();
            Storage::delete($path);
            return response()->json('success');
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }
    public function SuratMasukDisposisiResponse($id)
    {
        $response = Response::where('disposisi_id', $id)->with('pegawai')->get();
        return response()->json($response);
    }
    public function FilePassword($id, $password)
    {
        $file = FilePegawai::findOrFail($id);
        if ($password == $file->password) {
            $form = '<form action="' . route('downloadorview', $file->id) . '" method="post">' . csrf_field() . '<button type="submit" class="btn btn-success">Download</button></form>';
            return response()->json($form);
        }
        return response()->json(['error' => 'Wrong Password'], 401);
    }
    public function FileComment($id)
    {
        $comment = Comment::with('file_pegawai', 'pegawai')->where('file_pegawai_id', $id)->orderBy('created_at', 'desc')->get();
        return datatables($comment)->editColumn('pegawai', function ($data) {
            return $data->pegawai->nama;
        })->editColumn('timestamp', function ($data) {
            return Carbon::parse($data->created_at)->diffForHumans();
        })->editColumn('foto', function ($data) {
            return '<img class="img-fluid" width="50" src="' . asset('storage/' . $data->pegawai->foto) . '">';
        })->rawColumns(['foto'])->make(true);
    }
    public function FileAccess(Request $request)
    {
        $data = [];
        $accesses = User::whereHas('roles', function ($qr) {
            return $qr->where('name', 'pegawai');
        })->where('name', 'like', '%' . $request->q . '%')->get();
        foreach ($accesses as $row) {
            $data[] = ['id' => $row->id, 'text' => $row->name];
        }
        return response()->json($data);
    }
    public function FileIndex($id)
    {
        $query = FilePegawai::where('access', 'public')->whereHas('pegawai', function ($qr) use ($id) {
            return $qr->where('unit_id', Pegawai::find($id)->unit_id);
        })->orWhereHas('access', function ($qr) use ($id) {
            return $qr->where('user_id', Pegawai::find($id)->user_id);
        })->orWhere('pegawai_id', $id)->orderBy('created_at', 'desc')->get();


        return datatables()->of($query)->editColumn('file_name', function ($data) {
            return $data->name;
        })->editColumn('size_ekstension', function ($data) {
            return number_format(Storage::size($data->file) / 1048576, 2) . 'MB | ' . File::extension($data->original);
        })->editColumn('datetime', function ($data) {
            return Carbon::parse($data->date)->format('d F Y H:i:s');
        })->editColumn('pegawai', function ($data) {
            return $data->pegawai->nama;
        })->editColumn('access', function ($data) {
            return $data->access;
        })->editColumn('action', function ($data) use ($id) {
            $access = $data->pegawai_id == $id ? '<a href="#" onclick="AccessPreview(this)" data-id="' . $data->id . '" data-target="#modaldemo3" data-toggle="modal" class="btn btn-warning"><i class="fas fa-universal-access"></i></a>' : '<button class="btn btn-warning"><i class="fa fa-lock"></i></button>';
            $type = $data->password != null ? '<a href="#" onclick="ButtonPrompt(this)" data-id="' . $data->id . '" class="btn btn-indigo"><i class="fa fa-lock"></i></a>' : '<form method="post" action="' . route('downloadorview', $data->id) . '"> ' . csrf_field() . ' <button type="submit" class="btn btn-indigo"><i class="fas fa-folder-open"></i></button> </form>';
            $button = '<div class="btn-group">' . $type . '<a href="#" onclick="CommentPreview(this)" data-id="' . $data->id . '" data-target="#modaldemo2" data-toggle="modal" class="btn btn-purple"><i class="fas fa-comment-dots"></i></a>' . $access . '</div>';
            return $button;
        })->addIndexColumn()->make(true);
    }
    public function FileStore(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_file' => ['required'],
                'tanggal_file' => ['required'],
            ]);
            if ($validator->fails()) {
                return response()->json($validator->getMessageBag(), 403);
            }
            $files = $request->file('file');
            foreach ($files as $file) {

                try {
                    $file_encrypt = encrypt($file->get());
                    $original_file_name = $file->getClientOriginalName();
                    $fake = preg_replace('/\\.[^.\\s]{3,4}$/', '', $original_file_name);
                    $fake_file_name = rand() . '_' . Carbon::now()->format('Ymd') . '_' . $fake . '.rda';
                    $path_file = '/pegawai/file_pegawai/' . $fake_file_name;
                    Storage::put($path_file, $file_encrypt);

                    FilePegawai::create([
                        'name' => $request->nama_file,
                        'file' => $path_file,
                        'fake' => $fake_file_name,
                        'original' => $original_file_name,
                        'date' => Carbon::parse($request->tanggal_file)->format('Y-m-d H:i:s'),
                        'pegawai_id' => $request->pegawai_id,
                        'aktifya' => 1,
                        'password' => $request->password
                    ]);
                } catch (\Throwable $th) {
                    Storage::delete($path_file);
                    return response()->json(['error' => $th->getMessage()], 500);
                }
            }
            return response()->json($request->all());
        } catch (Exception $error) {
            return response()->json(['error' => $error->getMessage()], 401);
        }
    }
    public function FileCommentStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_pegawai_id' => ['required'],
            'pegawai_id' => ['required'],
            'comment' => ['required']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->getMessageBag());
        }
        try {
            Comment::create([
                'file_pegawai_id' => $request->file_pegawai_id,
                'pegawai_id' => $request->pegawai_id,
                'comment' => $request->comment
            ]);
            return response()->json($request->all());
        } catch (Exception $error) {
            return response()->json(['error' => $error->getMessage()], 401);
        }
    }
    public function FileAccessIndex($id)
    {
        $query = Access::where('file_pegawai_id', $id)->get();
        return datatables()->of($query)->editColumn('pegawai', function ($qr) {
            return $qr->user->name;
        })->addIndexColumn()->make(true);
    }
    public function FileAccessStore(Request $request)
    {
        try {
            Access::where('file_pegawai_id', $request->file_id)->delete();
            FilePegawai::find($request->file_id)->update(['access' => 'public']);
            if ($request->access) {
                foreach ($request->access as $user_id) {
                    Access::create([
                        'file_pegawai_id' => $request->file_id,
                        'user_id' => $user_id
                    ]);
                }
                FilePegawai::find($request->file_id)->update(['access' => 'private']);
            }
            return response()->json($request->all());
        } catch (Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }
    public function masuk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'masuk' => 'required',
            'pegawai' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->getMessageBag(), 403);
        }

        $now = Carbon::parse($request->masuk);


        $jam = Jam::where('keterangan', 'Masuk')->first();
        $mulai = Carbon::parse($jam->mulai)->format('H:i:s');
        $selesai = Carbon::parse($jam->selesai)->format('H:i:s');


        // if ($now->between($mulai, $selesai)) {
        if ($now->format('H:i:s') <= $selesai) {
            if (Absensi::where('pegawai_id',$request->pegawai)->whereDate('tanggal', Carbon::now()->format('Y-m-d'))->exists()) {
                // return response()->json('update');
                Absensi::where('pegawai_id',$request->pegawai)->where('tanggal', Carbon::now()->format('Y-m-d'))->update([
                    'tanggal' => Carbon::now()->format('Y-m-d'),
                    'masuk' => $request->masuk,
                    'pegawai_id' => $request->pegawai,
                    'tipe' => 'tidak telat'
                ]);
            } else {
                // return response()->json('create');
                Absensi::create([
                    'tanggal' => Carbon::now()->format('Y-m-d'),
                    'masuk' => $request->masuk,
                    'pegawai_id' => $request->pegawai,
                    'tipe' => 'tidak telat'
                ]);
            }
            return response()->json('anda tidak telat, semoga hari mu menyenangkan', 200);
        } else {
            if (Absensi::where('pegawai_id',$request->pegawai)->whereDate('tanggal', Carbon::now()->format('Y-m-d'))->exists()) {
                // return response()->json('update');
                Absensi::where('pegawai_id',$request->pegawai)->where('tanggal', Carbon::now()->format('Y-m-d'))->update([
                    'tanggal' => Carbon::now()->format('Y-m-d'),
                    'masuk' => $request->masuk,
                    'pegawai_id' => $request->pegawai,
                    'tipe' => 'telat'
                ]);
            } else {
                // return response()->json('create');
                Absensi::create([
                    'tanggal' => Carbon::now()->format('Y-m-d'),
                    'masuk' => $request->masuk,
                    'pegawai_id' => $request->pegawai,
                    'tipe' => 'telat'
                ]);
            }
            return response()->json('anda telat, semoga hari mu suram', 200);
        }
    }
    public function pulang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pulang' => 'required',
            'pegawai' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->getMessageBag(), 403);
        }

        $now = Carbon::parse($request->pulang);


        $jam = Jam::where('keterangan', 'Pulang')->first();
        $mulai = Carbon::parse($jam->mulai)->format('H:i:s');
        $selesai = Carbon::parse($jam->selesai)->format('H:i:s');


        if ($now->format('H:i:s') >= $mulai) {
            if (Absensi::where('pegawai_id',$request->pegawai)->whereDate('tanggal', Carbon::now()->format('Y-m-d'))->exists()) {
                // return response()->json('update');
                Absensi::where('pegawai_id',$request->pegawai)->where('tanggal', Carbon::now()->format('Y-m-d'))->update([
                    'tanggal' => Carbon::now()->format('Y-m-d'),
                    'keluar' => $request->pulang,
                    'pegawai_id' => $request->pegawai
                ]);
            } else {
                // return response()->json('create');
                Absensi::create([
                    'tanggal' => Carbon::now()->format('Y-m-d'),
                    'keluar' => $request->pulang,
                    'pegawai_id' => $request->pegawai
                ]);
            }
            return response()->json('anda boleh pulang', 200);
        } else {
            return response()->json('anda tidak boleh pulang', 500);
        }
    }
}
