<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    use HasFactory;

    protected $table = 'stock_item';

    public $timestamps = false;

    public function bag()
    {
        return $this->hasOne(Bag::class,'id_bag');
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id_product');
    }
}
