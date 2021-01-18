<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function eventPlan(){
        return $this->belongsTo('App\EventPlan');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function seller(){
        return $this->belongsTo('App\Seller');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function transaction(){
        return $this->hasOne('App\Transaction');
    }

    public function rating(){
        return $this->hasOne('App\Rating');
    }
}
