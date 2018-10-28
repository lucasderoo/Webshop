<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    public $timestamps = false;

	protected $fillable = [
        'name',
    ];

    public function music_products()
    {
        return $this->hasMany('App\MusicProduct');
    }
}
