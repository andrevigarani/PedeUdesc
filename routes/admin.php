<?php

use Illuminate\Support\Facades\Route;

//Rota para definir como será a home do usuário
Route::middleware('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\ProductController::class, 'showAdminHome'])->name('admin.home');
});

//Rota para definir as outras operaçoes possíveis com os produtos
Route::get('/product/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('admin.product.create');
Route::post('/product/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('admin.product.store');
Route::get('/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('admin.product.edit');
Route::put('/product/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('admin.product.update');
Route::delete('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('admin.product.delete');
// Route::get('order/receveid', [App\Http\Controllers\AdminController::class, 'listOrders'])->name('admin.order.received');