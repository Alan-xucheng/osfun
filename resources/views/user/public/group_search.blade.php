@extends('user.layout.layout')

@section('styles')
<!-- CSS Page Style -->
<!-- <link rel="stylesheet" href="assets/css/pages/page_search_inner.css"> -->

@endsection

@section('breadcrumbs')

<div class="breadcrumbs" style="margin-bottom: 30px;padding-top:15px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12  academy-list">
                    <h1 class="" style="font-size:30px;margin-bottom: 30px;">圈子
                         <span style="font-size:12px;color:#555;">展示个人价值</span> 
                         <a href="/user/home/create-group" class=" pull-right btn-u btn-u-blue" type="button"><i class="fa fa-certificate"></i>创建圈子</a>          
                    </h1>
                  
                </div>
            </div>
          
        </div>
    </div>
@endsection


@section('content')
<!--=== Content Part ===-->
<div class="container" >
	<div class="row">
    	<div class="col-md-8">
        	<div class="headline"><h2>全部圈子</h2></div>

            <!-- Clients Block-->
            @foreach($groups as $group)
            <div class="row clients-page">
                <div class="col-md-2">
                    <img src="{{$group->image?$group->image:'/assets/img/clients2/baderbrau.png'}}" class="img-responsive hover-effect" alt="" />
                </div>
                <div class="col-md-10">
                    <a href="/group/home/{{$group->id}}"><h3>{{$group->name}}</h3></a>
                    <ul class="list-inline">
                        <li><i class="fa fa-paper-plane-o color-green"></i> 帖子</li>
                        <li><i class="fa fa-video-camera color-green"></i> <a class="linked" href="#">视频</a></li>
                        <li><i class="fa fa-user color-green"></i>&nbsp;成员</li>
                    </ul>
                    <p>{{$group->desc}}</p>
               
                </div>
            </div>
            <hr>
            @endforeach
            <!-- End Clients Block-->

                 <!-- End Clients Block-->

            <!-- Pagination -->
            <div class="text-center md-margin-bottom-30">
                <ul class="pagination">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="active"><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
            <!-- End Pagination -->
        </div><!--/col-md-9-->

    	<div class="col-md-4">
        	<!-- Our Services -->
            <div class="who margin-bottom-30">
                <div class="headline"><h2>全部分类</h2></div>
                <p>At vero eos et accusamus et iusto odio dign issimos ducimus qui blanditiis iusto.</p>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fa fa-desktop"></i>Vivamus imperdiet condimentum</a></li>
                    <li><a href="#"><i class="fa fa-bullhorn"></i>Anim pariatur cliche squid</a></li>
                    <li><a href="#"><i class="fa fa-globe"></i>Eget placerat felis consectetur</a></li>
                    <li><a href="#"><i class="fa fa-group"></i>Condimentum diam eget placerat</a></li>
                </ul>
            </div>

   
        </div><!--/col-md-3-->
    </div><!--/row-->
</div><!--/container-->
<!--=== End Content Part ===-->




@endsection