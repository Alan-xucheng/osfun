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
    //
    public function getIndex($type='all',$sort='hot'){
    	
    	if(!empty(Request::input('type'))){

    		$type = Request::input('type');
    	}
    	if(!empty(Request::input('sort'))){

    		$sort = Request::input('sort');
    	}


	    	$cover = AlbumCover::select('album_covers.type','album_covers.desc','album_covers.title','album_covers.img','album_covers.post_time','album_covers.praise_num','users.name','album_covers.id')
			    	->leftJoin('users','users.id','=','album_covers.user_id')
			    	
			    	->where(function($query)use($type,$sort){
		    		if($type!='all'){
		    			$query->where('album_covers.type','=',$type);
		    		}
		    		

		    		})
    			->get();

    		switch ($sort) {
    				case 'new':
    					$cover = $cover->sortByDesc(function($item , $key){

		    				return $item->post_time;
		    			});
    					break;
    				case 'comment':
    					foreach ($cover as $key => $value) {
    						$cover[$key]['num'] =count(CommentList::where('post_id',$value->id)->get());
    					}
    					$cover = $cover->sortByDesc(function($item , $key){

		    				return $item->num;
		    			});


    					break;	
    				
    				default:
    					$cover = $cover->sortByDesc(function($item , $key){

		    				return $item->praise_num;
		    			});
    					
    					break;
    			}	

    	
	




    	$data['covers'] = $cover;
    	
    	return view('user.public.view_search',$data);
    }


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

    	$cover = AlbumCover::select('album_covers.type','album_covers.desc','album_covers.title','album_covers.img','album_covers.post_time','album_covers.praise_num','users.name','album_covers.id','users.avatar')
		    	->leftJoin('users','users.id','=','album_covers.user_id')
		    
		    	->where('album_covers.id',$id)
			->first();
		$album = Album::where('cover_id',$id)->first();	

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

		$data['cover'] = $cover;	
		$data['album'] = $album;
    	$data['comments'] = $comment;

	
   		return view('user.public.page_article',$data);
   }


   public function getPostTask(){
   		
   		return view('user.public.post_task');
   }



}
