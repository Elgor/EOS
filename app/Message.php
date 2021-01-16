<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function seller(){
        return $this->belongsTo('App\Seller');
    }

    public function messageDetails(){
        return $this->hasMany('App\MessageDetail');
    }
}
