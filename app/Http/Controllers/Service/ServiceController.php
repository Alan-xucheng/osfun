<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    //
    public function __construct(){
    	$this->middleware('auth:service');
    }
    public function getIndex(){
    	dd(1);
    }
}
