<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourites extends Model
{
  public $timestamps = false;

    public function favouritesproducts()
    {
        return $this->hasMany('App\FavouritesProduct');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
