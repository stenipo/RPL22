<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DaftarPenggunaController;
use App\Http\Controllers\DaftarBusController;
use App\Http\Controllers\DaftarAreaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SifatPesananController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
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

Route::get('/',[HomeController::class, 'index']);
Route::get('/searchresult',[HomeController::class, 'index']);
Route::get('/register',[AuthController::class ,'register']);
Route::get('/login',[AuthController::class ,'login'])->name('login');
Route::post('/postregister',[AuthController::class, 'postregister']);
Route::post('/postlogin',[AuthController::class, 'postlogin']);
Route::get('/logout',[AuthController::class, 'logout']);
Route::get('/invoice/{id}', [PDFController::class, 'invoice']);
Route::get('/pdftransaksi/{id}',[PDFController::class, 'pdftransaksi']);

Route::middleware(['auth','role:Admin'])->group(function(){
    Route::get('/dashboard',[HomeController::class, 'indexAdmin']);
    Route::get('/dashboard/filter',[HomeController::class, 'filterIndex']);
    Route::get('/daftarpengguna',[DaftarPenggunaController::class, 'index']);
    Route::get('/daftarbus',[DaftarBusController::class, 'index']);
    Route::get('/daftararea',[DaftarAreaController::class, 'index']);
    Route::post('/daftarbus/tambahbus',[DaftarBusController::class, 'tambahBus']);
    Route::post('/daftarbus/editbus/{id}',[DaftarBusController::class, 'editBus']);
    Route::get('/daftarbus/hapusbus/{id}',[DaftarBusController::class, 'hapusBus']);
    Route::post('/daftararea/tambaharea',[DaftarAreaController::class, 'tambahArea']);
    Route::post('/daftararea/editarea/{id}',[DaftarAreaController::class, 'editArea']);
    Route::get('/daftararea/hapusarea/{id}',[DaftarAreaController::class, 'hapusArea']);
    Route::get('/deleteakun/{id}',[AuthController::class, 'deleteakun']);
    Route::post('/daftarpengguna/edit/{id}',[AuthController::class, 'editakun']);
    Route::get('/daftarsifat',[SifatPesananController::class, 'index']);
    Route::post('/tambahsifat',[SifatPesananController::class, 'tambahSifat']);
    Route::post('editsifat/{id}',[SifatPesananController::class, 'editSifat']);
    Route::get('/hapusstatus/{id}',[SifatPesananController::class,'hapusSifat']);
    Route::get('/daftarproduk',[ProdukController::class, 'index']);
    Route::post('/daftarproduk/tambahproduk',[ProdukController::class, 'tambahproduk']);
    Route::get('/daftarproduk/hapusproduk/{id}',[ProdukController::class, 'hapusproduk']);
    Route::post('/daftarproduk/editproduk/{id}',[ProdukController::class, 'editproduk']);
    Route::get('/konfirmasi/{id}',[HomeController::class, 'setuju']);
    Route::get('{id}/konfirmasi',[HomeController::class, 'ditolak']);
    Route::get('/chart',[ChartController::class, 'index']);
});

Route::middleware(['auth','role:Pemesan'])->group(function(){
    Route::get('/formpemesanan/{id}/checkout',[HomeController::class, 'formpemesanan']);
    Route::post('/formpemesanan/checkout/{id}',[HomeController::class, 'checkout']);
    Route::post('/upload/{id}',[HomeController::class, 'uploadbukti']);
    Route::post('/formpemesanan/{id}/checkout/pesan',[HomeController::class, 'pesan']);
    Route::get('/history',[HomeController::class, 'indexHistory']);
});
