<?php

namespace App\Http\Controllers\Publish;

use App\Demand;
use Request;
use App\AlbumCover;
use App\Album;
use App\UserExtra;
use Auth;
use App\User;
use App\UserLike;
use App\CommentList;
use App\Category;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function __construct(){

        // $user = Auth::guard('user')->user();

        // view()->share('auth',$user);
    }

    public function _get_user_info($id){

      $user_info = User::select('users.avatar','user_extras.nickname','user_extras.birth','user_extras.sex','user_extras.sign','user_extras.province','user_extras.city','user_extras.country')
        ->leftJoin('user_extras','user_extras.user_id','=','users.id')
        ->where('users.id','=',$id)
        ->first();

      $birth = $user_info->birth;
      
      $age = date('Y',time())-date('Y',$birth);  

      $user_info['age'] = $age;

      return $user_info;
    }
    
    public function getArticle($id=null){

        if(empty($id)){

            abort(404);
        }

        $covers = AlbumCover::select('album_covers.media','album_covers.desc','album_covers.title','album_covers.img','album_covers.post_time','album_covers.praise_num','users.name','user_extras.nickname','album_covers.id','user_extras.sex','users.id as uid')

                    ->leftJoin('users','users.id','=','album_covers.user_id')

                    ->leftJoin('user_extras','user_extras.user_id','=','album_covers.user_id')

                    ->where('album_covers.media','=',"article")

                    ->where('album_covers.user_id','=',$id)

                    ->get();


        $user_info = $this->_get_user_info($id);
        $data['user_info'] = $user_info;    
        $data['uid'] = $id;
        $data['covers'] = $covers;
      

    	return view('user.public.profile_article',$data);
    }

    public function getVideo($id=null){

      if(empty($id)){

          abort(404);
      }

      $covers = AlbumCover::select('album_covers.media','album_covers.desc','album_covers.title','album_covers.img','album_covers.post_time','album_covers.praise_num','users.name','user_extras.nickname','album_covers.id','user_extras.sex','users.id as uid')

                  ->leftJoin('users','users.id','=','album_covers.user_id')

                  ->leftJoin('user_extras','user_extras.user_id','=','album_covers.user_id')

                  ->where('album_covers.media','=',"video")

                  ->where('album_covers.user_id','=',$id)

                  ->get();


      $user_info = $this->_get_user_info($id);
      $data['user_info'] = $user_info;    
      $data['uid'] = $id;
      $data['covers'] = $covers;
    	return view('user.public.profile_video',$data);
    }
    public function getCooperation(){

    	return view('user.public.profile_cooperation');
    }
    public function getFriend(){

    	return view('user.public.profile_friends');
    }
}
