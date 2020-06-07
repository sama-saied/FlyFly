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
        'order_item_id', 'key_name', 'value'
    ];

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }

    public static function add($id,$value,$key)
    {
        $orderAttribute = new attribute_order;
        $orderAttribute->order_item_id = $id;
        $orderAttribute->key_name = $key;
        $orderAttribute->value = $value;

       $orderAttribute->save();   
    }
}