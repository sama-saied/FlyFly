<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',  'parent_id',  'image'
    ];

    protected $casts = [
        'parent_id' =>  'integer'
    ];

    public function setNameAttribute($value)
{
    $this->attributes['name'] = $value;
    
}

public function parent()
{
    return $this->belongsTo(Category::class, 'parent_id');
}

public function children()
{
    return $this->hasMany(Category::class, 'parent_id');
}


}