<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Internal\LaporanController;
use App\Http\Controllers\Internal\DashboardController;
use App\Http\Controllers\Internal\OrderController;
use App\Http\Controllers\Internal\ChatController;
use App\Http\Controllers\Internal\DesignController;
use App\Http\Controllers\Internal\ProductionController;

Route::get('/', fn() => view('customer.beranda'));

Route::middleware(['auth', 'role:Super Admin,Manager,Admin,Design,Produksi'])->group(function () {
    Route::get('/internal/summary', [DashboardController::class, 'summary']);
    Route::get('/internal/daftarpesanan', [OrderController::class, 'index']);
    Route::get('/internal/detail-pesanan/{id}', [OrderController::class, 'show']);
    Route::get('/internal/chat', [ChatController::class, 'index'])->name('internal.chat');
    Route::get('/internal/stress-test', fn() => view('internal.stress-test'));
    Route::get('/internal/design', [DesignController::class, 'index']);
    Route::get('/internal/produksi', [ProductionController::class, 'index']);

    Route::get('/internal/laporan', [LaporanController::class, 'index'])->name('internal.laporan');
    Route::get('/internal/laporan/export/csv', [LaporanController::class, 'exportCsv'])->name('internal.laporan.csv');
    Route::get('/internal/laporan/export/excel', [LaporanController::class, 'exportExcel'])->name('internal.laporan.excel');
    Route::get('/internal/laporan/export/pdf', [LaporanController::class, 'exportPdf'])->name('internal.laporan.pdf');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->role?->name;
        return match($role) {
            'Super Admin' => redirect('/superadmin/dashboard'),
            'Manager'     => redirect('/manager/dashboard'),
            'Admin'       => redirect('/admin/dashboard'),
            'Design'      => redirect('/design/dashboard'),
            'Produksi'    => redirect('/produksi/dashboard'),
            default       => redirect('/customer/dashboard'),
        };
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chat', function () {
        $role = auth()->user()->role?->name;
        if (in_array($role, ['Super Admin', 'Manager', 'Admin', 'Design', 'Produksi'])) {
            return redirect()->route('internal.chat');
        }
        return redirect()->route('customer.chat');
    });
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/pegawai.php';
require __DIR__.'/customer.php';
