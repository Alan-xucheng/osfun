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
                            <h1 class="pull-left"><a style="text-decoration: none;" href="{{url('user/home/profile-me')}}">个人资料</a></h1>
                            <ul class="pull-right breadcrumb">
                         
                                <li><a href="">个人资料</a></li>
                                <li class="active">社交账号</li>
                            </ul>
                        </div><!--/container-->
                    </div><!--/breadcrumbs-->
                    <!-- Accordion v1 -->
                    <div class="panel-group acc-v1" id="accordion-1">
                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                            <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-One">
                                                     <i class="fa fa-qq"></i>QQ （{{!empty($social->qq)?'已填写':'未填写'}}）
                                                    </a>

                                                   
                                            </h4>
                                    </div>
                                    <div id="collapse-One" class="panel-collapse collapse ">
                                            <div class="panel-body">
                                                    <div class="row">
                                                     <!-- General Unify Forms -->
                                                     <form action="#" class="sky-form">
                                                    

                                                         <fieldset style="padding-top: 0;">
                                                 

                                                             <section>
                                                                 <label class="label"></label>
                                                                 <label  class="input input-file">
                                                                     <div class="button saveBtn" uid="{{$auth->id}}">保存</div><input type="text" name="qq" value="{{!empty($social)?$social->qq:''}}">
                                                                 </label>
                                                             </section>

                                                         </fieldset>

       
                                                     </form>
                                                     <!-- General Unify Forms -->
                                                    </div>
                                            </div>
                                    </div>

                            </div>
                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                            <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-Two">
                                                     <i class="fa fa-phone"></i>手机（{{!empty($social->phone)?'已填写':'未填写'}}）
                                                    </a>

                                                   
                                            </h4>
                                    </div>
                                    <div id="collapse-Two" class="panel-collapse collapse ">
                                            <div class="panel-body">
                                                    <div class="row">
                                                     <!-- General Unify Forms -->
                                                     <form action="#" class="sky-form">
                                                    

                                                         <fieldset style="padding-top: 0;">
                                                 

                                                             <section>
                                                                 <label class="label"></label>
                                                                 <label  class="input input-file">
                                                                     <div class="button saveBtn" uid="{{$auth->id}}">保存</div><input type="text" name="phone" value="{{!empty($social)?$social->phone:''}}">
                                                                 </label>
                                                             </section>

                                                         </fieldset>

                            
                                                     </form>
                                                     <!-- General Unify Forms -->
                                                    </div>
                                            </div>
                                    </div>
                                    
                            </div>
                                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                            <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-Three">
                                                     <i class="fa fa-envelope"></i>邮箱（{{!empty($social->email)?'已填写':'未填写'}}）
                                                    </a>

                                                   
                                            </h4>
                                    </div>
                                    <div id="collapse-Three" class="panel-collapse collapse ">
                                            <div class="panel-body">
                                                    <div class="row">
                                                     <!-- General Unify Forms -->
                                                     <form action="#" class="sky-form">
                                                    

                                                         <fieldset style="padding-top: 0;">
                                                 

                                                             <section>
                                                                 <label class="label"></label>
                                                                 <label  class="input input-file">
                                                                     <div class="button saveBtn" uid="{{$auth->id}}">保存</div><input type="email" name="email" value="{{!empty($social)?$social->email:''}}">
                                                                 </label>
                                                             </section>

                                                         </fieldset>

                            
                                                     </form>
                                                     <!-- General Unify Forms -->
                                                    </div>
                                            </div>
                                    </div>
                                    
                            </div>



                    </div>
                    <!-- End Accordion v1 -->



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




@endsection

@section('jquery')

  App.initCounter();
  App.initScrollBar();
  ProfileSocial.initSocial();


@endsection










