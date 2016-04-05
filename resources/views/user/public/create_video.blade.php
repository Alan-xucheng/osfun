@extends('user.layout.layout')

@section('meta')
<meta name="group_id" content="{{$group_id}}">
@endsection
@section('styles')
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="/plugins/select2/select2.min.css">


<!--plupload -->
<link rel="stylesheet" href="/libs/jquery-ui-1.11.4/jquery-ui.min.css" type="text/css" />
<link rel="stylesheet" href="/libs/plupload-2.1.8/js/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" />


@endsection
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="container">
            <h1 class="pull-left">发布视频</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.html">个人秀</a></li>
                <li class="active">视频</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

@endsection




@section('content')
<div class="container content profile">
	<div class="row">
		<form class="sky-form" id="videoForm"  novalidate="novalidate" style="border:none">
		<div class="col-md-4">
			<div class="video-body">
			     <div class="video-preview"></div>
			     <button class="btn-u btn-u-dark-blue" id="videoBtn" type="button"><i class="fa fa-picture-o"></i>&nbsp;选择图片</button>
			     <input  name="image" class="hidden-image-data" style="opacity: 0" />

			</div>


		</div>
		<div class="col-md-8">

			<div class="profile-body">
			
                <fieldset>
                <section>
                    <div class="row">
                        <label class="label col col-2">视频标题</label>
                        <div class="col col-10">
                            <label class="input" for="title">
                                <input type="text" value="" id="title" placeholder="标题" name="title">
                                <input type="hidden" name="image-data" class="hidden-image-data" />
                                <input type="hidden" name="type" value="{{Request::input('type')}}"/>
                            </label>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">

                        <label class="label col col-2">视频地址</label>
                        <div class="col col-10">
	                        <div class="">
	                            <label class="radio"><input type="radio" value="file" name="medium"  class="video-model" model="upload"><i class="rounded-x"></i>上传视频文件<span style="color:red">（需为无水印，无广告）</span></label>
	                            <label class="radio"><input value="src" type="radio" name="medium" checked="" class="video-model" model='src'><i class="rounded-x"></i>填写视频地址</label>
	                         
	                        </div>
	                        <div class="video-src">
	                   			</br>
	                        	<label class="input" >
	                        	    <input type="text" value="" id="" placeholder="视频地址" name="src">
	                        	</label>
	                        </div>
	                        <div class="video-upload" style="display: none;">
	                   		
	                        	    </br>  
		        	                <div id="uploader" >
		        	                  <p>您的浏览器不支持该插件，请换一个试试吧！</p>
		        	                </div>
		        	          
	                        </div>
                        </div> 

                    </div>
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-2">分类</label>
                            <div id="cate">
                              <section class="col col-5">
                                  <label class="select">
                                      <select class="parent" name="parent" >
                                      		
                                      </select>
                                      <i></i>
                                  </label>
                              </section>
                              <section class="col col-5">
                                  <label class="select">
                                      <select class="child" name="child">
                                            
                                      </select>
                                      <i></i>
                                  </label>
                              </section>
                            </div>  

                              
                        </div>            
                </section>
                <section>
                    <div class="row">
                        <label class="label col col-2">视频简介</label>
                            <section class="col col-10">
                                <label class="textarea">
                                    <textarea rows="3" name="desc" placeholder="说点什么吧！"></textarea>
                                </label>
                            </section>         
                    </div>
                </section>
          
            </fieldset>
            <footer>
                <input type="hidden" name="group_id" value="{{$group_id}}"/>
                <button type="submit" class="btn-u">发布作品</button>
            </footer>  
            

			</div>


		</div>


	 </form>
	</div>

</div>



                  <!-- test -->
@endsection 


@section('scripts')

<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/plugins/select2/select2.min.js"></script>
  
<!--plupload -->
<script type="text/javascript" src="/libs/jquery-ui-1.11.4/jquery-ui.min.js"></script>
<script src="/libs/plupload-2.1.8/js/plupload.full.min.js"></script>
<script type="text/javascript" src="/libs/plupload-2.1.8/js/jquery.ui.plupload/jquery.ui.plupload.js"></script>
<script type="text/javascript" src="/libs/plupload-2.1.8/js/i18n/zh_CN.js"></script>

@endsection

@section('jquery')
    
    ProfileSocial.createVideo();
    ProfileSocial.videoForm();

   
@endsection
