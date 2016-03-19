<?php

namespace App\Http\Controllers\Publish;

use Request;
use App\Http\Controllers\Controller;
use App\Demand;
use App\AlbumCover;
use App\Album;
use App\Category;
use Tool;

class ApiController extends Controller
{
    //
    //
    public function postUserModal(){
    	$post_id = Request::input('post');
    	$user_id = Request::input('user_id');
    	$data = array();

    	$demand = Demand::select('user_extras.nickname','user_extras.sex','users.avatar','users.id as uid','demands.content','demands.id')

    			->leftJoin('user_extras','demands.user_id','=','user_extras.user_id')

    			->leftJoin('users','demands.user_id','=','users.id')

    			->where('demands.id',$post_id)

    			->first();
    	$album_cover = AlbumCover::where('user_id',$user_id)->orderBy('praise_num')->take(3)->get();

    	foreach($album_cover as $k=>$v){

    		$album_cover[$k]['content'] = Album::where('cover_id',$v->id)->first()->content;
    	}
    	$data['demand'] = $demand;
    	$data['album'] = $album_cover;
    	return $data;
    
    }

    public function getAlbumCategory(){

        $parent = Category::select('categories.name','categories.id')->where('parent','0')->get();

        foreach ($parent as $key => $value) {

            
            $parent[$key]['s'] = Category::select('categories.name')->where('parent',$value->id)->get();
        }

        
        return $parent;
       
    }














}
