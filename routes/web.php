<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BagController;

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
Route::get('/bag/add/{id}', [BagController::class, 'addProduct'])->name('user.add.bag');
Route::get('/bag', [BagController::class, 'showBag'])->name('user.show.bag');