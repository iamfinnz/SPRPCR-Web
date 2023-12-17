<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

Route::resource('/password/reset', App\Http\Controllers\Auth\PasswordResetController::class);

//Pengajuan
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('peminjaman/{id}', [App\Http\Controllers\HomeController::class, 'terima']);
Route::post('home/{id}', [App\Http\Controllers\HomeController::class, 'tolak']);

//Peminjaman
Route::get('peminjaman', [App\Http\Controllers\PeminjamanController::class, 'index'])->name('peminjaman');
Route::get('create_peminjaman', [App\Http\Controllers\PeminjamanController::class, 'create'])->name('create');
Route::get('get_namadosen', [App\Http\Controllers\PeminjamanController::class, 'getNamaDosen']);
Route::post('create_peminjaman', [App\Http\Controllers\PeminjamanController::class, 'store']);
Route::get('delete_peminjaman/{id}', [App\Http\Controllers\PeminjamanController::class, 'destroy']);
Route::post('terima_pengembalian/{id}', [App\Http\Controllers\PeminjamanController::class, 'terimaPengembalian']);

//Riwayat
Route::get('riwayat_peminjaman', [App\Http\Controllers\RiwayatController::class, 'index'])->name('riwayat');
Route::get('export_excel2', [App\Http\Controllers\RiwayatController::class, 'exportexcel2'])->name('exportexcel2');
Route::get('export_excel3', [App\Http\Controllers\RiwayatController::class, 'exportexcel3'])->name('exportexcel3');

//Mata Kuliah
Route::get('matakuliah', [App\Http\Controllers\KuliahController::class, 'index'])->name('matakuliah');
Route::get('edit_matakuliah/{id}', [App\Http\Controllers\KuliahController::class, 'edit']);
Route::put('update_matakuliah/{id}', [App\Http\Controllers\KuliahController::class, 'update']);
Route::get('delete_matakuliah/{id}', [App\Http\Controllers\KuliahController::class, 'destroy']);
Route::post('/process-excel', [App\Http\Controllers\KuliahController::class, 'exportjson'])->name('process_excel');

//Download Template
Route::get('template', [App\Http\Controllers\TemplateController::class, 'template'])->name('template');

//Dosen
Route::get('dosen', [App\Http\Controllers\DosenController::class, 'index'])->name('dosen');
Route::get('create_dosen', [App\Http\Controllers\DosenController::class, 'create'])->name('create');
Route::post('create_dosen', [App\Http\Controllers\DosenController::class, 'store']);
Route::get('edit_dosen/{id}', [App\Http\Controllers\DosenController::class, 'edit']);
Route::put('update_dosen/{id}', [App\Http\Controllers\DosenController::class, 'update']);
Route::get('delete_dosen/{id}', [App\Http\Controllers\DosenController::class, 'destroy']);

//Ruangan
Route::get('ruangan', [App\Http\Controllers\RuanganController::class, 'index'])->name('ruangan');
Route::get('create_ruangan', [App\Http\Controllers\RuanganController::class, 'create'])->name('create');
Route::post('create_ruangan', [App\Http\Controllers\RuanganController::class, 'store']);
Route::get('edit_ruangan/{id}', [App\Http\Controllers\RuanganController::class, 'edit']);
Route::put('update_ruangan/{id}', [App\Http\Controllers\RuanganController::class, 'update']);
Route::get('delete_ruangan/{id}', [App\Http\Controllers\RuanganController::class, 'destroy']);

//Akun
Route::get('akun', [App\Http\Controllers\Auth\AkunController::class, 'index'])->name('akun');
Route::post('akun', [App\Http\Controllers\Auth\AkunController::class, 'register'])->name('register');
