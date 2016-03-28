<?php

namespace App\Http\Controllers\Publish;

use App\Http\Controllers\Controller;


use Request;
use App\AlbumCover;
use App\Album;
use App\UserExtra;
use Auth;
use App\UserLike;
use App\CommentList;
use App\Category;

class ServiceController extends Controller
{
    //
    //
    public function getIndex($sex='all_sex',$media='video',$sort='hot'){


    	$data['category'] = $category;

    	if($category != 'all_cat'){

    	    $pid =Category::where('slug',$category)->first()->id;

    	      if($child_category != 'all'){

    	         $child_cat =Category::where('slug',$child_category)->first();

    	         $cpid = $child_cat ->parent;

    	         $cid = $child_cat->id;

    	         if($pid != $cpid){

    	         $child_category = 'all';
    	      }
    	  }
    	 
    	        $data['child_cat'] = Category::where('parent',$pid)->get();
    	  
    	}

    	$data['child_category'] = $child_category;

    	

    	$data['media'] = $media;

    	$data['sort'] = $sort;

    	$parent_cat = Category::where('parent',0)->get();


    	//以下为分类搜索逻辑
    	


    	

    	if($category!='all_cat'){

    	      if($child_category =='all'){

    	        $cover = AlbumCover::select('album_covers.media','album_covers.desc','album_covers.title','album_covers.img','album_covers.post_time','album_covers.praise_num','users.name','album_covers.id','user_extras.sex','categories.slug','categories.id','categories.name','album_covers.category')

    	                ->leftJoin('users','users.id','=','album_covers.user_id')

    	                ->leftJoin('categories','categories.id','=','album_covers.category')

    	                ->leftJoin('user_extras','user_extras.user_id','=','album_covers.user_id')

    	                ->where('album_covers.media','=',$media)

    	                ->where('album_covers.type','=','experience')

    	                ->get();
    	                  
    	          $child_cat = Category::where('parent','=',$pid)->pluck('id')->toArray();

    	       
    	          $cover = $cover->filter(function($item)use($child_cat){


    	              return in_array($item->category,$child_cat);

    	          });
    	          


    	      }else{

    	        $cover = AlbumCover::select('album_covers.media','album_covers.desc','album_covers.title','album_covers.img','album_covers.post_time','album_covers.praise_num','users.name','album_covers.id','user_extras.sex','categories.slug','categories.id','categories.name')

    	                ->leftJoin('users','users.id','=','album_covers.user_id')

    	                ->leftJoin('categories','categories.id','=','album_covers.category')

    	                ->leftJoin('user_extras','user_extras.user_id','=','album_covers.user_id')

    	                ->where('album_covers.media','=',$media)

    	                ->where('album_covers.category','=',$cid)

    	                ->where('album_covers.type','=','experience')


    	                ->get();

    	      }


    	}else{

    	  $cover = AlbumCover::select('album_covers.media','album_covers.desc','album_covers.title','album_covers.img','album_covers.post_time','album_covers.praise_num','users.name','album_covers.id','user_extras.sex','user_extras.nickname','categories.slug','categories.id','categories.name')

    	          ->leftJoin('users','users.id','=','album_covers.user_id')

    	          ->leftJoin('categories','categories.id','=','album_covers.category')

    	          ->leftJoin('user_extras','user_extras.user_id','=','album_covers.user_id')

    	          ->where('album_covers.media','=',$media)

    	          ->where('album_covers.type','=','experience')


    	          ->get();
    	}        


    	
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
    	$data['parent_cat'] = $parent_cat;

    	
    	  return view('user.public.service_main',$data);
    } 
}
