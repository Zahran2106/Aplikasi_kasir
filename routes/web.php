<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('login.index');
});

Route::resource('login', LoginController::class);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('CekLogin')->group(function() {
    Route::middleware('Admin')->group(function(){
        Route::get('/admin', function() {
            return view('admin.index');
        })->name('admin.index');
        Route::get('/tambahKasir', [UserController::class, 'index'])->name('tambahKasir.index');
        Route::get('/tambahKasir/create', [UserController::class, 'create'])->name('tambahKasir.create');
        Route::post('/tambahKasir/store', [UserController::class, 'store'])->name('tambahKasir.store');
        Route::get('/tambahKasir/edit/{id}', [UserController::class, 'edit'])->name('tambahKasir.edit');
        Route::put('/tambahKasir/update/{id}', [UserController::class, 'update'])->name('tambahKasir.update');
        Route::get('/tambahKasir/delete/{id}', [UserController::class, 'delete'])->name('tambahKasir.delete');

        // Route untuk halaman produk
        Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
        Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::get('/produk/delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');

        Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
        Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');;
        
    });

    Route::middleware('Kasir')->group(function(){
        // route untuk dashboard kasir
        Route::get('/kasir', function() {
            return view('kasir.index');
        })->name('kasir.index');

        // Route::resource('kasir/transaksi', TransaksiController::class);
        // Route::get('/kasir/transaksi/struk/{id}', [TransaksiController::class, 'struk']);
    });
});
