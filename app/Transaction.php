<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'order_id', 'user_id', 'invoice', 'name', 'bank', 'receipt_downPayment', 'receipt_fullPayment'
    ];


    public function order(){
        return $this->belongsTo('App\Order');
    }
}
