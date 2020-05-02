<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'address', 'city', 'country','phone_number',
    ];

    /**
 * @return string
 */
public function getFullNameAttribute()
{
    return $this->first_name. ' '. $this->last_name;
}

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
{
    return $this->hasMany(Order::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}

public function profile()
{
    return $this->hasOne(Profile::class);
}

public function cartt()
    {
        return $this->hasOne(Cartt::class);
    }
}
