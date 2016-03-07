<?php

namespace App\Http\Controllers\Publish;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
    //
    public function getIndex(){

    	return view('user.public.view_search');
    }
}
