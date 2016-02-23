<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Http\Request;
use Request;
use Tool;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\category;
use App\ArticleAttach;
use Redis;
class ArticleController extends Controller
{
    //
    public function getIndex(){

    	
    	return view('admin.article');

    }
 	
 	public function getCreate(){

 		$post = new Article();
 		$post->save();
 	    $data['post_id'] = $post->id;
 		$data['category'] = category::all();

 

 		return view('admin.create_article',$data);
 	}

 	public function postApiSave($id){

 	
 		$article = Article::find($id);
 		$data = array(
 			"title"=>Request::input('title'),
 			'content'=>Request::input('content'),
 			'type'=>Request::input('type'),
 			'modus'=>Request::input('modus'),
 			'category'=>Request::input('category'),
 			'status'=>Request::input('status'),
 			);

 		$article->update($data);

 		


 		return Tool::json_return(0,"save success");

 	}

 	public function getCategory(){

 		$data['category'] = category::all();

 		return view('admin.article_category',$data);

 	}
 	public function postUpload($id){
 		
 		$result = Tool::_upload_file('file','file');

 		$attach = new ArticleAttach();

 		$attach->article_id = $id;
 		$attach->type = $result['type'];
 		$attach->src = $result['url'];
 		$attach->save();

 		return Tool::json_return(0,'ok');		

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

 	public function postApiTest(){
 		
 		    
 			$postId = Redis::incr("posts:count");

 			$isSlugAvailable = Redis::hsetnx("slug.to.id",Request::input('slug'),$postId);

 			if($isSlugAvailable == 0){
 				return Tool::json_return(-1,"slug 重复");
 			}

 			Redis::hset('post:'.$postId.":name","name",Request::input('name'));
 			Redis::hset('post:'.$postId.":slug","slug",Request::input('slug'));


 			


 			return  Tool::json_return(0,"ok");


 	}



























}
