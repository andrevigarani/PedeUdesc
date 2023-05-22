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

        $stockItem = StockItem::find($id);

        if (!$stockItem) {
            dd('Produto não encontrado.');
        }

        $stockItem->in_bag = true;
        $stockItem->save();

        return redirect()->route('user.show.bag');
    }

    public function showBag()
    {
        $stockItems = StockItem::where('in_bag', true)->get();

        return view('user.bag')->with(['stockItems' => $stockItems]);
    }
}
