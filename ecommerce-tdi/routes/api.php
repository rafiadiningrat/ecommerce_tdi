<?php

use App\Http\Controllers\EtalaseController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/kategori', [KategoriController::class, 'getKategori']);

Route::get('/all-etalase', [EtalaseController::class, 'getAllEtalase']);
Route::get('/etalase/{id}', [EtalaseController::class, 'getEtalase']);

Route::get('/all-produk', [ProdukController::class, 'getAllProduk']);
Route::get('/produk/{id}', [ProdukController::class, 'getProdukByKategori']);
Route::get('/produk/{kode_kategori}/{kode_etalase}', [ProdukController::class, 'getProdukByEtalase']);
Route::get('/detail-produk/{id}', [ProdukController::class, 'getDetailProduk']);


Route::get('/pesanan/{id_transaksi}/{kode_produk}', [PesananController::class, 'getDetailTransaksi']);
Route::post('/transaksi', [TransaksiController::class, 'addTransaksi']);
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
