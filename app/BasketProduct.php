<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model
{
	public $timestamps = false;
    protected $fillable = [
        'quantity',
    ];

    public function basket()
    {
        return $this->belongsTo('App\Basket');
    }


    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
