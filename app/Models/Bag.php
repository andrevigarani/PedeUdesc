<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
