@extends('user.layout.layout')

@section('meta')
<meta name="post_id" content="{{ $cover->id }}">
@endsection

@section('styles')

<link rel="stylesheet" href="/bower_components/medium-editor/dist/css/medium-editor.min.css">
<link rel="stylesheet" href="/bower_components/medium-editor/dist/css/themes/default.css" id="medium-editor-theme">

<!-- Font Awesome for awesome icons. You can redefine icons used in a plugin configuration -->

<!-- The plugin itself -->
<link rel="stylesheet" href="/bower_components/medium-editor-insert-plugin/dist/css/medium-editor-insert-plugin.min.css">
@endsection





@section('content')
<!--=== Blog Posts ===-->
<div class="bg-color-light">
 <div class="blog-author margin-bottom-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="{{$cover->avatar?$cover->avatar:'/assets/img/team/img1-md.jpg'}}" alt="">
                <div class="blog-author-desc pull-left">
                    <div class="overflow-h">
                        <h4><a style="color:#555" href="/profile/article/{{$cover->uid}}">{{$cover->name}}</a></h4>
                        
                    </div>
                    <p>{{$cover->sign}}</p>
                    <p><a target="_blank" href="/user/message/history?uid={{$cover->uid}}" class="btn btn-xs rounded btn-info" ><i class="fa fa-commenting-o"></i>&nbsp;联系Ta</a></p>
                

                </div>
                <div class="blog-author-desc pull-right">
                    <ul class="breadcrumb " style="padding-left:0;margin-top: -15px;float:none;">
                        <li><a  href="javascript:history.go(-1);">圈子</a></li>
                        
                        <li class="active">{{$cover->title}}</li>
                    </ul>
                    <p class="">发布于：{{date('Y-m-d',$cover->post_time)}}</p>
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-eye"></i>&nbsp;{{$cover->view}}</li>
                        <li><i class="fa fa-heart-o"></i>&nbsp;{{$cover->praise_num or 0}}</li>
                        <li><i class="fa fa-commenting-o"></i>&nbsp;{{$comments->count()}}</li>
                    </ul>
                 
                    
              
                

                </div>
            </div>
        </div>
    </div>
 </div>  
    <div class="container content-sm" style="padding-top: 0;">
    
        <!-- News v3 -->
        <div class="news-v3 bg-color-white margin-bottom-30">
           
            <div class="news-v3-in">
             
                <h2><a href="#">{{$cover->title}}</a></h2>
                <div class="row">
                    <div class="col-md-12 article-content">
                        
                         <div>{!!$album->content!!}</div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End News v3 -->
        
        <div class="row">
        
            <div class="col-md-8">
                <div class="praise-box" >
                    <div  class="col-md-4 praise  {{!empty($user_like)?'praise-active':''}}" value="{{$cover->id}}" table="album" >
                        <i class="icon-custom icon-lg rounded-x  icon-line fa fa-heart-o"></i>
                        <span>{{!empty($user_like)?'已喜欢':'喜欢'}}</span>
                       
                    </div>
                    <div class="col-md-4 praise clearfix">
                        <i class="icon-custom icon-lg rounded-x  icon-line fa fa-heartbeat"></i>
                        <span>加为好友</span>
                    </div>
                    <div class="col-md-4 post-share clearfix">
                        <i class="icon-custom icon-sm rounded-x  icon-line fa fa-weixin"></i>
                        <i class="icon-custom icon-sm rounded-x  icon-line fa fa-weibo"></i>
                        <i class="icon-custom icon-sm rounded-x  icon-line fa fa-qq"></i>
                        
                    </div>
                    <div class="col-md-12 praise-user">
                        <div id="userinfo-content"></div>
                        <script type="text/html" id="praiseUser">
                        @{{each user_info as value}}    
                        <img class="rounded-x mCS_img_loaded  " width="35px" height="35px" src="@{{value.avatar}}" alt="">
                        @{{/each}}
                        </script>
                    </div>

              
                </div>
              <div style="background-color: #fff;">
                @if(Auth::guard('user')->check())
                <form action="" style="border:none;" method="post" id="commentForm" class="sky-form ">

                    <fieldset class="col-md-12">
                        <div class="comment-tip"></div>
                        <div class="">
                            <div>
                                <textarea rows="5" name="content" id="message" placeholder="" class="form-control"></textarea>
                                <input type="hidden" name="post_id" value="{{$cover->id}}">
                            </div>
                        </div>

                        <p><button type="submit" class="btn btn-sm rounded btn-info pull-right">回复</button></p>
                    </fieldset>


                </form>
                @else

                <p style="font-size: 14px;" class="text-center"><a style="color:#4bf" href="#">登录</a>或<a style="color:#4bf" href="#">注册</a>，支持下作者吧！</p>
                 @endif
            <!-- End Form --> 
        <!-- Blog Comments -->
                <div id="comment">
                <p class="comment-all">全部评论（{{$comments->count()}}）</p>
                @foreach($comments as $comment)
                <div class="my-comment-box">
                <div class="content-boxes-v3 margin-bottom-10 md-margin-bottom-20 row" style="padding:0 30px;">
                  <div class="col-md-1">  
                  <img class="comment-face rounded-x" src="{{$comment->avatar}}" alt="">
                  </div>
                  <div class="content-boxes-in-v3 col-md-11 comment-userinfo">
                      <h3><a href="/profile/article/{{$comment->uid}}">{{$comment->name}}</a></h3>
                      @if(!empty($comment->reply))
                      <p class="my-reply">@<span>{{$comment->reply->name}}</span>{{$comment->reply->content}}</p>
                      @endif
                      <p>{{$comment->content}}</p>
                      <div class="clearfix">
                            <span style="color:#555" class="pull-left">{{_DATE_FORMAT(strtotime($comment->created_at))}}</span>
                            <span style="color:#555;" class="pull-right">
                            @if(Auth::guard('user')->check())
                                @if(Auth::guard('user')->user()->id != $comment->user_id)
                                <a value="{{$comment->id}}" class="reply" post="{{$cover->id}}" href="javascript:;">回复</a>
                                @else
                                <a value="{{$comment->id}}" class="del-comment" post="{{$cover->id}}" href="javascript:;">删除</a>
                                @endif
                            @endif        

                            </span>

                      </div>
                      
                  </div>
                </div>
                <hr class="devider devider-dashed">
                </div>
                @endforeach
                </div>
                <!-- End Blog Comments -->
                <div class="text-center">    
                {!! $comments->links() !!}
                </div>

                  </div>
                <!-- Form -->
            </div>
           
            <div class=" col-md-4">
                             

                <div class="headline-v2"><h2>作者作品</h2></div>
                <!-- Latest Links -->
                <ul class="list-unstyled blog-latest-posts margin-bottom-50">
                    <li>
                        <h3><a href="#">Wireframe for the news view...</a></h3>
                        <small>5 Jan, 2015 / <a href="#">Web,</a> <a href="#">Webdesign</a></small>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam odio leo.</p>
                    </li>
                    <li>
                        <h3><a href="#">It is a long established fact that a reader</a></h3>
                        <small>17 Jan, 2015 / <a href="#">Artificial Intelligence</a></small>
                        <p>Pellentesque efficitur blandit dui, porta cursus velit imperdiet sit amet.</p>
                    </li>
                    <li>
                        <h3><a href="#">The point of using Lorem Ipsum</a></h3>
                        <small>19 Jan, 2015 / <a href="#">Hi-Tech,</a> <a href="#">Technology</a></small>
                        <p>Phasellus ullamcorper pellentesque ex. Cras venenatis elit orci, vitae dictum elit egestas a. Nunc nec auctor mauris, semper scelerisque nibh.</p>
                    </li>
                    <li>
                        <h3><a href="#">Many desktop publishing packages...</a></h3>
                        <small>23 Jan, 2015 / <a href="#">Art,</a> <a href="#">Lifestyles</a></small>
                        <p>Integer vehicula sed justo ac dapibus. In sodales nunc non varius accumsan.</p>
                    </li>
                </ul>
     
                <!-- End Blog Newsletter -->
            </div>
           
      

        <!-- Blog Post Author -->

        </div>


 
    </div><!--/end container-->
</div>
<!--=== End Blog Posts ===-->
   
@endsection    


@section('jquery')
    ProfileSocial.praiseFunc();
    ProfileSocial.commentForm();
    ProfileSocial.replyAlbum();
    ProfileSocial.delComment();

@endsection









