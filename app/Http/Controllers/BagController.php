<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Support\Facades\Cookie;

use Illuminate\Cookie\CookieJar;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

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
        $cookie = Cookie::withCookie('id_user', $clientId, 1440); // Define o cookie com 1 dia de duração (1440 minutos)
        $productBag[$clientId] = []; // Crie uma entrada vazia na sacola para o novo cliente
    }

    // Adicione o produto à sacola
    $productBag[] = [
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        //'img' => $img->img
    ];

    // Crie uma nova resposta
    $response = new Response('Produto adicionado à sacola!');

    // Armazene os produtos atualizados no cookie
    $response->cookie('bag', json_encode($productBag));

    return redirect()->route('bag.show');
    }

    public function showBag()
    {
    // Obtenha o ID do cliente da sessão
    $clientId = session()->get('id_user');;

    // Recupere os produtos da sacola do cliente específico
    $productBag = json_decode(request()->cookie('bag'), true)[$clientId] ?? [];

    // Exiba os produtos da sacola na view
    return request()->cookie('id_user');
    }

}
