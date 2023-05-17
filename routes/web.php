<?php

use App\Http\Controllers\KaryawanCtrl;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
});
