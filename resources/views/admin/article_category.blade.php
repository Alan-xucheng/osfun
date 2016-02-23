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
            分类目录
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
	            	<div class="form-group">
	                  	<label>父节点</label>
	                  	<select class="form-control" name="parent">
	                  		<option value="0">无</option>
	                  		@foreach($category as $cat)
							
							<option value="{{$cat->id}}">{{$cat->name}}</option>

	                  		@endforeach
	                     
                      	</select>
	                </div>
	                <button class="btn btn-primary catBtn">添加新分类目录</button>
	                </form>

      		    </div><!-- /.box-body -->
      		  </div><!-- /.box -->
      		</div>

      		<!-- right column -->

      		<div class="col-md-8">
      			<div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">分类管理</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody>
	                    <tr>
	                      	<th style="width: 20px">
			          		 	<div class="form-group">
			              	        <label>
			              	          <input type="checkbox"  class="minimal" id="all">	              	          
			              	        </label>
			          	     	</div>
		                      </th>
		                      <th>名称</th>
		                      <th>别名</th>
		                      <th style="width: 40px">总数</th>
	                    </tr>
						@foreach ($category as $cat)	
	                    <tr>
	                      <td>
		              	 	<div class="form-group">
		                      <label>
		                        <input type="checkbox" name="category" value="{{$cat->id}}-1" class="minimal">
		                        
		                      </label>
		                    
		                   	</div>
	                      </td>
	                      <td>{{$cat->name}}</td>
	                      <td>
	                        {{$cat->slug}}
	                      </td>
	                      <td><span class="badge bg-blue">55</span></td>
	                    </tr>
	                    @endforeach
                           <tr>
                          <th style="width: 20px">
                      <div class="form-group">
                              <label>
                                <input type="checkbox"  class="minimal" id="all">                           
                              </label>
                        </div>
                          </th>
                          <th>名称</th>
                          <th>别名</th>
                          <th style="width: 40px">总数</th>
                      </tr>
     
                  </tbody></table>
                  <div style="margin-top: 10px;">

                  <div class="form-group">
                    
                    <div class="col-sm-3" style="padding-left: 0;">
                      <select class="form-control">
                        <option>批量操作</option>
                        <option>删除</option>
                      </select>
                    </div>
                 
                      <button class="btn btn-default">应用</button>
                 
                    
                  </div>

                    
                  </div>
              
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                  </ul>
                </div>
          
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
<script>
  $(function () {
    //submit
    $('.catBtn').click(function(){
    	var data = $('#catForm').serialize();
    	$.ajax({
    	  type:"POST",
    	  url:'/admin/article/api-cat',
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








