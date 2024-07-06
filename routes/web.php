<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\BarangkeluarController;
use App\Http\Controllers\OperationalController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('testi');
});

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/barangmasuk', BarangmasukController::class);
    Route::resource('/barangkeluar', BarangkeluarController::class);
    Route::resource('/stock', StockController::class);
    Route::resource('/operational', OperationalController::class);
    Route::get('/profit-omset', [DashboardController::class, 'showProfitAndOmzet'])->name('profitomset');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
