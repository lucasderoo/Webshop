<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use App\MusicProduct;
use Laravel\Scout\Searchable;

class Product extends Model
{
    protected $table = 'products';
    
	use Sluggable;
    use Searchable;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function stock()
    {
        return $this->hasOne('App\Stock');
    }
    
    public function images()
    {
        return $this->hasMany('App\Image');
    }


    public function productable()
    {
        return $this->morphTo();
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
