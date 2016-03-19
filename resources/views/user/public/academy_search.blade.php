@extends('user.layout.layout')

@section('styles')
<!-- CSS Page Style -->
<link rel="stylesheet" href="assets/css/pages/page_search_inner.css">

@endsection

@section('breadcrumbs')

<div class="breadcrumbs" style="margin-bottom: 30px;padding-top:30px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12  academy-list">
                    <h1 class="" style="font-size:30px;margin-bottom: 30px;">网红学院</h1>
                    <ul class="list-unstyled list-inline">
                        <li><a href="javascript:;">类别</a></li>
                        <li class="active"><a href="#">穿衣搭配</a></li>
                        <li class=""><a href="#">化妆</a></li>
                    </ul>
                    <ul class="list-unstyled list-inline">
                        <li><a href="javascript:;">类型</a></li>
                        <li class=""><a href="#">视频</a></li>
                        <li class=""><a href="#">文章</a></li>
                    </ul>
                    <ul class="list-unstyled list-inline">
                        <li><a href="javascript:;">排序</a></li>
                        <li class=""><a href="#">热门喜欢</a></li>
                        <li class=""><a href="#">正在热议</a></li>
                        <li class=""><a href="#">官方推荐</a></li>
                        <li class=""><a href="#">最新发布</a></li>
                    </ul>
                </div>
            </div>
          
        </div>
    </div>
@endsection


@section('content')
<!--=== Search Block Version 2 ===-->


    <!--=== Search Results ===-->
    <div class="container s-results margin-bottom-50" >
        <div class="row">
    

            <div class="col-md-12">
                <div class="row">
                    @foreach($covers as $cover)
                    <div class="col-sm-4 col-md-3" style="background-color: #FCFCFC">
                        <div class="thumbnails ">
                            <a class="fancybox" data-rel="fancybox-button" title="Project #1">
                                <img class="img-responsive" src="{{$cover->img?$cover->img:'assets/img/main/img18.jpg'}}" alt="">
                            </a>
                            <div class="caption">
                                <h5 style="padding-bottom: 0px;"><a class="hover-effect" href="/academy/detail/{{$cover->id}}">{{$cover->title}}</a></h5>
                                <p>{{$cover->name}}</p>
                            </div>
                            <div class="th-footer">
                                <div class="row">
                                    <div class="col-xs-4"><i class="fa fa-caret-square-o-right"></i>&nbsp;22</div>
                                    <div class="col-xs-4"><i class="fa fa-thumbs-o-up"></i>&nbsp;22</div>
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


@endsection