<?php

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

//Define para onde irá caso queira sair da aplicação
Route::get('/', function () {
    if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->route('home');
    }
    return redirect()->route('login');
});

Auth::routes(['reset' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\ProductController::class, 'showHome'])->name('home');

//Route::get('/product/bag', [App\Http\Controllers\BagController::class, 'showBag'])->name('product.bag');

//Route::post('/bag/${id}', [App\Http\Controllers\BagController::class, 'create'])->name('bag');
