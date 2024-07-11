<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SubkategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\PenggunaController;

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
    Route::get('/', function () {
        return view('dashboards.index');
    });
    Route::group(['prefix' => 'kategori'], function() {
        Route::get('/', [KategoriController::class, 'index']);
    });
    Route::group(['prefix' => 'subkategori'], function() {
        Route::get('/', [SubkategoriController::class, 'index']);
    });
    Route::group(['prefix' => 'barang'], function() {
        Route::get('/', [BarangController::class, 'index']);
    });
    Route::group(['prefix' => 'satuan'], function() {
        Route::get('/', [SatuanController::class, 'index']);
    });
    Route::group(['prefix' => 'lokasi'], function() {
        Route::get('/', [LokasiController::class, 'index']);
    });
    Route::group(['prefix' => 'pengguna'], function() {
        Route::get('/', [PenggunaController::class, 'index']);
    });
});
