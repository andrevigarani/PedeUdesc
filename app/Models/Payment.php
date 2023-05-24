<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';

    public $timestamps = false;

    protected $fillable = [
        'payment_type',
    ];

    public function order(): BelongsTo{
        return $this->hasMany(Order::class, 'id_order');
    }
}
