<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\LihatController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

// Route::get('/kategori_surat', function () {
//     return view('kategori_surat');
// });

// Route::get('/arsip', function () {
//     return view('arsip');
// });

Route::get('/about', function () {
    return view('about');
});

Route::get('/arsip', [ArsipController::class, 'arsiptampil']);
Route::post('arsip',[ArsipController::class,'arsiptambah'])->name('arsip.tambah');
Route::post('/arsip/hapus/{nomor_surat}',[ArsipController::class,'arsiphapus'])->name('arsip.hapus');
Route::put('/arsip/edit/{nomor_surat}',[ArsipController::class,'arsipedit'])->name('arsip.edit');

Route::get('/arsip/lihat/{nomor_surat}', [ArsipController::class, 'arsipLihat'])->name('arsip.lihat');


Route::get('/kategori', [KategoriController::class, 'kategoritampil']);
Route::post('kategori',[KategoriController::class,'kategoritambah'])->name('kategori.tambah');
Route::post('/kategori/hapus/{id}',[KategoriController::class,'kategorihapus'])->name('kategori.hapus');
Route::put('/kategori/edit/{id}',[KategoriController::class,'kategoriedit'])->name('kategori.edit');
