<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
        'features' => 'array',
    ];

    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }

    public function imageList()
    {
        return $this->hasMany('App\ImageList');
    }
}
