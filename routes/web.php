<?php

use App\Http\Controllers\ProductController;
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

Route::get('/',[ProductController::class,'index']);
Route::get('/product',[ProductController::class,'viewProduct'])->name('product');
Route::get('/product/create',[ProductController::class,'createProduct'])->name('product.create');
Route::post('/product/save',[ProductController::class,'saveProduct'])->name('product.save');
Route::get('/product/edit/{id}',[ProductController::class,'editProduct'])->name('product.edit');
Route::get('/product/delete/{id}',[ProductController::class,'deleteProduct'])->name('product.delete');
Route::post('/product/update/{id}',[ProductController::class,'updateProduct'])->name('product.update');
