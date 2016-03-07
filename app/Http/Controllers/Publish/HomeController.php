<?php

namespace App\Http\Controllers\Publish;

// use Illuminate\Http\Request;
use Request;
// use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use App\TagMap;
use App\Demand;

class HomeController extends Controller
{
    //
    //
    //
    public function getIndex(){

    	$tag_id  = Request::input('tag');
    	if(!empty($tag_id)){

    		$post_id = TagMap::where('tag_id',$tag_id)->where('type','demand')->pluck('post_id');

    		$post = collect(array());

    		foreach ($post_id as $key => $value) {
    			
    			$item = Demand::select('demands.title','demands.tags','demands.desc','demands.end_time','user_extras.nickname','user_extras.sex','users.avatar')

    					->leftJoin('user_extras','demands.user_id','=','user_extras.user_id')

    					->leftJoin('users','demands.user_id','=','users.id')

    					->where('demands.id','=',$value)

    					->first();

    			$post->push($item);
    		}

    		
    	}else{

    		$post = Demand::select('demands.title','demands.tags','demands.desc','demands.end_time','user_extras.nickname','user_extras.sex','users.avatar')

    				->leftJoin('user_extras','demands.user_id','=','user_extras.user_id')

    				->leftJoin('users','demands.user_id','=','users.id')

    				->get();
    	}


    	$tags = Tag::orderBy('num','desc')->take(20)->get();

    	$post = $post -> each(function($item,$key){

    	      return  $item['tags'] = explode(',', $item['tags']);
    	});

    	$data['tags'] = $tags;
    	$data['posts'] = $post;

    	return view('user.public.index',$data);
    }
}
