<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
	public $timestamps = false;

    public function basketproducts()
    {
        return $this->hasMany('App\BasketProduct');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
