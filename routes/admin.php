<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('services', ServiceController::class);
    Route::resource('portfolio-categories', PortfolioCategoryController::class)->except(['show']);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('leads', LeadController::class)->only(['index', 'show', 'destroy']);
    Route::resource('testimonials', TestimonialController::class);
});
