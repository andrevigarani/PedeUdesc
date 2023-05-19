<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(StoreProduct $createProduct)
    {
        $data = $createProduct->all();

        if (isset($data['img'])) {
            $data['img'] = base64_encode($data['img']->get());
        }

        Product::create($data);

        return redirect()->route('home');
    }

    public function create()
    {

        return view('admin.product.create');
    }

    public function edit($id)
    {

        $product = Product::find($id);

        if (!$product) {
            // Lógica para lidar com o produto não encontrado
        }

        return view('admin.product.update', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            // Lógica para lidar com o produto não encontrado
        }

        $product->nome = $request->input('nome');
        $product->descricao = $request->input('descricao');
        // Atualize os outros campos do produto conforme necessário

        $product->save();

        // Redirecione para a página de listagem de produtos ou qualquer outra página desejada
    }

    public function show()
    {
        return view('admin.product.update');
    }

    public function showHome()
    {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }

    public function showAdminHome()
    {
        $products = Product::all();
        return view('admin.admin', ['products' => $products]);
    }
}
