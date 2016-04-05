<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupUserRelation extends Model
{
    //
    //
    protected $fillable = ['user_id','group_id','status'];
}
