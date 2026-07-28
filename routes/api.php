<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\PortfolioController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/services', [ServiceController::class, 'indexPublic']);
Route::get('/services/{slug}', [ServiceController::class, 'showPublic']);

Route::get('/portfolios', [PortfolioController::class, 'indexPublic']);
Route::get('/portfolios/{id}', [PortfolioController::class, 'showPublic']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('admin/services', ServiceController::class);
    Route::apiResource('admin/portfolios', PortfolioController::class);
});