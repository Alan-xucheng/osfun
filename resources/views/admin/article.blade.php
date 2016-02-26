@extends('admin.layout.fixed')

@section('header')

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="/plugins/iCheck/all.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/select2.min.css">

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
            分类目录(测试)
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

        <form id="catForm" action="" method="post"> 
          <div class="row">
            <!-- left column -->
      		<div class="col-md-4">
      		  <!-- Horizontal Form -->

      		  <!-- general form elements disabled -->
      		  <div class="box box-success">
      		   
      		    <div class="box-body">
      		    	<form id="catForm" action="" method="post">

      		    	 <div class="form-group">
      		          	<label>名称(中文名)</label>
      		          	<input type="text" class="form-control" placeholder="名称" name="name">
      		        </div>
  		        	<div class="form-group">
  		              	<label>别名(英文名)</label>
  		              	<input type="text" class="form-control" placeholder="别名" name="slug">
  		            </div>
	            	
	                <button class="btn btn-primary catBtn">添加新分类目录</button>
	                </form>

      		    </div><!-- /.box-body -->
      		  </div><!-- /.box -->
      		</div>

      		<!-- right column -->

         
     

	        
	        <!--/.col (right) -->
          </div>   <!-- /.row -->

          </form>
        </section><!-- /.content -->
      </div>
@endsection


@section('footer')
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  
<script src="/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    //submit
    $('.catBtn').click(function(){
    	var data = $('#catForm').serialize();
    	$.ajax({
    	  type:"POST",
    	  url:'/admin/article/api-test',
    	  data: data,
    	  success:function(res){
    	    console.log(res);
    	    $('#catForm')[0].reset();
    	  },
    	  error:function(res){
    	    console.log(res);
    	  }
    	})

    	return false;
    })

    //table func

   $('input#all').on('ifClicked',function(){
   	  	if($(this).is(':checked')){
   	  		$('input[name="category"]').iCheck('uncheck');   //将输入框的状态设置为checked 
   	  		
   	  	}else{
   	  		$('input[name="category"]').iCheck('check');   //将输入框的状态设置为checked 
   	  		
   	  	}
   })







    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
   
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








