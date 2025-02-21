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
    Route::get('/food-beverage', [ProductsController::class, 'foodBeverage'])->name('category.food-beverage');
    Route::get('/beauty-health', [ProductsController::class, 'beautyHealth'])->name('category.beauty-health');
    Route::get('/home-care', [ProductsController::class, 'homeCare'])->name('category.home-care');
    Route::get('/baby-kid', [ProductsController::class, 'babyKid'])->name('category.baby-kid');
});

// Halaman User profile
Route::get('/profile', [UserController::class, 'profile'])->name('profile');

// Halaman Penjualan
Route::get('/sales', [SalesController::class, 'index'])->name('sales');