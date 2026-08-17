<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\PelangganController;
use App\Http\Controllers\Api\ProdukController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\Api\AuthController::class, 'profile']);
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);

   Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::put('/kategori/{id}', [KategoriController::class, 'update']);
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

    Route::get('/pelanggan', [App\Http\Controllers\Api\PelangganController::class, 'index']);
    Route::post('/pelanggan', [App\Http\Controllers\Api\PelangganController::class, 'store']);
    Route::put('/pelanggan/{id}', [App\Http\Controllers\Api\PelangganController::class, 'update']);
    Route::delete('/pelanggan/{id}', [App\Http\Controllers\Api\PelangganController::class, 'destroy']);

    Route::get('/produk', [ProdukController::class, 'index']);
    Route::post('/produk', [ProdukController::class, 'store']);
    Route::get('/produk/{id}', [ProdukController::class, 'show']);
    Route::put('/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);

});