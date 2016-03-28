<?php

namespace App\Http\Controllers\Publish;

use Request;
use App\Http\Controllers\Controller;
use App\Demand;
use App\AlbumCover;
use App\Album;
use App\Category;
use Tool;
use App\UserLike;

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

        $academy_id = Category::where('slug','academy')->first()->id;

        $parent = Category::select('categories.name','categories.id')->where('parent',$academy_id)->get();

        foreach ($parent as $key => $value) {

            
            $parent[$key]['s'] = Category::select('categories.name')->where('parent',$value->id)->get();
        }

        
        return $parent;
       
    }
     public function getDemandCategory(){
        
        $cooperation_id = Category::where('slug','=','cooperation')->first()->id;
        $parent = Category::select('categories.name','categories.id')->where('parent',$cooperation_id)->get();

        foreach ($parent as $key => $value) {

            
            $parent[$key]['s'] = Category::select('categories.name')->where('parent',$value->id)->get();
        }

        
        return $parent;
       
    }

    public function getServiceCategory(){

        $service_id = Category::where('slug','service')->first()->id;

        $parent = Category::select('categories.name','categories.id')->where('parent',$service_id)->get();

        foreach ($parent as $key => $value) {

            
            $parent[$key]['s'] = Category::select('categories.name')->where('parent',$value->id)->get();
        }

        
        return $parent;
       
    }

    public function postPraiseUserinfo(){
        $post_id = Request::input('post_id');
        $user_info = UserLike::select('users.avatar','users.id')
        ->leftJoin('users','users.id','=','user_likes.user_id')
        ->where('post_id','=',$post_id)
        ->get();
        $data['user_info'] = $user_info;

        return $data;

    }

    public function postCommentTemplate(){

        $id = Request::input('post_id');
        $comment = CommentList::select('comment_lists.id','comment_lists.content','comment_lists.ref','comment_lists.created_at','users.name','comment_lists.user_id','users.avatar')
                ->leftJoin('users','users.id','=','comment_lists.user_id')
                ->orderBy('comment_lists.created_at','desc')
                ->where('comment_lists.post_id',$id)
                ->get();
        foreach($comment as $k=>$v){
            if($v->ref){
            $comment[$k]['reply'] = CommentList::select('comment_lists.content','users.name')
                ->leftJoin('users','users.id','=','comment_lists.user_id')
                ->where('comment_lists.id','=',$v->ref)
                ->first();

            }
        }

        $data['comment'] = $comment;

        return $data;   
    }














}
