<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductController;

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

Route::get('/product/create', [ProductController::class, 'createProduct'])->name('create_product');
Route::post('/product/create', [ProductController::class, 'storeProduct'])->name('store_product');

Route::get('/products', [ProductController::class, 'showProducts'])->name('products');
Route::get('/product/{product}', [ProductController::class, 'detailProduct'])->name('product');
Route::get('/product/{product}/edit', [ProductController::class, 'editProduct'])->name('edit_product');

