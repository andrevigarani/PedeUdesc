<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BagController;

use App\Http\Controllers\OrderController;

use App\Http\Controllers\PaymentController;

use App\Http\Controllers\EvaluationController;
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

Route::get('/home', [App\Http\Controllers\ProductController::class, 'showHome'])->name('home');
Route::get('/bag/add/{id}', [BagController::class, 'addProduct'])->name('user.add.bag');
Route::get('/bag', [BagController::class, 'showBag'])->name('user.show.bag');
Route::post('/bag', [BagController::class, 'updateBag'])->name('user.update.bag');
Route::get('/order', [OrderController::class, 'listProduct'])->name('user.order');
Route::get('/order/payment', [PaymentController::class, 'orderPayment'])->name('user.order.payment');
Route::post('/order/payment/pix/store', [PaymentController::class, 'pixStore'])->name('user.order.payment.pix');
Route::post('/order/payment/store', [OrderController::class, 'store'])->name('user.order.payment.store');
Route::get('/order/payment/message', [OrderController::class, 'message'])->name('user.order.payment.message');
Route::post('/order/payment/card', [PaymentController::class, 'cardStore'])->name('user.order.payment.card');
Route::get('order/done', [App\Http\Controllers\EvaluationController::class, 'listOrders'])->name('user.order.done');
Route::get('order/evaluation', [EvaluationController::class, 'evaluation'])->name('user.order.evaluation');
Route::post('/order/evaluation/store', [EvaluationController::class, 'store'])->name('user.order.evaluation.store');
