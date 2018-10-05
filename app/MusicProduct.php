<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicProduct extends Model
{
    //
	protected $table = 'music_products';

	public function productParent()
    {
        return $this->morphMany('App\Product', 'productable');
    }
}
