<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageList extends Model
{
    //
    //
    protected $fillable = [
        'user_id', 'sender_id', 'receiver_id','send_time',
        'num','type',
    ];
}
