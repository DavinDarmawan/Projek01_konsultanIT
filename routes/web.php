<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\CtaController;
use App\Http\Controllers\Admin\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('services', ServiceController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::get('hero/{id}/edit', [HeroController::class, 'edit'])->name('hero.edit');
    Route::put('hero/{id}', [HeroController::class, 'update'])->name('hero.update');
    Route::resource('benefits', BenefitController::class);
    Route::resource('technologies', TechnologyController::class);
    Route::get('cta/{id}/edit', [CtaController::class, 'edit'])->name('cta.edit');
    Route::put('cta/{id}', [CtaController::class, 'update'])->name('cta.update');
    // Contact tidak perlu CRUD karena data kontak hardcoded, bisa dibuat nanti
});
use App\Http\Controllers\Admin\CompanyInfoController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // ...
    Route::get('company/{id}/edit', [CompanyInfoController::class, 'edit'])->name('company.edit');
    Route::put('company/{id}', [CompanyInfoController::class, 'update'])->name('company.update');
});