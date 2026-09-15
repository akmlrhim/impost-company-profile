<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\VerifyIdController;
use Illuminate\Support\Facades\Route;

// sitemap
Route::get('sitemap.xml', [SitemapController::class, 'index']);

Route::middleware('throttle:30,1')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
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

    // Landing
    Route::get('landing/web-development', [LandingController::class, 'web'])->name('landing.web');
    Route::get('landing/promo', [LandingController::class, 'promo'])->name('landing.promo');

    Route::get('verify-id/{employee:slug}', [VerifyIdController::class, 'verify'])->name('verify-id');
});
