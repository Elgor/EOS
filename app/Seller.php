<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Seller extends Authenticatable
{
    use AuthenticableTrait;

    protected $guard = 'seller';

    protected $fillable = [
        'business_name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function comments()
    {
        return $this->morphMany('App\Rating', 'commentable');
    }



    //HAS MANY
    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function product()
    {
        return $this ->hasMany('App\Product');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }

    //BELONGS TO
    public function city()
    {
        return $this ->belongsTo('App\City');
    }
}
