<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $table = 'evaluation';

    public $timestamps = false;

    protected $fillable = [
        'score',
        'comment',
    ];

    public function order(): BelongsTo{
        return $this->belongsTo(Order::class, 'id_order');
    }
}
