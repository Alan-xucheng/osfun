<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageLog extends Model
{
    //
    protected $fillable = [
        'user_id', 'sender_id', 'receiver_id','send_time',
        'content','type','status',
    ];
}
