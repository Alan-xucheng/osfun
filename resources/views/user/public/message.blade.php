@extends('user.layout.layout')

@section('styles')

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

</style>

@endsection

@section('breadcrumbs')
    <div class="breadcrumbs" style="background: #46629E;">
        <div class="container">
            <h1 class="pull-left" style="color:#fff;">消息</h1>
            <ul class="pull-right breadcrumb">
         
                <li><a href="" style="color:#fff;">消息</a></li>
                <li class="active" style="color:#fff;">正在沟通的人</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

@endsection



@section('content')
<div class="container content">
    <div class="row">
  
        @include('user.component.message_left')    
        <!-- Begin Content -->
        <div class="col-md-6">
        	<div class="message-body" style="min-height: 400px;">
		        <div class="alert fade in">
                    <button class="btn-u btn-brd rounded btn-u-default btn-u-xs" type="button">清空所有消息</button>
                    <button class="btn-u btn-brd rounded btn-u-default btn-u-xs" type="button">全部置为已读</button>
                </div>
                <!-- message body-->
                <div class="tag-box ">
                    <p >
                        <div class="row comment-box">
                            <div class="col-xs-2 badge-lists">
                                <img class="img-responsive img-bordered rounded-x" style="width: 50px;height: 50px;"src="/assets/img/demo.jpg" alt="">
                                <span class="badge badge-red rounded-x">3</span>
                            </div>
                            <div class="col-xs-10" style="padding-left: 0;">
                                <div class="clearfix">
                                    <h5 class="pull-left"><a href="{{url('/user/home/message-history')}}">黑天猫警长</a></h5>
                                  
                                        <div class="btn-group pull-right">
                                              <span>2016.2.3&nbsp;</span>    
                                            <a type="button" style="color:#555;cursor:pointer;background-color: #fff;" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                <i class="fa fa-cog"></i>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </a>

                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">删除</a></li>
                                                <li><a href="#">加为好友</a></li>
                                                
                                            </ul>
                                        </div>
                                   
                                </div>
                                
                                <p>这是一段简介</p>
                            </div>
                        </div>
                        <hr>
                    </p>
                    <p>
                        <div class="row">
                            <div class="col-xs-2">
                                <img class="img-responsive img-bordered rounded-x" style="width: 50px;height: 50px;"src="/assets/img/demo.jpg" alt="">
                            </div>
                            <div class="col-xs-10" style="padding-left: 0;">
                                <h5>黑天猫警长</h5>
                                <p>这是一段简介</p>
                            </div>
                        </div>
                        <hr>
                    </p>

                    

                  
                </div>
                <!-- message body-->

	        </div>
        </div>
        <!-- End Content -->
        @include('user.component.message_right')   
       
    </div>
</div><!--/container-->


@endsection