<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockItem;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    public function store(StoreProduct $createProduct)
    {
        $data = $createProduct->all();

        if (isset($data['img'])) {
            $data['img'] = base64_encode($data['img']->get());
        }

        $product = Product::create($data);

        for ($i = 0; $i < $data['quantity']; $i++) {
            StockItem::create([
                'id_product' => $product->id
            ]);
        }

        return redirect()->route('admin.product.create');
    }

    public function create()
    {

        return view('admin.product.create');
    }

    public function edit($id)
    {

        $product = Product::find($id);

        return view('admin.product.update', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            dd('voce tentou colocar um produto inexistente');
        }

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->type = $request->input('type');
        $product->quantity = $request->input('quantity');

        $product->save();
        return redirect()->route('admin.home');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if (!$product) {
            dd('Você tentou remover um produto inexistente');
        }

        $product->delete();

        return redirect()->route('admin.home');
    }

    public function show()
    {
        return view('admin.product.update');
    }

    public function showHome()
    {
        $foods = Product::all()->where('type', 'c');
        $drinks = Product::all()->where('type', 'b');

        return view('home', ['foods' => $foods], ['drinks' => $drinks]);
    }

    public function showAdminHome()
    {
        $foods = Product::all()->where('type', 'c');
        $drinks = Product::all()->where('type', 'b');

        return view('admin.admin', ['foods' => $foods], ['drinks' => $drinks]);
    }
}
