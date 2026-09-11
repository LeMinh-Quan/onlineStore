<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Nhóm Route công khai (Public)
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// 2. Nhóm Route bảo mật (Bắt buộc phải đăng nhập - auth)
Route::middleware('auth')->group(function () {
    // Breeze Dashboard & Profile
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Quản lý Sản phẩm
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    
    // Thùng rác, Khôi phục & Xóa vĩnh viễn (Được bổ sung)
    Route::get('/products/trash', [ProductController::class, 'trash'])->name('products.trash');
    Route::patch('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('/products/{id}/force-delete', [ProductController::class, 'forceDelete'])->name('products.forceDelete');

    // Sửa, Cập nhật, Xóa tạm
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

// Route xem chi tiết sản phẩm (Đặt ở cuối để tránh ghi đè các đường dẫn tĩnh)
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// File route xác thực của Breeze
require __DIR__.'/auth.php';