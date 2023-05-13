<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'card';

    public $timestamps = false;

    protected $fillable = [
        'card_number',
        'cpf_client',
        'card_expire_date',
        'cvv_card',
    ];
}
