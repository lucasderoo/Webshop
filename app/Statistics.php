<?php

namespace App;

use Illuminate\Database\Eloquent\Model;




class Statistics extends Model
{
  protected $table = 'products';



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
  public function products(){
    $products = App\Product::all();
    return $products->toArray();
  }
}


}
