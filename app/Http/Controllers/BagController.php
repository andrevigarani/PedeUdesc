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

        $client = Client::findByUser(Auth::id());
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
        return view('user.bag')->with(['bagItems' => $bag->getBagCheckout()]);
    }

    public function updateBag(Request $request)
    {
        $data = $request->all();
        dd($data);
        return redirect()->route('user.show.bag');
    }
}
