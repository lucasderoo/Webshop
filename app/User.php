<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $rememberTokenName = 'user_remember_me_token';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'user_account_type', 'user_activated', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function member()
    {
        return $this->hasOne('App\Member');
    }

    public function basket()
    {
        return $this->hasOne('App\Basket');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function addresses(){
        return $this->hasMany('App\Address');
    }
}
