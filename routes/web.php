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
        });

        // subkategori Routes
        Route::group(['prefix' => 'barang'], function() {
            Route::get('/', [BarangController::class, 'index']);
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
            Route::get('/', [LokasiController::class, 'index']);
        });

        // pengguna Routes
        Route::group(['prefix' => 'pengguna'], function() {
            Route::get('/', [PenggunaController::class, 'index']);
        });
    });
    // aset Routes
    Route::group(['prefix' => 'aset'], function() {
        Route::group(['prefix' => 'berwujud'], function() {
            Route::get('/', [AsetBerwujudController::class, 'index']);
        });
        Route::group(['prefix' => 'dihapuskan'], function() {
            Route::get('/', [AsetDihapuskanController::class, 'index']);
        });
    });
    // dokumen Routes
    Route::group(['prefix' => 'dokumen'], function() {
        Route::group(['prefix' => 'pengadaan'], function() {
            Route::get('/', [DokumenController::class, 'index']);
        });
    });
});
