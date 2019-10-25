<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','body','author'];

    function comment()
    {
        return $this->hasMany('App\Comment');
    }

function user()
    {
        return $this->belongsTo('App\User','author');
    }
}
