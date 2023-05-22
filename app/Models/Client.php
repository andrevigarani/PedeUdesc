<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'client';

    protected $fillable = [
        'user',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo{
        return $this->belongsTo(User::class,'id_user');
    }

    public static function findByUser($id){

        $client = self::where('id_user', $id)->first();

        if ($client) {
            return $client;
        }

        return null;
    }
}
