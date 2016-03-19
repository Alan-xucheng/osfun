@extends('user.layout.layout')

@section('styles')

<link rel="stylesheet" href="/assets/css/pages/profile.css">
<link rel="stylesheet" href="/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">




@endsection

@section('content')
    <div class="container content profile">
    	<div class="row">
            <!--Left Sidebar-->
       		@include('user.component.profile_leftbar')	
            <!--End Left Sidebar-->

            <!-- Profile Content -->
            <div class="col-md-9">
                <div class="profile-body">
                    <div class="breadcrumbs">
                        <div style="padding:0 20px;">
                            <h1 class="pull-left"><a style="text-decoration: none;" href="{{url('user/home/profile-project')}}">个人资料</a></h1>
                            <ul class="pull-right breadcrumb">
                         
                                <li><a href="">个人资料</a></li>
                                <li class="active">发布需求</li>
                            </ul>
                        </div><!--/container-->
                    </div><!--/breadcrumbs-->
                    <!-- Order Form -->
                    <form action="/user/api/api-demand" method="post" enctype="multipart/form-data" id="demandForm" class="sky-form">
                     {!! csrf_field() !!}
                        <header>招募智囊团</header>
								
                 

                        <fieldset>
                        	<section>
	                            <label for="title" class="input">
	                                <input type="text" name="title" id="title" placeholder="标题">
	                            </label>
	                        </section>


                           
                            <section>
								<p><label>添加标签: (合理使用标签可以更快的招募到人才哦！)</label>
								<input id="tags_2" type="text" class="tags" name="tags" value="网红" /></p>
                            </section>
							
                         

                            <section>
                                <label class="textarea">
                                    <i class="icon-append fa fa-comment"></i>
                                    <textarea rows="5" name="content" placeholder="如果有更详细的需求计划，请在这里说明哦！"></textarea>
                                </label>
                            </section>
                        </fieldset>
                        <footer>
                            <button type="submit" class="btn-u">立即发布</button>
                            <div class="progress"></div>
                        </footer>
                       
                    </form>
                    <!-- End Order Form -->
            



                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div><!--/container-->


@endsection

@section('scripts')
<script type="text/javascript" src="/assets/plugins/counter/waypoints.min.js"></script>
<script type="text/javascript" src="/assets/plugins/counter/jquery.counterup.min.js"></script>
<script type="text/javascript" src="/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>

<script type="text/javascript" src="/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script><script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>








@endsection

@section('jquery')

  App.initCounter();
  App.initScrollBar();
  ProfileSocial.initDemand();
  OrderForm.initOrderForm();





@endsection










