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
    #group .loader{
        position: relative;
        margin-top:10%;
        margin-left:60%;
    }
    .ball-scale-multiple > div {
      background: #46629E;
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
                   <!--  <button class="btn-u btn-brd rounded btn-u-default btn-u-xs" type="button">全部置为已读</button> -->
                </div>
                <!-- message body-->
                <div class="tag-box ">
                @foreach($lists as $list)
                    <p >
                        <div class="row comment-box">
                            <div class="col-xs-2 badge-lists">
                                <img class="img-responsive img-bordered rounded-x" style="width: 50px;height: 50px;"src="{{$list->avatar?$list->avatar:'/assets/img/demo.jpg'}}" alt="">
                                @if($list->unread != 0 )
                                <span class="badge badge-red rounded-x">{{$list->unread}}</span>
                                @endif
                            </div>
                            <div class="col-xs-10" style="padding-left: 0;">
                                <div class="clearfix">
                                    <h5 class="pull-left"><a href="/user/message/history?uid={{$list->uid}}&nickname={{$list->nickname}}">{{$list->nickname}}</a></h5>
                                  
                                        <div class="btn-group pull-right">
                                              <span>{{$list->updated_at}}&nbsp;</span>    
                                            <a type="button" style="color:#555;cursor:pointer;background-color: #fff;" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                <i class="fa fa-cog"></i>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">删除对话</a></li>
                                            @if(is_null($list->ship_type))
                                            <li><a href="javascript:;" id="addFriend" value="{{$list->uid}}">加为好友</a></li>
                                            <li><a href="javascript:;" id="blackFriend" value="{{$list->uid}}">加入黑名单</a></li>
                                            @else
                                                @if($list->ship_type !='black')
                                                <li><a href="javascript:;" id="removeFriend" value="{{$list->uid}}">删除好友</a></li>
                                                <li><a href="javascript:;" id="blackFriend" value="{{$list->uid}}">加入黑名单</a></li>
                                                @else
                                                <li><a href="javascript:;" id="removeBlack" value="{{$list->uid}}">取消黑名单</a></li>
                                                @endif
                                            @endif
                                            
                                            
                                        </ul>
                                        </div>
                                   
                                </div>
                                
                                <p>{{$list->desc}}</p>
                            </div>
                        </div>
                        <hr>
                    </p>
                    @endforeach
                   
                    

                  
                </div>
                <!-- message body-->

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
        @include('user.component.message_right')   
       
    </div>
</div><!--/container-->


@endsection
@section('scripts')

<script type="text/javascript" src="/assets/js/forms/order.js"></script>






@endsection
@section('jquery')


  ProfileSocial.initMessage();
  ProfileSocial.initGroup();
  ProfileSocial.DeleteMessage();








@endsection



