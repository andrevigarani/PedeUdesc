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
use App\Models\Order;

    class OrderController extends Controller
    {

    public function __construct()
    {
        $sum = 0;
    }
    public function listProduct(){

        $sessionId = Auth::id();

        $client = Client::findByUser($sessionId);

        $bag = Bag::findOpenBagByClient($client->id);

        $bags = $client->bags;

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

    public function orderPayment(OrderPayment $orderPayment){

        $data = $orderPayment->all();

        $idPayment = Payment::where('payment_type', $data['payment_method'])->first();

        $sessionId = Auth::id();

        $client = Client::findByUser($sessionId);

        $bag = Bag::findOpenBagByClient($client->id);

        $bags = $client->bags;

        $stockItems = StockItem::where('id_bag', true)->get();
        
        $sum = 0;

        foreach ($stockItems as $stockItem) {
            $product = $stockItem->product;

            if ($product) {
                $price = $product->price;
                $sum += $price;
            }
        }

        if($data['payment_method'] == 'p'){

            $pixKey = $this->generatePixKey();

            return view('user.paymentPixOrder')->with(['payment' => $idPayment, 'totalPrice' => $sum, 'pixKey' => $pixKey]);
        
        } else if($data['payment_method'] == 'c'){

            return view('user.paymentCardOrder')->with(['payment' => $idPayment]);
        } else {

            return view('user.orderSuccessfullySent');
        }
        
    }

    public function generatePixKey()
{
        $length = 20; 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $pixKey = '';

        for ($i = 0; $i < $length; $i++) {
            $pixKey .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $pixKey;
    }

    public function store(){

        $sessionId = Auth::id();

        $client = Client::findByUser($sessionId);

        $bag = Bag::findOpenBagByClient($client->id);

        $stockItems = StockItem::where('id_bag', true)->get();

        $order = Order::create([
            'date_order_closure' => now(),
            'bag' => $bag->id,
        ]);

        //return redirect()->route('user.order.payment.message');
    }
}
