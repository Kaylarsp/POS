<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;

// Halaman Welcome
Route::get('/', [WelcomeController::class, 'index']);

// Route Kategori (CRUD)
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get ('/kategori/create', [KategoriController :: class, 'create' ]);
Route::post('/kategori', [KategoriController :: class, 'store' ]);
Route::get ('/kategori/edit/{id}', [KategoriController :: class, 'edit' ]);
Route::put('/kategori/update/{id}', [KategoriController :: class, 'update' ]);
Route::get('/kategori/destroy/{id}', [KategoriController :: class, 'destroy' ]);
Route::delete('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');

// Route Level
Route::get('/level', [LevelController::class, 'index'])->name('level.index');

// Route User (CRUD)
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/tambah', [UserController::class, 'tambah'])->name('user.create');
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('user.store');
Route::get('/user/ubah/{id}', [UserController::class, 'ubah'])->name('user.edit');
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan'])->name('user.update');
Route::delete('/user/hapus/{id}', [UserController::class, 'hapus'])->name('user.destroy');
