<?php

namespace App\Http\Controllers\Publish;

// use Illuminate\Http\Request;

// use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use App\TagMap;
use App\Demand;
use Request;
use App\AlbumCover;
use App\Album;
use App\UserExtra;
use Auth;
use Tool;
use App\UserLike;
use App\CommentList;
use App\Category;
use App\China;
use App\Certification;

class HomeController extends Controller
{

    public function getIndex(){

    	$tag_id  = Request::input('tag');

    	if(!empty($tag_id)){

    		$post_id = TagMap::where('tag_id',$tag_id)->where('type','demand')->pluck('post_id');

    		$post = collect(array());

    		foreach ($post_id as $key => $value) {
    			
    			$item = Demand::select('demands.tags','user_extras.nickname','user_extras.sex','users.avatar','users.id as uid','demands.content','demands.id')

    					->leftJoin('user_extras','demands.user_id','=','user_extras.user_id')

    					->leftJoin('users','demands.user_id','=','users.id')

    					->where('demands.id','=',$value)

    					->first();

    			$post->push($item);
    		}

    		
    	}else{

    		$post = Demand::select('user_extras.nickname','user_extras.sex','users.avatar','users.id as uid','demands.content','demands.id')

    				->leftJoin('user_extras','demands.user_id','=','user_extras.user_id')

    				->leftJoin('users','demands.user_id','=','users.id')

    				->get();
    	}

        $tags = Tag::orderBy('num','desc')->take(24)->get();

        
      
        $data['tags'] = $tags;
    	$data['posts'] = $post;
        
    	//dd($data);
    	return view('user.public.index',$data);
    }

    public function getSearchPersonal($sex='all_sex',$media='video',$sort='hot'){


                $data['sex'] = $sex;

                $data['media'] = $media;

                $data['sort'] = $sort;

                $cover = AlbumCover::select('album_covers.media','album_covers.desc','album_covers.title','album_covers.img','album_covers.post_time','album_covers.praise_num','users.name','user_extras.nickname','album_covers.id','user_extras.sex','users.id as uid')

                        ->leftJoin('users','users.id','=','album_covers.user_id')

                        ->leftJoin('user_extras','user_extras.user_id','=','album_covers.user_id')

                        ->where('album_covers.media','=',$media)

                        ->where('album_covers.type','=','personal')

                        ->get();


                if($sex != 'all_sex'){

                    $cover = $cover->filter(function($item)use($sex){

                        return $item->sex ==$sex;
                    });
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

               
                
                return view('user.public.view_search',$data);
    }
    public function getSearchCooperation($category='all_cat'){

        $data['category'] = $category;

        $pid = Category::where('slug','cooperation')->first()->id;

        if($category !='all_cat'){

            $parent = Category::where('slug',$category)->first()->id;

            $data['child_categories'] = Category::where('parent',$parent)->get();

            $child_cat = Category::where('parent','=',$parent)->pluck('id');

            $demands = Demand::select('demands.*','categories.name','categories.slug','users.name','user_extras.sex')
                   ->leftJoin('categories','categories.id','=','demands.category') 
                   ->leftJoin('users','users.id','=','demands.user_id')
                   ->leftJoin('user_extras','user_extras.user_id','=','demands.user_id')
                   ->get();

             $cats = $child_cat->push($parent)->toArray();      
             
                $demands = $demands->filter(function($item)use($cats){


                    return in_array($item->category,$cats);

                });       

        }else{
            $demands = Demand::select('demands.*','categories.name','categories.slug','users.name','user_extras.sex')
                      ->leftJoin('categories','categories.id','=','demands.category') 
                      ->leftJoin('users','users.id','=','demands.user_id')
                      ->leftJoin('user_extras','user_extras.user_id','=','demands.user_id')
                      ->get();


        }

        $data['categories'] = $categories = Category::where('parent',$pid)->get();

     
        $data['demands'] = $demands;        
       
         return view('user.public.cooperation_search',$data);


    }

    public function getSearchAcademy($category='all_cat',$child_category='all',$media='video',$sort='hot'){

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

      $academy_id = Category::where('slug','=','academy')->first()->id;

      $parent_cat = Category::where('parent',$academy_id)->get();


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

        $cover = AlbumCover::select('album_covers.media','album_covers.desc','album_covers.title','album_covers.img','album_covers.post_time','album_covers.praise_num','users.name','album_covers.id','user_extras.sex','user_extras.nickname','categories.slug','categories.name')

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

        return view('user.public.academy_search',$data);
   }
    public function getSearchService($category='all_cat',$child_category='all',$location='all',$sort='hot'){

      $data['category'] = $category;

      $service_id = Category::where('slug','service')->first()->id;

      if($category != 'all_cat'){

          $pid =Category::where('slug',$category)->where('parent',$service_id)->first()->id;

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

      $china = China::where('pid',0)->get();

      $data['child_category'] = $child_category;

      

      $data['location'] = $location;

      $data['sort'] = $sort;

      $data['china'] = $china;

      $service_id = Category::where('slug','=','service')->first()->id;

      $parent_cat = Category::where('parent',$service_id)->get();


      //以下为分类搜索逻辑
      
      
    
        $service_id = Category::where('slug','service')->first()->id;

        if($child_category == "all" && $category !="all_cat"){

            

            $pid = Category::where('slug',$category)->where('parent',$service_id)->first()->id;

            $people = Certification::select('certifications.*','user_extras.nickname','user_extras.sex','user_extras.province','user_extras.city'
            ,'user_extras.country','users.name','users.avatar','categories.name as cat_name')
             ->leftJoin('categories','categories.id','=','certifications.category')
            ->leftJoin('user_extras','user_extras.user_id','=','certifications.user_id')
            ->leftJoin('users','users.id','=','certifications.user_id')
            ->where('certifications.category','=',$pid)
            ->get();


        }elseif ($child_category != "all") {

            $pid = Category::where('slug',$category)->where('parent',$service_id)->first()->id;

            $cid = Category::where('slug',$child_category)->where('parent',$pid)->first()->id;

            $people = Certification::select('certifications.*','user_extras.nickname','user_extras.sex','user_extras.province','user_extras.city'
            ,'user_extras.country','users.name','users.avatar','categories.name as cat_name')
            ->leftJoin('categories','categories.id','=','certifications.category')
            ->leftJoin('user_extras','user_extras.user_id','=','certifications.user_id')
            ->leftJoin('users','users.id','=','certifications.user_id')
            ->where('certifications.category','=',$cid)
            ->get();
              

        }else{

            $people = Certification::select('certifications.*','user_extras.nickname','user_extras.sex','user_extras.province','user_extras.city'
              ,'user_extras.country','users.name','users.avatar','categories.name as cat_name')
              ->leftJoin('categories','categories.id','=','certifications.category')
              ->leftJoin('user_extras','user_extras.user_id','=','certifications.user_id')
              ->leftJoin('users','users.id','=','certifications.user_id')
              ->get();

        }

        if($location!= 'all'){

          $people = $people->filter(function($item)use($people,$location){

            return $item->location_id == $location;

          });
        }

        foreach ($people as $key => $value) {
          
            $people[$key]["album"] = AlbumCover::where('user_id',$value->user_id)->take(3)->get();
        }
     
      
      $data['people'] = $people;
      $data['parent_cat'] = $parent_cat;
      // dd($data);
 
        return view('user.public.service_search',$data);
   }

   public function getSearchGroup(){

      return view('user.public.group_search');
   }



  
}
