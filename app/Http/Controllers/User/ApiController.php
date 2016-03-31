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
use Storage;
use App\User;
use App\TagMap;
use App\Demand;
use App\Album;
use App\Category;
use App\AlbumCover;
use App\UserLike;
use App\CommentList;
use App\Certification;
class ApiController extends Controller
{
    //
    //
    public function postTest(){
        return Request::all();
    }
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

    	
    	$desc = Request::input('desc');
    	$content = Request::input('content');
        $parent = Request::input('parent');
        $child = Request::input('child');

        $encoded = Request::input('image-data');

        $img = $this->img_base64($encoded);

    	$user_id  = Auth::guard('user')->user()->id;

        if(!empty($child)){

            $cat_id = Category::where('name',$child)->first()->id;
        }else{
            $cat_id = Category::where('name',$parent)->first()->id;
        }
    	// 储存需求
    	$demand = new Demand();

    	$demand ->user_id = $user_id;
        
        $demand->category = $cat_id;
        $demand->src = $img;
    
    	$demand ->content = $content;

    	$demand->save();


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
    public function postSaveAlbum(){

        $user_id = Auth::guard('user')->user()->id;

        $content = Request::input('content');

        $cover_id = Request::input('cover_id');

        $album = Album::firstOrCreate(['cover_id'=>$cover_id]);

        $album->content = $content;

        $album->type = 'article';

        $album->save();

        $cover = AlbumCover::find($cover_id);

        $cover->desc = strip_tags(mb_substr($content,0,80));

        $cover->post_time = time();

        $cover->media = 'article';

        // $cover->status = config('app.post_status');

        $cover->save();

        return Tool::json_return(0,$cover);

    }
    public function postDelAlbum(){

        $album_id = Request::input('album_id');

        if(empty($album_id)){

            Tool::json_return(-1,'false');
        }
        Album::where('cover_id',$album_id)->delete();

        $cover = AlbumCover::find($album_id);

        $url = parse_url($cover->img);
        
        Storage::delete($url['path']);
        
        $cover->delete();

        return Tool::json_return(0,'success');

    }
    public function postDelDemand(){

        $demand_id = Request::input('demand_id');


        if(empty($demand_id)){

            Tool::json_return(-1,'false');
        }

        Demand::find($demand_id)->delete();

        return Tool::json_return(0,'success');

    }


    public function postApiImage(){


    	//
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
    public function img_base64($encoded){

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

                    return url($url);
               }

               

    }
    public function postApiCover(){



               $cover_id = Request::input('cover'); 
                
               $encoded = Request::input('image-data');

               $title = Request::input('title');

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

                   $cover = AlbumCover::find($cover_id);

                   $cover->img = url($url);

                   $cover->title = $title;

                   $cover->status = "publish";


                   $cover->save();
               }

