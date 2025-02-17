<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;

// Halaman Home
Route::get('/', [HomeController::class, 'home']);

// Halaman Products dengan Prefix "/category"
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductsController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductsController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductsController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductsController::class, 'babyKid']);
});

// Halaman User profile
Route::get('/profile', [UserController::class, 'profile']);

// Halaman Penjualan
Route::get('/sales', [SalesController::class, 'index']);