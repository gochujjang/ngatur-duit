<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;


require __DIR__ . '/auth.php';

// Ketika mengakses root path "/" maka akan redirect ke /login
Route::redirect('/', 'login');
// Route untuk pengecekan middleware auth
Route::middleware('auth')->group(function () {
    // Route untuk controller dashboard
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    // Route untuk controller Pemasukan dan pengeluaran
    Route::resource('/pemasukan', PemasukanController::class);
    Route::resource('/pengeluaran', PengeluaranController::class);

    // Route Export Excel
    Route::get('/exportexcel', [PemasukanController::class, 'exportexcel'])->name('exportexcel');
    Route::get('/exportexcel', [PengeluaranController::class, 'exportexcel'])->name('exportexcel');
    
});
