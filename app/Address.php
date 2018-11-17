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

    public function order_delivery()
    {
        return $this->HasOne('App\Order', 'address_id');
    }

    public function order_billing()
    {
        return $this->HasOne('App\Order', 'billing_address_id');
    }
}
