<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('product');
});

Route::get('/',[ProductController::class,'products'])->name('products');
Route::post('/add-product',[ProductController::class,'addProduct'])->name('add.product');
Route::post('/update-product',[ProductController::class,'updateProduct'])->name('update.product');
Route::post('/delete-product',[ProductController::class,'deleteProduct'])->name('delete.product');
Route::get('/pagination/paginate-data',[ProductController::class,'pagination']);
Route::get('/search-product',[ProductController::class,'searchProduct'])->name('search.product');
