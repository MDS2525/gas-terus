<?php

use App\Http\Controllers\KaryawanCtrl;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DaftarHargaController;
use App\Http\Controllers\OutletController;

// Route Auth
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route Register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register_proses', [LoginController::class, 'register_proses'])->name('register_proses');

Route::middleware('auth')->group(function () {
    // Route Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route Karyawan
    Route::prefix('karyawan')->group(function () {
        Route::get('', [KaryawanCtrl::class, 'index'])->name('karyawan');
        Route::get('insert', [KaryawanCtrl::class, 'add'])->name('karyawan.insert');
        Route::post('insert', [KaryawanCtrl::class, 'insert'])->name('karyawan.add.insert');
        Route::get('karyawan/{karyawan}', [KaryawanCtrl::class, 'detail'])->name('karyawan.detail');
        Route::delete('/karyawan/{karyawan}', [KaryawanCtrl::class, 'delete'])->name('karyawan.delete');
        Route::get('karyawan/edit/{karyawan}', [KaryawanCtrl::class, 'edit'])->name('karyawan.edit');
        Route::put('karyawan/update/{karyawan}', [KaryawanCtrl::class, 'update'])->name('karyawan.update');
    });

    // Route Transaksi
    Route::prefix('transactions')->group(function () {
        Route::get('', [TransactionController::class, 'index'])->name('transactions');
        Route::get('create', [TransactionController::class, 'create'])->name('transactions.create');
        Route::post('', [TransactionController::class, 'store'])->name('transactions.store');
        Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
        Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
        Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
        Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
    });

    // Daftar Harga
    Route::prefix('daftar_harga')->group(function () {
        Route::get('', [DaftarHargaController::class, 'index'])->name('daftar_harga.index');
        Route::get('create', [DaftarHargaController::class, 'create'])->name('daftar_harga.create');
        Route::post('', [DaftarHargaController::class, 'store'])->name('daftar_harga.store');
        Route::get('{id}', [DaftarHargaController::class, 'show'])->name('daftar_harga.show');
        Route::get('{id}/edit', [DaftarHargaController::class, 'edit'])->name('daftar_harga.edit');
        Route::put('{id}', [DaftarHargaController::class, 'update'])->name('daftar_harga.update');
        Route::delete('{id}', [DaftarHargaController::class, 'destroy'])->name('daftar_harga.destroy');
    });

    // Daftar Outlet
    Route::prefix('outlet')->group(function () {
        Route::get('', [OutletController::class, 'index'])->name('outlet.index');
        Route::get('create', [OutletController::class, 'create'])->name('outlet.create');
        Route::post('', [OutletController::class, 'store'])->name('outlet.store');
        Route::get('{id}', [OutletController::class, 'show'])->name('outlet.show');
        Route::get('{id}/edit', [OutletController::class, 'edit'])->name('outlet.edit');
        Route::put('{id}', [OutletController::class, 'update'])->name('outlet.update');
        Route::delete('{id}', [OutletController::class, 'destroy'])->name('outlet.destroy');
    });
});
