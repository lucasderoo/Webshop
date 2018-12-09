<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavouritesProduct extends Model
{
  public $timestamps = false;
    protected $fillable = [
        'quantity',
    ];

    public function favourites()
    {
        return $this->belongsTo('App\Favourites');
    }


    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
