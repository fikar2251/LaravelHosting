<?php

use App\Http\Controllers\Api\AbsenController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CutiController;
use App\Http\Controllers\Api\DisposisiController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\PegawaiController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SuratMasukController;
use App\Http\Controllers\DevController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//API route for login user
Route::post('/login', [AuthController::class, 'login']);
Route::post('/reset-password-token', [AuthController::class, 'forgot']);
Route::post('password/reset', [AuthController::class,'reset']);

Route::middleware('auth:sanctum')->group(function(){
    // API route authentication
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('change_password',[AuthController::class, 'change_password']);

    // API surat
    Route::get('surat_masuk',[SuratMasukController::class, 'GetSuratMasuk']);
    Route::get('surat_masuk/{id}',[SuratMasukController::class, 'ShowSuratMasuk']);

    // API Profile
    Route::get('profile', [ProfileController::class, 'ShowProfile']);
    Route::put('profile',[ProfileController::class, 'UpdateProfile']);

    // API Disposisi
    Route::get('disposisi', [DisposisiController::class,'GetDisposisi']);
    Route::get('disposisi/{id}', [DisposisiController::class,'ShowDisposisi']);

    // API Document
    Route::get('document', [DocumentController::class, 'GetDocument']);
    Route::get('document/{id}', [DocumentController::class, 'DownloadDocument']);

    // API Cuti
    Route::get('cuti/kategori',[CutiController::class,'GetKategoriCuti']);
    Route::get('cuti',[CutiController::class, 'GetCuti']);
    Route::get('cuti/{id}',[CutiController::class, 'ShowCuti']);
    Route::post('cuti', [CutiController::class, 'PostCuti']);

    // API Login
    Route::post('masuk', [AbsenController::class, 'PostMasuk']);
    Route::post('pulang', [AbsenController::class, 'PostPulang']);
});

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::prefix('/pegawai')->name('pegawai.')->group(function () {
        Route::post('/photo/{id}', [PegawaiController::class, 'Photo']);
        Route::get('/photo/delete/{id}', [PegawaiController::class, 'PhotoDelete']);

        Route::get('/riwayatpendidikan/{id}', [PegawaiController::class, 'RiwayatPendidikanIndex']);
        Route::post('/riwayatpendidikan/store/{id}', [PegawaiController::class, 'RiwayatPendidikanStore']);
        Route::get('riwayatpendidikan/delete/{id}', [PegawaiController::class, 'RiwayatPendidikanDelete']);

        Route::get('/filepegawai/{id}', [PegawaiController::class, 'FilePegawaiIndex']);
        Route::post('/file/{id}', [PegawaiController::class, 'File']);
        Route::get('/filepegawai/delete/{id}', [PegawaiController::class, 'FilePegawaiDelete']);
    });
    Route::prefix('/surat_masuk')->group(function(){
        Route::prefix('/disposisi')->group(function(){
            Route::get('response/{id}',[PegawaiController::class , 'SuratMasukDisposisiResponse']);
        });
    });
});
Route::prefix('/pegawai')->name('pegawai.')->group(function () {
    Route::post('/photo/{id}', [PegawaiController::class, 'Photo']);
    Route::get('/photo/delete/{id}', [PegawaiController::class, 'PhotoDelete']);

    Route::get('/riwayatpendidikan/{id}', [PegawaiController::class, 'RiwayatPendidikanIndex']);
    Route::post('/riwayatpendidikan/store/{id}', [PegawaiController::class, 'RiwayatPendidikanStore']);
    Route::get('riwayatpendidikan/delete/{id}', [PegawaiController::class, 'RiwayatPendidikanDelete']);

    Route::get('/filepegawai/{id}', [PegawaiController::class, 'FilePegawaiIndex']);
    Route::post('/file/{id}', [PegawaiController::class, 'File']);
    Route::get('/filepegawai/delete/{id}', [PegawaiController::class, 'FilePegawaiDelete']);

    Route::get('/file/index/{id}', [PegawaiController::class, 'FileIndex']);
    Route::post('/file/store/filepegawai',[PegawaiController::class, 'FileStore']);
    Route::get('/file/password/{id}/{password}',[PegawaiController::class, 'FilePassword']);
    Route::post('/file/comment/store',[PegawaiController::class, 'FileCommentStore']);
    Route::get('/file/comment/{id}', [PegawaiController::class, 'FileComment']);
    Route::get('/file/access/index/{id}',[PegawaiController::class, 'FileAccessIndex']);
    Route::get('/file/access/{id}',[PegawaiController::class, 'FileAccess']);
    Route::post('/file/access/store', [PegawaiController::class, 'FileAccessStore']);

    Route::post('masuk', [PegawaiController::class, 'AbsenMasuk']);
    Route::post('pulang', [PegawaiController::class, 'AbsenPulang']);
});