<?php

namespace App\Http\Controllers;

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\StockItem;
use App\Models\Bag;
use App\Models\Payment;
use App\Http\Requests\OrderPayment;
use App\Http\Requests\PaymentCard;
use App\Models\Card;
use Illuminate\Support\Facades\App;

class PaymentController extends Controller
{
    public function orderPayment(OrderPayment $orderPayment)
    {

        $data = $orderPayment->all();
        $idPayment = $data['payment_method'];
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

        if ($data['payment_method'] == "2") {
            $pixKey = $this->generatePixKey();

            return view('user.paymentPixOrder')->with(['idPayment' => $idPayment, 'totalPrice' => $sum, 'pixKey' => $pixKey,]);
        } else if ($data['payment_method'] == "1") {

            return view('user.paymentCardOrder')->with(['payment' => $idPayment]);
        } else {

            $orderController = new OrderController();

            $orderController->store($idPayment);

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

    public function cardStore(PaymentCard $paymentCard)
    {

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

        $orderController = new OrderController();
        $orderController->store("1");

        return redirect()->route('user.order.payment.message');
    }

    public function pixStore()
    {
        $orderController = new OrderController();
        $orderController->store("2");
        return redirect()->route('user.order.payment.message');
    }
}
