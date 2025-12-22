<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:30,1')->group(function () {

	Route::middleware('guest')->group(function () {
		Route::get('/', [HomeController::class, 'index'])->name('home');
		Route::get('login', [AuthController::class, 'index'])->name('login');
		Route::post('login', [AuthController::class, 'login'])->name('login.store');
		Route::get('about', [HomeController::class, 'about'])->name('about');
		Route::get('articles/view/{article:slug}', [HomeController::class, 'article'])->name('article.detail');
		Route::get('article/view', [HomeController::class, 'articleAll'])->name('article.all');
		Route::post('article/comment', [CommentController::class, 'store'])->name('article.comment');
	});

	Route::prefix('admin')->middleware('auth')->group(function () {
		Route::post('logout', [AuthController::class, 'logout'])->name('logout');
		Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
		Route::resource('users', UserController::class)->except('show');

		// service route 
		Route::resource('services', ServiceController::class)->except('show');

		// article route 
		Route::resource('articles', ArticleController::class)->except('show');
		Route::get('articles/{comment}/comments', [ArticleController::class, 'comments'])->name('articles.comments');
		Route::post('editor-upload', [EditorController::class, 'store'])->name('editor.upload');

		// team route 
		Route::resource('teams', TeamController::class)->except('show');

		// client route 
		Route::resource('clients', ClientController::class)->except('show');
		Route::delete('truncate-clients', [ClientController::class, 'truncate'])->name('truncate-clients');
	});
});
