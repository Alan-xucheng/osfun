<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProfileSocial as Social;
use App\UserSkills as Skills;
use App\Demand;
use App\Tag;
use App\TagMap;
use App\UserExtra;


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
    public function getMessage(){


    	return view('user.public.message');
    }

    public function getMessageHistory(){

        return view('user.public.message_history');
    }

    public function getProfile(){

    	return view('user.public.profile');
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

    	return view('user.public.profile_settings');
    }

    public function getProfileProject(){

        $user_id = Auth::guard('user')->user()->id;

        $demands = Demand::where('user_id',$user_id)->get();

        $demands = $demands -> each(function($item,$key){

              return  $item['tags'] = explode(',', $item['tags']);
        });

        $data['demands'] = $demands;

    	return view('user.public.profile_project',$data);
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



















}
