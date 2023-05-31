<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\StockItem;
use App\Models\Bag;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BagController extends Controller
{

    public function addProduct(Request $request, $id)
    {

        $stockItem = StockItem::findByProduct($id);

        $sessionId = Auth::id();

        $client = Client::findByUser($sessionId);

        $bag = Bag::findOpenBagByClient($client->id);

        if(is_null($bag)){
            $bag = new Bag();
            $client->bags()->save($bag);
        }

        $stockItem->bag()->associate($bag);

        $stockItem->save();

        return redirect()->route('home');
    }

    public function showBag()
    {
        $client = Client::findByUser(Auth::id());
        $bag = Bag::findOpenBagByClient($client->id);
        $bagItems = DB::table('stock_item')->select([DB::raw('product.name as product_name'), DB::raw('COUNT(*) as quantity'), DB::raw('SUM(product.price) as sub_total')])
                                                ->where('id_bag', '=', $bag->id)
                                                ->leftJoin('product', 'id_product', '=', 'product.id')
                                                ->groupBy(['id_product', 'product.name'])->get();
        return view('user.bag')->with(['bagItems' => $bagItems]);
    }
}
