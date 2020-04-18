<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;


class Product extends Model
{
  //  use Rateable;


    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'brand_id',  'name',  'slug','description', 'quantity',
         'price', 'sale_price' , 'status','featured',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'quantity'  =>  'integer',
        'brand_id'  =>  'integer',
        'status'    =>  'boolean',
        'featured'  =>  'boolean'

    ];

     /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
   /* public function comments()
    {
        return $this->hasMany(Comment::class);
    }*/
}