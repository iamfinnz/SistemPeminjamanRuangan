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
Route::get('/peminjaman', [App\Http\Controllers\PeminjamanController::class, 'index'])->name('peminjaman');
Route::get('/create-peminjaman', [App\Http\Controllers\PeminjamanController::class, 'create'])->name('create');

//Export PDF
Route::get('export-pdf', [App\Http\Controllers\PeminjamanController::class, 'exportpdf'])->name('exportpdf');
//Export Excel
Route::get('export-excel', [App\Http\Controllers\PeminjamanController::class, 'exportexcel'])->name('exportexcel');

Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');

Route::resource('/password/reset', App\Http\Controllers\Auth\PasswordResetController::class);

//Peminjaman
Route::get('create-peminjaman', [App\Http\Controllers\PeminjamanController::class, 'create']);
Route::post('create-peminjaman', [App\Http\Controllers\PeminjamanController::class, 'store']);
Route::get('edit-peminjaman/{id}', [App\Http\Controllers\PeminjamanController::class, 'edit']);
Route::put('update-peminjaman/{id}', [App\Http\Controllers\PeminjamanController::class, 'update']);
Route::get('delete-peminjaman/{id}', [App\Http\Controllers\PeminjamanController::class, 'destroy']);

//Pengajuan
Route::get('create-pengajuan', [App\Http\Controllers\HomeController::class, 'create']);
Route::post('create-pengajuan', [App\Http\Controllers\HomeController::class, 'store']);
Route::get('peminjaman/{id}', [App\Http\Controllers\HomeController::class, 'terima']);
Route::get('home/{id}', [App\Http\Controllers\HomeController::class, 'tolak']);

//Akun
Route::get('create-akun', [App\Http\Controllers\RegisterController::class, 'register']);