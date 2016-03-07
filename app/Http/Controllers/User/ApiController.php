<?php

namespace App\Http\Controllers\User;

//use Illuminate\Http\Request;
use Request;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProfileSocial as Social;
use Auth;
use Tool;
use App\UserSkills as Skills;
use App\UserExtra ;
use App\Tag;
use App\TagMap;
use App\Demand;
class ApiController extends Controller
{
    //
    //
    public function postApiSocial(){

    	$user_id = Request::input('user_id');

    	if($user_id != Auth::guard('user')->user()->id){

    		abort(403);
    	}

    	$name = Request::input('name');

    	$value = Request::input('value');

    	$social = Social::where('user_id',$user_id)->first();

    	if(!empty($social)){

    		$social->user_id = $user_id;

    		$social-> $name = $value;

    	}else{

    		$social = new Social;

    		$social->user_id = $user_id;

    		$social->$name = $value;
    		
    	}
    		$social ->save();

    }

    public function postApiSkills(){

    	$user_id = Auth::guard('user')->user()->id;

    	$input = Request::all();

    	Skills::where('user_id',$user_id)->delete();

    	foreach ($input as $key => $value) {
    		
    		$skills  = new Skills();

    		$skills->user_id =$user_id;

    		$skills->name = $value['value'];

    		$skills->mark = $value['mark'];

    		$skills->save();
    	}

    	return Tool::json_return(0,"save success");

    }

    public function postApiInfo(){

    	$user_id = Auth::guard('user')->user()->id;

    	$nickname = Request::input('nickname');

    	$sex = Request::input('sex');

    	$desc = Request::input('desc');

    	$age = Request::input('age');

    	$userExtra = UserExtra::where('user_id',$user_id)->first();

    	if(!empty($userExtra)){

    		$userExtra->nickname = $nickname;

    		$userExtra->sex = $sex;

    		$userExtra->desc = $desc;

    		$userExtra->age = $age;
    	}else{

    		$userExtra = new UserExtra();

    		$userExtra->nickname = $nickname;

    		$userExtra->sex = $sex;

    		$userExtra->desc = $desc;

    		$userExtra->age = $age;
    	}

    		$userExtra->user_id = $user_id;
    	 	$userExtra->save();

    	 	return Tool::json_return(0,'success');


    }
    public function postApiDemand(){

    	$title = Request::input('title');
    	$start_time = Request::input("start_time");
    	$end_time = Request::input("end_time");
    	$end_time = Request::input("end_time");
    	$tags = Request::input("tags");
    	$desc = Request::input('desc');
    	$content = Request::input('content');
    	$user_id  = Auth::guard('user')->user()->id;
    	// 储存需求
    	$demand = new Demand();

    	$demand ->title = $title;
    	$demand ->user_id = $user_id;
    	$demand ->tags = $tags;
    	$demand ->start_time = strtotime($start_time);
    	$demand ->end_time =strtotime($end_time);
    	$demand ->desc = $desc;
    	$demand ->content = $content;

    	$demand->save();
    	//处理tag
    	$tags_array =  explode(',', $tags);

    	$this->deal_tags($tags_array,$demand->id);

    	return Tool::json_return(0,'success');

    }
    public function deal_tags ($tags,$id){

    	if(!empty($tags)){

    		foreach ($tags as $k => $v) {
    			
    			$tag = Tag::firstOrCreate(['tag_name'=>$v]);
    			$tag->increment('num');

    			$map = new TagMap();
    			$map->tag_id = $tag->id;
    			$map->post_id = $id;
    			$map->type = 'demand';
    			$map->save();
    		}
    	}



    }
    public function postApiImage(){


    	// return Request::all();
    	   $encoded = Request::input('image-data');

    	   //decode the url, because we want to use decoded characters to use explode
    	   // $decoded = urldecode($encoded);

    	   //explode at ',' - the last part should be the encoded image now
    	   $exp = explode(',', $encoded);

    	   //we just get the last element with array_pop
    	   $base64 = array_pop($exp);


    	   //decode the image and finally save it
    	   $data = base64_decode($base64);


    	   $file_name = uniqid(time());

    	   $fileDir = Tool::_get_file_path();

    	   $url = $fileDir.$file_name.'.jpg';	
    	   // return $url;
    	


    	   //make sure you are the owner and have the rights to write content
    	   $a = file_put_contents("./".$url, $data);

    	   if($a){

    	   	   $user = Auth::guard('user')->user();

	    	   $user->avatar = url($url);

	    	   $user->save();
    	   }

    	   return Tool::json_return(0,url($url));

    	   
    }




























}
