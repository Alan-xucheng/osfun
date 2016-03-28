@extends('user.layout.layout')

@section('styles')
<!-- CSS Page Style -->
<!-- <link rel="stylesheet" href="/assets/css/pages/page_search_inner.css"> -->
    <link rel="stylesheet" href="/assets/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="/assets/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css">

<style type="text/css">
    
    .wrapper{
        background: #f9f9f9;
    }
</style>

@endsection

@section('breadcrumbs')

<div class="breadcrumbs" style="margin-bottom: 30px;padding-top:15px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12  academy-list">
                    <h1 class="" style="font-size:30px;margin-bottom: 30px;">服务商
                         <span style="font-size:12px;color:#555;">认证为服务商</span> 
                         <a href="/user/home/service-apply" class=" pull-right btn btn-warning" type="button"><i class="fa fa-certificate"></i>认证为服务商</a>          
                    </h1>
                    <ul class="list-unstyled list-inline">
                        <li><a href="javascript:;">类别</a></li>
                        <li class="{{$category=='all_cat'||$category==''?'active':''}}"><a href="/search/service/all_cat/{{$child_category}}/{{$location}}/{{$sort}}">全部</a></li>
                        @foreach($parent_cat as $cat)
                        <li class="{{$category==$cat->slug?'active':''}}"><a href="/search/service/{{$cat->slug}}/{{$child_category}}/{{$location}}/{{$sort}}">{{$cat->name}}</a></li>
                      
                        @endforeach
                    </ul>
                      @if($category != 'all_cat')
                    <ul class="list-unstyled list-inline">
                        <li><a href="javascript:;">子类</a></li>
                        <li class="{{$child_category=='all'?'active':''}}"><a href="/search/service/{{$category}}/all/{{$location}}/{{$sort}}">全部</a></li>
                        @foreach($child_cat as $cat)
                        <li class="{{$child_category==$cat->slug?'active':''}}"><a href="/search/service/{{$category}}/{{$cat->slug}}/{{$location}}/{{$sort}}">{{$cat->name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                  
                    <ul class="list-unstyled list-inline location-line" style="position:relative;">
                        <!-- <div class="location-btn">展开&nbsp;<i class="fa fa-toggle-down"></i></div>
 -->                        <li><a href="javascript:;">所在地区</a></li>
                        <li class="{{$location=='all'||$location==''?'active':''}}"><a href="/search/service/{{$category}}/{{$child_category}}/all/{{$sort}}">全部</a></li>
                        @foreach($china as $value)
                        <li class="{{$location==$value->id?'active':''}}"><a href="/search/service/{{$category}}/{{$child_category}}/{{$value->id}}/{{$sort}}">{{$value->name}}</a></li>
                        @endforeach

                       
                        
                    </ul>
                    <ul class="list-unstyled list-inline" >
                      
                        <li><a href="javascript:;">排序</a></li>
                        <li class="{{$sort=='hot'?'active':''}}"><a href="/search/service/{{$category}}/{{$child_category}}/{{$location}}/hot">最受喜欢</a></li>
                        <li class="{{$sort=='comment'?'active':''}}"><a href="/search/service/{{$category}}/{{$child_category}}/{{$location}}/comment">活跃度</a></li>
                        <li class="{{$sort=='new'?'active':''}}"><a href="/search/service/{{$category}}/{{$child_category}}/{{$location}}/new">作品数</a></li>
                        
                    </ul>
                </div>
            </div>
          
        </div>
    </div>
@endsection


@section('content')
<div class="container content">
        <div class="row blog-page">
            <!-- Left Sidebar -->
            <div class="col-md-12 md-margin-bottom-40">
                <!--Blog Post-->
              @foreach($people as $people)
                <div class="row blog margin-bottom-15 service_content">
                    <div class="col-lg-3 col-md-4" style="margin-top: 18px;padding-left: 20px;">
                        <div class="clearfix">
                            <div class="pull-left text-center">
                                 <img class="img-responsive blog-img rounded-x img-bordered pull-left" src="{{$people->avatar?$people->avatar:'/assets/img/testimonials/img6.jpg'}}" alt="" style="width:100px "/>

                                
                            </div>
                            <div class="service_info">
                                <h4><a href="/profile/article/{{$people->id}}">{{$people->nickname}}</a></h4>
                                <p>{{$people->province}} {{$people->city}}</p>
                                <p>{{$people->cat_name}}</p>
                                <div>
                                    

                                </div>
                            </div>
                        </div>
                        <div class="service_progress">
                            <button class="btn-u btn-brd   btn-u-xs" type="button"><i class="fa fa-commenting"></i>&nbsp;联系我</button>

                            <span class="article-box service_box"><i class="fa fa-thumbs-o-up"></i>&nbsp;222</span>

                            <span class="article-box"><i class="fa fa-comment "></i>&nbsp;111</span>

                                 
                        </div>
                       
                        
                    </div>
                   
                    <div class="cube-portfolio  col-lg-9 col-md-12">
                        <div id="grid-container" class="cbp-l-grid-gallery"> 
                            @foreach($people->album as $value)   
                            <div class="cbp-item illustration web-design col-sm-4">
                                <a href="/view/detail/{{$value->id}}" class="cbp-caption ">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="{{$value->img}}" alt="">
                                    </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">{{$value->title}}</div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                           
                        </div>
                    </div> 

               
                    
                </div>
                <!--End Blog Post-->
                <hr >

                @endforeach
               

                <!--Blog Post-->
 



            </div>
            <!-- End Left Sidebar -->

        
        </div><!--/row-->
    </div>



@endsection

@section('scripts')
<script type="text/javascript" src="/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/cube-portfolio/cube-portfolio-lightbox.js"></script>

@endsection

@section('jquery')

ProfileSocial.serviceSearch();
@endsection









