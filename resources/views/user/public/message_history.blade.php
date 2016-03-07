@extends('user.layout.layout')

@section('styles')
<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
<style type="text/css">
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

</style>

@endsection





@section('content')
<div class="container content">
    <div class="row">
  
        @include('user.component.message_left')    
        <!-- Begin Content -->
        <div class="col-md-6">
         <div class="alert fade in text-center" style="left:15px;right:15px;z-index: 1;position: absolute;background-color: #46629E;">
		        	<span class="glyphicon glyphicon-arrow-left pull-left" style="color:#fff;"></span>
                    <span style="color:#fff;">与某某 正在对话中</span>
                    <div class="btn-group pull-right">
                          
                        <a type="button" style="color:#fff;cursor:pointer;background-color: #46629E;" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <i class="fa fa-cog"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">删除</a></li>
                            <li><a href="#">加为好友</a></li>
                            
                        </ul>
                    </div>
                </div>
        	<div class="message-body" style="overflow: auto;position:relative;padding-top: 70px;padding-bottom:130px;">
		       
                <!-- message send-->
                
                	<div class="col-xs-6">
		                <div id="testimonials-6" class="carousel slide testimonials testimonials-v1 ">
	                        <div class="item active">
	                            <p class="rounded-2x">Ducimusqui ducimus qui blanditiis praesentium voluptatum deleniti atque corru</p>
	                            <div class="testimonial-info">
	                                <img class="rounded-2x" src="/assets/img/testimonials/img2.jpg" alt="">
	                                <span class="testimonial-author">
	                                    Jeremy Asigner
	                                    <em>Web Developer, Unify Theme.</em>
	                                </span>
	                            </div>
	                        </div>
		                </div>
	                </div>
                



                <!--message receive-->
                @for($i=0;$i<10;$i++)
                <div class="col-xs-6 col-xs-offset-6">
		           <div id="testimonials-4" class="carousel slide testimonials testimonials-v2 ">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <p class="rounded-3x">Dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolo.</p>
                                    <div class="testimonial-info">
                                        <span class="testimonial-author">
                                            	&nbsp;&nbsp;&nbsp;&nbsp;Me
                                            <em>&nbsp;</em>
                                        </span>
                                    </div>
                                </div>
                             
                            </div>

                         
                        </div>
	            </div>
	            @endfor
               
			

               

	        </div>
	        	<!--footer-->
	           <div class=" fade in text-center" style="bottom:0;left:15px;right:15px;position:absolute;background-color: #46629E;">
		        	<form action="#" id="sky-form" class="sky-form" novalidate="novalidate">
	                   

	                    <fieldset>
	                   

	                       <section>
                            <label for="file" class="input">
                                <input type="text" id="file" placeholder="">
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
        @include('user.component.message_right')   
       
    </div>
</div><!--/container-->


@endsection
@section('scripts')
<script type="text/javascript" src="/assets/plugins/counter/waypoints.min.js"></script>
<script type="text/javascript" src="/assets/plugins/counter/jquery.counterup.min.js"></script>
<script type="text/javascript" src="/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script><script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>

<script type="text/javascript" src="/assets/js/forms/order.js"></script>
<script type="text/javascript" src="/init/js/profile.js"></script>
<script src="/libs/tag/jquery.tagsinput.min.js"></script>





@endsection

@section('jquery')

  App.initCounter();
  App.initScrollBar();
  ProfileSocial.initMessage();






@endsection






