@extends('user.layout.layout')

@section('styles')




<style type="text/css">
	.ball-scale-multiple > div {
	  background: #46629E;
	}
    .wrapper{
        background-color: #E9EAED;
    }
    .message-body{
        background-color: #fff;
    }
    .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{
        background: #46629E;
    }
    .badge-lists span.badge{
        top:0;
        right:20px;
    }
    .comment-box{
        cursor: pointer;
    }
    .comment-box:hover{
        background-color: rgba(244,244,244,.3);
    }
    .footer-v1{
    	display: none;
    }
    .content{
    	padding-bottom: 0;
    }


</style>

@endsection





@section('content')
<div class="container content">
    <div class="row">
  		
        @include('user.component.message_left')    
        <!-- Begin Content -->
        <div class="col-md-6">
         <div class="alert fade in text-center" style="left:15px;right:15px;z-index: 1;position: absolute;background-color: #46629E;">
		        	<a href="/user/message"><span class="glyphicon glyphicon-arrow-left pull-left" style="color:#fff;"></span></a>
                    <span style="color:#fff;">与{{$to_user->nickname}}正在对话中</span>
                    <div class="btn-group pull-right">
                          
                        <a type="button" style="color:#fff;cursor:pointer;background-color: #46629E;" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <i class="fa fa-cog"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="javascript:;" id="deleteMessage" value="{{$to_user->id}}">删除对话</a></li>
                            @if(is_null($friend_ship))
                            <li><a href="javascript:;" id="addFriend" value="{{$to_user->id}}">加为好友</a></li>
                            <li><a href="javascript:;" id="blackFriend" value="{{$to_user->id}}">加入黑名单</a></li>
                            @else
	                            @if($friend_ship->type !='black')
	                            <li><a href="javascript:;" id="removeFriend" value="{{$to_user->id}}">删除好友</a></li>
	                            <li><a href="javascript:;" id="blackFriend" value="{{$to_user->id}}">加入黑名单</a></li>
	                            @else
	                            <li><a href="javascript:;" id="removeBlack" value="{{$to_user->id}}">取消黑名单</a></li>
	                            @endif
                            @endif
                            
                            
                        </ul>
                    </div>
                </div>
        	<div class="message-body" style="overflow: auto;position:relative;padding-top: 70px;padding-bottom:160px;">
		       
                <!-- message send-->
                @foreach($logs as $log)
                
                	@if($log->sender_id != $log->user_id)
                	<div class="col-xs-12">
                	<div class="row">
                	<div class="col-xs-6">
		                <div id="testimonials-6" class="carousel slide testimonials testimonials-v1 ">
	                        <div class="item active">
	                            <p class="rounded-2x">{{$log->content}}</p>
	                            <div class="testimonial-info" style="margin-bottom: 26px;">
	                                <img class="rounded-2x" src="{{$to_user->avatar?$to_user->avatar:'/assets/img/testimonials/img2.jpg'}}" alt="" style="width:50px;height: 50px;">
	                                <span class="testimonial-author">
	                                    {{$to_user->nickname}}
	                                    <em>&nbsp;</em>
	                                </span>
	                            </div>
	                        </div>
		                </div>
	                </div>
	                </div>
	                </div>

	                @else
                



                <!--message receive-->
                
                <div class="col-xs-6 col-xs-offset-6">
		           <div id="testimonials-4" class="carousel slide testimonials testimonials-v2 ">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <p class="rounded-3x">{{$log->content}}</p>
                                    <div class="testimonial-info">
                                        <span class="testimonial-author">
                                            	&nbsp;&nbsp;&nbsp;&nbsp;我
                                            <em>&nbsp;</em>
                                        </span>
                                    </div>
                                </div>
                             
                            </div>

                         
                        </div>
	            </div>
	            @endif
	            @endforeach
	        
               
			

               

	        </div>
	        	<!--footer-->
	           <div class=" fade in text-center" style="bottom:0;left:15px;right:15px;position:absolute;background-color: #46629E;">
		        	<form  id="MessageForm" class="sky-form" novalidate="novalidate">
	                   

	                    <fieldset>
	                       <section>
                            <label for="content" class="input">
                                <input type="text" name="content" id='content' placeholder="">
                                <input type="hidden" name="receiver_id" value="{{$to_id}}">

                            </label>
                       		</section>
	                    </fieldset>

	                 

	                    <footer>
	                        <button type="submit" class="btn-u">发送</button>
	                    </footer>
	                </form>
		        	
	            </div>	
        </div>
     
        <!-- End Content -->
		<div id="group">
	        <div class="col-md-3">
               <ul class="list-group sidebar-nav-v1" id="sidebar-nav-1">
                   <li class="list-group-item ">
                       
                       <a  href="" class="text-center" style="padding: 8px 10px 8px 10px" >好友分组</a>
                     
                   </li>
                   <li class="list-group-item " style="padding:30px">
                       
                       <div class="loader" style="margin-left: 50%;">
          	      	        <div class="loader-inner ball-scale-multiple">
          	      	          <div></div>
          	      	          <div></div>
          	      	          <div></div>
          	      	        </div>
          	   	      	</div>
                     
                   </li>

                   <li class="list-group-item text-center" style="padding:15px 0;">
                       
                       <button class="btn btn-default" id="addGroup" type="button"><span class="glyphicon glyphicon-plus"></span>新建分组</button>
                       <button class="btn btn-default" type="button">管理分组</button>
                       
                     
                   </li>
                </ul>
	        </div>
        </div>               
        <!-- End Content -->



      
        @include('user.component.message_right')   
    
       
    </div>
</div><!--/container-->


@endsection
@section('scripts')
<script type="text/javascript" src="/assets/plugins/counter/waypoints.min.js"></script>
<script type="text/javascript" src="/assets/plugins/counter/jquery.counterup.min.js"></script>
<script type="text/javascript" src="/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
<script type="text/javascript" src="/libs/loading/loaders.css.js"></script> 
<script type="text/javascript" src="/assets/js/forms/order.js"></script>


<script src="/libs/tag/jquery.tagsinput.min.js"></script>





@endsection

@section('jquery')

App.initCounter();
App.initScrollBar();
ProfileSocial.initMessage();
ProfileSocial.initGroup();
ProfileSocial.initHistory();
ProfileSocial.initMessageForm();
ProfileSocial.initGroup();
ProfileSocial.DeleteMessage();






@endsection






