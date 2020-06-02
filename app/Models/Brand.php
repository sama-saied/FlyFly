<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
/**
 * Class Brand
 * @package App\Models
 */
class Brand extends Model implements Searchable
{
    /**
     * @var string
     */
    protected $table = 'brands';

    /**
     * @var array
     */
    protected $fillable = ['name','slug', 'logo'];

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str::slug($value);
    }

    /**
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function products()
{
    return $this->hasMany(Product::class);
}

public function getSearchResult(): SearchResult
{
    $url = route('brand.show', $this->name);
    $image = route('k', $this->name);
    return new SearchResult(
        $this,
        $this->name,
        $url,
        $image
    );
}

}