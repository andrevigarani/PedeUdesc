<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Controllers\Evaluation;

class EvaluationController extends Controller
{
    public function listOrders()
    {
         $orders = Order::all();
         return view('user.orders', ['orders' => $orders]);
    }

    public function evaluation()
    {
        return view('user.evaluation');
    }

    public function store(Evaluation $evaluation)
    {
        $data = $evaluation->all();
        dd($data);

        return view('user.orders');
    }


}
