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
            <h1>申请成为服务商</h1>
        </div><!--/container-->
    </div><!--/breadcrumbs-->

@endsection




@section('content')

<div class="container">
	<div class="content">
		
		<div class="col-md-12 margin-bottom-40">
		                <!-- General Unify Forms -->
		                <form action="/user/api/video-upload" type="post" class="sky-form" id="certificationForm">
		                   

		                    <fieldset>
		                    	<div class="row">
		                    		<div id="cate">
					                    <section class="col col-6">
					                        <label class="label">选择服务类目</label>
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
			                    <section>
			                        <label class="label">简述你可以提供的服务</label>
			                        <label class="textarea">
			                            <textarea name="service_desc" rows="3"></textarea>
			                        </label>
			                        <div class="note"><strong>提示:</strong></div>
			                    </section>
			                    <section>
			                        <label class="label">服务团队规模</label>
			                        <div class="row">
			                            <div class="col col-4">
			                                <label class="radio"><input type="radio" name="size" value="one" ><i class="rounded-x"></i>1个人</label>
			                                <label class="radio"><input type="radio" name="size" value="lessten"><i class="rounded-x"></i>10人以内</label>
			                                <label class="radio"><input type="radio" value="tenmore" name="size"><i class="rounded-x"></i>10人以上</label>
			                            </div>
			                            
			                        </div>
			                    </section>
			                    <section>
			                        <label class="label">选择服务付费类型</label>
			                        <div class="row">
			                            <div class="col col-4">
			                                <label class="radio"><input value="free" type="radio" name="service_type"><i class="rounded-x"></i>在符合我条件的情况下，我可以提供免费服务</label>
			                                <label class="radio"><input value="pay" type="radio" name="service-type"><i class="rounded-x"></i>无论如何我只提供付费服务</label>
			                                
			                            </div>
			                            
			                        </div>
			                        <div class="note"><strong>提示:</strong></div>

			                    </section>
	                            <section>
									<label class="label">所在地</label>
			                        <div class="row" id="city">
			                 
			                                  <section class="col col-2">
			                                      <label class="select">
			                                          <select name="province" class="prov">
			                                          </select>
			                                          <i></i>
			                                      </label>
			                                  </section>

			                                  <section class="col col-2">
			                                     <label class="select">
			                                         <select name="city" class="city">
			                                         </select>
			                                         <i></i>
			                                     </label>
			                                  </section>

			                                  <section class="col col-2">
			                                  <label class="select">
			                                      <select name="country" class="dist">
			                                      </select>
			                                      <i></i>
			                                  </label>
			                                  </section>
			                        
			                            </div>
			                            <div class="note"><strong>提示:</strong></div>
			                     
			                    </section>
		
			              

								
		                    </fieldset>

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


  ProfileSocial.setPicker();
  ProfileSocial.certificantUpload();
  ProfileSocial.certificantForm();
  

    


@endsection














