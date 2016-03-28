@extends('user.layout.layout')

@section('styles')
<!-- CSS Page Style -->


@endsection
@section('breadcrumbs')

@include('user.component.profile_bread')

@endsection


@section('content')

        <div class="container" style="margin-top: 30px;">
            <div class='testimonials-v6 testimonials-wrap'>
            <div class="row">
                <div class="col-md-12 ">
                <!--Blog Post-->
                @foreach($covers as $cover)
                <div class="my-box">
                <div class="row blog ">
                    <div class="col-lg-2 col-md-3">
                        <img class="img-responsive article-img img-bordered" src="{{$cover->img}}" alt="">  
                    </div>
                    <div class="col-lg-10 col-md-9">
                        <h4><a href="/view/detail/{{$cover->id}}">{{$cover->title}}</a></h4>
                       
                        <p style="height:45px;">{{$cover->desc}}</p>
                        <div>

                            <span class="article-box"><i class="fa fa-thumbs-o-up"></i>&nbsp;222</span>

                            <span class="article-box"><i class="fa fa-comment "></i>&nbsp;111</span>

                        </div>
                    </div>
                </div>
                <!--End Blog Post-->
               
                </div>
                @endforeach
            </div>
            </div>
            </div>
        </div>

@endsection  
@section('scripts')

<script type="text/javascript" src="/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="/libs/birthday/birthday.js"></script>
<script type="text/javascript" src="/libs/cityselect/js/jquery.cityselect.js"></script>
<script type="text/javascript" src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js"></script> 
@endsection
@section('jquery')

ProfileSocial.editProfile();
@endsection 









 