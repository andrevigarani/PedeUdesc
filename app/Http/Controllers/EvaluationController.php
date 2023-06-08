<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class EvaluationController extends Controller
{
    public function listOrders()
    {
         $orders = Order::all();
         return view('user.orders', ['orders' => $orders]);
    }
}
