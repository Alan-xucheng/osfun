<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    //
    protected $fillable = ['user_id','category','service_desc','service_type',

    'size','province','city','country','true_name','front_id','back_id',
    ];
}
