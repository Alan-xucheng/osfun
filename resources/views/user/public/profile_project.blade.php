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
                        <ul class="list-inline list-unstyled type-ul">
                          <li class="{{_IS_ACTIVE(url('/user/home/profile-project'))}}"><a href="/user/home/profile-album?type=personal">全部</a></li>
                        </ul>
                        <hr style="position:relative;margin-top:-10px;border-top: 2px solid #eee;margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-md-12">
                            
                              <a href="javascript:;" id="pageDemand" class="btn-u btn-u-sea" type="button"><i class="fa fa-paint-brush"></i>
                              &nbsp;发布需求</a>
                               <p style="margin-top: 8px;">成功的路上总要有人指引。查看赶紧发布需求，让大家帮助你！<a href="javascript:;">示例需求</a>。</p>
                          
                            </div>
                        
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <table class="table table-striped">
                                            
                                <tbody>
                                  @foreach($demands as $key=>$demand)
                                    <tr>
                                        <td class="col-md-1">{{$key+1}}</td>
                                        <td class="col-md-6">{{$demand->content}}</td>
                                        <td class="col-md-3">{{$demand->created_at}}</td>
                                        <td class="col-md-3">
                                       
                                          <a class="btn btn-danger btn-xs delDemand"  value="{{$demand->id}}" style="color:#fff;"><i class="fa fa-trash-o"></i> 删除</a>
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
  ProfileSocial.delDemand();
   

@endsection










