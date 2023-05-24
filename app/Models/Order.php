<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    public $timestamps = true;

    protected $fillable = [
        'date_order_closure',
        'id_bag',
        'id_payment'
    ];

    public function bag(): BelongsTo{
        return $this->belongsTo(Bag::class, 'id_bag');
    }

    public function payment(): BelongsTo{
        return $this->belongsTo(Payment::class, 'id_payment');
    }
}
