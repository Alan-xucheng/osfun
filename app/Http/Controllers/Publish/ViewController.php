<?php

namespace App\Http\Controllers\Publish;

use Request;
use App\AlbumCover;
use App\Album;
use App\UserExtra;
use App\Http\Controllers\Controller;
use Auth;
use App\UserLike;
use App\CommentList;

class ViewController extends Controller
{


   public function getDetail($id=null){

   		if(empty($id)){
   			abort(404);
   		}		
        if(Auth::guard('user')->check()){
        	$user_id = Auth::guard('user')->user()->id;
        	$like = UserLike::where('user_id',$user_id)->where('post_id',$id)->first();
          if(!empty($like)){
            $data['user_like'] = true;
          }
        	
        }
      AlbumCover::find($id)->increment('view');  

    	$cover = AlbumCover::select('album_covers.media','album_covers.desc','album_covers.title','album_covers.img','album_covers.post_time','album_covers.praise_num','user_extras.nickname as name','album_covers.id','users.avatar','user_extras.sign','album_covers.user_id as uid','album_covers.view')
		    	->leftJoin('users','users.id','=','album_covers.user_id')
          ->leftJoin('user_extras','user_extras.user_id','=','album_covers.user_id')
		    
		    	->where('album_covers.id',$id)
			->first();
		$album = Album::where('cover_id',$id)->first();	

    $comment_paginate = config('app.comment_paginate');

    	$comment = CommentList::select('comment_lists.id','comment_lists.content','comment_lists.ref','comment_lists.created_at','user_extras.nickname as name','comment_lists.user_id','users.avatar','users.id as uid')
    			->leftJoin('users','users.id','=','comment_lists.user_id')
          ->leftJoin('user_extras','user_extras.user_id','=','comment_lists.user_id')
    			->orderBy('comment_lists.created_at','desc')
    			->where('comment_lists.post_id',$id)
    			->paginate($comment_paginate);
    	foreach($comment as $k=>$v){
    		if($v->ref){
    		$comment[$k]['reply'] = CommentList::select('comment_lists.content','users.name')
    			->leftJoin('users','users.id','=','comment_lists.user_id')
    			->where('comment_lists.id','=',$v->ref)
    			->first();

    		}
    	}	

		$data['cover'] = $cover;	
		$data['album'] = $album;
    $data['comments'] = $comment;

   		if($cover->media == 'video'){
          return view('user.public.page_video',$data);
        }else{
          return view('user.public.page_article',$data);
        }
   }


   public function getPostTask(){
   		
   		return view('user.public.post_task');
   }



}
