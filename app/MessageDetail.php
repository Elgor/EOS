<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageDetail extends Model
{
    public function message(){
        return $this->belongsTo('App\message');
    }
}
