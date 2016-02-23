@extends('admin.layout.fixed')

@section('header')

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="/plugins/iCheck/all.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/select2.min.css">

    <!--plupload -->
    <link rel="stylesheet" href="/libs/jquery-ui-1.11.4/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="/libs/plupload-2.1.8/js/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" />


    <style>
    	.box-body .nav>li>a{
    		padding:10px 0;
    	}
    </style>
    
@endsection



@section('content')
<div class="content-wrapper" style="min-height: 946px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            撰写新文章
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content" style="min-height: 800px;">

        <form id="ArticleForm" action="/admin/article/api-save" method="post" enctype="multipart/form-data">
          <input type="hidden" name="post_id" value="{{$post_id}}"/> 
          <div class="row">
            <!-- left column -->
      		<div class="col-md-9">
      		  <!-- Horizontal Form -->

      		  <!-- general form elements disabled -->
      		  <div class="box box-warning">
      		   <!--  <div class="box-header with-border">
      		      <h3 class="box-title">General Elements</h3>
      		    </div><!-- /.box-header --> 
      		    <div class="box-body">
      		     
      		        <!-- text input -->
      		        <div class="form-group">
      		          <label>文章标题</label>
      		          <input type="text" class="form-control" placeholder="在此输入文章标题" name="title">
      		        </div>
      		      	<div class="box" style="border-top: none;box-shadow: none;">
      		      	
      		      	  <div class="box-body pad">
      		      	 
      		      	      <textarea class="textarea" name="content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                          <!-- test-->
                                 <!--        <input type="file" name="file"> -->
              

                  <form id="form" method="post">
                    <div id="uploader">
                      <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
                    </div>
                    <br />
          
                  </form>
                  <!-- test -->
      		      	    
      		      	  </div>
      		      	</div>
      		    
      		    </div><!-- /.box-body -->
      		  </div><!-- /.box -->
      		</div>
            <!-- right column -->
            <div class="col-md-3">
	        	<div class="box box-solid">
	              	<div class="box-header with-border">
	                  <h3 class="box-title">形式</h3>
	                  <div class="box-tools">
	                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                  </div>
	                </div>
	                <div class="box-body" style="display: block;">
		                  <div class="form-group">
		                       <label>
		                         <input type="radio" name="modus" value="normal" class="flat-red">
		                         <i class="fa fa-fw fa-book"></i>标准
		                       </label>
	                      </div>
      	                  <div class="form-group">
      	                       <label>
      	                         <input type="radio" name="modus" value="picture" class="flat-red">
      	                         <i class="fa fa-fw fa-file-image-o"></i>图像
      	                       </label>
                            </div>
    	                  	<div class="form-group">
    	                       <label>
    	                         <input type="radio" name="modus" value="movie" class="flat-red">
    	                         <i class="fa fa-fw fa-video-camera"></i>视频
    	                       </label>
                          	</div>

	                </div><!-- /.box-body -->

	          	</div>
            </div>

            <!--/.col (right) -->
	        <!-- right column -->
	        <div class="col-md-3">
	        	<div class="box box-solid">
	              	<div class="box-header with-border">
	                  <h3 class="box-title">发布</h3>
	                  <div class="box-tools">
	                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                  </div>
	                </div>
	                <div class="box-body" style="display: block;">
	                	<div class="clearfix">
		                	<a class="btn btn-default pull-left" id="handleSaveDra">
			                    <i class="fa fa-edit"></i> 草稿
			                </a>
			                <a class="btn btn-default pull-right"  id="handleSavePub">
		                    	<i class="fa fa-send" ></i> 发布
		                 	</a>
	                 	</div>
	 	                <ul class="list-group list-group-unbordered" style="margin-top: 5px;">
	                        <li class="list-group-item" style="border:none;">
	                          <i class="fa fa-key text-red"></i> 状态：&nbsp;&nbsp;<span><span id="currentStatus">草稿</span>&nbsp;&nbsp;<a href="#" class="show-li1">编辑</a></span>
	                        </li>
	                        <li class="list-group-item li-1" style="border:none;display: none;">
		                         <div class="form-group">
		                             <select id="status" class="form-control select2" name="status" style="width:40%;display: inline-block;">
		                               <option selected="selected" value="draft">草稿</option>
		                               <option value="waitCheck">等待审核</option>
		                              
		                             </select>
		                             <a class="btn btn-default subBtn">确定</a><a href="javascript:;" class="hide-li1">&nbsp;&nbsp;取消 </a>
		                         </div>
	                        </li>
	                        <li class="list-group-item" style="border:none;">
	                          <i class="fa fa-eye text-green"></i> 公开度：&nbsp;&nbsp;<span><span id="currentType">公开</span>&nbsp;&nbsp;<a href="#" class="show-li2">编辑</a></span>
	                        </li>
                            <li class="list-group-item li-2" style="border:none;display: none;">
    	                         <div class="form-group">
    	                             <select id="type" class="form-control select2" name="type" style="width:40%;display: inline-block;">
    	                               <option selected="selected" value="publish">公开</option>
    	                               <option value="secret">私密</option>
    	                              
    	                             </select>
    	                             <a class="btn btn-default subBtn">确定</a><a href="javascript:;" class="hide-li2">&nbsp;&nbsp;取消 </a>
    	                         </div>
                            </li>
                    	</ul>
	                </div><!-- /.box-body -->
	          	</div>
	        </div>
                  <!-- right column -->
          <div class="col-md-3">
            <div class="box box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">分类目录</h3>
                    <div class="box-tools">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="box-body" style="display: block;">
                   <div class="nav-tabs-custom">
                                   <ul class="nav nav-tabs">
                                     <li class="active" style="width: 25%;text-align: center;"><a href="#tab_1" data-toggle="tab" aria-expanded="false">所有</a></li>
                                     <li class="" style="width: 25%;text-align: center;"><a href="#tab_2" data-toggle="tab" aria-expanded="false">最常用</a></li>
                                     
                                   </ul>
                                   <div class="tab-content">
                                     <div class="tab-pane active" id="tab_1">
                                        @foreach($category as $cat)
                                        <div class="form-group">
                                           <label>
                                             <input type="checkbox" name="category" value="{{$cat->id}}" class="minimal">
                                             &nbsp;{{$cat->name}}
                                           </label>
                                         
                                        </div>
                                        @endforeach
                                       
                                     </div><!-- /.tab-pane -->
                                     <div class="tab-pane" id="tab_2">
                                      <div class="form-group">
                                          <label>
                                            <input type="checkbox" name="category" class="minimal">
                                            &nbsp;标准
                                          </label>
                                        
                                       </div>
                                       <div class="form-group">
                                          <label>
                                            <input type="checkbox" name="catrgory" class="minimal">
                                            &nbsp;新闻
                                          </label>
                                        
                                       </div>
                                     </div><!-- /.tab-pane -->
                         
                                   </div><!-- /.tab-content -->
                                 </div>
                  </div><!-- /.box-body -->

              </div>
          </div>

	        
	        <!--/.col (right) -->
          </div>   <!-- /.row -->

          </form>
        </section><!-- /.content -->
      </div>
