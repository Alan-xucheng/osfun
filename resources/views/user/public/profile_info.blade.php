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
                                <li class="active">基本资料</li>
                            </ul>
                        </div><!--/container-->

                    </div><!--/breadcrumbs-->
                    <!-- Tabs -->
                    <div class="tab-v1 margin-bottom-60">
                        <div class="tab-content">
                            <!-- Icons and Placeholders -->
                            <div class="tab-pane fade in active" id="home-1">
                                <form action="/user/api/api-info" class="sky-form" method="post" id="infoForm">
                                

                                    <fieldset>
                                        <section>
                                            <label class="label">昵称</label>
                                            <label class="input">
                                                <i class="icon-prepend fa fa-user"></i>
                                                <input type="text" name="nickname" value="{{!empty($userExtra)?$userExtra->nickname:''}}" placeholder="昵称">
                                            </label>
                                        </section>
                                        <section>
                                            <label class="label">年龄</label>
                                            <label class="input">
                                                <i class="icon-prepend fa fa-user"></i>
                                                <input type="text" name="age" value="{{!empty($userExtra)?$userExtra->age:''}}" placeholder="年龄">
                                            </label>
                                        </section>

                                        <section>
                                            <label class="label">性别</label>
                                            <label class="select">
                                                <select name="sex">
                                                
                                                    <option value="男" @if(!empty($userExtra)){{$userExtra->sex=='男'?'selected':''}}@endif>男</option>
                                                    <option value="女" @if(!empty($userExtra)){{$userExtra->sex=='女'?'selected':''}}@endif>女</option>
                                                    
                                                </select>
                                                <i></i>
                                            </label>
                                        </section>
                                        <section>
                                            <label class="label">简介</label>
                                            <label class="textarea">
                                                <i class="icon-append fa fa-comment"></i>
                                                <textarea name="desc" rows="3" placeholder="介绍下自己吧！">{{!empty($userExtra)?$userExtra->desc:''}}</textarea>
                                            </label>
                                        </section>


                                  
                                    </fieldset>
                                        <footer>
                                            <button type="submit" class="btn-u btn-u-default" id="infoSave">保存</button>
                                            <button type="button" class="btn-u" onclick="window.history.back();">返回</button>
                                        </footer>

                                </form>
                            </div>
                            <!-- End Icons and Placeholders -->

                         
                        </div>
                    </div>
                    <!-- End Tabs -->
                    
                    
                 


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
  ProfileSocial.initInfo();  
  FormSliders.initFormSliders();



@endsection










