<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Str;
use Illuminate\Support\Str;

class Cartt extends Model 
{
    protected $table = 'cart';


    protected $fillable = [
        'product_id', 'user_id'
    ];

    public function  user()
    {
        return $this->belongsTo(User::class);
    }


}