<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [ 
        'amount',
        'status',
        'payment_method',
        'email',
        'firstname',
        'lastname'
    ];

    public function orderproducts()
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function user()
    {
        return $this->BelongsTO('App\User');
    }

    public function address()
    {
        return $this->BelongsTO('App\Address');
    }

    public function billing_address()
    {
        return $this->BelongsTO('App\Address');
    }
}
