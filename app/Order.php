<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [ 
        'amount',
        'status',
        'payment_method',
    ];





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
