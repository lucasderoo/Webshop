<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicProduct extends Model
{
    //

    public $timestamps = false;
	protected $table = 'music_products';

	public function productParent()
    {
        return $this->morphMany('App\Product', 'productable');
    }

    public function carrier()
    {
        return $this->belongsTo('App\Carrier');
    }

    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
}
