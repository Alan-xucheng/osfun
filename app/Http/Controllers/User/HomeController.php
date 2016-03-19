<?php

namespace App\Http\Controllers\User;

use Request;
use Auth;
use Tool;
use App\Http\Controllers\Controller;
use App\ProfileSocial as Social;
use App\UserSkills as Skills;
use App\Demand;
use App\Tag;
use App\TagMap;
use App\UserExtra;
use App\Album;
use App\AlbumCover;


class HomeController extends Controller
{
    
    public function __construct(){

        $user = Auth::guard('user')->user();

        view()->share('auth',$user);
    }
    //
    public function getIndex(){

    	return view('user.public.message');

    }


    public function getProfile(){

    	return view('user.public.profile');
    }
    public function getCreateAlbum($type='personal'){

        $type = Request::input('type');

        $user_id = Auth::guard('user')->user()->id;

        $cover = AlbumCover::firstOrCreate(['user_id'=>$user_id,'status'=>'draft','type'=>$type]);

        $album = Album::firstOrCreate(['cover_id'=>$cover->id]);

        $data['cover'] = $cover;

        $data['album'] = $album;


        return view('user.public.create_album',$data);
    }



    public function getProfileMe(){

        $social = Social::where('user_id',Auth::guard('user')->user()->id)->first();

        $skills =  Skills::where('user_id',Auth::guard('user')->user()->id)->get();

        $data['userExtra'] = userExtra::where('user_id',Auth::guard('user')->user()->id)->first(); 

        $data['skills'] = $skills;

        $data['social'] = $social;


    	return view('user.public.profile_me',$data);
    }

    public function getProfileFriends(){

    	return view('user.public.profile_friends');
    }

    public function getProfileSettings(){

        $user_id = Auth::guard('user')->user()->id;

        $user_extra = UserExtra::firstOrCreate(['user_id'=>$user_id]);

        $data['user_extra'] = $user_extra;


    	return view('user.public.profile_settings',$data);
    }

    public function getProfileProject(){

        $user_id = Auth::guard('user')->user()->id;

        $demands = Demand::where('user_id',$user_id)->get();

  

        $data['demands'] = $demands;


    	return view('user.public.profile_project',$data);
    }

    public function getProfileAlbum($type = 'personal'){

        $type = Request::input('type')==null?$type:Request::input('type');

        $user_id = Auth::guard('user')->user()->id;

        $cover = AlbumCover::where('user_id',$user_id)->where('type',$type)->where('status',"<>",'draft')->get();

        $data['covers'] = $cover;
 
       
        return view('user.public.profile_album',$data);
    }

    public function getProfileSocial(){

        $social = Social::where('user_id',Auth::guard('user')->user()->id)->first();

        $data['social'] = $social;


        return view('user.public.profile_social',$data);
    }

    public function getProfileSkills(){

        $skills =  Skills::where('user_id',Auth::guard('user')->user()->id)->get();

        $data['skills'] = $skills;

        return view('user.public.profile_skills',$data);
    }

    public function getProfileInfo(){

        $data['userExtra'] = userExtra::where('user_id',Auth::guard('user')->user()->id)->first();



        return view('user.public.profile_info',$data);
    }

    public function getProfileDemand(){

        return view('user.public.profile_demand');
    }

    public function getAlbumDetail(){

        $album_id = Request::input('album');

        $user_id = Auth::guard('user')->user()->id;

        $cover = AlbumCover::findOrFail($album_id);

        if($cover->user_id != $user_id){

            abort(403);
        }

        $album = Album::where('cover_id',$album_id)->firstOrFail();

        $data['cover'] = $cover;

        $data['album'] = $album;


        return view('user.public.create_album',$data);



    }
    public function getCreateVideo(){

        return view('user.public.create_video');
    }



















}
