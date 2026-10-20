<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('admin/login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('admin/login', [LoginController::class, 'store']);
});

Route::post('admin/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.logout');
