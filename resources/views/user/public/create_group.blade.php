@extends('user.layout.layout')
@section('styles')
<style>
   .ball-scale-multiple > div {
      background: #5bc0de;
    }
    </style>
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="container">
            <h1>创建圈子</h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

@endsection




@section('content')

<div class="container">
	<div class="content">
		@if(!$cert_status)
		<div class="row">
			<div class="col-md-12">
				<p ><b style="font-size: 16px;">创建圈子</b>:实名认证通过的用户可以创建，<a style="color:#5bc0de" href="/user/home/authentication">去认证</a>。</p>
			</div>	
		</div>
		@else
		<div class="row">
		<div class="col-md-12 margin-bottom-40">
		                <!-- General Unify Forms -->
		                <form action="/user/api/create-group" type="post" class="sky-form" id="groupForm">
		                   

		                    <fieldset>
		                    	<div class="row">
		                    		<div id="cate">
					                    <section class="col col-6">
					                        <label class="label">选择圈子类目</label>
					                        <label class="select">
		                                      <select class="parent" name="parent" >
		                                      		
		                                      </select>
		                                      <i></i>
		                                    </label>
					                    </section>
					                     <section class="col col-6">
					                  		<label class="label">&nbsp;</label>
					                        <label class="select">
					                            <select class="child" name="child">
					                                  
					                            </select>
					                            <i></i>
					                        </label>
					                    </section>
				                    </div>
			                    </div>
			                    <div class="row">
				                    <section class="col col-4">
			                             <label class="label">命名你的圈子</label>
			                           <label class="input">
	                                       <input type="text" name="name">
	                                   </label>
			                        </section>
		                        </div>
			                    <section>
			                        <label class="label">圈子简介</label>
			                        <label class="textarea">
			                            <textarea name="group_desc" rows="3"></textarea>
			                        </label>
			                        <div class="note"><strong>提示:</strong>圈子一旦创建，不能修改和删除！</div>
			                    </section>
			                    <div class="row">
	    	                        <section class='col col-3'>
	                                       <section>
	   										<div class="bg-light my-certificant-box " style="width: 200px;height:200px;position: relative;">
	   											
	   												<img id='logoBtn' src="/assets/img/upload-logo.png" width="200px" class="img-responsive text-center bordered">

	   												<input type="text" name="back_data" style="opacity: 0">
	   										           											
				                         		    <div class="loader " style="margin-left: 50%;">
				                                    <div class="loader-inner ball-scale-multiple certificant-loader">
				                                      <div></div>
				                                      <div></div>
				                                      <div></div>
				                                    </div>
				                                </div>					                            
	   				                        </div>

	                                       </section>
	    	                           
	    	                        </section>
    	                        </div>
			                    
			                   
	                      
			              

								
		                    </fieldset>

		                   

		               

		            

		                    <footer>
		                        <button type="submit" class="btn-u pull-right">创建</button>
		                    
		                    </footer>
		                </form>
		                <!-- General Unify Forms -->

		      

		         

        </div>
        </div>
        @endif

	</div>
	
</div>





@endsection  
@section('scripts')
<script type="text/javascript" src="/assets/plugins/counter/waypoints.min.js"></script>
<script type="text/javascript" src="/assets/plugins/counter/jquery.counterup.min.js"></script>
<script type="text/javascript" src="/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="/libs/birthday/birthday.js"></script>
<script type="text/javascript" src="/libs/cityselect/js/jquery.cityselect.js"></script>
<script type="text/javascript" src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js"></script> 

<script src="/libs/plupload-2.1.8/js/plupload.full.min.js"></script>

<script type="text/javascript" src="/libs/plupload-2.1.8/js/i18n/zh_CN.js"></script>



@endsection



@section('jquery')



  ProfileSocial.createGroup();
  

    


@endsection














