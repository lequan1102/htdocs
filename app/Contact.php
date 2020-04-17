<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    public $timestamps = false;
    protected $table = 'contact';
    protected $fillable = ['full_name', 'number_phone', 'messages', 'location', 'code_discount', 'course', 'created_at'];
}
