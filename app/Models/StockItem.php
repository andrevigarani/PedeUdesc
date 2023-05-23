<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockItem extends Model
{
    use HasFactory;

    protected $table = 'stock_item';

    public $timestamps = false;

    protected $fillable = [
        'id_product',
        'quantity'
    ];

    public function bag()
    {
        return $this->belongsTo(Bag::class,'id_bag');
    }

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class,'id_product');
    }

    public static function findByProduct($id)
    {
        $stockItem = self::where('id_product', $id)->whereNull('id_bag')->first();

        if ($stockItem) {
            return $stockItem;
        }

        return null;
    }
}
