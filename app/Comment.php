<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
//protected $with = ['user'];
     protected $fillable=['body','author','post_id'];
 function user()
    {
        return $this->belongsTo('App\User','author');
    }

     function post()
    {
        return $this->belongsTo('App\Post');
    }

}
