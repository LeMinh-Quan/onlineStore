<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('home.about');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
