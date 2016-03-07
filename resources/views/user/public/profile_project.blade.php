@extends('user.layout.layout')

@section('styles')

<link rel="stylesheet" href="/assets/css/pages/profile.css">
<link rel="stylesheet" href="/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">

<link rel="stylesheet" href="/assets/plugins/ladda-buttons/css/custom-lada-btn.css">
<link rel="stylesheet" href="/assets/plugins/hover-effects/css/custom-hover-effects.css">

<link rel="stylesheet" href="/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
<link rel="stylesheet" href="/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">
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
                        <div class="alert alert-info fade in">
                             我发布的图片文章
                        </div>
                        <div class="row">
                        <!-- End Profile Content -->
                        <div id="grid-container" class="cbp-l-grid-agency  cube-portfolio col-md-12">
                            <div class="cbp-item web-design logos">
                                <div class="cbp-caption">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="/assets/img/main/img8.jpg" alt="">
                                    </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body">
                                                <ul class="link-captions">
                                                    <li><a href="portfolio_single_item.html"><i class="rounded-x fa fa-link"></i></a></li>
                                                    <li><a href="/assets/img/main/img8.jpg" class="cbp-lightbox" data-title="Design Object"><i class="rounded-x fa fa-search"></i></a></li>

                                                </ul>
                                                <div class="cbp-l-grid-agency-title">Design Object 02</div>
                                                <div class="cbp-l-grid-agency-desc">Web Design</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                         </div><!--/end Grid Container-->
                        </div>
                        <div class="alert alert-info fade in margin-top-20">
                             我发布的需求
                             <a href="{{url('/user/home/profile-demand')}}" rel="float-shadow" style="position: relative;margin-top:-6px;" class="btn-u btn-u-sea float-shadow pull-right" >发布新需求</a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="row list-row margin-bottom-30">
                                    @if(!empty($demands))
                                    @foreach($demands as $demand)
                                    <li class="col-md-6" style="margin-bottom: 15px;">
                                      <div class="content-boxes-v3 block-grid-v1 rounded">
                                          
                                          <div class="content-boxes-in-v3">
                                                <div class="row">
                                                <div class="col-xs-7">
                                                    <h3 style="margin-bottom:10px;"><a href="#">{{$demand->title}}</a></h3>
                                                </div>
                                                <div class="col-xs-5">
                                                     <ul class="list-inline badge-lists badge-icons" style="margin-top:6px;margin-left:100%;">
                                                  
                                                    <li>
                                                        <a href="#"><i class="fa fa-cog"></i></a>
                                                        
                                                    </li>
                                                 
                                                </ul>
                                                </div>
                                                </div>
                                              
                                             
                                              <div class="margin-bottom-10 margin-top-10">
                                                  @foreach($demand->tags as $tag)  
                                                  <span class="label label-red">{{$tag}}</span>
                                                
                                                  @endforeach
                                              </div>
                                              <ul class="list-inline margin-bottom-5">
                                                 
                                                  <li><i class="fa fa-clock-o"></i>{{date('Y-m-d',$demand->end_time)}}</li>
                                              </ul>
                                              <p>{{$demand->desc}}</p>
                                              <ul class="list-inline block-grid-v1-add-info">
                                                  <li><a href="#"><i class="fa fa-eye"></i> 7653</a></li>
                                      
                                                  <li><a href="#"><i class="fa fa-commenting-o"></i> 7653</a></li>
                                                 
                                                  <li><a href="#"><i class="fa fa-heart"></i> 583</a></li>
                                              </ul>
                                          </div>
                                      </div>
                                    </li>
                                    @endforeach
                                    @endif
                                        
                                            
                                </ul>


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
   

@endsection










