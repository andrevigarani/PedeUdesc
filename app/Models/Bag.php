<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Bag extends Model
{
    use HasFactory;

    protected $table = 'bag';

    public $timestamps = false;

    protected $fillable = [
        'user',
    ];

    public function stockItem(){
        return $this->hasMany(StockItem::class, 'id_client');
    }

    public function order(): BelongsTo{
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function client(): hasOne{
        return $this->hasOne(Client::class, 'id_client');
    }

    public static function findOpenBagByClient($id)
    {
        $bag = self::where('id_client', $id)->first();

        if (!is_null($bag)) {
            if(!$bag->order()->exists()) {
                return $bag;
            }
        }

        return null;
    }

    public function getBagCheckout()
    {
        return DB::table('stock_item')->select([
                                                DB::raw('product.img as product_image'),
                                                DB::raw('product.id as product_id'),
                                                DB::raw('product.name as product_name'),
                                                DB::raw('COUNT(*) as quantity'),
                                                DB::raw('SUM(product.price) as sub_total')
                                            ])
                                           ->where('id_bag', '=', $this->id)
                                           ->leftJoin('product', 'id_product', '=', 'product.id')
                                           ->groupBy(['product.img', 'product.id', 'id_product', 'product.name'])->get();
    }
}
