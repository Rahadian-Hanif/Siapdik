<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

// Route::get('/home', function () {
//     return view('welcome');
// });

// Route::get('/landing', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('landing.home');
});

Route::get('/literasi2', function () {
    return view('landing.literasi');
});

Route::get('/galeri', function () {
    return view('landing.galeri');
});

Route::get('/kelembagaan', function () {
    return view('landing.kelembagaan');
});

Route::get('/masuk', function () {
    return view('masuk');
});

// Route::get('/dashboardAdmin', function () {
//     return view('admin.dashboard');
// });

// Route::get('/home', function () {
//     return view('user.dashboard');
// })->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('daftarLembaga', [App\Http\Controllers\DaftarLembagaController::class, 'index']);

Route::get('daftarLembaga_admin', [App\Http\Controllers\DaftarLembagaController::class, 'admin']);

Route::post('daftarLembaga_edit/{id}', [App\Http\Controllers\DaftarLembagaController::class, 'edit']);

Route::post('daftarLembaga_hapus/{id}', [App\Http\Controllers\DaftarLembagaController::class, 'delete']);

Route::get('perpanjangan', [App\Http\Controllers\PerpanjanganController::class, 'index']);

Route::get('perpanjangan_admin', [App\Http\Controllers\PerpanjanganController::class, 'admin']);

Route::get('perpanjangan_approve/{id}', [App\Http\Controllers\PerpanjanganController::class, 'approve']);

Route::get('perpanjangan_rejected/{id}', [App\Http\Controllers\PerpanjanganController::class, 'rejected']);

Route::post('perpanjangan_upload', [App\Http\Controllers\PerpanjanganController::class, 'proses_upload']);

Route::get('pengajuanBantuan', [App\Http\Controllers\PengajuanBantuanController::class, 'index']);

Route::get('pengajuanBantuan_admin', [App\Http\Controllers\PengajuanBantuanController::class, 'admin']);

Route::get('pengajuanBantuan_approve/{id}', [App\Http\Controllers\PengajuanBantuanController::class, 'approve']);

Route::get('pengajuanBantuan_rejected/{id}', [App\Http\Controllers\PengajuanBantuanController::class, 'rejected']);

Route::post('pengajuanBantuan_upload', [App\Http\Controllers\PengajuanBantuanController::class, 'proses_upload']);

Route::get('laporanBantuan', [App\Http\Controllers\LaporanBantuanController::class, 'index']);

Route::get('laporanBantuan_admin', [App\Http\Controllers\LaporanBantuanController::class, 'admin']);

Route::get('laporanBantuan_approve/{id}', [App\Http\Controllers\LaporanBantuanController::class, 'approve']);

Route::get('laporanBantuan_rejected/{id}', [App\Http\Controllers\LaporanBantuanController::class, 'rejected']);

Route::post('laporanBantuan_upload', [App\Http\Controllers\LaporanBantuanController::class, 'proses_upload']);

Route::get('literasi', [App\Http\Controllers\LiterasiController::class, 'index']);

Route::get('literasi_admin', [App\Http\Controllers\LiterasiController::class, 'admin']);

Route::post('add_literasi', [App\Http\Controllers\LiterasiController::class, 'add']);

Route::post('edit_literasi/{id}', [App\Http\Controllers\LiterasiController::class, 'edit']);

Route::get('literasi_hapus/{id}', [App\Http\Controllers\LiterasiController::class, 'delete']);

Route::get('profile', [App\Http\Controllers\ProfileController::class, 'index']);

Route::post('edit_profile', [App\Http\Controllers\ProfileController::class, 'edit']);

Route::post('edit_password_user', [App\Http\Controllers\ProfileController::class, 'edit_password']);

Route::post('frist_profile', [App\Http\Controllers\ProfileController::class, 'frist']);

Route::get('manajemenUser', [App\Http\Controllers\ManajemenUserController::class, 'index']);

Route::post('add_user', [App\Http\Controllers\ManajemenUserController::class, 'add']);

Route::get('hapus_user/{id}', [App\Http\Controllers\ManajemenUserController::class, 'delete']);

Route::post('edit_user/{id}', [App\Http\Controllers\ManajemenUserController::class, 'edit']);

Route::post('edit_password/{id}', [App\Http\Controllers\ManajemenUserController::class, 'edit_password']);

Route::get('SuratMasuk', [App\Http\Controllers\PersuratanController::class, 'index']);

Route::post('upload_suratMasuk/{jenis}', [App\Http\Controllers\PersuratanController::class, 'upload']);

Route::get('hapus_suratMasuk/{id}', [App\Http\Controllers\PersuratanController::class, 'delete']);

Route::get('SuratKeluar', [App\Http\Controllers\PersuratanController::class, 'keluar']);

// Route::get('/', function () {
//     return view('login');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
