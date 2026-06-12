<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Internal\DashboardController;
use App\Http\Controllers\Internal\OrderController;
use App\Http\Controllers\Internal\DesignController;
use App\Http\Controllers\Internal\ProductionController;

Route::middleware('auth')->group(function () {
    Route::get('/design/dashboard', [DashboardController::class, 'index'])->name('design.dashboard');
    Route::get('/design/daftar-pesanan', [OrderController::class, 'index'])->name('design.daftar-pesanan');
    Route::get('/design/design', [DesignController::class, 'index'])->name('design.design');

    Route::get('/produksi/dashboard', [DashboardController::class, 'index'])->name('produksi.dashboard');
    Route::get('/produksi/daftar-pesanan', [OrderController::class, 'index'])->name('produksi.daftar-pesanan');
    Route::get('/produksi/produksi', [ProductionController::class, 'index'])->name('produksi.produksi');
});
