<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;

use TypiCMS\NestableTrait;


class Category extends Model
{
    use NestableTrait;

    protected $table = 'categories';


    protected $fillable = [
        'name', 'slug', 'menu', 'image'
    ];

    protected $casts = [
     
        'menu'      =>  'boolean'
    ];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str::slug($value);
    }

   
/**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function products()
{
    return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
}


}