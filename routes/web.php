<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:30,1')->group(function () {

	Route::middleware('guest')->group(function () {
		Route::get('/', [HomeController::class, 'index'])->name('home');
		Route::get('login', [AuthController::class, 'index'])->name('login');
		Route::post('login', [AuthController::class, 'login'])->name('login.store');
		Route::get('articles/{article:slug}', [HomeController::class, 'article'])->name('article.detail');
		Route::post('article/comment', [CommentController::class, 'store'])->name('article.comment');
	});

	Route::prefix('admin')->middleware('auth')->group(function () {
		Route::post('logout', [AuthController::class, 'logout'])->name('logout');
		Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

		// service route 
		Route::resource('services', ServiceController::class)->except('show');

		// article route 
		Route::resource('articles', ArticleController::class)->except('show');
		Route::post('editor-upload', [EditorController::class, 'store'])->name('editor.upload');
	});
});
