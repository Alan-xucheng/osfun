<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use Piece;

class ShowController extends Controller
{
    //
    public function getIndex(){

    	Piece::work();
    }
}
