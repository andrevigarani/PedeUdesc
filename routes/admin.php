<?php
use Illuminate\Support\Facades\Route;

Route::get('/product/create', [ \App\Http\Controllers\ProductController::class, 'create'])->name('admin.product.create');
Route::post('/product/store', [ \App\Http\Controllers\ProductController::class, 'store'])->name('admin.product.store');
