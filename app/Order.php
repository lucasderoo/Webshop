<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    





    public function user()
    {
        return $this->BelongsTO('App\User');
    }
}
