<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Internal\LaporanController;
use App\Http\Controllers\Internal\DashboardController;
use App\Http\Controllers\Internal\OrderController;
use App\Http\Controllers\Internal\DesignController;
use App\Http\Controllers\Internal\ProductionController;
use App\Http\Controllers\Internal\ProductController;
use App\Http\Controllers\Internal\UserController;

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/summary', [DashboardController::class, 'summary'])->name('admin.summary');
    Route::get('/admin/daftar-pesanan', [OrderController::class, 'index'])->name('admin.daftar-pesanan');
    Route::get('/admin/design', [DesignController::class, 'index'])->name('admin.design');
    Route::get('/admin/produksi', [ProductionController::class, 'index'])->name('admin.produksi');
    Route::get('/admin/stress-test', fn() => view('internal.stress-test'))->name('admin.stress-test');
    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
    Route::get('/admin/kelola-produk', [ProductController::class, 'index'])->name('admin.kelola-produk');
    Route::get('/admin/kelola-pengguna', [UserController::class, 'index'])->name('admin.kelola-pengguna');

    Route::get('/superadmin/dashboard', [DashboardController::class, 'index'])->name('superadmin.dashboard');
    Route::get('/manager/dashboard', [DashboardController::class, 'index'])->name('manager.dashboard');
});
