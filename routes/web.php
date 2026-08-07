<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('home.about');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/products/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

// Route hiển thị Form thêm sản phẩm (GET)
Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
// Route xử lý dữ liệu khi người dùng bấm Submit (POST)
Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
