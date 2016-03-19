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
use App\TagMap;
use App\Demand;
use App\Album;
use App\Category;
use App\AlbumCover;
use App\UserLike;
use App\CommentList;
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


    	$tags = Request::input("tags");
    	$desc = Request::input('desc');
    	$content = Request::input('content');
    	$user_id  = Auth::guard('user')->user()->id;
    	// 储存需求
    	$demand = new Demand();

    	$demand ->user_id = $user_id;
    	$demand ->tags = $tags;
 
    
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
    public function postSaveAlbum(){

        $user_id = Auth::guard('user')->user()->id;

        $content = Request::input('content');

        $cover_id = Request::input('cover_id');

        $album = Album::firstOrCreate(['cover_id'=>$cover_id]);

        $album->content = $content;

        $album->save();

        $cover = AlbumCover::find($cover_id);

        $cover->desc = strip_tags(mb_substr($content,0,100));

        $cover->post_time = time();

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

            return Tool::json_return(0,'ok');

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

            return Tool::json_return(0,'ok');


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

                $cover->category = $cate->id;

                $cover->medium = $medium;

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

            $album->medium = $medium;

            $album->src = $src;

            $album->save();

            return Tool::json_return(0,'ok');  
          
        }







    public function postVideoUpload(){


            $result = Tool::_upload_file('file','file');

            return $result['url'];
        }




















}
