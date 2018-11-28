<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
	public $timestamps = false;

	protected $fillable = [ 
        'title', 'displayed'
    ];
    public function products()
    {
        return $this->hasMany('App\HomePageProduct');
    }
}
