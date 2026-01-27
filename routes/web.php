<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PortfolioCategoryController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StudyCaseController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:30,1')->group(function () {

	Route::middleware('guest')->group(function () {
		Route::get('/', [HomeController::class, 'index'])->name('home');
		Route::get('login', [AuthController::class, 'index'])->name('login.page');
		Route::post('login', [AuthController::class, 'login'])->name('login');
		Route::get('about', [HomeController::class, 'about'])->name('about');
		Route::get('contact', [HomeController::class, 'contact'])->name('contact');

		Route::get('portfolio', [HomeController::class, 'portfolio'])->name('portfolio');

		Route::get('opt-in', [HomeController::class, 'optIn'])->name('opt-in');
		Route::get('vsl', [HomeController::class, 'vslForm'])->name('vsl-form');
		Route::post('vsl', [HomeController::class, 'saveLeads'])->name('save-leads');

		Route::get('studycase', [HomeController::class, 'studyCase'])->name('study-case');
		Route::get('studycase/{studycase}', [HomeController::class, 'studyCaseDetail'])->name('detail-study-case');

		Route::get('articles/view/{article:slug}', [HomeController::class, 'article'])->name('article.detail');
		Route::get('article/view', [HomeController::class, 'articleAll'])->name('article.all');
		Route::post('article/comment', [CommentController::class, 'store'])->name('article.comment');

		Route::get('careers', [HomeController::class, 'job'])->name('careers');
		Route::get('careers/{career:slug}', [HomeController::class, 'jobDetail'])->name('career.detail');

		// Landing 
		Route::get('landing/web-development', [LandingController::class, 'web'])->name('landing.web');
	});

	Route::prefix('admin')->middleware('auth')->group(function () {
		Route::post('logout', [AuthController::class, 'logout'])->name('logout');
		Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
		Route::resource('users', UserController::class)->except('show');

		//profile route 
		Route::get('profile', [ProfileController::class, 'index'])->name('profile');
		Route::patch('profile', [ProfileController::class, 'saveProfile'])->name('profile.update');
		Route::patch('password', [ProfileController::class, 'savePassword'])->name('password.update');

		// service route 
		Route::resource('services', ServiceController::class)->except('show');

		// article route 
		Route::resource('articles', ArticleController::class)->except('show');
		Route::get('articles/{article}/comments', [ArticleController::class, 'comments'])->name('articles.comments');
		Route::patch('articles/{article}/comments/{comment}/status', [CommentController::class, 'status'])->name('articles.comments.status');
		Route::post('editor-upload', [EditorController::class, 'store'])->name('editor.upload');

		// team route 
		Route::resource('teams', TeamController::class)->except('show');

		// client route 
		Route::resource('clients', ClientController::class)->except(['show', 'edit', 'update']);
		Route::delete('truncate-clients', [ClientController::class, 'truncate'])->name('truncate-clients');

		// portfolio route 
		Route::resource('portfolio', PortfolioController::class);

		// study case route 
		Route::resource('study-case', StudyCaseController::class);

		// lead route
		Route::get('leads', [LeadController::class, 'index'])->name('leads.index');

		// testimonial route
		Route::resource('testimonials', TestimonialController::class)->except('show');

		// job route
		Route::resource('jobpostings', JobPostingController::class);

		// article category
		Route::resource('article-categories', ArticleCategoryController::class)->except(['create', 'show', 'edit']);

		// portfolio category
		Route::resource('portfolio-categories', PortfolioCategoryController::class)->except(['create', 'show', 'edit']);
	});
});