               return Tool::json_return(0,url($url));

               
        }

    public function postCoverInfo(){

            $cover_id = Request::input('cover_id');

            return AlbumCover::find($cover_id);
        }

    public function postAddPraise(){

            $user_id = Auth::guard('user')->user()->id;
            if(empty($user_id)){
                return Tool::json_return(-1,'login falis');
            }
            $table = Request::input('table');
            $post_id = Request::input('post_id');

            if($table=='album'){
                //CHECK STATUS
                $like = UserLike::where('user_id',$user_id)->where('post_id',$post_id)->where('table','album')->first();

                if(!empty($like)){
                    return Tool::json_return(-2,'exist log');
                }else{
                    AlbumCover::find($post_id)->increment('praise_num');

                    $like = new UserLike();
                    $like->user_id = $user_id;
                    $like->table = "album";
                    $like->post_id = $post_id;
                    $like->save();

                    return Tool::json_return(0,'ok');
                }
            
                
            }
          



            
        }

    public function postDelPraise(){

            $user_id = Auth::guard('user')->user()->id;
            if(empty($user_id)){
                return Tool::json_return(-1,'login falis');
            }
            $table = Request::input('table');
            $post_id = Request::input('post_id');

            if($table=='album'){
                //CHECK STATUS
                $like = UserLike::where('user_id',$user_id)->where('post_id',$post_id)->where('table','album')->delete();
                AlbumCover::find($post_id)->decrement('praise_num');

                
                return Tool::json_return(0,'ok');
                
            }
        }

    public function postAddComment(){

            $post_id = Request::input('post_id');

            $content = Request::input('content');

            $user_id = Auth::guard('user')->user()->id;

            $comment = new CommentList();

            $comment->content = $content;
            $comment->post_id = $post_id;
            $comment->user_id = $user_id;
            $comment->table = "album";

            $comment->save();

            $avatar = User::find($user_id)->avatar;
            $nickname = UserExtra::where('user_id',$user_id)->first()->nickname;

            $data['avatar'] = $avatar;

            $data['nickname'] = $nickname;

            $data['content'] = $content;

            $data['comment_id'] = $comment->id;

            return Tool::json_return(0,$data);

        }
    public function postReplyComment(){

            $post_id = Request::input('post_id');

            $content = Request::input('content');

            $user_id = Auth::guard('user')->user()->id;

            $reply_id = Request::input('reply_id');

            $comment = new CommentList();

            $comment->content = $content;
            $comment->post_id = $post_id;
            $comment->user_id = $user_id;
            $comment->ref = $reply_id;
            $comment->table = "album";

            $comment->save();

            $avatar = User::find($user_id)->avatar;

            $reply_comment = CommentList::where("id",$reply_id)->first();

            $reply_content = $reply_comment->content;

            $reply_user = $reply_comment->user_id;

            $reply_nickname = UserExtra::where('user_id',$reply_user)->first()->nickname;

            $data['avatar'] = $avatar;

            $data['nickname'] = UserExtra::find($user_id)->nickname;

            $data['content'] = $content;

            $data['comment_id'] = $comment->id;

            $data['reply_nickname']  = $reply_nickname;

            $data['reply_content']  = $reply_content;

            return Tool::json_return(0,$data);


        }

    public function postDelComment(){

            $user_id  = Auth::guard('user')->user()->id;

            $comment_id = Request::input('comment_id');

            $comment = CommentList::find($comment_id);

            if($comment->user_id != $user_id){

                return Tool::json_return(-1,'no permission');
            }
            else{
                $comment->delete();

                return Tool::json_return(0,'ok');
            }
        }
    public function postUpdateProfile(){
            $user_id = Auth::guard('user')->user()->id;
            $sex = Request::input('sex');
            $nickname = Request::input('nickname');
            $year = Request::input('year');
            $month = Request::input('month');
            $day = Request::input('day');
            $sign = Request::input('sign');
            $province = Request::input('province');
            $city = Request::input('city');
            $country = Request::input('country');
            $birth = strtotime($year.'-'.$month.'-'.$day);

            $extra = UserExtra::firstOrCreate(['user_id'=>$user_id]);

            $extra->user_id = $user_id;
            $extra->nickname = $nickname;
            $extra->birth = $birth;
            $extra->sex = $sex;
            $extra->sign = $sign;
            $extra->province = $province;
            $extra->city = $city;
            $extra->country = $country;

            $extra->save();

            return Tool::json_return(0,'ok');
            
        }

    public function postCreateVideo(){


            $cover = new AlbumCover();
            $user_id = Auth::guard('user')->user()->id;
            $type = Request::input('type');
            $encoded  = Request::input('image-data');
            $url = $this->img_base64($encoded);
            $title = Request::input('title');
            $medium = Request::input('medium');
            $desc = Request::input('desc');
            $src = Request::input('src');

            $parent = Request::input('parent');

            $child = Request::input('child');

            $pid = Category::where('name',$parent)->pluck('id');

            $cate = Category::where('name',$child)->where('parent',$pid)->first();



            if($medium =='src'){

                $cover->user_id = $user_id;

                //$cover->category = $cate->id;

                $cover->media = 'video';

                $cover->type = $type;

                $cover->title = $title;

                $cover->img = $url;

                $cover->post_time = time();

                $cover->desc = $desc;

                $cover->status = 'publish';

                $cover->save();

            }

            $album = new Album();

            $album->cover_id = $cover->id;

            $album->type = $medium;

            $album->src = $src;

            $album->save();

            return Tool::json_return(0,'ok');  
          
    }







    public function postVideoUpload(){


            $result = Tool::_upload_file('file','file');

            return $result['url'];
    }

    public function postCertificantUpload(){

        $user_id = Auth::guard('user')->user()->id;

        $img_cat = Request::input('type');

        $cert = Certification::firstOrCreate(['user_id'=>$user_id]);

        $result = Tool::_upload_file('file','file');

        if($img_cat == 'frontuploader'){

            $cert->front_id = $result['url'];

        }else{

            $cert->back_id = $result['url'];
        }
            $cert->save();

        return $result['url'];

     
    }    

    public function postSaveCertification(){

        $user_id = Auth::guard('user')->user()->id;

        $cert = Certification::firstOrCreate(['user_id'=>$user_id]);

        $type = Request::input('type');

        if($type == 'service'){

            $parent = Request::input('parent');

            $child = Request::input('child');

            $pid =  Category::where('name',$parent)->first()->id;

            if(!empty($child)){

                $cid = Category::where('name',$child)->where('parent',$pid)->first()->id;

                $cert->category = $cid;
            }else{
                $cert->category = $pid;
            }
            $province = Request::input('province');

            $city = Request::input('city');

            $country = Request::input('country');

            $location_id = Tool::get_location_number($province);
            
            $cert->service_desc = Request::input('service_desc');

            $cert->province = $province;

            $cert->city = $city;

            $cert->country = empty($country)? '':$country;

            $cert->size = Request::input('size');

            $cert->true_name = Request::input('truename');

            $cert->service_type = Request::input('service_type');

            $cert->location_id = $location_id;

            $cert->status ='apply';

            $cert->type = $type;

            $cert->save();

        }elseif ($type =='personal') {
            
            $cert->true_name = Request::input('truename');

            $cert->type = $type;

            $cert->status ='apply';

            $cert->save();

        }

        return Tool::json_return(0,'success');



    }

    public function postProfile(){

        $option = Request::input('option');    
        $user_id = Auth::guard('user')->user()->id;

        $data = UserExtra::where('user_id',$user_id)->first()->$option;

        return Tool::json_return(0,$data);
    }

    public function postSaveNickname(){
        $user_id = Auth::guard('user')->user()->id;

        $nickname = Request::input('nickname');

        UserExtra::where('user_id',$user_id)->update(['nickname'=>$nickname]);

        return Tool::json_return(0,'success');
    }
    public function postSaveSign(){

        $user_id = Auth::guard('user')->user()->id;

        $nickname = Request::input('sign');

        UserExtra::where('user_id',$user_id)->update(['sign'=>$nickname]);

        return Tool::json_return(0,'success');
    }
    public function postSaveLocation(){


        $user_id = Auth::guard('user')->user()->id;

        $province = Request::input('province');
        $city = Request::input('city')?Request::input('city'):'';
        $country = Request::input('country')?Request::input('country'):'';

        UserExtra::where('user_id',$user_id)->update(['province'=>$province,'city'=>$city,'country'=>$country]);

        return Tool::json_return(0,'success');
    }
    public function postSaveSex(){

        $user_id = Auth::guard('user')->user()->id;

        $sex = Request::input('sex');

        $year = Request::input('year');

        $month = Request::input('month');

        $day = Request::input('day');
        $birth = strtotime($year.'-'.$month.'-'.$day);


        UserExtra::where('user_id',$user_id)->update(["sex"=>$sex,'birth'=>$birth]);

        Tool::json_return(0,'success');


    }

    public function postSaveAuthentication(){
        return Request::all();
    }




















}
