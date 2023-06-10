<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEvaluation;
use App\Models\Order;
use App\Models\Evaluation;

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

    public function store(StoreEvaluation $evaluation)
    {
        $data = $evaluation->all();

        $evaluation = Evaluation::create($data);

        return redirect()->route('user.order.done');
    }
}
