<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Str;
use Illuminate\Support\Str;
use TypiCMS\NestableTrait;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;



class Category extends Model implements Searchable
{
   use NestableTrait;

    protected $table = 'categories';


    protected $fillable = [
        'name', 'slug','parent_id', 'menu', 'image' , 'status','featured',
    ];

    protected $casts = [
        'parent_id' =>  'integer',
        'menu'      =>  'boolean',
        'status'    =>  'boolean',
        'featured'  =>  'boolean'
    ];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str::slug($value);
    }

    public function parent()
{
    return $this->belongsTo(Category::class, 'parent_id');
}

public function children()
{
    return $this->hasMany(Category::class, 'parent_id');
}
   
/**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function products()
{
    return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
}

public function getSearchResult(): SearchResult
{
     if($this->parent_id == 1)
     {
         
        $url = route('category.showw', $this->name);
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
     }
     else{
    $url = route('category.show', $this->name);
    return new SearchResult(
        $this,
        $this->name,
        $url
    );
     }
}

}