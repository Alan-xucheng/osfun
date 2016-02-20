<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Http\Request;
use Request;
use Tool;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\category;

class ArticleController extends Controller
{
    //
    public function getIndex(){

    	return '所有文章';

    }
 	
 	public function getCreate(){

 		$data['category'] = category::all();

 		return view('admin.create_article',$data);
 	}

 	public function postApiSave(){


 		$data = array(
 			"title"=>Request::input('title'),
 			'content'=>Request::input('content'),
 			'type'=>Request::input('type'),
 			'modus'=>Request::input('modus'),
 			'category'=>Request::input('category'),
 			'status'=>Request::input('status'),
 			);

 		Article::create($data);

 		


 		return Tool::json_return(0,"save success");

 	}

 	public function getCategory(){

 		$data['category'] = category::all();



 		return view('admin.article_category',$data);

 	}

 	public function postApiCat(){

 		$data = array(
 			"slug"=>Request::input('slug'),
 			'name'=>Request::input('name'),
 			'parent'=>Request::input('parent'),
 			);

 		category::create($data);

 		


 		return Tool::json_return(0,"save success");
 	}



























}
