<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $table = 'profiles';

    protected $fillable = [
       'user_id', 'admin_id', 'avatar', 'about', 'facebook'
    ];


    public function user()
{
    return $this->belongsTo(User::class);
}

public function admin()
{
    return $this->belongsTo(Admin::class);
}

}
