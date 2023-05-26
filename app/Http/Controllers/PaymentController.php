<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;

class PaymentController extends Controller
{
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

            $orderController = new OrderController();
            
            $orderController->store();

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

    public function cardStore(PaymentCard $paymentCard){

        $data = $paymentCard->all();
        $sessionId = Auth::id();
        $client = Client::findByUser($sessionId);
        $bag = Bag::findOpenBagByClient($client->id);
        $stockItems = StockItem::where('id_bag', true)->get();

        $card = Card::create([
            'card_number' => $data['card_number'],
            'cpf_client' => $data['cpf_client'],
            'card_expire_date' => $data['card_expire_date'],
            'cvv_card' => $data['cvv_card'],
            'id_client' => $client->id,
        ]);

        $this->store();

        return redirect()->route('user.order.payment.message');
    }
}
