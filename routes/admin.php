<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\PhotoController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::get('admin/dashboard', [PageController::class, 'dashboard'])->name('admin_dashboard');
    Route::post('admin_logout', [PageController::class, 'logout'])->name('admin_logout');

    Route::prefix('admin')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);


    });
});
