@extends('user.layout.layout')

@section('styles')

<link rel="stylesheet" href="/assets/css/pages/profile.css">
<link rel="stylesheet" href="/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">


<link rel="stylesheet" href="/assets/plugins/ladda-buttons/css/custom-lada-btn.css">
<link rel="stylesheet" href="/assets/plugins/hover-effects/css/custom-hover-effects.css">

<link rel="stylesheet" href="/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
<link rel="stylesheet" href="/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">
<style>
  .type-ul{
    padding:0 5px;
  }
  .type-ul li{
    font-size:14px;
    margin-right: 20px;
    padding-top: 10px;
    padding-bottom:9px; 
  }
  .type-ul li a {
    display: inline;
    text-decoration: none;
  }
  .type-ul li.active{
    border-bottom: 2px solid #4765a0;
    color:#4765a0;
    z-index: 100;
    
  }

</style>
@endsection

@section('content')
    <div class="container content profile">
    	<div class="row">
            <!--Left Sidebar-->
       		@include('user.component.profile_leftbar')	
            <!--End Left Sidebar-->

            <!-- Profile Content -->
         	    <div class="col-md-9">
                    <div class="profile-body">
                      <!--  <div class="heading heading-v1 margin-bottom-40">

                           <h2><a href="/user/home/create-album">我的红人专辑</a></h2>
                           <p>您的红人专辑将会随着您发布的需求一起展示，耐心的打造红人专辑将有助于您最快的找到梦想Partner!</p>
                       </div> -->
                        <ul class="list-inline list-unstyled type-ul">
                          <li class="{{Request::input('type')=='personal'||Request::input('type')==''?'active':''}}"><a href="/user/home/profile-album?type=personal">个人秀</a></li>
                          <li class="{{Request::input('type')=='experience'?'active':''}}"><a href="/user/home/profile-album?type=experience">经验分享</a></li>
                      
                  
                        </ul>
                        <hr style="position:relative;margin-top:-10px;border-top: 2px solid #eee;margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-md-12">
                              @if(Request::input('type')=='personal'||Request::input('type')==''?'active':'')
                             <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                                
                                 <li>
                                     <a class="rounded" href="/user/home/create-album?type=personal"><i class="fa fa-edit"></i>发布文章</a>
                                     
                                 </li>
                                  <li>
                                     <a class="rounded" href="/user/home/create-video?type=personal"><i class="fa  fa-caret-square-o-right"></i>上传视频</a>
                                 
                                 </li>
                                 
                             </ul>
                             
                           
                              @else
                              <ul class="list-inline badge-lists badge-box-v2 margin-bottom-30">
                                
                                 <li>
                                     <a class="rounded" href="/user/home/create-album?type=experience"><i class="fa fa-edit"></i>发布文章</a>
                                     
                                 </li>
                                  <li>
                                     <a class="rounded" href="/user/home/create-video?type=experience"><i class="fa  fa-caret-square-o-right"></i>上传视频</a>
                                 
                                 </li>
                                 
                             </ul>
                              
                            


                              @endif
                              
                            </div>
                  
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <table class="table table-striped">
                                            
                                <tbody>
                                  @foreach($covers as $key=>$cover)
                                    <tr>
                                        <td class="col-md-1">{{$key+1}}</td>
                                        <td class="col-md-1"><i class="fa {{$cover->media=='video'?'fa-film':'fa-file-word-o'}}"></i></td>
                                        <td class="col-md-1">
                                        @if($cover->status !='publish')
                                        <span class="label rounded label-danger">等待审核</span>
                                        @else
                                        <span class="label rounded label-success">发布中</span>
                                        @endif

                                        </td>
                                        <td class="col-md-4">{{$cover->title}}</td>
                                      
                                        <td class="col-md-2">{{date('Y-m-d',$cover->post_time)}}</td>
                                        <td class="col-md-3">
                                          <a href="/user/home/album-detail?album={{$cover->id}}" style="color:#fff;"class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> 编辑</a>
                                          <a class="btn btn-danger btn-xs delAlbum"  value="{{$cover->id}}" style="color:#fff;"><i class="fa fa-trash-o"></i> 删除</a>
                                        </td>
                                    </tr>
                                  @endforeach 
                             
                                </tbody>
                            </table>
                          </div>

                        </div>
  
               
                    </div>
       
              </div>
        </div>

    </div><!--/container-->



@endsection

@section('scripts')
<script type="text/javascript" src="/assets/plugins/counter/waypoints.min.js"></script>
<script type="text/javascript" src="/assets/plugins/counter/jquery.counterup.min.js"></script>
<script type="text/javascript" src="/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/cube-portfolio/cube-portfolio-3.js"></script>




@endsection

@section('jquery')

  App.initCounter();
  App.initScrollBar();
  ProfileSocial.delAlbum();

   

@endsection










