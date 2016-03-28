@extends('user.layout.layout')

@section('styles')

  <link rel="stylesheet" href="/bower_components/normalize.css/normalize.css">
  <link rel="stylesheet" href="/bower_components/css/main.css">
   <link rel="stylesheet" href="/assets/css/pages/blog_masonry_3col.css">

   <style type="text/css">

	.co-list>li {
    display: inline-block;
    padding-right: 5px;
    padding-left: 5px;
}


   </style>

@endsection
@section('breadcrumbs')
<div class="breadcrumbs" style="margin-bottom: 30px;padding-top:15px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 academy-list">
                    <h1 class="" style="font-size:30px;margin-bottom: 30px;">合作</h1>
                    <ul class="list-unstyled list-inline">
                    	<li><a href="javascript:;">类别</a></li>
                    	<li class="{{$category=='all_cat'||$category==''?'active':''}}"><a href="/search/cooperation/all_cat">全部</a></li>

                    	 @foreach($categories as $cat)
                        <li class="{{$category==$cat->slug?'active':''}}"><a href="/search/cooperation/{{$cat->slug}}">{{$cat->name}}</a></li>

                        @endforeach
                    </ul>
					@if($category != 'all_cat')	
                     <ul class="list-unstyled list-inline" id="filters">
				
                     @foreach($child_categories as $cat)
                     <li data-filter="{{$cat->slug}}">{{$cat->name}}</li>
	                 @endforeach
	                @endif 
              
                        
                    </ul>
           
                </div>
            </div>
          
        </div>
    </div>
@endsection



@section('content')
<div>


  <!--
    These are our filter options. The "data-filter" classes are used to identify which
    grid items to show.
    -->

  <div role="main">
    <ul id="container" class="tiles-wrap animated">
      <!--
        These are our grid items. Notice how each one has classes assigned that
        are used for filtering. The classes match the "data-filter" properties above.




        <!--hr-->
        @foreach($demands as $demand)
      <li data-filter-class='["{{$demand->slug}}"]'>
        <img src="{{$demand->src}}" class="text-center">
        <div class=" co-margin text-center">
        <i class="fa fa-mars"></i>&nbsp;<a href="#">{{$demand->name}}</a><span>&nbsp;|&nbsp;</span><span><i class="fa fa-clock-o"></i>&nbsp;2012-03-09</span><span>&nbsp;|&nbsp;</span><span><i class="fa fa-comments-o"></i>&nbsp;</span>
        <p style="width:200px;word-break: break-all;word-wrap: break-word;">{{$demand->content}}</p>
        </div>
     	
       
      </li>
      @endforeach
    
      <!-- End of grid blocks -->
    </ul>

  </div>
</div>


@endsection

@section('scripts')
<script src="/bower_components/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="/bower_components/wookmark.js"></script>
@endsection

@section('jquery')

  ProfileSocial.initCooperation();
@endsection




