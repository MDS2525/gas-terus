<?php

use App\Http\Controllers\KaryawanCtrl;
use Illuminate\Support\Facades\Route;


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
    return view('dashboard');
})->name('dashboard');

Route::controller(KaryawanCtrl::class)->prefix('karyawan')->group(function () {
    Route::get('',  'index')->name('karyawan');
    Route::get('insert', 'add')->name('karyawan.insert');
    Route::post('insert', 'insert')->name('karyawan.add.insert');
    Route::get('karyawan/{karyawan}', [KaryawanCtrl::class, 'detail'])->name('karyawan.detail');
    Route::delete('/karyawan/{karyawan}', [KaryawanCtrl::class, 'delete'])->name('karyawan.delete');
    Route::get('karyawan/edit/{karyawan}', [KaryawanCtrl::class, 'edit'])->name('karyawan.edit');
    Route::put('karyawan/update/{karyawan}', [KaryawanCtrl::class, 'update'])->name('karyawan.update');
});
