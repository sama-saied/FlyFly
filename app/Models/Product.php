<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

use App\Filters\ProductFilter;

use Illuminate\Database\Eloquent\Builder;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements Searchable
{
    use Rateable;


    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'brand_id','category_id',  'name',  'slug','description', 'quantity',
         'price', 'sale_price' ,'featured','shipping'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'quantity'  =>  'integer',
        'brand_id'  =>  'integer',
        'category_id'=>  'integer',
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
/*public function categories()
{
    return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
}*/

public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
   /* public function comments()
    {
        return $this->hasMany(Comment::class);
    }*/

    public function scopeFilter(Builder $builder, $request)
    {
        return (new ProductFilter($request))->filter($builder);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }



    public function getSearchResult(): SearchResult
    {
        $url = route('product.show', $this->name);
     //   $image = route('k', $this->name);
        return new SearchResult(
            $this,
            $this->name,
            $url
          //  $image
        );
    }
}