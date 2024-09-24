<?php

use App\Http\Controllers\AsetBerwujud;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SubkategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AsetBerwujudController;
use App\Http\Controllers\AsetDihapuskanController;
use App\Http\Controllers\DokumenController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [AuthController::class, 'index']);
});

Route::group(['prefix' => 'main'], function () {
    // Data Master Routes
    Route::get('/', function () {
        return view('dashboards.index');
    });
    Route::group(['prefix' => 'datamaster'], function() {
        Route::get('/', function () {
            return view('dashboards.index');
        });
        
        // kategori Routes
        Route::group(['prefix' => 'kategori'], function() {
            Route::get('/', [KategoriController::class, 'index'])->name('kategori.index');
            Route::post('/store', [KategoriController::class, 'store'])->name('kategori.store');
            Route::post('/update', [KategoriController::class, 'update'])->name('kategori.update');
            Route::get('/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');
            Route::get('/getKodeKategori', [KategoriController::class, 'getKodeKategori'])->name('kategori.getKodeKategori');
        });

        // subkategori Routes
        Route::group(['prefix' => 'barang'], function() {
            Route::get('/', [BarangController::class, 'index'])->name('barang.index');
            Route::post('/store', [BarangController::class, 'store'])->name('barang.store');
            Route::post('/update', [BarangController::class, 'update'])->name('barang.update');
            Route::get('/delete/{id}', [BarangController::class, 'destroy'])->name('barang.delete');
        });

        // satuan Routes
        Route::group(['prefix' => 'satuan'], function() {
            Route::get('/', [SatuanController::class, 'index'])->name('satuan.index');
            Route::post('/store', [SatuanController::class, 'store'])->name('satuan.store');
            Route::post('/update', [SatuanController::class, 'update'])->name('satuan.update');
            Route::get('/delete/{id}', [SatuanController::class, 'destroy'])->name('satuan.delete');
        });

        // lokasi Routes
        Route::group(['prefix' => 'lokasi'], function() {
            Route::get('/', [LokasiController::class, 'index'])->name('lokasi.index');
            Route::post('/store', [LokasiController::class, 'store'])->name('lokasi.store');
            Route::post('/update', [LokasiController::class, 'update'])->name('lokasi.update');
            Route::get('/delete/{id}', [LokasiController::class, 'destroy'])->name('lokasi.delete');
        });

        // pengguna Routes
        Route::group(['prefix' => 'pengguna'], function() {
            Route::get('/', [PenggunaController::class, 'index'])->name('pengguna.index');
            Route::post('/store', [PenggunaController::class, 'store'])->name('pengguna.store');
            Route::post('/update', [PenggunaController::class, 'update'])->name('pengguna.update');
            Route::get('/delete/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.delete');
        });
    });
    // aset Routes
    Route::group(['prefix' => 'aset'], function() {
        Route::group(['prefix' => 'berwujud'], function() {
            Route::get('/', [AsetBerwujudController::class, 'index'])->name('aset-berwujud.index');
            Route::post('/store', [AsetBerwujudController::class, 'store'])->name('aset-berwujud.store');
            Route::get('/api/get-kode-aset-by-barang/{id}', [AsetBerwujudController::class, 'getKodeAsetByBarang'])->name('aset-berwujud.get-kode-aset-by-barang');
            Route::get('/delete/{id}', [AsetBerwujudController::class, 'destroy'])->name('aset-berwujud.delete');
        });
        Route::group(['prefix' => 'dihapuskan'], function() {
            Route::get('/', [AsetDihapuskanController::class, 'index']);
        });
    });
    // dokumen Routes
    Route::group(['prefix' => 'dokumen'], function() {
        Route::group(['prefix' => 'pengadaan'], function() {
            Route::get('/', [DokumenController::class, 'index'])->name('dokumen-pengadaan.index');
            Route::post('/store', [DokumenController::class, 'store'])->name('dokumen-pengadaan.store');
            Route::post('/update', [DokumenController::class, 'update'])->name('dokumen-pengadaan.update');
            Route::get('/delete/{id}', [DokumenController::class, 'destroy'])->name('dokumen-pengadaan.delete');
        });
    });
});
