<?php

namespace App\Http\Controllers\Publish;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AcademyController extends Controller
{
    //
    //
   public function getIndex(){

   	
   		return view('user.public.academy_search');
   }


   public function getItem(){

   		return view('user.public.academy_item');
   }
}
