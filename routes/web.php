<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PembelianController;
//use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('/barang', [BarangController::class, 'index'])->name('barang');
    Route::resource('kategori', KategoriController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('pembeli', PembeliController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('pembelian', PembelianController::class);
    Route::get('/pembelian/{id}/selesai', [PembelianController::class, 'selesai'])->name('pembelian.selesai');
    //Route::resource('penjualan', PenjualanController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});