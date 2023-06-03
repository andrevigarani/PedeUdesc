<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Bag;
use App\Models\Order;

class OrderController extends Controller
{

    public function listProduct()
    {

        $client = Client::findByUser(Auth::id());
        $bag = Bag::findOpenBagByClient($client->id);
        if ($bag->stockItem()->count() == 0) {
            return redirect()->route('user.show.bag');
        }
        return view('user.makeOrder')->with(['bagItems' => $bag->getBagCheckout()]);
    }

    public function store($idPayment)
    {
        $sessionId = Auth::id();
        $client = Client::findByUser($sessionId);
        $bag = Bag::findOpenBagByClient($client->id);

        Order::create([
            'date_order_closure' => now(),
            'id_bag' => $bag->id,
            'id_payment' => $idPayment,
        ]);

        return redirect()->route('user.order.payment.message');
    }

    public function message()
    {
        return view('user.orderSuccessfullySent');
    }
}
