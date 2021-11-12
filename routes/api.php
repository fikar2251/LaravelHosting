<?php

use App\Http\Controllers\Api\PegawaiController;
use Illuminate\Http\Request;
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
});