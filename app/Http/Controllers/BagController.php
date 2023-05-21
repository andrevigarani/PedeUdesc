<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Support\Facades\Cookie;

use  Illuminate\Routing\ResponseFactory;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Illuminate\Support\Str;

class BagController extends Controller
{

    public function addProduct(Request $request, $id)
    {

        $product = Product::find($id);
        // Recupere os produtos existentes no cookie
        $productBag = json_decode(request()->cookie('bag'), true) ?? [];

        // Obtenha o ID do cliente do cookie
        $clientId = Cookie::get('id_user');

        // Se o ID do cliente não estiver no cookie, crie um novo ID aleatório
        if (!$clientId) {
            $clientId = uniqid(); // Gera um ID único
            $cookie = Cookie::make('id_user', Str::uuid(), 1440, '/', '.pedeudesc.test'); // Define o cookie com 1 dia de duração (1440 minutos)
            $productBag = []; // Crie uma entrada vazia na sacola para o novo cliente
        }

        // Adicione o produto à sacola
        $productBag[] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $product->quantity
        ];

        $response = new Response();

        // Armazene os produtos atualizados no cookie
        $response->cookie('bag', json_encode($productBag));

        return redirect()->route('user.show.bag');
    }

    public function showBag()
    {
        // Obtenha os produtos da sacola do cookie
        $productBag = json_decode(request()->cookie('bag'), true) ?? [];

        dd($productBag);
        return view('user.bag')->with(['productBag' => $productBag]);
    }
}
