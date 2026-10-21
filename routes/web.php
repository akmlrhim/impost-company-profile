<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::controller(ServiceController::class)->prefix('services')->name('services.')->group(function () {
    Route::get('/{service:slug}', 'show')->name('show');
});

Route::controller(PortfolioController::class)->prefix('portfolio')->name('portfolio.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{portfolio:slug}', 'show')->name('show');
});

Route::controller(ArticleController::class)->prefix('articles')->name('articles.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{article:slug}', 'show')->name('show');
});

Route::controller(ContactController::class)->prefix('contact')->name('contact.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
});
