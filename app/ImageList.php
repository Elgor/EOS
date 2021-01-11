<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageList extends Model
{
    protected $fillable = ['path', 'product_id', 'image'];
}
