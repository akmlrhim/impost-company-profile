<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobVacancyController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PortfolioCategoryController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\StudyCaseController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\VerifyIdController;
use Illuminate\Support\Facades\Route;

// sitemap
Route::get('sitemap.xml', [SitemapController::class, 'index']);

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
		Route::get('job/{job}', [HomeController::class, 'jobDetail'])->name('job.details');

		Route::get('docs', [HomeController::class, 'docs'])->name('docs');
		Route::get('company-legality', [HomeController::class, 'legal'])->name('legal');

		// Landing 
		// Route::get('landing/web-development', [LandingController::class, 'web'])->name('landing.web');
		// Route::get('landing/promo', [LandingController::class, 'promo'])->name('landing.promo');
	});

	Route::prefix('admin')->middleware('auth')->group(function () {
		Route::post('logout', [AuthController::class, 'logout'])->name('logout');
		Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

		//profile route 
		Route::get('profile', [ProfileController::class, 'index'])->name('profile');
		Route::patch('profile', [ProfileController::class, 'saveProfile'])->name('profile.update');
		Route::patch('password', [ProfileController::class, 'savePassword'])->name('password.update');

		// service route 
		Route::resource('services', ServiceController::class)->except('show');

		// job vac. 
		Route::resource('jobvacancies', JobVacancyController::class);

		// article route 
		Route::resource('articles', ArticleController::class)->except('show');
		Route::get('articles/{article}/comments', [ArticleController::class, 'comments'])->name('articles.comments');
		Route::patch('articles/{article}/comments/{comment}/status', [CommentController::class, 'status'])->name('articles.comments.status');
		Route::post('editor-upload', [EditorController::class, 'store'])->name('editor.upload');

		// client route 
		Route::resource('clients', ClientController::class)->except(['show', 'edit', 'update']);
		Route::delete('truncate-clients', [ClientController::class, 'truncate'])->name('truncate-clients');

		// portfolio route 
		Route::resource('portfolio', PortfolioController::class);

		// study case route 
		Route::resource('study-case', StudyCaseController::class);

		// testimonial route
		Route::resource('testimonials', TestimonialController::class)->except('show');

		// article category
		Route::resource('article-categories', ArticleCategoryController::class)->except(['create', 'show', 'edit']);

		// portfolio category
		Route::resource('portfolio-categories', PortfolioCategoryController::class)->except(['create', 'show', 'edit']);

		// emplpoyee route
		Route::resource('employees', EmployeeController::class);
		Route::get('employees/{employee}/download-qr', [EmployeeController::class, 'downloadQrCode'])->name('employees.downloadQr');
	});

	Route::get('verify-id/{employee:slug}', [VerifyIdController::class, 'verify'])->name('verify-id');
});
