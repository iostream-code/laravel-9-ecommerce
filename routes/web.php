<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Product Route
Route::get('/product/create', [ProductController::class, 'createProduct'])->name('create_product');
Route::post('/product/create', [ProductController::class, 'storeProduct'])->name('store_product');

Route::get('/products', [ProductController::class, 'showProducts'])->name('products');
Route::get('/product/{product}', [ProductController::class, 'detailProduct'])->name('product');

Route::get('/product/{product}/edit', [ProductController::class, 'editProduct'])->name('edit_product');
Route::patch('/product/{product}/update', [ProductController::class, 'updateProduct'])->name('update_product');

Route::delete('/products/{product}', [ProductController::class, 'deleteProduct'])->name('delete_product');

// Cart Route
Route::post('/cart/{product}', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
Route::patch('/cart/{cart}', [CartController::class, 'updateCart'])->name('update_cart');
Route::delete('/cart/{cart}', [CartController::class, 'deleteCart'])->name('delete_cart');

//Order Route
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
Route::get('/order/{order}', [OrderController::class, 'detailOrder'])->name('detail_order');
Route::post('/order/{order}/pay', [OrderController::class, 'submitPayment'])->name('submit_payment');
Route::post('/order/{order}/confirm', [OrderController::class, 'confirmPayment'])->name('confirm_payment');

//Profile Route
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::get('/profile/{user}/edit', [ProfileController::class, 'editProfile'])->name('edit_profile');
Route::patch('/profile/{user}/update', [ProfileController::class, 'updateProfile'])->name('update_profile');