@endsection


@section('footer')
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  
<script src="/plugins/iCheck/icheck.min.js"></script>

<!--plupload -->
<script type="text/javascript" src="/libs/jquery-ui-1.11.4/jquery-ui.min.js"></script>
<script src="/libs/plupload-2.1.8/js/plupload.full.min.js"></script>
<script type="text/javascript" src="/libs/plupload-2.1.8/js/jquery.ui.plupload/jquery.ui.plupload.js"></script>
<script type="text/javascript" src="/libs/plupload-2.1.8/js/i18n/zh_CN.js"></script>
<script>
  $(function () {

    //upload
    $("#uploader").plupload({
      // General settings
      runtimes : 'html5,flash,silverlight,html4',
      url : '/admin/article/upload/{{$post_id}}',
      headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

      // User can upload no more then 20 files in one go (sets multiple_queues to false)
      max_file_count: 20,
      
      chunk_size: '1mb',

      // Resize images on clientside if we can
      resize : {
        width : 200, 
        height : 200, 
        quality : 90,
        crop: true // crop to exact dimensions
      },
      
      filters : {
        // Maximum file size
        max_file_size : '1000mb',
        // Specify what files to browse for
        mime_types: [
          {title : "Image files", extensions : "jpg,gif,png"},
          {title : "Zip files", extensions : "zip"}
        ]
      },

      // Rename files by clicking on their titles
      rename: true,
      
      // Sort files
      sortable: true,

      // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
      dragdrop: true,

      // Views to activate
      views: {
        list: true,
        thumbs: true, // Show thumbs
        active: 'thumbs'
      },

      // Flash settings
      flash_swf_url : '../../js/Moxie.swf',

      // Silverlight settings
      silverlight_xap_url : '../../js/Moxie.xap'
    });


    // Handle the case when form was submitted before uploading has finished
    $('#form').submit(function(e) {
      // Files in queue upload them first
      if ($('#uploader').plupload('getFiles').length > 0) {

        // When all files are uploaded submit form
        $('#uploader').on('complete', function() {
          $('#form')[0].submit();
        });

        $('#uploader').plupload('start');
      } else {
        alert("You must have at least one file in the queue.");
      }
      return false; // Keep the form from submitting
    });





    //submit

    $('#handleSavePub').click(function(){
        var data = $('#ArticleForm').serialize();
        $.ajax({
          type:"POST",
          url:'/admin/article/api-save/{{$post_id}}',
          data: data,
          success:function(res){
            console.log(res);
          },
          error:function(res){
            console.log(res);
          }
        })
    });
    //编辑改变状态文字
    function currentStatus(obj1,obj2,obj3){
      $('.subBtn').click(function(){

        var data = $(obj1+' option:selected').html();

        $(obj2).html(data);
        $(this).parents('li').slideUp();
          setTimeout(function(){
            $(obj3).show();
          },300)

      })
    }

    currentStatus('#status','#currentStatus','.show-li1');
    currentStatus('#type','#currentType','.show-li2');

   





  	//编辑 隐藏显示li
  	function _showLi(obj){
  		$(obj).click(function(){
  			$(this).parents('li').next('li').slideDown();
  			$(this).hide();
        return false;
  		})
  	}
  	_showLi('.show-li1');
  	_showLi('.show-li2'); 

  	function _hideLi(obj1,obj2){
  		$(obj1).click(function(){
  			$(this).parents('li').slideUp();
        setTimeout(function(){
          $(obj2).show();
        },300)

  		})
      
  	}
    _hideLi('.hide-li1','.show-li1');
    _hideLi('.hide-li2','.show-li2');

   
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

   


  });
</script>
@endsection








