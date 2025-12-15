<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
	Route::get('/', [HomeController::class, 'index'])->name('home');
	Route::get('login', [AuthController::class, 'index'])->name('login.index');
	Route::post('login', [AuthController::class, 'login'])->name('login.store');
});

Route::prefix('admin')->middleware('auth')->group(function () {
	Route::post('logout', [AuthController::class, 'logout'])->name('logout');

	// service route 
	Route::prefix('services')->group(function () {
		Route::get('/', [App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
		Route::get('create', [App\Http\Controllers\ServiceController::class, 'create'])->name('services.create');
		Route::post('/', [App\Http\Controllers\ServiceController::class, 'store'])->name('services.store');
		Route::get('{service:slug}/edit', [App\Http\Controllers\ServiceController::class, 'edit'])->name('services.edit');
		Route::put('{service}', [App\Http\Controllers\ServiceController::class, 'update'])->name('services.update');
		Route::delete('{service}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('services.destroy');
	});
});
