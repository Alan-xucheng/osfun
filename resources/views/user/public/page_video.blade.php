@extends('user.layout.layout')
@section('styles')

<link rel="stylesheet" href="/bower_components/medium-editor/dist/css/medium-editor.min.css">
<link rel="stylesheet" href="/bower_components/medium-editor/dist/css/themes/default.css" id="medium-editor-theme">

<!-- Font Awesome for awesome icons. You can redefine icons used in a plugin configuration -->

<!-- The plugin itself -->
<link rel="stylesheet" href="/bower_components/medium-editor-insert-plugin/dist/css/medium-editor-insert-plugin.min.css">
@endsection

@section('breadcrumbs')
    <div class="video-bread" style="background-color: #292929;">
        <div class="container">
         <!--    <h1 class="pull-left">Login</h1> -->
            <ul class="pull-left breadcrumb">
                <li><a href="index.html">网红圈</a></li>
                
                <li class="active">1231</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

@endsection




@section('content')
<!--=== Blog Posts ===-->
<div class="bg-color-video">

    <div class="container content-sm" style="padding-top: 0;">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">       
			      <div class="responsive-video margin-bottom-20 margin-top-20">
		                <iframe height=498 width=510 src="{{$album->src}}" frameborder=0 allowfullscreen></iframe>
			    
				   </div>
			</div>

		</div>
 
    </div><!--/end container-->
</div>
<div class="bg-color-light margin-top-20">

    <div class="container content-sm" style="padding-top: 0;">
		<div class="row">
		    <div class="col-md-8">
		        <div class="praise-box">
		            <div class="col-md-6 praise {{!empty($user_like)?'praise-active':''}}" value="" table="album">
		                <i class="icon-custom icon-lg rounded-x  icon-line fa fa-heart-o"></i>
		                <span>{{!empty($user_like)?'已喜欢':'喜欢'}}</span>
		                <div class="pull-right praise-num">123</div>
		            </div>
		            <div class="col-md-6 ">
		                <!-- <i class="icon-custom icon-lg rounded-x icon-bg-u icon-line icon-rocket"></i> -->
		            </div>
		      
		        </div>
		      <div style="background-color: #fff;">
		        
		        <form action="" style="border:none;" method="post" id="commentForm" class="sky-form ">

		            <fieldset class="col-md-12">
		                <div class="comment-tip"></div>
		                <div class="">
		                    <div>
		                        <textarea rows="5" name="content" id="message" placeholder="" class="form-control"></textarea>
		                        <input type="hidden" name="post_id" value="">
		                    </div>
		                </div>

		                <p><button type="submit" class="btn-u btn-u-blue pull-right">回复</button></p>
		            </fieldset>


		        </form>
		    <!-- End Form --> 
		<!-- Blog Comments -->
		        @foreach($comments as $comment)
		        <div class="content-boxes-v3 margin-bottom-10 md-margin-bottom-20 row" style="padding:0 30px;">
		          <div class="col-md-1">  
		          <img class="comment-face rounded-x" src="http://www.xucheng.com/uploads/2016/03/13/145785955156e52bdf3c135.jpg" alt="">
		          </div>
		          <div class="content-boxes-in-v3 col-md-11 comment-userinfo">
		              <h3><a href="#">{{$comment->name}}</a></h3>
		              @if(!empty($comment->reply))
		              <p class="my-reply">@<span>{{$comment->reply->name}}</span>{{$comment->reply->content}}</p>
		              @endif
		              <p>{{$comment->content}}</p>
		              <div class="clearfix">
		                    <span style="color:#555" class="pull-left">{{$comment->created_at}}</span>
		                    <span style="color:#555;" class="pull-right">
		                    @if(Auth::guard('user')->user()->id != $comment->user_id)
		                    <a value="{{$comment->id}}" class="reply" post="" href="javascript:;">回复</a>
		                    @else
		                    <a value="{{$comment->id}}" class="del-comment" post="" href="javascript:;">删除</a>
		                    @endif        

		                    </span>

		              </div>
		              
		          </div>
		        </div>
		        <hr class="devider devider-dashed">
		        @endforeach
		        <!-- End Blog Comments -->

		        <hr>

		          </div>
		  
		        <!-- Form -->
		    </div>
		    <div class="col-md-4">
		                     

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
 

@endsection









