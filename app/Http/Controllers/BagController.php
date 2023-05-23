<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\StockItem;
use App\Models\Bag;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

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
        $stockItems = StockItem::where('in_bag', true)->get();

        return view('user.bag')->with(['stockItems' => $stockItems]);
    }
}
