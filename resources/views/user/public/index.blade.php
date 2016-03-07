@extends('user.layout.layout')

@section('styles')
<!-- CSS Page Style -->

  <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
        <!-- CSS Page Style -->
    <link rel="stylesheet" href="assets/css/pages/page_search.css">
@endsection


@section('content')
	<!--=== Search Block ===-->
	<div class="search-block parallaxBg">
	  <div class="container">
	      <div class="col-md-6 col-md-offset-3">
	          <h1>Discover <span class="color-green">new</span> things</h1>

	          <div class="input-group">
	              <input type="text" class="form-control" placeholder="Search words with regular expressions ...">
	              <span class="input-group-btn">
	                  <button class="btn-u btn-u-lg" type="button"><i class="fa fa-search"></i></button>
	              </span>
	          </div>

	          <form action="" class="sky-form page-search-form">
	              <div class="inline-group">
	                  <label class="checkbox"><input type="checkbox" name="checkbox-inline" checked><i></i>Recent</label>
	                  <label class="checkbox"><input type="checkbox" name="checkbox-inline"><i></i>Related</label>
	                  <label class="checkbox"><input type="checkbox" name="checkbox-inline"><i></i>Popular</label>
	                  <label class="checkbox"><input type="checkbox" name="checkbox-inline"><i></i>Most Common</label>
	              </div>
	          </form>
	      </div>
	  </div>
	</div><!--/container-->
	<!--=== End Search Block ===-->
	<!--=== Container Part ===-->
	<div class="bg-grey">
	  <div class="container content-md">
	        <div class="tab-v2">
				<ul class="nav nav-tabs">
						<li class="active"><a href="#home-1" data-toggle="tab" aria-expanded="true">我最爱标签</a></li>
						<li class=""><a href="#profile-1" data-toggle="tab" aria-expanded="false">热门标签</a></li>
					
				</ul>
				<div class="tab-content">
						<div class="tab-pane fade active in" id="home-1">
								
								<p>
									<ul class="list-inline badge-lists margin-bottom-30">
		                                
		                                <li>
		                                    <a class="btn-u btn-u-sm btn-u-red" href="#">网红</a>
		                                    <span class="badge badge-sea rounded-2x">9</span>
		                                </li>
		                               
		                            </ul>
								</p>
						</div>
						<div class="tab-pane fade" id="profile-1">
								<p>
									<ul class="list-inline badge-lists margin-bottom-30">
		                                @foreach($tags  as $tag)
		                                <li>
		                                    <a class="btn-u btn-u-sm btn-u-red" href="/?tag={{$tag->id}}">{{$tag->tag_name}}</a>
		                                    <span class="badge badge-sea rounded-2x">{{$tag->num}}</span>
		                                </li>
		                                @endforeach
		                               
		                            </ul>
								</p>
				
						</div>
				
				</div>
			</div>
	      <ul class="row list-row margin-bottom-30">
				@foreach($posts as $post)	
	          	<li class="col-md-4 " style="margin-bottom: 15px;">
	              <div class="content-boxes-v3 block-grid-v1 rounded">
	                  <img class="rounded-x pull-left block-grid-v1-img" src="{{$post->avatar?$post->avatar:'assets/img/testimonials/img2.jpg'}}" alt="">
	                  <div class="content-boxes-in-v3">
	                      <h3><a href="#">{{$post->title}}</a></h3>
	                     	  <div class="margin-bottom-10 margin-top-10">  
	                     	  	  @foreach($post->tags as $tag)		                                               
                                  <span class="label rounded label-red">{{$tag}}</span>
                                  @endforeach
                              </div>
	                      <ul class="list-inline margin-bottom-5">
	                          <li>来自<a class="color-green" href="#">{{$post->nickname}}</a></li>
	                          <li><i class="fa fa-clock-o"></i>{{date('Y-m-d',$post->end_time)}}</li>
	                      </ul>
	                      <p>{{$post->desc}}</p>
	                      <ul class="list-inline block-grid-v1-add-info">
	                          <li><a href="#"><i class="fa fa-eye"></i> 7653</a></li>
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

	<!--=== Container Part ===-->

@endsection




@section('scripts')
<script type="text/javascript" src="/assets/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/cube-portfolio/cube-portfolio-3.js"></script>
@endsection







