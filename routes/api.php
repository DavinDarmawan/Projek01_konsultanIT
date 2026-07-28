<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\BenefitController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\CtaController;

Route::get('/hero', [HeroController::class, 'indexPublic']);
Route::get('/services', [ServiceController::class, 'indexPublic']);
Route::get('/portfolios', [PortfolioController::class, 'indexPublic']);
Route::get('/benefits', [BenefitController::class, 'indexPublic']);
Route::get('/technologies', [TechnologyController::class, 'indexPublic']);
Route::get('/cta', [CtaController::class, 'indexPublic']);
Route::get('/company', [CompanyInfoController::class, 'indexPublic']);