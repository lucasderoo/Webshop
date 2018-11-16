<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'street', 'house_number', 'suffix', 'zipcode', 'city', 'country'
    ];


    public function user()
    {
        return $this->BelongsTO('App\User');
    }
}
