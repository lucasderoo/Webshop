<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class MusicProduct extends Model
{
    //
    // use Searchable;

    protected $fillable = [
        'release_date',
        'description',
        'artist',
        'genre',
        'carrier_id'
    ];

    public $timestamps = false;
	protected $table = 'music_products';

	public function productable()
    {
        return $this->morphOne('App\Product', 'productable');
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
