<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

 Route::get('/',[ProductController::class,"product"])->name("products");
 Route::post('/add_product',[ProductController::class,"add_product"])->name("add.product");
Route::post('/update_product',[ProductController::class,"update_product"])->name("update.product");
Route::post('/delete_product',[ProductController::class,"delete_product"])->name("delete.product");
