<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Product;
use App\Models\StockItem;
use App\Models\Bag;
use App\Models\Payment;
use App\Http\Requests\OrderPayment;
use App\Http\Requests\PaymentCard;
use App\Models\Order;
use App\Models\Card;

class OrderController extends Controller
{

    public function __construct()
    {
        $sum = 0;
    }
    public function listProduct()
    {

        $sessionId = Auth::id();
        $client = Client::findByUser($sessionId);
        $bag = Bag::findOpenBagByClient($client->id);
        $bags = $client->bags; //testar para remover
        $stockItems = StockItem::where('id_bag', true)->get();
        $sum = 0;

        foreach ($stockItems as $stockItem) {
            $product = $stockItem->product;

            if ($product) {
                $price = $product->price;
                $sum += $price;
            }
        }

        return view('user.makeOrder')->with(['stockItems' => $stockItems, 'totalPrice' => $sum]);
    }

    public function store($idPayment)
    {
        $sessionId = Auth::id();
        $client = Client::findByUser($sessionId);
        $bag = Bag::findOpenBagByClient($client->id);
        $stockItems = StockItem::where('id_bag', true)->get();

        $order = Order::create([
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
