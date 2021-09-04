<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

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
}) ->middleware('auth');


//Products

Route::get('/products', [ProductController::class, 'show']);

Route::get('/product/form/{id?}', [ProductController::class, 'form']) -> name('product.form');

Route::post('/product/save', [ProductController::class, 'save']) -> name('product.save');

Route::get('/product/delete/{id}', [ProductController::class, 'delete']) ->name('product.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Brands

Route::get('/brands', [BrandController::class, 'show']);

Route::get('/brand/form/{id?}', [BrandController::class, 'form']) -> name('brand.form');

Route::post('/brand/save', [BrandController::class, 'save']) -> name('brand.save');

Route::get('/brand/delete/{id}', [BrandController::class, 'delete']) ->name('brand.delete');

//Categories

Route::get('/categories', [CategoryController::class, 'show']);

Route::get('/category/form/{id?}', [CategoryController::class, 'form']) -> name('category.form');

Route::post('/category/save', [CategoryController::class, 'save']) -> name('category.save');

Route::get('/category/delete/{id}', [CategoryController::class, 'delete']) ->name('category.delete');