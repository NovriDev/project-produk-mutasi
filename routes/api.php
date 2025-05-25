<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\LokasiController;
use App\Http\Controllers\API\MutasiController;
use App\Http\Controllers\API\ProdukController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Login API
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // User API
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::post('/', [UserController::class, 'store']);
        Route::patch('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
        Route::get('/{id}/mutasi', [UserController::class, 'mutasiHistory']);
    });

    // Produk API
    Route::prefix('produk')->group(function () {
        Route::get('/', [ProdukController::class, 'index']);
        Route::get('/{id}', [ProdukController::class, 'show']);
        Route::post('/', [ProdukController::class, 'store']);
        Route::patch('/{id}', [ProdukController::class, 'update']);
        Route::delete('/{id}', [ProdukController::class, 'destroy']);
        Route::get('/{id}/mutasi', [ProdukController::class, 'mutasiHistory']);
    });

    // Lokasi API
    Route::prefix('lokasi')->group(function () {
        Route::get('/', [LokasiController::class, 'index']);
        Route::get('/{id}', [LokasiController::class, 'show']);
        Route::post('/', [LokasiController::class, 'store']);
        Route::patch('/{id}', [LokasiController::class, 'update']);
        Route::delete('/{id}', [LokasiController::class, 'destroy']);
    });

    // Mutasi API
    Route::prefix('mutasi')->group(function () {
        Route::get('/', [MutasiController::class, 'index']);
        Route::post('/', [MutasiController::class, 'store']);
        Route::delete('/{id}', [MutasiController::class, 'destroy']);
    });
});
