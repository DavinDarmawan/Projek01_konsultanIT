<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\ContactController; // Tambahan import Contact

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ==========================================
// ROUTE PUBLIK (Bisa diakses siapa saja untuk frontend)
// ==========================================
Route::get('/services', [ServiceController::class, 'indexPublic']);
Route::get('/services/{slug}', [ServiceController::class, 'showPublic']);

Route::get('/portfolios', [PortfolioController::class, 'indexPublic']);
Route::get('/portfolios/{id}', [PortfolioController::class, 'showPublic']);

Route::get('/hero', [HeroController::class, 'indexPublic']);

// Pengunjung mengirim pesan melalui form kontak (POST)
Route::post('/contacts', [ContactController::class, 'storePublic']);

// ==========================================
// ROUTE ADMIN (Wajib menyertakan token otentikasi)
// ==========================================
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('admin/services', ServiceController::class);
    Route::apiResource('admin/portfolios', PortfolioController::class);
    Route::apiResource('admin/hero', HeroController::class);
    
    // Admin bisa melihat, update status, dan hapus pesan (kecuali fungsi nambah data)
    Route::apiResource('admin/contacts', ContactController::class)->except(['store']);
});