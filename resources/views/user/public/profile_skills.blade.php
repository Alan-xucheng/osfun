@extends('user.layout.layout')

@section('styles')

<link rel="stylesheet" href="/assets/css/pages/profile.css">
<link rel="stylesheet" href="/assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
<link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">

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
                            <h1 class="pull-left">
                                <a style="text-decoration: none;" href="{{url('user/home/profile-me')}}">个人资料</a>
                            </h1>
                            <ul class="pull-right breadcrumb">
                         
                                <li><a href="">个人资料</a></li>
                                <li class="active">爱好特长</li>
                            </ul>
                        </div><!--/container-->

                    </div><!--/breadcrumbs-->
                    
                    
                    <!-- Rounded Slider Forms -->
                    <form action="#" id="sky-form2" class="sky-form label-rounded">
                        <header>
                             爱好特长 
                            <a rel="pulse-grow" class="pull-right btn-u btn-u-red" id="addSkill">添加新技能</a>
                        </header>


                        <fieldset class="skillField">
                        
                            @foreach($skills as $skill)    
                            <section>
                                <label class="label rounded-x"><span class='skillName' mark="{{$skill->mark}}">{{$skill->name}}</span>(<span class="slider3-value-rounded">了解</span>)</label>
                                <div class="slider3-rounded" mark="{{$skill->mark}}"></div>
                            </section>
                            @endforeach

                        </fieldset>

                        <footer>
                            <a rel="pulse-grow" class="pull-right btn-u btn-u-sea" id="saveSkill">保存</a>
                        </footer>
                    </form>
                    <!-- End Rounded Slider Forms -->


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
<script type="text/javascript" src="/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="/init/js/profile.js"></script>
<script type="text/javascript" src="/assets/js/plugins/form-sliders.js"></script>





@endsection

@section('jquery')

  App.initCounter();
  App.initScrollBar();

  FormSliders.initFormSliders();
    ProfileSocial.initSkills();


@endsection










