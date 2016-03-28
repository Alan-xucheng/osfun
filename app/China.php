<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class China extends Model
{
    //
    protected $table = 'china';
    protected $fillable = [
        'id','name','pid',
    ];
}
