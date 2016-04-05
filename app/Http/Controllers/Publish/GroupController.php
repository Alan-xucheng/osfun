<?php

namespace App\Http\Controllers\Publish;
use Request;
use App\Http\Controllers\Controller;
use App\Group;
use App\GroupUserRelation;
use Auth;
use App\AlbumCover;
use App\CommentList;

class GroupController extends Controller
{
    //
    public function getIndex($id){

        return view('user.public.group_detail');
    }

    public function getHome($id,$type="dynamic"){

    	$info = Group::select('groups.*','user_extras.nickname')

    			->leftJoin('user_extras','user_extras.user_id','=','groups.user_id')

    			->first();
    	if(Auth::guard('user')->check()){

    		$user_id = Auth::guard('user')->user()->id;

    		$cur_user = GroupUserRelation::firstOrCreate(["user_id"=>$user_id,"group_id"=>$id]);

    		$data['user_info'] = $cur_user;	
    	}		
    	$type = empty(Request::input('type'))?$type:Request::input("type");

    	switch ($type) {
    		case 'dynamic':
    			$covers = AlbumCover::select('album_covers.*','user_extras.nickname','users.avatar')

    						->leftJoin('user_extras','user_extras.user_id','=','album_covers.user_id')

    						->leftJoin('users','users.id','=','album_covers.user_id')

    						->where('album_covers.group_id','=',$id)

    						->get();
    			break;
    		
    		default:
    			$covers = AlbumCover::select('album_covers.*','user_extras.nickname','users.avatar')

    						->leftJoin('user_extras','user_extras.user_id','=','album_covers.user_id')

    						->leftJoin('users','users.id','=','album_covers.user_id')

    						->where('album_covers.group_id','=',$id)

    						->where('media','=',$type)

    						->get();

    			
    			break;
    	}

    	foreach ($covers as $key => $value) {
    		
    		$covers[$key]['comments'] = CommentList::where('post_id',$value->id)->get();
    	}

    	$data['covers'] = $covers;

 
    		
		$data['group_info'] = $info;    			

    	return view('user.public.group_detail',$data);
    }









}
