@extends('user.layout.layout')

@section('styles')
<!-- CSS Page Style -->
<link rel="stylesheet" href="assets/css/pages/page_search_inner.css">

@endsection

@section('breadcrumbs')

<div class="breadcrumbs" style="margin-bottom: 30px;padding-top:30px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 academy-list">
                    <h1 class="" style="font-size:30px;margin-bottom: 30px;">网红圈</h1>
                    <ul class="list-unstyled list-inline">
                        <li><a href="javascript:;">性别</a></li>
                        <li class="{{$sex=='all_sex'||$sex=''?'active':''}}"><a href="/view/all_sex/{{$type}}/{{$sort}}">全部</a></li>
                        <li class="{{$sex=='male'?'active':''}}"><a href="/view/male/{{$type}}/{{$sort}}">男</a></li>
                        <li class="{{$sex=='female'?'active':''}}"><a href="/view/female/{{$type}}/{{$sort}}">女</a></li>
                    </ul>
                    <ul class="list-unstyled list-inline">
                        <li><a href="javascript:;">类型</a></li>
                        <li class="{{$type=='all_media'||$type=''?'active':''}}"><a href="/view/{{$sex}}/all_media/{{$sort}}">全部</a></li>
                        <li class="{{$type=='article'?'active':''}}"><a href="/view/{{$sex}}/article/{{$sort}}">图文</a></li>
                        <li class="{{$type=='video'?'active':''}}"><a href="/view/{{$sex}}/video/{{$sort}}">视频</a></li>
                    </ul>
                    <ul class="list-unstyled list-inline">
                        <li><a href="javascript:;">排序</a></li>
                        <li class="{{Request::input('sort')=='hot'||Request::input('sort')==''?'active':''}}"><a href="{{URL::full()}}?sort=hot">热门喜欢</a></li>
                        <li class="{{Request::input('sort')=='comment'?'active':''}}"><a href="/view?type={{Request::input('type')}}&&sort=comment">正在热议</a></li>
                       
                        <li class="{{Request::input('sort')=='new'?'active':''}}"><a href="/view?type={{Request::input('type')}}&&sort=new">最新发布</a></li>
                    </ul>
                </div>
            </div>
          
        </div>
    </div>
@endsection


@section('content')
<!--=== Search Block Version 2 ===-->


    <!--=== Search Results ===-->
    <div class="container content">
            <div class="row blog-page">
                <!-- Left Sidebar -->
                <div class="col-md-8 md-margin-bottom-40">
                    <!--Blog Post-->
                    @foreach($covers as $cover)
                    <div class="row blog blog-medium margin-bottom-15" style="background-color: #FCFCFC;">
                        <div class="col-md-5">
                            <img class="img-responsive img-bordered" src="{{$cover->img?$cover->img:'/assets/img/main/img22.jpg'}}" alt="">
                        </div>
                        <div class="col-md-7">
                            <h2><a href="/view/detail/{{$cover->id}}">{{$cover->title}}</a></h2>
                            <ul class="list-unstyled list-inline blog-info">
                                <li><i class="fa fa-user"></i> <a href="#">{{$cover->name}}</a></li>
                                <li><i class="fa fa-calendar"></i>&nbsp;{{date('Y-m-d',$cover->post_time)}}</li>
                                
                              
                            </ul>
                            <div style="height:60px;">{{$cover->desc}}</div>
                            <p><a class="btn-u btn-u-sm" href="blog_item.html">详情 <i class="fa fa-angle-double-right margin-left-5"></i></a></p>
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


@endsection