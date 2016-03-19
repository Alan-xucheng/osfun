@extends('user.layout.layout')

@section('styles')
<!-- CSS Page Style -->


        <!-- CSS Page Style -->
     <link rel="stylesheet" href="/assets/css/pages/page_job.css">
     <style type="text/css">
        .modal_list>li{
            color:#555;
        }

     </style>
@endsection


@section('content')


<!--=== modal ===-->
@include('user.component.index_modal') 
<div id="infoModal"></div>  
<!--=== Job Img ===-->
<div class="job-img margin-bottom-30">
  
    <div class="job-img-inputs">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 md-margin-bottom-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <select class="form-control" style=" -webkit-appearance: none;
 -webkit-border-radius: 0px;">
                        <option value="">全部</option>
                        <option value="">只看男</option>
                        <option value="">只看女</option>
                        </select>

                    </div>
                </div>
                <div class="col-sm-4 md-margin-bottom-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input type="text" placeholder="输入你感兴趣的地点" class="form-control">
                    </div>
                </div>
                <div class="col-sm-4">
                    <button type="button" class="btn-u btn-block btn-u-dark">搜索</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=== End Job Img ===-->


<!--=== Content Part ===-->
<div class="container content">
 

    <!-- Job Content -->
    <div class="headline"><h2>热门标签</h2></div>
    <div class="row job-content margin-bottom-40">
        @foreach($tags->chunk(6)  as $chunk)
        <div class="col-md-3 col-sm-3 md-margin-bottom-40">
           
            <ul class="list-unstyled categories">
                @foreach($chunk as $tag)
                <li><a href="/?tag={{$tag->id}}">{{$tag->tag_name}}</a> <small class="hex">({{$tag->num}})</small></li>
                @endforeach
            </ul>
        </div>
        @endforeach

    </div>
    <!-- End Job Content -->


</div>
<!--=== End Content Part ===-->
<div class="bg-grey">
      <div class="container content-md">
 

          <ul class="row list-row">
             @foreach($posts as $post)
              <li class="col-md-4" style="margin-bottom: 15px;">
                  <div class="content-boxes-v3 block-grid-v1 rounded">
                      <img class="rounded-x pull-left block-grid-v1-img indexModal" post="{{$post->id}}" uid="{{$post->uid}}" src="{{$post->avatar?$post->avatar:'assets/img/team/img1-md.jpg'}}" alt="">
                      <div class="content-boxes-in-v3">
                          <h3><a href="#">{{$post->nickname}}</a></h3>
                          <ul class="star-vote">
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star"></i></li>
                              <li><i class="fa fa-star-half-o"></i></li>
                              <li><i class="fa fa-star-o"></i></li>
                          </ul>
                          <ul class="list-inline margin-bottom-5">
                              <li>By <a class="color-green" href="#">Stanford University</a></li>
                              <li><i class="fa fa-clock-o"></i> Jan 02, 2013</li>
                          </ul>
                          <div style="height:50px;white-space:normal;text-overflow:ellipsis; word-break:break-all; overflow:hidden;">{{$post->content}}</div>
                          <ul class="list-inline block-grid-v1-add-info">
                              <li><a href="/user/message/history?uid={{$post->uid}}&nickname={{$post->nickname}}"><i class="fa fa-eye"></i> 7653</a></li>
                              <li><a href="#"><i class="fa fa-retweet"></i> 342</a></li>
                              <li><a href="#"><i class="fa fa-download"></i> 3621</a></li>
                              <li><a href="#"><i class="fa fa-heart"></i> 583</a></li>
                          </ul>
                      </div>
                  </div>
              </li>
               @endforeach


     
          </ul>
      </div>
    </div>
<

@endsection




@section('scripts')
<script type="text/javascript" src="/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/cube-portfolio/cube-portfolio-3.js"></script>
@endsection

@section('jquery')

    ProfileSocial.ModalIndex();
@endsection





