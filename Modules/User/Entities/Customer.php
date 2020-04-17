<?php

namespace Modules\User\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//Customer là đại diện cho cơ sở dữ liệu giả User
class Customer extends Authenticatable
{
  use Notifiable;

  protected $guard = 'user';
  public $table = 'customer';
  protected $fillable = [];
  protected $hidden = [
    'password', 'remember_token',
  ];
}
