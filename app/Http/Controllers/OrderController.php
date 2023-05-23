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

            $qrcode = $this->generateQrCode('Texto do QR Code PIX');

            $pixKey = $this->generatePixKey();

            return view('user.paymentPixOrder')->with(['payment' => $idPayment, 'qrcode' => $qrcode, 'totalPrice' => $sum, 'pixKey' => $pixKey]);
        
        } else if($data['payment_method'] == 'c'){

            return view('user.paymentCardOrder')->with(['payment' => $idPayment]);
        } else {

            $order = Order::create([
                'date_order_closure' => now(),
            ]);

            return view('home');
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

    public function generateQrCode()
    {
    $text = 'Hello, World!'; // Texto para o qual você deseja gerar o QR code

    $data = 'data:image/png;base64,'.base64_encode($this->generateQrCodeImage($text));

    return response()->json(['qrcode' => $data]);
    }

    private function generateQrCodeImage($text)
    {
    // Definir o tamanho do QR code
    $size = 300;

    // Criar uma imagem em branco
    $image = imagecreatetruecolor($size, $size);

    // Definir as cores do QR code (preto e branco)
    $black = imagecolorallocate($image, 0, 0, 0);
    $white = imagecolorallocate($image, 255, 255, 255);

    // Preencher a imagem com a cor branca
    imagefilledrectangle($image, 0, 0, $size, $size, $white);

    // Converter o texto para dados binários
    $data = utf8_encode($text);

    // Gerar o QR code manualmente
    $rows = str_split($data, 3);
    foreach ($rows as $rowIndex => $row) {
        $columns = str_split($row, 1);
        foreach ($columns as $columnIndex => $column) {
            if ($column === '1') {
                $x1 = $columnIndex * ($size / count($columns));
                $y1 = $rowIndex * ($size / count($rows));
                $x2 = $x1 + ($size / count($columns));
                $y2 = $y1 + ($size / count($rows));
                imagefilledrectangle($image, $x1, $y1, $x2, $y2, $black);
            }
        }
    }

    // Renderizar a imagem como um PNG e retornar os dados binários
    ob_start();
    imagepng($image);
    $data = ob_get_contents();
    ob_end_clean();

    return $data;
    }
}
