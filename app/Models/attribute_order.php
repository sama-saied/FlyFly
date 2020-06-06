<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Attribute
 * @package App\Models
 */
class attribute_order extends Model
{
    /**
     * @var string
     */
    protected $table = 'attribute_order';

   
    protected $fillable = [
        'order_id', 'key_name', 'value'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}