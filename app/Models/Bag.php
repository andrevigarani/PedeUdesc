<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    use HasFactory;

    protected $table = 'bag';

    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function stockItem(): BelongsTo{
        return $this->belongsTo(StockItem::class);
    }

    /**
     * @return BelongsTo
     */
    public function order(): BelongsTo{
        return $this->belongsTo(Order::class);
    }

    public static function findOpenBagByClient($id)
    {
        $bag = self::where('id_client', $id)->first();

        if (is_null($bag->order())) {
            return $bag;
        }

        return null;
    }
}
