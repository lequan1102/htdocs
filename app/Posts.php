<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    protected $table = 'posts';
    public function category()
    {
        return $this->belongsTo('App\Categories');
    }
}