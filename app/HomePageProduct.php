<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePageProduct extends Model
{
	public $timestamps = false;

    public function home_page()
    {
        return $this->belongsTo('App\HomePage');
    }

   	public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
