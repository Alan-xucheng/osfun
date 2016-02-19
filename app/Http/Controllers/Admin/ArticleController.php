<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //
    public function getIndex(){

    	return '所有文章';

    }
 	
 	public function getCreate(){

 		return view('admin.create_article');
 	}

}
