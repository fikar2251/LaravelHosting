<?php

use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;
use App\Http\Controllers\Admin\AgamaController;
use App\Http\Controllers\Admin\BackUpController;
use App\Http\Controllers\Admin\BackUpDatabaseController;
use App\Http\Controllers\Admin\CutiController;
use App\Http\Controllers\Admin\DisposisiController;
use App\Http\Controllers\Admin\DisposisiSuratKeluarController;
use App\Http\Controllers\Admin\DisposisiSuratMasukController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\GajiController;
use App\Http\Controllers\Admin\GolonganController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\JamKerjaController;
use App\Http\Controllers\Admin\KategoriCutiControlller;
use App\Http\Controllers\Admin\KategoriInformasiController;
use App\Http\Controllers\Admin\KategoriSppdController;
use App\Http\Controllers\Admin\KeahlianController;
use App\Http\Controllers\Admin\KenaikanBerkalaController;
use App\Http\Controllers\Admin\KenaikanPangkatController;
use App\Http\Controllers\Admin\KlasifikasiSuratController;
use App\Http\Controllers\Admin\MstPenerimaanController;
use App\Http\Controllers\Admin\MstPotonganController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\PendidikanController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RapatController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SppdController;
use App\Http\Controllers\Admin\StatusPernikahanController;
use App\Http\Controllers\Admin\StrukturOrganisasiController;
use App\Http\Controllers\Admin\SuratKeluarController;
use App\Http\Controllers\Admin\SuratMasukController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\PegawaiController as ApiPegawaiController;
use App\Http\Controllers\DevController;
use App\Http\Controllers\Pegawai\AbsensiController;
use App\Http\Controllers\Pegawai\AccessController;
use App\Http\Controllers\Pegawai\CutiController as PegawaiCutiController;
use App\Http\Controllers\Pegawai\FileController;
use App\Http\Controllers\Pegawai\KenaikanBerkalaController as PegawaiKenaikanBerkalaController;
use App\Http\Controllers\Pegawai\KenaikanPangkatController as PegawaiKenaikanPangkatController;
use App\Http\Controllers\Pegawai\ProfileController;
use App\Http\Controllers\Pegawai\SuratMasukController as PegawaiSuratMasukController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function(){
    Route::post('/DownloadOrView/{id}', [DevController::class, 'DownloadOrView'])->name('downloadorview');
    Route::post('/surat_masuk/laporan',[DevController::class, 'SuratMasukLaporan'])->name('surat_masuk.laporan');\
    Route::post('/surat_keluar/laporan',[DevController::class, 'SuratKeluarLaporan'])->name('surat_keluar.laporan');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->middleware('auth')->name('admin.')->group(function () {
    Route::prefix('/setting')->group(function () {
        Route::view('/', 'admin.setting.index')->name('setting.index');
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);
        Route::resource('setting', SettingController::class);
    });
    Route::prefix('/master')->group(function () {
        Route::resource('jabatan', JabatanController::class);
        Route::resource('pegawai', PegawaiController::class);
        Route::resource('agama', AgamaController::class);
        Route::resource('dokumen', DokumenController::class);
        Route::resource('status_pernikahan', StatusPernikahanController::class);
        Route::resource('pendidikan', PendidikanController::class);
        Route::resource('golongan', GolonganController::class);
        Route::resource('keahlian', KeahlianController::class);
        Route::resource('unit', UnitController::class);
        Route::resource('struktur', StrukturOrganisasiController::class);
    });
    Route::resource('penerimaan',MstPenerimaanController::class);
    Route::resource('potongan',MstPotonganController::class);
    Route::resource('gaji', GajiController::class);
    Route::resource('rapat', RapatController::class);
    Route::post('absensi/laporan', [AdminAbsensiController::class, 'laporan'])->name('absensi.laporan');
    Route::resource('absensi', AdminAbsensiController::class);
    Route::resource('jam_kerja', JamKerjaController::class)->except(['create','store','destroy']);
    Route::resource('user', UserController::class);
    Route::resource('user_backup', BackUpController::class);
    Route::get('backup/export/database',[BackUpDatabaseController::class,'export'])->name('backup.export');
    Route::resource('backup',BackUpDatabaseController::class);
    Route::resource('kategori_informasi', KategoriInformasiController::class);
    Route::resource('informasi', InformasiController::class);
    Route::resource('kenaikan_berkala',KenaikanBerkalaController::class);
    Route::resource('kenaikan_pangkat',KenaikanPangkatController::class);
    Route::resource('klasifikasi', KlasifikasiSuratController::class);
    Route::resource('surat_masuk', SuratMasukController::class);
    Route::resource('surat_keluar', SuratKeluarController::class);
    Route::get('disposisicreate/{id}',[DisposisiController::class,'createBySuratMasuk'])->name('disposisi.create.surat_masuk');
    Route::resource('disposisi',DisposisiController::class);
    Route::resource('kategori_cuti',KategoriCutiControlller::class);
    Route::get('cuti/filter',[CutiController::class, 'filter'])->name('cuti.filter');
    Route::resource('cuti',CutiController::class);
    Route::resource('kategori_sppd',KategoriSppdController::class);
    Route::resource('sppd',SppdController::class);
});

Route::prefix('/')->middleware('auth')->name('pegawai.')->group(function(){
    Route::resource('profile',ProfileController::class);
    Route::resource('surat_masuk', PegawaiSuratMasukController::class);
    Route::get('/file/delete/{id}', [FileController::class, 'delete'])->name('file.delete');
    Route::resource('file',FileController::class);
    Route::resource('access', AccessController::class);
    Route::get('file/index/{id}', [ApiPegawaiController::class, 'FileIndex']);
    Route::get('/file/password/{id}/{password}',[ApiPegawaiController::class, 'FilePassword']);
    Route::get('/filepegawai/{id}', [ApiPegawaiController::class, 'FilePegawaiIndex']);
    Route::resource('cuti',PegawaiCutiController::class);
    Route::resource('kenaikan_berkala',PegawaiKenaikanBerkalaController::class)->only(['index']);
    Route::resource('kenaikan_pangkat',PegawaiKenaikanPangkatController::class)->only(['index']);
    Route::post('absensi/filter',[AbsensiController::class, 'filter'])->name('absensi.filter');
    Route::get('absensi',[AbsensiController::class,'index'])->name('absensi.index');
});