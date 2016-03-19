<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    //
    //
    protected $fillable = [
        'function', 'user_id', 'group_name',
    ];
}
