<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/trash', [ProductController::class, 'trash'])->name('trash');
    Route::post('/{id}/restore', [ProductController::class, 'restore'])->name('restore');
    Route::delete('/{id}/force-delete', [ProductController::class, 'forceDelete'])->name('forceDelete');
});

Route::resource('products', ProductController::class);