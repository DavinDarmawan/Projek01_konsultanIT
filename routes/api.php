<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\BenefitController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// PUBLIC API

Route::get('/services', [ServiceController::class, 'indexPublic']);
Route::get('/services/{slug}', [ServiceController::class, 'showPublic']);

Route::get('/portfolios', [PortfolioController::class, 'indexPublic']);
Route::get('/portfolios/{id}', [PortfolioController::class, 'showPublic']);

Route::get('/benefits', [BenefitController::class, 'indexPublic']);
Route::get('/benefits/{id}', [BenefitController::class, 'showPublic']);


// ADMIN API

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource(
        'admin/services',
        ServiceController::class
    );

    Route::apiResource(
        'admin/portfolios',
        PortfolioController::class
    );

    Route::apiResource(
        'admin/benefits',
        BenefitController::class
    );

});