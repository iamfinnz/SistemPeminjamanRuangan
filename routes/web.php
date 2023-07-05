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

//Export Excel
//Route::get('export-excel', [App\Http\Controllers\PeminjamanController::class, 'exportexcel'])->name('exportexcel');

Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

Route::resource('/password/reset', App\Http\Controllers\Auth\PasswordResetController::class);

//Pengajuan
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('create-pengajuan', [App\Http\Controllers\HomeController::class, 'create']);
//Route::post('create-pengajuan', [App\Http\Controllers\HomeController::class, 'store']);
Route::get('peminjaman/{id}', [App\Http\Controllers\HomeController::class, 'terima']);
Route::get('home/{id}', [App\Http\Controllers\HomeController::class, 'tolak']);

//Peminjaman
Route::get('peminjaman', [App\Http\Controllers\PeminjamanController::class, 'index'])->name('peminjaman');
Route::get('create-peminjaman', [App\Http\Controllers\PeminjamanController::class, 'create'])->name('create');
Route::post('create-peminjaman', [App\Http\Controllers\PeminjamanController::class, 'store']);
Route::get('edit-peminjaman/{id}', [App\Http\Controllers\PeminjamanController::class, 'edit']);
Route::put('update-peminjaman/{id}', [App\Http\Controllers\PeminjamanController::class, 'update']);
Route::get('delete-peminjaman/{id}', [App\Http\Controllers\PeminjamanController::class, 'destroy']);
Route::get('export-pdf', [App\Http\Controllers\PeminjamanController::class, 'exportpdf'])->name('exportpdf');
Route::get('terima-pengembalian/{id}', [App\Http\Controllers\PeminjamanController::class, 'terimaPengembalian']);

//Mata Kuliah
Route::get('matakuliah', [App\Http\Controllers\KuliahController::class, 'index'])->name('matakuliah');
Route::get('create-matakuliah', [App\Http\Controllers\KuliahController::class, 'create']);
Route::post('create-matakuliah', [App\Http\Controllers\KuliahController::class, 'store']);
Route::get('edit-matakuliah/{id}', [App\Http\Controllers\KuliahController::class, 'edit']);
Route::put('update-matakuliah/{id}', [App\Http\Controllers\KuliahController::class, 'update']);
Route::get('delete-matakuliah/{id}', [App\Http\Controllers\KuliahController::class, 'destroy']);
Route::post('/process-excel', [App\Http\Controllers\KuliahController::class, 'exportjson'])->name('process_excel');

//Download Template
Route::get('template', [App\Http\Controllers\TemplateController::class, 'template'])->name('template');

//Akun
Route::get('akun', [App\Http\Controllers\Auth\AkunController::class, 'index'])->name('akun');
Route::post('akun', [App\Http\Controllers\Auth\AkunController::class, 'register'])->name('register');
