@extends('user.layout.layout')

@section('styles')
<!-- CSS Page Style -->


@endsection
@section('breadcrumbs')
@include('user.component.profile_bread')

@endsection


@section('content')

    <div class="container" style="margin-top: 30px;margin-bottom:50px;">
            <div class='testimonials-v6 testimonials-wrap'>
            <div class="row">
                <div class="col-md-12 ">
            <div class="row">
                @foreach($covers as $cover)
                   <div class="col-sm-4 col-md-3 ">
                       <div class="thumbnails m-video-box">
                           <a class="fancybox" data-rel="fancybox-button" title="Project #1">
                               <img class="img-responsive" src="{{$cover->img?$cover->img:'assets/img/main/img18.jpg'}}" alt="">
                           </a>
                           <div class="caption">
                               <h5 style="padding-bottom: 0px;"><a class="hover-effect" href="/search/academy/detail/{{$cover->id}}">{{$cover->title}}</a></h5>
                               <p ><a href="/profile/article/{{$cover->uid}}">{{$cover->nickname}}</a><span class="user-v"><i class="fa fa-vimeo"></i></span></p>
                           </div>
                           <div class="th-footer">
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
         	</div>
        </div><!--/col-md-10-->
    </div>
</div><!--/container-->

















@endsection   









 