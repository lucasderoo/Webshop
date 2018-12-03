<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }


    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
