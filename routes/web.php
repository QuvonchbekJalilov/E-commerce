<?php

use App\Http\Controllers\admin\AuthController as AdminAuthController;
use App\Http\Controllers\AuthController;
use \App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\LanguageController;
use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class , 'home']);
Route::get('about', [PageController::class , 'about'])->name('about');
Route::get('contact', [PageController::class , 'contact'])->name('contact');
Route::get('shop', [ProductController::class, 'index'])->name('shop');
Route::get('show/{product}', [ProductController::class, 'show'])->name('show');

Route::get('login', [AuthController::class , 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register',[AuthController::class, 'register_store'])->name('register_store');


Route::get('admin_login', [AdminAuthController::class, 'login'])->name('admin_login');
Route::post('admin_check', [AdminAuthController::class, 'admin_check'])->name('admin_check');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cart', [CartController::class, 'viewCart'])->name('viewCart');
Route::delete('/delete-cart-item', [CartController::class, 'deleteCartItem'])->name('deleteCartItem');
Route::post('/update-cart-item', [CartController::class, 'updateCartItem'])->name('updateCartItem');

Route::post('placeOrder', [OrderController::class, 'makeOrder'])->name('makeOrder');

Route::get('/myOrder', [OrderController::class, 'myOrder'])->name('myOrder');

Route::get('category/{category}',[PageController::class, 'category'])->name('category');

Route::post('contactMe',[PageController::class, 'contactMe'])->name('contactMe');

Route::get('language/{locale}',[LanguageController::class, 'language'])->name('locale.change');