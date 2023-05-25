<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * @var bool
     */
    protected $table = 'product';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'type',
        'img'
    ];

    /**
     * @return BelongsTo
     */
    public function stockItem()
    {
        return $this->hasMany(StockItem::class);
    }
}
