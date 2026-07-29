<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Import Controllers
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\BenefitController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\CtaController;
use App\Http\Controllers\Api\CompanyInfoController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\PartnerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Api\ServiceArticleController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ==========================================
// ROUTE PUBLIK (Frontend)
// ==========================================
Route::get('/services', [ServiceController::class, 'indexPublic']);
Route::get('/services/{slug}', [ServiceController::class, 'showPublic']);

Route::get('/portfolios', [PortfolioController::class, 'indexPublic']);
Route::get('/portfolios/{id}', [PortfolioController::class, 'showPublic']);

Route::get('/hero', [HeroController::class, 'indexPublic']);

// Pengunjung mengirim pesan melalui form kontak
Route::post('/contacts', [ContactController::class, 'storePublic']);

Route::get('/technologies', [TechnologyController::class, 'indexPublic']);
Route::get('/cta', [CtaController::class, 'indexPublic']);

Route::get('/company', [CompanyInfoController::class, 'indexPublic']);

Route::get('/teams', [TeamController::class, 'indexPublic']);
Route::get('/teams/{id}', [TeamController::class, 'showPublic']);

Route::get('/partners', [PartnerController::class, 'indexPublic']);

Route::get('/service-articles', [ServiceArticleController::class, 'indexPublic']);
Route::get('/service-articles/{slug}', [ServiceArticleController::class, 'showPublic']);

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// ROUTE ADMIN (Proteksi Sanctum)
// ==========================================
Route::middleware('auth:sanctum')->prefix('admin')->group(function () {

    Route::apiResource('services', ServiceController::class);
    Route::apiResource('portfolios', PortfolioController::class);
    Route::apiResource('hero', HeroController::class);
    Route::apiResource('benefits', BenefitController::class);
    Route::apiResource('teams', TeamController::class);
    Route::apiResource('partners', PartnerController::class);

    // Admin kontak (tanpa fungsi store)
    Route::apiResource('contacts', ContactController::class)->except(['store']);

Route::apiResource(
    'admin/service-articles',
    ServiceArticleController::class
);


});