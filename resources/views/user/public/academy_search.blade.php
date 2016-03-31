@extends('user.layout.layout')

@section('styles')
<!-- CSS Page Style -->
<!-- <link rel="stylesheet" href="/assets/css/pages/page_search_inner.css"> -->

@endsection

@section('breadcrumbs')

<div class="breadcrumbs" style="margin-bottom: 30px;padding-top:15px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12  academy-list">
                    <h1 class="" style="font-size:30px;margin-bottom: 30px;">网红学院
                         <span style="font-size:12px;color:#555;">网罗热点资讯</span>           
                    </h1>
                    <ul class="list-unstyled list-inline">
                        <li><a href="javascript:;">类别</a></li>
                        <li class="{{$category=='all_cat'||$category==''?'active':''}}"><a href="/search/academy/all_cat/{{$child_category}}/{{$media}}/{{$sort}}">全部</a></li>
                        @foreach($parent_cat as $cat)
                        <li class="{{$category==$cat->slug?'active':''}}"><a href="/search/academy/{{$cat->slug}}/{{$child_category}}/{{$media}}/{{$sort}}">{{$cat->name}}</a></li>
                      
                        @endforeach
                    </ul>
                    @if($category != 'all_cat')
                    <ul class="list-unstyled list-inline">
                        <li><a href="javascript:;">类型</a></li>
                        <li class="{{$child_category=='all'?'active':''}}"><a href="/search/academy/{{$category}}/all/{{$media}}/{{$sort}}">全部</a></li>
                        @foreach($child_cat as $cat)
                        <li class="{{$child_category==$cat->slug?'active':''}}"><a href="/search/academy/{{$category}}/{{$cat->slug}}/{{$media}}/{{$sort}}">{{$cat->name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                    <ul class="list-unstyled list-inline">
                        <li><a href="javascript:;">媒体</a></li>
                        <li class="{{$media=='video'?'active':''}}"><a href="/search/academy/{{$category}}/{{$child_category}}/video/{{$sort}}">视频</a></li>
                        <li class="{{$media=='article'?'active':''}}"><a href="/search/academy/{{$category}}/{{$child_category}}/article/{{$sort}}">文章</a></li>
                        
                    </ul>
                    <ul class="list-unstyled list-inline">
                        <li><a href="javascript:;">排序</a></li>
                        <li class="{{$sort=='hot'?'active':''}}"><a href="/search/academy/{{$category}}/{{$child_category}}/{{$media}}/hot">热门喜欢</a></li>
                        <li class="{{$sort=='comment'?'active':''}}"><a href="/search/academy/{{$category}}/{{$child_category}}/{{$media}}/comment">正在热议</a></li>
                        <li class="{{$sort=='new'?'active':''}}"><a href="/search/academy/{{$category}}/{{$child_category}}/{{$media}}/new">最新发布</a></li>
                        
                    </ul>
                </div>
            </div>
          
        </div>
    </div>
@endsection


@section('content')
<!--=== Search Block Version 2 ===-->

 @if($media =='article')
    <div class="container content">
            <div class="row blog-page">
                <!-- Left Sidebar -->
                <div class="col-md-8 md-margin-bottom-40">
                    <!--Blog Post-->
                    @foreach($covers as $cover)
                    <div class="row blog margin-bottom-15">
                        <div class="col-sm-3">
                            <img class="img-responsive blog-img img-bordered" src="{{$cover->img?$cover->img:'/assets/img/main/img22.jpg'}}" alt="">
                            
                        </div>
                        <div class="col-sm-9">
                            <h4><a href="/view/detail/{{$cover->id}}">{{$cover->title}}</a></h4>
                            <div class="user-info"><i class="fa fa-mars"></i> <a href="#">{{$cover->name}}</a></div>
                            <p style="height:35px;">{{$cover->desc}}</p>
                            <div>

                                <span class="article-box"><i class="fa fa-thumbs-o-up"></i>&nbsp;222</span>

                                <span class="article-box"><i class="fa fa-comment "></i>&nbsp;111</span>

                            </div>
                        </div>
                    </div>
                    <!--End Blog Post-->
                    <hr >
                    @endforeach

                    <!--Blog Post-->
     



                    <!--Pagination-->
                    <div class="text-center">
                        <ul class="pagination">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li class="active"><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">8</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                    <!--End Pagination-->
                </div>
                <!-- End Left Sidebar -->

                <!-- Right Sidebar -->
                <div class="col-md-4">
                

                    <!-- Posts -->
                    <div class="posts margin-bottom-40">
                        <div class="headline headline-md"><h2>Recent Posts</h2></div>
                        <dl class="dl-horizontal">
                            <dt><a href="#"><img src="/assets/img/sliders/elastislide/6.jpg" alt=""></a></dt>
                            <dd>
                                <p><a href="#">Responsive Bootstrap 3 Template placerat idelo alac eratamet.</a></p>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt><a href="#"><img src="/assets/img/sliders/elastislide/10.jpg" alt=""></a></dt>
                            <dd>
                                <p><a href="#">100+ Amazing Features Layer Slider, Layer Slider, Icons, 60+ Pages etc.</a></p>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt><a href="#"><img src="/assets/img/sliders/elastislide/11.jpg" alt=""></a></dt>
                            <dd>
                                <p><a href="#">Developer Friendly Code imperdiet condime ntumi mperdiet condim.</a></p>
                            </dd>
                        </dl>
                    </div><!--/posts-->
                    <!-- End Posts -->

                    <!-- Tabs Widget -->
                    
                </div>
                <!-- End Right Sidebar -->
            </div><!--/row-->
        </div>
    <!--=== End Search Results ===-->
    @else
    <!--=== Search Results ===-->
    <div class="container s-results margin-bottom-50" >
        <div class="row">
    

            <div class="col-md-12">
                <div class="row">
                    @foreach($covers as $cover)
                  <div class="col-sm-3 ">
                           <div class="thumbnails m-video-box">
                               <a class="fancybox" data-rel="fancybox-button" title="Project #1">
                                   <img class="img-responsive" src="{{$cover->img?$cover->img:'assets/img/main/img18.jpg'}}" alt="">
                               </a>
                               <div class="caption">
                                   <h5 style="padding-bottom: 0px;"><a class="hover-effect" href="/academy/detail/{{$cover->id}}">{{$cover->title}}</a></h5>
                                   <p ><a href="/profile/article/{{$cover->uid}}">{{$cover->nickname}}</a><span class="user-v"><i class="fa fa-vimeo"></i></span></p>
                               </div>
                               <div class="th-foote">
                                   <div class="row">
                                       <div class="col-xs-4"><i class="fa fa-caret-square-o-right"></i>&nbsp;22</div>
                                       <div class="col-xs-4 text-center"><i class="fa fa-thumbs-o-up"></i>&nbsp;22</div>
                                       <div class="col-xs-4 text-right"><i class="fa fa-comment "></i>&nbsp;22</div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   
                    @endforeach
                 
                </div> 
             
            </div><!--/col-md-10-->
        </div>
    </div><!--/container-->
    <!--=== End Search Results ===-->



    @endif


@endsection