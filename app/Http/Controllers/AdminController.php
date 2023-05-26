<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    // public function listOrders()
    // {
    //     $orders = Order::all();
    //     return view('admin.order.receivedOrders', ['orders' => $orders]);
    // }
}