<?php

namespace App\Http\Controllers\Publish;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    //
    public function getIndex(){

        return view('user.public.group_detail');
    }
}
