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
    
    public function addProduct($id)
    {
    // Obtenha o produto com base no ID
    $product = Product::find($id);

    // Recupere os produtos existentes no cookie
    $productBag = json_decode(request()->cookie('bag'), true) ?? [];

    // Obtenha o ID do cliente do cookie
    $clientId = Cookie::get('id_user');

    // Se o ID do cliente não estiver no cookie, crie um novo ID aleatório
    if (!$clientId) {
        $clientId = uniqid(); // Gera um ID único
        $cookie = Cookie::make('id_user', Str::uuid(), 1440, '/', '.pedeudesc.test'); // Define o cookie com 1 dia de duração (1440 minutos)
        $productBag[$clientId] = []; // Crie uma entrada vazia na sacola para o novo cliente
    }

    // Adicione o produto à sacola
    $productBag[] = [
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        //'img' => $img->img
    ];

    $response = new Response();

    $response->setContent(json_encode(['message' => 'Produto adicionado à sacola']));

    $response->setStatusCode(200);

    // Armazene os produtos atualizados no cookie
    $response->cookie('bag', json_encode($productBag));

    return redirect()->route('bag.show');
    }

    public function showBag()
    {
    // Obtenha os produtos da sacola do cookie
    $productBag = json_decode(request()->cookie('bag'), true) ?? [];

    // Exiba os produtos da sacola na view
    return view('user.bag', compact('productBag'));
    }
}
