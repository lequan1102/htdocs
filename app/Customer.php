<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = "customer";

    protected $table = 'customer';

    protected $fillable = ['name', 'email', 'password', 'gender', 'date', 'city', 'location', 'avatar'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
