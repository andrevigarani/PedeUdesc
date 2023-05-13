<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(StoreProduct $createProduct){
        $data = $createProduct->all();

        if(isset($data['img'])) {
            $data['img'] = base64_encode($data['img']->get());
        }

        Product::create($data);

        return redirect()->route('home');
    }

    public function create(){

        return view('admin.product.create');
    }
}
