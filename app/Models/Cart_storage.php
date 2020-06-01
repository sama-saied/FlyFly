<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Attribute
 * @package App\Models
 */
class Cart_storage extends Model
{
    /**
     * @var string
     */
    protected $table = 'cart_storage';

   
    protected $fillable = [
        'cart_id', 'key_name', 'value'
    ];

    public function attribute()
    {
        return $this->belongsTo(Cartt::class);
    }

}