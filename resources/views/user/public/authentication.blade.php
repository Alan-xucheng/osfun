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
            <h1>实名认证</h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

@endsection




@section('content')

<div class="container">
	<div class="content">
		
		<div class="col-md-12 margin-bottom-40">
		                <!-- General Unify Forms -->
		                <form action="/user/api/save-authentication" type="post" class="sky-form" id="authenticationForm">
		                   

		                   

		                    <fieldset>
		                    	<div class="row">

			                        <section class='col col-4'>
			                             <label class="label">真实姓名</label>
			                           <label class="input">
                                           <input type="text" name="truename">
                                       </label>
			                        </section>
		                        </div>
		                        <section>
		                        	<label class="label">上传认证材料</label>
		                        	<div class="row">
           	                        <section class='col col-3' style="margin-right: 30px;">
           	                            
           	                           	                           
          		                            	<section>
                                                 
                                                 <button id="frontuploader" href="javascript:;" style="padding:6px 47px;" class="btn btn-info" type="button"><i class="fa fa-picture-o"></i> 上传身份证正面图片</button>


                                              </section>
                                              <section>
          										<div class="bg-light my-certificant-box " style="height: 180px;min-width:241px;position: relative;">
          											
          												<img id="front-img" src="/assets/img/id-placeholder-1.png" style="height: 159px;width: 212px;" class="img-responsive text-cener">
          												<input type="text" name="front_data" style="opacity: 0">
          										           											
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
            	                        <section class='col col-3'>
            	                            
            	                           	                           
           		                            	<section>
                                                  
                                                  <button id="backuploader" href="javascript:;" style="padding:6px 47px;" class="btn btn-info" type="button"><i class="fa fa-picture-o"></i> 上传身份证反面图片</button>


                                               </section>
                                               <section>
           										<div class="bg-light my-certificant-box " style="height: 180px;min-width:241px;position: relative;">
           											
           												<img id='back-img' src="/assets/img/id-placeholder-2.png" style="height: 159px;width: 212px;" class="img-responsive text-cener">

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
		                        </section>

		                        
		                    </fieldset>

		               

		            

		                    <footer>
                            <input type="hidden" value="personal" name="type">
		                        <button type="submit" class="btn-u pull-right">提交</button>
		                    
		                    </footer>
		                </form>
		                <!-- General Unify Forms -->

		      

		         

		            </div>

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


  
  ProfileSocial.certificantUpload();
  ProfileSocial.authenticationForm();
  

    


@endsection














