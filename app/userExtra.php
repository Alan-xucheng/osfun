<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userExtra extends Model
{
    //
     protected $fillable = [
        'user_id', 'nickname', 'birth','sex','sign','province','city','country',
    ];
}
