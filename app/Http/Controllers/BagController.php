<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\StockItem;
use App\Models\Bag;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

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
        $fields = $request->all();
        unset($fields['_token']);
        $client = Client::findByUser(Auth::id());
        $bag = Bag::findOpenBagByClient($client->id);
        foreach ($fields as $name => $quantity) {
            $productId = preg_replace('/[^0-9]/', '', $name);
            $items = StockItem::where([['id_bag', $bag->id], ['id_product', $productId]])->get();
            if (sizeof($items) > $quantity) {
                $amount = sizeof($items) - 1;
                for ($i = sizeof($items) - $quantity; $i > 0; $i--) {
                    $stockItem = $items[$amount--];
                    $stockItem->bag()->dissociate();
                    $stockItem->save();
                }
            } else if (sizeof($items) < $quantity) {
                for ($i = $quantity - sizeof($items); $i > 0; $i--) {
                    $stockItem = StockItem::findByProduct($productId);
                    if (!$stockItem) {
                        break;
                    }
                    $stockItem->bag()->associate($bag);
                    $stockItem->save();
                }
            }
        }

        return redirect()->route('user.show.bag');
    }
}
