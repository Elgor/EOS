<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageList extends Model
{
    protected $fillable = ['path', 'product_id', 'image'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
