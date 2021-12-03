<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Jam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{
    public function PostMasuk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'masuk' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->getMessageBag(), 403);
        }

        $now = Carbon::parse($request->masuk);

        $jam = Jam::where('keterangan', 'Masuk')->first();
        $mulai = Carbon::parse($jam->mulai)->format('H:i:s');
        $selesai = Carbon::parse($jam->selesai)->format('H:i:s');

        if ($now->format('H:i:s') <= $selesai) {
            if (Absensi::where('pegawai_id',auth()->user()->pegawai->id)->whereDate('tanggal', Carbon::now()->format('Y-m-d'))->exists()) {
                Absensi::where('pegawai_id',auth()->user()->pegawai->id)->where('tanggal', Carbon::now()->format('Y-m-d'))->update([
                    'tanggal' => Carbon::now()->format('Y-m-d'),
                    'masuk' => $request->masuk,
                    'pegawai_id' => auth()->user()->pegawai->id,
                    'tipe' => 'tidak telat'
                ]);
            } else {
                Absensi::create([
                    'tanggal' => Carbon::now()->format('Y-m-d'),
                    'masuk' => $request->masuk,
                    'pegawai_id' => auth()->user()->pegawai->id,
                    'tipe' => 'tidak telat'
                ]);
            }
            return response()->json('anda tidak telat, semoga hari mu menyenangkan', 200);
        } else {
            if (Absensi::where('pegawai_id',auth()->user()->pegawai->id)->whereDate('tanggal', Carbon::now()->format('Y-m-d'))->exists()) {
                Absensi::where('pegawai_id',auth()->user()->pegawai->id)->where('tanggal', Carbon::now()->format('Y-m-d'))->update([
                    'tanggal' => Carbon::now()->format('Y-m-d'),
                    'masuk' => $request->masuk,
                    'pegawai_id' => auth()->user()->pegawai->id,
                    'tipe' => 'telat'
                ]);
            } else {
                Absensi::create([
                    'tanggal' => Carbon::now()->format('Y-m-d'),
                    'masuk' => $request->masuk,
                    'pegawai_id' => auth()->user()->pegawai->id,
                    'tipe' => 'telat'
                ]);
            }
            return response()->json('anda telat, semoga hari mu suram', 200);
        }
    }
    public function PostPulang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pulang' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->getMessageBag(), 403);
        }

        $now = Carbon::parse($request->pulang);

        $jam = Jam::where('keterangan', 'Pulang')->first();
        $mulai = Carbon::parse($jam->mulai)->format('H:i:s');
        $selesai = Carbon::parse($jam->selesai)->format('H:i:s');

        if ($now->format('H:i:s') >= $mulai) {
            if (Absensi::where('pegawai_id',auth()->user()->pegawai->id)->whereDate('tanggal', Carbon::now()->format('Y-m-d'))->exists()) {
                Absensi::where('pegawai_id',auth()->user()->pegawai->id)->where('tanggal', Carbon::now()->format('Y-m-d'))->update([
                    'tanggal' => Carbon::now()->format('Y-m-d'),
                    'keluar' => $request->pulang,
                    'pegawai_id' => auth()->user()->pegawai->id
                ]);
            } else {
                Absensi::create([
                    'tanggal' => Carbon::now()->format('Y-m-d'),
                    'keluar' => $request->pulang,
                    'pegawai_id' => auth()->user()->pegawai->id
                ]);
            }
            return response()->json('anda boleh pulang', 200);
        } else {
            return response()->json('anda tidak boleh pulang', 500);
        }
    }
}
