<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/products', AdminProductController::class);
});
