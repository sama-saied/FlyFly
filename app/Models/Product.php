<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'brand_id',  'name',  'description', 'quantity',
        'weight', 'price', 'sale_price', 
    ];

    /**
     * @var array
     */
    protected $casts = [
        'quantity'  =>  'integer',
        'brand_id'  =>  'integer',
    ];

     /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function images()
{
    return $this->hasMany(ProductImage::class);
}

/**
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function attributes()
{
    return $this->hasMany(ProductAttribute::class);
}

/**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function categories()
{
    return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
}

}