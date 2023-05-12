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
    public $timestamps = false;

    protected $fillable = ["nome_produto"];

    protected $primaryKey = "id_produto";

}
