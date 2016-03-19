<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumCover extends Model
{
    //
    protected $fillable = [
        'user_id', 'album_id', 'title','img','post_time','status',
        'parise_num','type','desc'
    ];
}
