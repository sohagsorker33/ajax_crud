<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

 Route::get('/',[ProductController::class,"product"])->name("products");
Route::post('/add_product',[ProductController::class,"add_product"])->name("add.product");
