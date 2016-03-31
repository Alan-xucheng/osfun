var ProfileSocial = function(){

	return {
        editProfile:function(){
            $('.edit-sex').on('shown.bs.popover', function () {
                  ProfileSocial.setBirth();

              $('#sex-del').click(function(){
                    $('.edit-sex').popover('hide');
              });
              $('#sex-save').click(function(){
                    if($('select[name="year"]').val()==0||$('select[name="month"]').val()==0||$('select[name="day"]').val()==0){
                        $('#sexForm p.text-danger').css('display','block');
                        console.log(1);
                        return false;
                    }
                    $('.edit-sex').popover('hide');

                    $.ajax({
                        type:'post',
                        url:'/user/api/save-sex',
                        data:$('#sexForm').serialize(),
                        success:function(res){
                            console.log(res);
                            if(res.return_code == 0){
                                $('.edit-sex').popover('hide');
                            }
                        },
                        error:function(res){
                            console.log(res);
                        }
                    })
              })

            }); 
            $('.edit-location').on('shown.bs.popover', function () {
                  ProfileSocial.setPicker();

              $('#location-del').click(function(){
                    $('.edit-location').popover('hide');
              });
              $('#location-save').click(function(){
                    if($('.signTextarea').val()==''){
                        $('#signForm p.text-danger').css('display','block');
                        return false;
                    }
                    $.ajax({
                        type:'post',
                        url:'/user/api/save-location',
                        data:$('#locationForm').serialize(),
                        success:function(res){
                            console.log(res);
                            if(res.return_code == 0){
                                $('.edit-location').popover('hide');
                            }
                        },
                        error:function(res){
                            console.log(res);
                        }
                    })
              })

            }); 
            $('.edit-sign').on('shown.bs.popover', function () {
              $.ajax({
                  type:'post',
                  url:'/user/api/profile?option=sign',
                  success:function(res){
                      $('.signTextarea').html(res.return_message);
                  },
                  error:function(res){

                  }
              });
              $('#sign-del').click(function(){
                    $('.edit-sign').popover('hide');
              });
              $('#sign-save').click(function(){
                    if($('.signTextarea').val()==''){
                        $('#signForm p.text-danger').css('display','block');
                        return false;
                    }
                    $.ajax({
                        type:'post',
                        url:'/user/api/save-sign',
                        data:$('#signForm').serialize(),
                        success:function(res){
                            console.log(res);
                            if(res.return_code == 0){
                                $('.edit-sign').popover('hide');
                            }
                        },
                        error:function(res){
                            console.log(res);
                        }
                    })
              })

            });  
            $('.edit-nickname').on('shown.bs.popover', function () {
              $.ajax({
                  type:'post',
                  url:'/user/api/profile?option=nickname',
                  success:function(res){
                      $('input[name="nickname"]').val(res.return_message);
                  },
                  error:function(res){

                  }
              });
              $('#nickname-del').click(function(){
                    $('.edit-nickname').popover('hide');
              });
              $('#nickname-save').click(function(){
                    if($('#nicknameForm input[name="nickname"]').val()==''){
                        $('p.text-danger').css('display','block');
                        return false;
                    }
                    $.ajax({
                        type:'post',
                        url:'/user/api/save-nickname?option=nickname',
                        data:$('#nicknameForm').serialize(),
                        success:function(res){
                            if(res.return_code == 0){
                                $('.edit-nickname').popover('hide');
                            }
                        },
                        error:function(res){
                            console.log(res);
                        }
                    })
              })

            })    
            $('.edit-nickname').popover({
                animation:true,
                html:true,
                content:function(){
                    
                    var str ='<form class="sky-form" id="nicknameForm" style="border:none">';
                         str+='<section><label class="label">编辑昵称</label>';
                         str+='<label class="input">';
                    
                         str+='<input type="text" name="nickname"><p class="text-danger" style="color:#a94442;display:none">请输入昵称！</p>';
                         str+='</label></section>';
                         
                         str+='<a class="btn-u btn-u-xs" style="margin-right:5px;" id="nickname-save" type="button">确定</a>';
                         str+='<a class="btn-u btn-u-xs btn-u-default" id="nickname-del" type="button">取消</a>';
                         // str+='<button class="btn-u" type="button">Button Dark Blue</button></footer>';
                         str+='</form>';


                    return str;
                }
            });
            $('.edit-sign').popover({
                animation:true,
                html:true,
                content:function(){
                    
                    var str ='<form class="sky-form" id="signForm" style="border:none" >';
                         str+='<section><label class="label">编辑个性签名</label>';
                         str+='<label class="input">';
                    
                         str+='<textarea rows="3" style="width:200px" name="sign" class="signTextarea"></textarea><p class="text-danger" style="color:#a94442;display:none">请输入个性签名！</p>';
                         str+='</label></section>';
                         
                         str+='<a class="btn-u btn-u-xs" style="margin-right:5px;" id="sign-save" type="button">确定</a>';
                         str+='<a class="btn-u btn-u-xs btn-u-default" id="sign-del" type="button">取消</a>';
                         // str+='<button class="btn-u" type="button">Button Dark Blue</button></footer>';
                         str+='</form>';


                    return str;
                }
            });
            $('.edit-location').popover({
                animation:true,
                html:true,
                content:function(){
                    
                    var str ='<form class="sky-form" id="locationForm" style="border:none;width:400px;">';
                         str+='<section><label class="label">所在地</label><div class="row" id="city">';
                        str+='<section class="col col-2" style="width:120px;"><label class="select">省<select name="province" class="prov"></select></label></section>';

                        str+='<section class="col col-2" style="width:120px;"><label class="select">市<select name="city" class="city"></select></label></section>';

                        str+='<section class="col col-2" style="width:120px;"><label class="select">县<select name="country" class="dist"></select></label></section>';
                                    
                        str+='</div></section>';
                         
                         str+='<a class="btn-u btn-u-xs" style="margin-right:5px;" id="location-save" type="button">确定</a>';
                         str+='<a class="btn-u btn-u-xs btn-u-default" id="location-del" type="button">取消</a>';
                         // str+='<button class="btn-u" type="button">Button Dark Blue</button></footer>';
                         str+='</form>';


                    return str;
                }
            });
            $('.edit-sex').popover({
                animation:true,
                html:true,
                content:function(){
                    
                    var str ='<form class="sky-form" id="sexForm" style="border:none;width:400px;">';
                        str+='<section><label class="label">性别</label>';
                        str+='<label class="select">';
                        
                        str+='<select class="form-control" name="sex" style="width:100px"><option value="male">男</option><option value="female">女</option></select>';
                        str+='</label></section>';
                         str+='<section><label class="label">生日</label><div class="row">';
                        str+='<section class="col col-2" style="width:120px;"><label class="select"><select name="year" id="sel_year"></select></label></section>';

                        str+='<section class="col col-2" style="width:120px;"><label class="select"><select name="month" id="sel_month"></select></label></section>';

                        str+='<section class="col col-2" style="width:120px;"><label class="select"><select name="day" id="sel_day"></select></label></section>';
                                    
                        str+='</div></section><p class="text-danger" style="color:#a94442;display:none">请按照要求填写！</p>';
                         
                         str+='<a class="btn-u btn-u-xs" style="margin-right:5px;" id="sex-save" type="button">确定</a>';
                         str+='<a class="btn-u btn-u-xs btn-u-default" id="sex-del" type="button">取消</a>';
                         // str+='<button class="btn-u" type="button">Button Dark Blue</button></footer>';
                         str+='</form>';


                    return str;
                }
            });
        },
        serviceSearch:function(){
            $('.location-btn').click(function(){

               $('.location-line').css('height',"55px");
            })
        },
        authenticationForm:function(){
            $("#authenticationForm").validate({
                // Rules for form validation
                rules:
                {         
                  
                    truename:
                    {
                        required:true
                    },
                    front_data:
                    {
                        required:true
                    },
                    back_data:
                    {
                        required:true
                    }
                },
                                    
                // Messages for form validation
                messages:
                {
                  
                  
                     truename:
                     {
                         required:"请填写"
                     },
                     front_data:
                     {
                        required:'请上传图片'
                     },
                     back_data:
                     {
                        required:'请上传图片'
                     }
                },

                // Ajax form submition
                submitHandler: function(form)
                { 
                    $.ajax(
                    {
                        type:'post',
                        data:$("#authenticationForm").serialize(),
                        url:'/user/api/save-certification',
                        success:function(res){
                            console.log(res);
                            //window.location = '/user/home/profile-album';
                        },
                        error:function(){

                        }
                     
                    });
                    return false;
                },

                
                // Do not change code below
                errorPlacement: function(error, element)
                {
                    error.insertAfter(element.parent());
                }
            });
        },
        certificantForm:function(){
            $("#certificationForm").validate({
                // Rules for form validation
                rules:
                {         
                    service_desc:
                    {
                        required:true
                    },
                    parent:
                    {
                        required:true
                    },
                    child:
                    {
                        required:true
                    },
                    size:
                    {
                        required:true
                    },
                    service_type:
                    {
                        required:true
                    },
                    province:
                    {
                        required:true
                    },
                    city:
                    {
                        required:true
                    },
                    truename:
                    {
                        required:true
                    },
                    front_data:
                    {
                        required:true
                    },
                    back_data:
                    {
                        required:true
                    }
                },
                                    
                // Messages for form validation
                messages:
                {
                  
                     service_desc:
                     {
                         required:"请填写"
                     },
                     parent:
                     {
                         required:"请填写"
                     },
                     child:
                     {
                         required:"请填写"
                     },
                     size:
                     {
                         required:"请填写"
                     },
                     service_type:
                     {
                         required:"请填写"
                     },
                     province:
                     {
                         required:"请填写"
                     },
                     city:
                     {
                         required:"请填写"
                     },
                     truename:
                     {
                         required:"请填写"
                     },
                     front_data:
                     {
                        required:'请上传图片'
                     },
                     back_data:
                     {
                        required:'请上传图片'
                     }
                },

                // Ajax form submition
                submitHandler: function(form)
                { 
                    $.ajax(
                    {
                        type:'post',
                        data:$("#certificationForm").serialize(),
                        url:'/user/api/save-certification',
                        success:function(res){
                            console.log(res);
                            //window.location = '/user/home/profile-album';
                        },
                        error:function(){

                        }
                     
                    });
                    return false;
                },

                
                // Do not change code below
                errorPlacement: function(error, element)
                {
                    error.insertAfter(element.parent());
                }
            });
        },

        imgUpload:function(obj){
           var operate = $('#'+obj).parent('section').siblings('section').children('div.bg-light');
 
           var uploader = new plupload.Uploader({
              // General settings
              browse_button:obj,
              runtimes : 'html5,flash,silverlight,html4',
              url : '/user/api/certificant-upload?type='+obj,
              headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

              // User can upload no more then 20 files in one go (sets multiple_queues to false)
              max_file_count: 20,
              
             

              // Resize images on clientside if we can
              // resize : {
              //   width : 212, 
              //   height : 159, 
              //   quality : 90,
              //   crop: false // crop to exact dimensions
              // },
              
              filters : {
                // Maximum file size
                max_file_size : '6mb',
                // Specify what files to browse for
                mime_types: [
                  {title : "Image files", extensions : "jpg,gif,png,mov"},
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
              init:{
                FilesAdded:function(up,file){

                    operate.children('img').css('display','none');

                    operate.children('div.loader').css('display','block');

              
                    uploader.start();
                },
                UploadProgress:function(up,file){

                },
                FileUploaded:function(up,file,result){
                  
                   if(result.status == 200){

                        operate.children('img').css('display','block');
                        operate.children('div.loader').css('display','none');

                        if(obj == 'frontuploader'){
                          
                            $('input[name="front_data"]').val(result.response);    
                            $('#front-img').attr('src',result.response);
                        }else{
                            $('input[name="back_data"]').val(result.response); 
                            $('#back-img').attr('src',result.response);                        
                        }

                   }
                },
                Error:function(up,error){

                }
              },


              // Flash settings
              flash_swf_url : '../../js/Moxie.swf',

              // Silverlight settings
              silverlight_xap_url : '../../js/Moxie.xap'
            });
            uploader.init();

            },
        createGroup:function(){
            $('#logoBtn').click(function(){
                var  str =' <form action="#"class="sky-form" id="logoImg" style="position:relative;border:none;"><div class="face-editor"><fieldset>';
                     str+=  '<section><label class="input input-file"><div class="button"><input type="file" id="file" class="cropit-image-input">选择图片</div></label></section>';
                     str+=  '<section class="text-center"><div class="cropit-preview"></div></section>';
                
                     str+='<div class="slider-wrapper"><span class="rotate-btns"><i style="cursor:pointer" class="fa fa-rotate-left rotate-ccw-btn"></i><i style="cursor:pointer" class="fa fa-rotate-right rotate-cw-btn"></i></span><i class="fa fa-file-image-o"></i><input type="range" class="cropit-image-zoom-input" min="0" max="1" step="0.01"><i style="font-size:20px;" class="fa fa-file-image-o"></i></div>';
                     
                     str+=  '</fieldset></div></form>';
                 $.confirm({
                        title: '选择封面图片',
                        content:str,
                        confirmButton: '确定',
                        cancelButton:'取消',
                        confirmButtonClass: 'btn-danger',
                        columnClass:'col-group col-md-4 col-md-offset-4',
                        animation: 'scale',
                        animationClose: 'top',             
                        opacity: 0.5,
                        onOpen:function(){
                             $('.face-editor').cropit();
                             $('.rotate-ccw-btn').click(function(){
                              $('.face-editor').cropit('rotateCW');
                             })  
                              $('.rotate-cw-btn').click(function(){
                              $('.face-editor').cropit('rotateCCW');
                             }) 
                        },
                        confirm:function(){
                            
                             var imageData = $('.face-editor').cropit('export');
                             $('.hidden-image-data').val(imageData);

                             var dom = '<img src="'+imageData+'"/>';

                             $('.video-preview').html(dom);
                        

                        }

                    })
            })
        },      
        authenticationUpload:function(){
            ProfileSocial.imgUpload('frontuploader');
            ProfileSocial.imgUpload('backuploader');
        },   
        certificantUpload:function(){
            $('#cate').cxSelect({ 
              url: '/api/service-category',               // 如果服务器不支持 .json 类型文件，请将文件改为 .js 文件 
              selects:  ['parent', 'child'],
              jsonName: 'name',
            });    

            ProfileSocial.imgUpload('frontuploader');
            ProfileSocial.imgUpload('backuploader');
        },

        initCooperation:function(){
            var wookmark;
            imagesLoaded('#container', function() {
              wookmark = new Wookmark('#container', {
                fillEmptySpace: true // Optional, fill the bottom of each column with widths of flexible height
              });
            });

            // Setup filter buttons when jQuery is available
            var $filters = $('#filters li');

            /**
             * When a filter is clicked, toggle it's active state and refresh.
             */
            var onClickFilter = function(event) {
              var $item = $(event.currentTarget),
                  itemActive = $item.hasClass('active');

              if (!itemActive) {
                $filters.removeClass('active');
                itemActive = true;
              } else {
                itemActive = false;
              }
              $item.toggleClass('active');

              // Filter by the currently selected filter
              wookmark.filter(itemActive ? [$item.data('filter')] : []);
            }

            // Capture filter click events.
            $('#filters').on('click.wookmark-filter', 'li', onClickFilter);
        },
        videoForm:function(){
            $("#videoForm").validate({
                // Rules for form validation
                rules:
                {
               
                    title:
                    {
                        required:true
                    },
                    parent:
                    {
                        required:true
                    },
                    child:
                    {
                        required:true
                    },
                    desc:
                    {
                        required:true
                    },
                    image:
                    {
                        required:true
                    }
                },
                                    
                // Messages for form validation
                messages:
                {
                  
                      title:
                      {
                          required:'请填写'
                      },
                      parent:
                      {
                         required:'请填写'
                      },
                      child:
                      {
                        required:'请填写'
                      },
                      desc:
                      {
                          required:'请填写'
                      },
                      image:
                      {
                           required:'请上传图片' 
                      }
                },

                // Ajax form submition
                submitHandler: function(form)
                { 
                    $.ajax(
                    {
                        type:'post',
                        data:$("#videoForm").serialize(),
                        url:'/user/api/create-video',
                        success:function(res){
                           
                            window.location = '/user/home/profile-album';
                        },
                        error:function(){

                        }
                     
                    });
                    return false;
                },

                
                // Do not change code below
                errorPlacement: function(error, element)
                {
                    error.insertAfter(element.parent());
                }
            });
        },
        createVideo:function(){
            //分类选择框
            // $('.parent').select2();
            // $('.child').select2();
            $('#cate').cxSelect({ 
              url: '/api/album-category',               // 如果服务器不支持 .json 类型文件，请将文件改为 .js 文件 
              selects:  ['parent', 'child'],
              jsonName: 'name',
             
             
              
            });     
            //video img
            $('#videoBtn').click(function(){
                var  str =' <form action="#"class="sky-form" id="videoCover" style="position:relative;border:none;"><div class="face-editor"><fieldset>';
                     str+=  '<section><label class="input input-file"><div class="button"><input type="file" id="file" class="cropit-image-input">选择图片</div></label></section>';
                     str+=  '<section class="text-center"><div class="cropit-preview"></div></section>';
                
                     str+=  '<div class="slider-wrapper"><i class="fa fa-file-image-o"></i><input type="range" class="cropit-image-zoom-input" min="0" max="1" step="0.01"><i style="font-size:20px;" class="fa fa-file-image-o"></i></div>';
                     
                     str+=  '</fieldset></div></form>';
                 $.confirm({
                        title: '选择封面图片',
                        content:str,
                        confirmButton: '确定',
                        cancelButton:'取消',
                        confirmButtonClass: 'btn-danger',
                        animation: 'scale',
                        animationClose: 'top',             
                        opacity: 0.5,
                        onOpen:function(){
                             $('.face-editor').cropit();
                        },
                        confirm:function(){
                            
                             var imageData = $('.face-editor').cropit('export');
                             $('.hidden-image-data').val(imageData);

                             var dom = '<img src="'+imageData+'"/>';

                             $('.video-preview').html(dom);
                            


                          

                        }

                    })
            })
            //切换视频 模式
            //
            $('.video-model').click(function(){
                if($(this).attr('model')=='src'){
                    $('.video-src').css('display','block');
                    $('.video-upload').css('display','none');
                }else{
                    $('.video-src').css('display','none');
                    $('.video-upload').css('display','block');
                }
            })
            //upload
            $("#uploader").plupload({
              // General settings
              runtimes : 'html5,flash,silverlight,html4',
              url : '/user/api/video-upload',
              headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

              // User can upload no more then 20 files in one go (sets multiple_queues to false)
              max_file_count: 20,
              
             

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
                  {title : "Image files", extensions : "jpg,gif,png,mov"},
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
              init:{
                FilesAdded:function(up,file){

                },
                FileUploaded:function(up,file,result){
                  
                   console.log(result);
                },
                Error:function(up,error){

                }
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
        },
        profileForm:function(){

            $('#editProfile').click(function(){

                if(!$('.pro-block').is(':hidden')){
                    $('.pro-block').css('display','none');
                    $('#profileForm').css('display','block');
                }              
                
            })
            $("#profileForm").validate({
                // Rules for form validation
             
                rules:
                {
               
                    nickname:
                    {
                        required:true
                    },
                    sex:
                    {
                        required:true
                    },
                    year:
                    {
                        required:true
                    },
                    month:
                    {
                        required:true
                    },
                    day:
                    {
                        required:true
                    },
                    country:
                    {
                        required:true
                    },
                    city:
                    {
                        required:true
                    },
                    country:
                    {
                        required:true
                    },
                    sign:
                    {
                        required:true
                    }
                },
                                    
                // Messages for form validation
                messages:
                {
                    nickname:
                    {
                        required:'请填写昵称'
                    },
                    year:
                    {
                        required:'请填写'
                    },
                    month:
                    {
                        required:'请填写'
                    },
                    sex:
                    {
                        required:'请选择'
                    },
                    day:
                    {
                        required:'请填写'
                    },
                    country:
                    {
                        required:'请填写'
                    },
                    city:
                    {
                        required:'请填写'
                    },
                    country:
                    {
                        required:'请填写'
                    },
                    sign:
                    {
                        required:'请填写'
                    }
                },

                // Ajax form submition
                submitHandler: function(form)
                { 
                    $.ajax(
                    {
                        type:'post',
                        data:$("#profileForm").serialize(),
                        url:'/user/api/update-profile',
                        success:function(res){
                            location.reload();
                            //window.location = '/user/home/profile-project';
                        },
                        error:function(){

                        }
                     
                    });
                    return false;
                },

                
                // Do not change code below
                errorPlacement: function(error, element)
                {
                    error.insertAfter(element.parent());
                }
            });
        },
        setBirth:function(){
            $.ms_DatePicker({
                    YearSelector: ".sel_year",
                    MonthSelector: ".sel_month",
                    DaySelector: ".sel_day"
            });
            $.ms_DatePicker();
        },

        setPicker:function(){
            $.ms_DatePicker({
                    YearSelector: ".sel_year",
                    MonthSelector: ".sel_month",
                    DaySelector: ".sel_day"
            });
            $.ms_DatePicker();
            var myprovince = remote_ip_info['province']; 
            var mycity = remote_ip_info['city'] 
            var mydistrict = remote_ip_info['district']; 
            $(function(){ 
                $("#city").citySelect({ 
                    prov:myprovince,  
                    city:mycity,
                    dist:mydistrict 
                }); 
            }); 
        },
        delComment:function(){
            $('.del-comment').click(function(){
                var obj = $(this).parents('div.my-comment-box');
                var comment_id = $(this).attr('value');
                $.confirm({
                       title: '确认删除',
                       content:"是否删除该条评论",
                       confirmButton: '确定',
                       cancelButton:'取消',
                       confirmButtonClass: 'btn-danger',
                       animation: 'scale',
                       animationClose: 'top',             
                       opacity: 0.5,
                       confirm:function(){
                           
                           $.ajax({
                               type:'post',
                               data:{'comment_id':comment_id},
                               url:'/user/api/del-comment',
                               success:function(res){
                                   obj.remove();
                               },
                               error:function(){

                               }
                           })
                           


                         

                       }

                   })
              
            })
        },
        replyAlbum:function(){
            $('.reply').click(function(){
                var reply_id = $(this).attr('value');
                var name = $(this).parents('div.comment-userinfo').children('h3').children('a').html();
                var obj = $('#replyForm');
                var post_id = $(this).attr('post');
                var len = obj.length;
                obj.remove();
                var dom = '<form id="replyForm" style="padding-top:30px;"><input type="hidden" name="post_id" value="'+post_id+'"><input type="hidden" name="reply_id" value="'+reply_id+'"><textarea class="form-control" placeholder="@'+name+'" name="content" rows="4"></textarea><button type="submit" class="btn btn-sm rounded btn-info pull-right">发送</button></form>';
                $(this).parents('div.clearfix').append(dom);
                ProfileSocial.replyForm();

                
               
            })
        },
        replyForm:function(){
            $("#replyForm").validate({
                // Rules for form validation
             
                rules:
                {
                    content:
                    {
                        required: true
                    }
                },
                                    
                // Messages for form validation
                messages:
                {
                    content:
                    {
                        required: '说点什么吧！'
                    }
                },

                // Ajax form submition
                submitHandler: function(form)
                {
                    
                    

                  
                    $.ajax(
                    {

                        type:'post',
                        data:$("#replyForm").serialize(),
                        url:'/user/api/reply-comment',
                        success:function(res){
                        console.log(res);
                           var obj = $('#comment');
                           var str='<div class="my-comment-box"><div class="content-boxes-v3 margin-bottom-10 md-margin-bottom-20 row" style="padding:0 30px;">';
                                 str+= '<div class="col-md-1"><img class="comment-face rounded-x" src="'+res.return_message.avatar+'" alt=""></div>';
                                 str+= '<div class="content-boxes-in-v3 col-md-11 comment-userinfo">';
                                 str+= '<h3><a href="#">'+res.return_message.nickname+'</a></h3> ';
                                 str+= '<p class="my-reply">@<span>'+res.return_message.reply_nickname+'</span>'+res.return_message.reply_content+'</p>';
                                 str+= '<p>'+res.return_message.content+'</p>';
                                 str+= ' <div class="clearfix">';
                                 str+= '<span style="color:#555" class="pull-left">刚刚</span>';
                                 str+= '<span style="color:#555;" class="pull-right">';
                                 str+= '<a value="'+res.return_message.comment_id+'" class="del-comment" href="javascript:;">删除</a>';
                                 str+= '</span>';
                                 str+= '</div>';  
                                 str+= ' </div>';
                                 str+= '</div><hr class="devider devider-dashed"></div>';

                           obj.prepend(str); 
                           
                           $("#replyForm")[0].reset();

                           ProfileSocial.delComment();     
                        },
                        error:function(){

                        }
                     
                    });
                    return false;
                    


                },

                
                // Do not change code below
                errorPlacement: function(error, element)
                {
                    error.insertAfter(element.parent());
                }
            });
        },
        commentForm:function(){
            $("#commentForm").validate({
                // Rules for form validation
             
                rules:
                {
                    content:
                    {
                        required: true
                    }
                },
                                    
                // Messages for form validation
                messages:
                {
                    content:
                    {
                        required: '说点什么吧！'
                    }
                },

                // Ajax form submition
                submitHandler: function(form)
                {
                    
                    

                  
                    $.ajax(
                    {

                        type:'post',
                        data:$("#commentForm").serialize(),
                        url:'/user/api/add-comment',
                        success:function(res){
                            console.log(res);
                            var obj = $('#comment');
                    var str='<div class="my-comment-box"><div class="content-boxes-v3 margin-bottom-10 md-margin-bottom-20 row" style="padding:0 30px;">';
                        str+= '<div class="col-md-1"><img class="comment-face rounded-x" src="'+res.return_message.avatar+'" alt=""></div>';
                        str+= '<div class="content-boxes-in-v3 col-md-11 comment-userinfo">';
                        str+= '<h3><a href="#">'+res.return_message.nickname+'</a></h3> ';
                        str+= '<p>'+res.return_message.content+'</p>';
                        str+= ' <div class="clearfix">';
                        str+= '<span style="color:#555" class="pull-left">刚刚</span>';
                        str+= '<span style="color:#555;" class="pull-right">';
                        str+= '<a value="'+res.return_message.comment_id+'" class="del-comment" href="javascript:;">删除</a>';
                        str+= '</span>';
                        str+= '</div>';  
                        str+= ' </div>';
                        str+= '</div><hr class="devider devider-dashed"></div>';

                        obj.prepend(str);
                        $("#commentForm")[0].reset();

                        ProfileSocial.delComment();
                            //window.location = '/user/home/profile-project';
                        },
                        error:function(){

                        }
                     
                    });
                    return false;
                    


                },

                
                // Do not change code below
                errorPlacement: function(error, element)
                {
                    error.insertAfter(element.parent());
                }
            });
        },
        praiseUserInfo:function() {
            var post_id = $('meta[name="post_id"]').attr("content");
             $.ajax({
                type:'post',
                data:{"post_id":post_id},
                url:'/api/praise-userinfo',
                success:function(res){
                   console.log(res);
                    template.config('escape',false);
                    template.config('compress',true);
                    var data = res;
                    
                    var html = template('praiseUser',data);
                    document.getElementById('userinfo-content').innerHTML = html;
                    
                },
                error:function(){

                }
            });
           
        },
        templateComment:function(){

             $.ajax({
                type:'post',
                data:{"post_id":post_id},
                url:'/api/comment-template',
                success:function(res){
                   console.log(res);
                    template.config('escape',false);
                    template.config('compress',true);
                    var data = res;
                    
                    var html = template('praiseUser',data);
                    document.getElementById('userinfo-content').innerHTML = html;
                    
                },
                error:function(){

                }
            });

        },
        praiseFunc:function(){
            ProfileSocial.praiseUserInfo();
           
            $('.praise').click(function(){
                var obj = $(this);
                var post_id = $(this).attr('value');
                var table = $(this).attr('table');
                var status = $(this).is('.praise-active');
                var num =parseInt(obj.children('div.praise-num').html());
                if(status){
                    var url = '/user/api/del-praise';
                }else{
                    var url = '/user/api/add-praise';
                }
                $.ajax({
                    type:'post',
                    data:{'post_id':post_id,'table':table},
                    url:url,
                    success:function(res){
              
                        if(res.return_code == 0){
                            if(status){
                                obj.removeClass('praise-active');
                                obj.children('span').html('喜欢');
                                obj.children('div.praise-num').html(num-1);
                                ProfileSocial.praiseUserInfo();

                            }else{
                                ProfileSocial.praiseUserInfo();
                                obj.addClass('praise-active');
                                obj.children('span').html('已喜欢');
                                obj.children('div.praise-num').html(num+1)
                            }

                        }
                        
                    },
                    error:function(){

                    }

                })
            })    

        },
        faceImg:function(){
            $('.face-img').click(function(){
             var str='<div class="tab-v2">';   
                 str+='<ul class="nav nav-tabs">';
                 str+='<li class="active"><a href="#home-1" data-toggle="tab" aria-expanded="false">本地</a></li>';
                 str+='<li class=""><a href="#profile-1" data-toggle="tab" aria-expanded="true">网络图片</a></li>';
                 str+='</ul>';
                 str+='<div class="tab-content">';
                 str+='<div class="tab-pane fade in active" id="home-1">';
                 str+='<form action="#"class="sky-form" id="faceForm" style="position:relative;border:none;"><div class="face-editor"><fieldset>';
                 str+='<section><label class="input input-file"><div class="button" style="cursor:pointer"><input  type="file" id="file" class="cropit-image-input">选择图片</div></label></section>';
                 str+='<section class="text-center"><div class="cropit-preview"></div></section>';
                 str+='<div class="slider-wrapper"><span class="rotate-btns"><i style="cursor:pointer" class="fa fa-rotate-left rotate-ccw-btn"></i><i style="cursor:pointer" class="fa fa-rotate-right rotate-cw-btn"></i></span><i class="fa fa-file-image-o"></i><input type="range" class="cropit-image-zoom-input" min="0" max="1" step="0.01"><i style="font-size:20px;" class="fa fa-file-image-o"></i></div>';
                 str+='<input type="hidden" name="image-data" class="hidden-image-data" />';
                 str+='</fieldset></div></form>';
                 str+='</div>';
                 str+='<div class="tab-pane fade " id="profile-1"><input type="text" name=""></div></div></div>';
                 $.confirm({
                        title: '头像设置',
                        content:str,
                        confirmButton: '确定',
                        cancelButton:'取消',
                        confirmButtonClass: 'btn-danger',
                        columnClass:'col-face col-xs-offset-3',
                        animation: 'scale',
                        animationClose: 'top',
                        opacity: 0.5,
                        onOpen:function(){
                             $('.face-editor').cropit({
                                
                             
                                onImageLoading:function(){
                                    console.log(1);
                                },
                                onImageLoaded:function(){
                                    console.log(2);
                                }
                             });
                             $('.rotate-ccw-btn').click(function(){
                              $('.face-editor').cropit('rotateCW');
                             })  
                              $('.rotate-cw-btn').click(function(){
                              $('.face-editor').cropit('rotateCCW');
                             })  
                        },
                        confirm:function(){
                            
                             var imageData = $('.face-editor').cropit('export');
                             $('.hidden-image-data').val(imageData);

                             // Print HTTP request params
                             var formValue = $("#faceForm").serialize();
                            


                             $.ajax({
                                type:'post',
                                data:formValue,
                                url:'/user/api/api-image',
                                success:function(res){

                                   
                                    location.reload();
                                },
                                error:function(res){
                                    console.log(res);
                                }


                             })

                        }

                    })
            })
        },
        faceImg2:function(){
            $('.face-img').click(function(){
                var  str =' <form action="#" class="sky-form" id="faceForm" style="position:relative;border:none;"><div class="face-editor"><fieldset>';
                     str+=  '<section><label class="input input-file"><div class="button"><input type="file" id="file" class="cropit-image-input">选择图片</div></label></section>';
                     str+=  '<section class="text-center"><div class="cropit-preview"></div></section>';
                     str+=  '<div class="slider-wrapper"><i class="fa fa-file-image-o"></i><input type="range" class="cropit-image-zoom-input" min="0" max="1" step="0.01"><i style="font-size:20px;" class="fa fa-file-image-o"></i></div>';
                     str+=  '<input type="hidden" name="image-data" class="hidden-image-data" />';
                     str+=  '</fieldset></div></form>';
                 $.confirm({
                        title: '头像设置',
                        content:str,
                        confirmButton: '确定',
                        cancelButton:'取消',
                        confirmButtonClass: 'btn-danger',
                        animation: 'scale',
                        animationClose: 'top',
                        opacity: 0.5,
                        onOpen:function(){
                             $('.face-editor').cropit();
                        },
                        confirm:function(){
                            
                             var imageData = $('.face-editor').cropit('export');
                             $('.hidden-image-data').val(imageData);
                             console.log(imageData);
                             // Print HTTP request params
                             var formValue = $("#faceForm").serialize();
                            


                             $.ajax({
                                type:'post',
                                data:formValue,
                                url:'/user/api/api-image',
                                success:function(res){

                                   
                                    location.reload();
                                },
                                error:function(res){
                                    console.log(res);
                                }


                             })

                        }

                    })
            })
        },
        delDemand:function(){
            $('.delDemand').bind('click',function(){
                var demand_id = $(this).attr('value');
                var dom = $(this);
                $.confirm({
                    title: '确认删除',
                    confirmButton: '确定',
                    cancelButton:'取消',
                    content:'确定是否删除？',
                    confirmButtonClass: 'btn-info',
                    icon: 'fa fa-question-circle',
                    animation: 'scale',
                    animationClose: 'top',
                    opacity: 0.5,
                    confirm: function () {
                      $.ajax({
                          type:'post',
                          data:{"demand_id":demand_id},
                          url:'/user/api/del-demand',
                          success:function(res){
                
                              if(res.return_code == 0){
                                dom.parents('td').parents('tr').hide(500);
                              }
                          },
                          error:function(res){
                              console.log(res);
                          }
                      })
                    }
                });

            })
        },

        delAlbum:function(){
            $('.delAlbum').bind('click',function(){
                var album_id = $(this).attr('value');
                var dom = $(this);
                $.confirm({
                    title: '确认删除',
                    confirmButton: '确定',
                    cancelButton:'取消',
                    content:'确定是否删除？',
                    confirmButtonClass: 'btn-info',
                    icon: 'fa fa-question-circle',
                    animation: 'scale',
                    animationClose: 'top',
                    opacity: 0.5,
                    confirm: function () {
                      $.ajax({
                          type:'post',
                          data:{"album_id":album_id},
                          url:'/user/api/del-album',
                          success:function(res){
                              if(res.return_code == 0){
                                dom.parents('td').parents('tr').hide(500);
                              }
                          },
                          error:function(res){
                              console.log(res);
                          }
                      })
                    }
                });

            })
        },
        ModalIndex:function(){

            $('.indexModal').click(function(){
                var pid = $(this).attr('post');
                var uid = $(this).attr('uid');

             $.ajax({
                type:'post',
                data:{"post":pid,'user_id':uid},
                url:'/api/user-modal',
                success:function(res){
                    console.log(res);
                    template.config('escape',false);
                    template.config('compress',true);
                    var data = res;
                    
                    var html = template('userInfo',data);
                    document.getElementById('infoModal').innerHTML = html;
                    $('#myModal').modal('show');
                },
                error:function(){

                }
            }) 

            })
         
        },
        PostDemand:function(){
            $('#postDemand,#pageDemand').click(function(){
                var str= '<div class="row"><form action="/user/api/api-demand" method="post" enctype="multipart/form-data" id="demandForm" class="sky-form">';          
                        str+='<fieldset>';
                        str+=  '<section><div class="row"><label class="label col col-2">分类</label><div id="demandCate">';
                        str+=  '<section class="col col-5"><label class="select"><select class="parent " name="parent" ></select></label></section>';
                        str+=  '<section class="col col-5"><label class="select"><select class="child " name="child"></select></label>';
                        str+=  '</section></div></div></section>';
                        str+=   '<section><div class="row"><label class="label col col-2">详情</label>';
                        str+=   '<section class="col col-10"><label class="textarea"><i class="icon-append fa fa-comment"></i><textarea rows="5" name="content" placeholder="清楚说明你的帮助！"></textarea></label></section>';
                        str+=    '</section>';
                        str+='<div class="demand-img">';
                        str+='<section><label class="input input-file"><div class="button" style="cursor:pointer"><input  type="file" id="file" class="cropit-image-input">选择图片</div></label></section>';
                        str+='<section class="text-center"><div class="cropit-preview"></div></section>';
                        str+='<div class="slider-wrapper"><span class="rotate-btns"><i style="cursor:pointer" class="fa fa-rotate-left rotate-ccw-btn"></i><i style="cursor:pointer" class="fa fa-rotate-right rotate-cw-btn"></i></span><i class="fa fa-file-image-o"></i><input type="range" class="cropit-image-zoom-input" min="0" max="1" step="0.01"><i style="font-size:20px;" class="fa fa-file-image-o"></i></div>';
                        str+='<input type="hidden" name="image-data" class="hidden-image-data" />';
                        str+='</div>';    
                        str+='</fieldset>';
                        str+='</form></div>';
                                  
                var jc = $.confirm({
                      title: '找合作',
                      content: str,
                      confirmButton: '发布',
                      cancelButton:'取消',
                      confirmButtonClass: 'btn-danger',
                      icon: 'fa fa-question-circle',
                      animation: 'scale',
                      animationClose: 'top',
                      columnClass:'col-md-6 demand-col col-md-offset-3',
                      opacity: 0.5,
                      onOpen:function(){
                         $('#demandCate').cxSelect({ 
                              url: '/api/demand-category',               // 如果服务器不支持 .json 类型文件，请将文件改为 .js 文件 
                              selects:  ['parent', 'child'],
                              jsonName: 'name',                            
                            });
                         $('.demand-img').cropit({
                            
                         
                            onImageLoading:function(){
                                console.log(1);
                            },
                            onImageLoaded:function(){
                                console.log(2);
                            }
                         });
                         $('.rotate-ccw-btn').click(function(){
                          $('.demand-img').cropit('rotateCW');
                         })  
                          $('.rotate-cw-btn').click(function(){
                          $('.demand-img').cropit('rotateCCW');
                         })  
                           

                       ProfileSocial.initDemand();
                     
                      },
                      confirm:function(){
                             var imageData = $('.demand-img').cropit('export');
                             $('.hidden-image-data').val(imageData);

                        $.ajax(
                        {
                            type:'post',
                            data:$('#demandForm').serialize(),
                            url:'/user/api/api-demand',
                            success:function(res){
                                console.log(res);
                                //window.location = '/user/home/profile-project';
                            },
                            error:function(){

                            }
                         
                        });

                       
                  }

              })
            })
        },
        PostDemand2:function(){
            $('#postDemand,#pageDemand').click(function(){
                var str= '<div class="row"><form action="/user/api/api-demand" method="post" enctype="multipart/form-data" id="demandForm" class="sky-form">';
                     
                        str+='<fieldset>';
                        str+=   '<section>';
                        str+=       ' <label class="textarea">';
                        str+=           ' <i class="icon-append fa fa-comment"></i>';
                        str+=            '<textarea rows="5" name="content" placeholder="清楚说明你的帮助！"></textarea>';
                        str+=        '</label>';
                        str+=    '</section>';    
                        str+=    '<section>';
                        str+=        '<p><label>添加标签: (合理使用标签可以更快的得到帮助哦！)</label>';
                        str+=        '<input id="tags_2" type="text" class="tags" name="tags" value="网红" /></p>';
                        str+=   ' </section>';
                        str+='</fieldset>';
                        str+='</form></div>';
                                  
                var jc = $.confirm({
                      title: '找合作',
                      content: str,
                      confirmButton: '发布',
                      cancelButton:'取消',
                      confirmButtonClass: 'btn-danger',
                      icon: 'fa fa-question-circle',
                      animation: 'scale',
                      animationClose: 'top',
                      columnClass:'col-md-6 col-md-offset-3',
                      opacity: 0.5,
                      onOpen:function(){

                       ProfileSocial.initDemand();
                       OrderForm.initOrderForm();
                      },
                      confirm:function(){
                        $.ajax(
                        {
                            type:'post',
                            data:$('#demandForm').serialize(),
                            url:'/user/api/api-demand',
                            success:function(res){
                                console.log(res);
                                //window.location = '/user/home/profile-project';
                            },
                            error:function(){

                            }
                         
                        });

                       
                  }

              })
            })
        },
        AlbumCropit:function(){
                var AlbumImg = $('.album-cover').cropit();
                // img.cropit('previewSize');


        },
        Change:function(){
             var dom = $('ul#breadTag li');
             dom.each(function(){
                $(this).click(function(){
                    if($(this).is('.active')){
                        $(this).removeClass('active');
                        $(this).css('font-size','20px');
                        $(this).siblings('li').addClass('active');
                        $(this).siblings('li').css('font-size','10px');

                    }
                })
             })
        },
        initcoverForm: function () {
    
            
            // Validation
            $("#coverForm").validate({
                // Rules for form validation
             
                rules:
                {
                 
                   
                    title:
                    {
                        required: true
                    },
                    interested:
                    {
                        required: true
                    },
                    budget:
                    {
                        required: true
                    }
                },
                                    
                // Messages for form validation
                messages:
                {
                    title:
                    {
                        required: '请添加标题！'
                    },
                    email:
                    {
                        required: 'Please enter your email address',
                        email: 'Please enter a VALID email address'
                    },
                    desc:
                    {
                        required: '此项不能为空'
                    },
                    interested:
                    {
                        required: 'Please select interested service'
                    },
                    budget:
                    {
                        required: 'Please select your budget'
                    }
                },

            
                
                // Do not change code below
                errorPlacement: function(error, element)
                {
                    error.insertAfter(element.parent());
                }
            });
        },

        createAlbum:function(){

            
            ProfileSocial.Change();
               
            Ladda.bind( '#saveAlbum', {
                callback:function(ref){
                   var allContents = editor.serialize();
                   var data = allContents["element-0"].value;
                   var cover = $('#saveAlbum').attr('cover');
         
                  
                   $.ajax({
                        type:'post',
                        data:{'content':data,'cover_id':cover},
                        url:'/user/api/save-album',
                        success:function(res){
                            console.log(res);

                            if(res.return_code == 0){
                                var img_path = res.return_message.base64;
                            var  str =  '<form action="#"class="sky-form" id="coverForm" style="position:relative;border:none;"><div class="album-cover"><fieldset>';
                                 str+=  '<section><label class="label">文章标题</label><label class="input">';
                                 str+=  ' <i class="icon-append fa fa-tag"></i>';
                                 str+=  ' <input type="text" id="title" name="title" value="'+res.return_message.title+'"/></label><p class="text-danger" style="display:none">请添加标题！</p></section>';
                                 str+=  '<section><label class="input input-file"><div class="button"><input type="file" id="file" class="cropit-image-input">选择图片</div></label></section>';
                                 str+=  '<section class="text-center"><div class="cropit-preview"></div><p class="text-danger" style="display:none">图片不能为空！</p></section>';
                                 str+=   '<input type="hidden" name="cover" value="'+cover+'"/>';   
                                 str+='<div class="slider-wrapper"><span class="rotate-btns"><i style="cursor:pointer" class="fa fa-rotate-left rotate-ccw-btn"></i><i style="cursor:pointer" class="fa fa-rotate-right rotate-cw-btn"></i></span><i class="fa fa-file-image-o"></i><input type="range" class="cropit-image-zoom-input" min="0" max="1" step="0.01"><i style="font-size:20px;" class="fa fa-file-image-o"></i></div>';
                                 str+=  '<input type="hidden" name="image-data" id="img" class="hidden-image-data" />';
                                 str+=  '</fieldset></div></form>';
                                ref.stop();
                            var jc = $.confirm({
                                    title: '添加封面图片',
                                    content: str,
                                    confirmButton: '确定',
                                    cancelButton:'取消',
                                    confirmButtonClass: 'btn-danger',
                                    columnClass:'col-album col-md-offset-3',
                                    icon: 'fa fa-question-circle',
                                    animation: 'scale',
                                    animationClose: 'top',
                                    
                                    opacity: 0.5,
                                    onOpen:function(){

                                        ProfileSocial.AlbumCropit();
                                         $('.rotate-ccw-btn').click(function(){
                                          $('.album-cover').cropit('rotateCW');
                                         })  
                                          $('.rotate-cw-btn').click(function(){
                                          $('.album-cover').cropit('rotateCCW');
                                         }) 
                                      
                                        $('.cropit-preview-image').attr('src',img_path);

                                    },
                                    confirm:function(){
                                           var imageData = $('.album-cover').cropit('export');

                                            $('.hidden-image-data').val(imageData);
                                           var input = this.$b.find('input#title');
                                           var img = this.$b.find('input#img')
                                            var errorText = this.$b.find('.text-danger');
                                            if (input.val() == ''||img.val()=='') {
                                                 errorText.show();
                                                return false;
                                            }else{
                                                // Print HTTP request params
                                                var formValue = $("#coverForm").serialize();


                                                $.ajax({
                                                  type:'post',
                                                  data:formValue,
                                                  url:'/user/api/api-cover',
                                                  success:function(res){
                                                      jc.close();
                                                      location.href="/user/home/profile-album";
                                                      // location.reload();
                                                  },
                                                  error:function(res){
                                                      console.log(res);
                                                  }


                                                })
                                            }
                                 
                                         
                                    }

                                })
                            }
                        },
                        error:function(){

                        }
                   })
                   

                }

            } );



            var editor = new MediumEditor('.editable', {
                buttonLabels: 'fontawesome'
            });
            $('#saveBtn').click(function(){
                var str = editor.serialize();;
                console.log(str);
            })
            $('.editable').mediumInsert({
                editor: editor,
                addons: {
                    images: {
                        styles: {
                            slideshow: {
                                label: '<span class="fa fa-play"></span>',
                                // added: function ($el) {
                                //     $el
                                //         .data('cycle-center-vert', true)
                                //         .cycle({
                                //             slides: 'figure'
                                //         });
                                // },
                                // removed: function ($el) {
                                //     //$el.cycle('destroy');
                                // }
                            }
                        },
                        actions: false
                    }
                }
            });
        },
		DeleteMessage:function(){
			$('#deleteMessage').click(function(){
				var fid = $('#deleteMessage').attr('value');
				 $.confirm({
	                title: '删除对话',
	                content: '请确认，是否删除该对话',
	                confirmButton: '确定',
	                cancelButton:'取消',
	                confirmButtonClass: 'btn-danger',
	                icon: 'fa fa-question-circle',
	                animation: 'scale',
	                animationClose: 'top',
	                opacity: 0.5,
	                confirm:function(){
	                	$.ajax({
	                		type:'post',
	                		url:'/user/message/delete-message',
	                		data:{"to_id":fid},
	                		success:function(res){
	                			if(res.return_code == 0){
	                				location.href="/user/message";
	                			}
	                		},
	                		error:function(res){

	                		}

	                	})
	                }

	            })
			})
		},

        initMessageForm: function () {
	        // Datepickers
	   
	        
	        // Validation
	        $("#MessageForm").validate({
	            // Rules for form validation
	         
	            rules:
	            {
	                content:
	                {
	                    required: true
	                }
	             
	            },
	                                
	            // Messages for form validation
	            messages:
	            {
	                content:
	                {
	                    required: '说点什么吧'
	                }
	            },

	            // Ajax form submition
	            submitHandler: function(form)
	            {


	                $(form).ajaxSubmit(
	                {

	                	type:'post',
	                
	                	url:'/user/message/api-save',
	                	success:function(res){
	                		var str ;
                            str='<div class="col-xs-6 col-xs-offset-6">';
            		           str+='<div id="testimonials-4" class="carousel slide testimonials testimonials-v2 ">';
                                        str+='<div class="carousel-inner">';
                                            str+='<div class="item active">';
                                                str+='<p class="rounded-3x">'+res.return_message+'</p>';
                                               str+= '<div class="testimonial-info">';
                                                    str+='<span class="testimonial-author">';
                                                        	str+='&nbsp;&nbsp;&nbsp;&nbsp;我';
                                                        str+='<em>&nbsp;</em>';
                                                    str+='</span>';
                                                str+='</div>';
                                            str+='</div>';
                                         
                                       str+= '</div>';

                                     
                                    str+='</div>';
            	            str+='</div>';
    						$('.message-body').append(str);
    						$(".message-body").scrollTop(400000); 
    						$('#content').val('');


	                		//console.log(res);
	                		//window.location = '/user/home/profile-project';
	                	},
	                	error:function(){

	                	}
	                 
	                });


	            },  
	            
	            // Do not change code below
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });
        },
        initGroup:function(){
        	 document.addEventListener('DOMContentLoaded', function () {
			      document.querySelector('main').className += 'loaded';
			    });
        
        	$.ajax({
        		type:'post',
        		url:'/user/message/get-groupinfo',
        		success:function(res){
        			var data = res;
        		
        			var html = template('message_group',data);
        			document.getElementById('group').innerHTML = html;
        			ProfileSocial.initMessageR();
        		},
        		error:function(){

        		}
        	})

        	

        },
        initHistory:function(){
        	var height = $(window).height();
			var _height = height-120;
			$('.message-body').css('height',_height);
			$(".message-body").scrollTop(400000);
        },
        initMessageR:function(){
        	$('#addGroup').click(function(){

        		$.confirm({
        		    title: '新建分组',
        		    confirmButton: '确定',
        		    cancelButton:'取消',
        		    confirmButtonClass: 'btn-info',
        		    icon: 'fa fa-question-circle',
        		    animation: 'scale',
        		    animationClose: 'top',
        		    opacity: 0.5,
        		    content: '<div class="form-group"><label></label><input autofocus type="text" id="group_name" placeholder="分组名称" class="form-control"></div><p class="text-danger" style="display:none">分组名称不能为空！</p>',
        		    confirm: function () {
        		        var input = this.$b.find('input#group_name');
        		        var errorText = this.$b.find('.text-danger');
        		        if (input.val() == '') {
        		            errorText.show();
        		            return false;
        		        } else {
        		            $.ajax({
        		            	type:'post',
        		            	data:{"group_name":input.val()},
        		            	url:'/user/message/add-group',
        		            	success:function(res){
        		            		ProfileSocial.initGroup();
        		            	},
        		            	error:function(res){
        		            		console.log(res);
        		            	}
        		            })
        		        }
        		    }
        		});
        	})
        },

		initMessage:function(){
			
			$('#removeBlack').click(function(){
				var fid = $('#removeBlack').attr('value');
				 $.confirm({
                    title: '取消',
                    content: '请确认，是否取消黑名单',
                    confirmButton: '确定',
                    cancelButton:'取消',
                    confirmButtonClass: 'btn-danger',
                    icon: 'fa fa-question-circle',
                    animation: 'scale',
                    animationClose: 'top',
                    opacity: 0.5,
                    confirm:function(){
                    	$.ajax({
                    		type:'post',
                    		url:'/user/message/remove-black',
                    		data:{"friend_id":fid},
                    		success:function(res){
                    			console.log(res);
                    			ProfileSocial.initGroup();
                    		},
                    		error:function(res){

                    		}

                    	})
                    }

                })
			})

			$('#blackFriend').click(function(){
				var fid = $('#blackFriend').attr('value');
				 $.confirm({
                    title: '加入黑名单',
                    content: '请确认，是否加入黑名单',
                    confirmButton: '确定',
                    cancelButton:'取消',
                    confirmButtonClass: 'btn-danger',
                    icon: 'fa fa-question-circle',
                    animation: 'scale',
                    animationClose: 'top',
                    opacity: 0.5,
                    confirm:function(){
                    	$.ajax({
                    		type:'post',
                    		url:'/user/message/black-friend',
                    		data:{"friend_id":fid},
                    		success:function(res){
                    			console.log(res);
                    			ProfileSocial.initGroup();
                    		},
                    		error:function(res){

                    		}

                    	})
                    }

                })
			})


			$('#removeFriend').click(function(){
				var fid = $('#removeFriend').attr('value');
				 $.confirm({
                    title: '删除好友',
                    content: '请确认，您是否要删除该好友',
                    confirmButton: '确定',
                    cancelButton:'取消',
                    confirmButtonClass: 'btn-danger',
                    icon: 'fa fa-question-circle',
                    animation: 'scale',
                    animationClose: 'top',
                    opacity: 0.5,
                    confirm:function(){
                    	$.ajax({
                    		type:'post',
                    		url:'/user/message/remove-friend',
                    		data:{"friend_id":fid},
                    		success:function(res){
                    			console.log(res);
                    			ProfileSocial.initGroup();
                    		},
                    		error:function(res){

                    		}

                    	})
                    }

                })
			})

			$('#addFriend').click(function(){

			  $.confirm({
                    title: '加为好友',
                    content: '请确认，您是否加他为好友',
                    confirmButton: '确定',
                    cancelButton:'取消',
                    confirmButtonClass: 'btn-info',
                    icon: 'fa fa-question-circle',
                    animation: 'scale',
                    animationClose: 'top',
                    opacity: 0.5,
                    confirm:function(){
                    	var fid = $('#addFriend').attr('value');
                    	
                    	$.confirm({
                    	    title: '添加好友分组',
                    	    content:function(){
                    	    	var self =this;
                    	    	return $.ajax({
                    	    		type:'POST',
                    	    		url:'/user/message/get-group',
                    	    	}).done(function(res){
                    	    	
                    	    		var str;
                    	    		var $i = 0;
                    	    		str='<form class="sky-form" id="groupForm" style="border:none;"><fieldset><section><div class="">';
                    	    		if(res.group.length == 0){
                    	    			str+='<input type="hidden" name="friend_id" value="'+fid+'"><input type="hidden" name="group" value="0">';

                    	    		}else{
                    	    			for($i;$i<res.group.length;$i++){

                    	    			str+='<label class="checkbox"><input type="hidden" name="friend_id" value="'+fid+'"><input type="radio" name="group" value="'+res.group[$i].id+'"><i></i>'+res.group[$i].group_name+'</label>';

                    	    			}
                    	    		}
                    	    		


                    	    		str+='</div></section></fieldset></form>';
                    	    		self.setContent(str);

                    	    		//self.setContent('<form class="sky-form" style="border:none;"><fieldset><section><div class="inline-group"><label class="checkbox"><input type="checkbox" name="checkbox-inline" checked=""><i></i>Alexandra</label><label class="checkbox"><input type="checkbox" name="checkbox-inline" checked=""><i></i>Alexandra</label></div></section></fieldset></form>');
                    	    	}).fail(function(){

                    	    	});
                    	    },
                    	    confirmButton: '确定',
                    	    cancelButton:'暂不添加',
                    	    confirmButtonClass: 'btn-info',
                    	    icon: 'fa fa-question-circle',
                    	    animation: 'zoom',
                    	    confirm: function () {

                    	    	var data = $('#groupForm').serialize();
                    	        $.ajax({
                    	        	type:'post',
                    	        	data:data,
                    	        	url:'/user/message/add-friend',
                    	        	success:function(res){
                    	        		ProfileSocial.initGroup();
                    	        	},
                    	        	error:function(res){
                    	        		
                    	        	}

                    	        })
                    	    },
                    	    cancel:function(){
                	    	$.ajax({
	                    		type:'POST',
	                    		url:'/user/message/add-friend',
	                    		data:{'friend_id':fid,'group':''},
	                    		success:function(res){
	                    			ProfileSocial.initGroup();
	                    		},
	                    		error:function(res){
	                    			
	                    		}
	                    	});
                    	    }
                    	});
                    }
                   
                });

				  // $.confirm({
      //               title: '加为好友',
      //               content: '请确认，您是否加他为好友',
      //               confirmButton: '确定',
      //               cancelButton:'取消',
      //               confirmButtonClass: 'btn-info',
      //               icon: 'fa fa-question-circle',
      //               animation: 'scale',
      //               animationClose: 'top',
      //               opacity: 0.5,
      //               confirm:function(){
      //               	var fid = $('#addFriend').attr('value');
      //               	$.ajax({
      //               		type:'POST',
      //               		url:'/user/message/api-friend',
      //               		data:{'friend_id':fid},
      //               		success:function(res){
      //               			console.log(res);
      //               		},
      //               		error:function(res){
      //               			console.log(res);
      //               		}
      //               	})
      //               }
                   
      //           });
			}) 
		},

		initSocial:function(){

			$('.saveBtn').click(function(){
				var input = $(this).siblings('input'),
				 data ={},		
				 uid = $(this).attr('uid'),
				 key = input.attr('name'),
				 val = input.val();
				 data = {'user_id':uid,'name':key,'value':val};
				 $.ajax({

					type:'POST',
					data:data,
					url:'/user/api/api-social',
					success:function(res){

						location.reload();
					},
					error:function(res){

					}
				})
			})
			
		},
		skillName:function(){
			$('.skillName').click(function(){
				var parent = $(this);
				//one
				var input = '<input type="text" class="skillInput" value='+$(this).text()+'>';
				$(this).text('');
				$(this).prepend(input);
				$(this).unbind('click');
				//two
				ProfileSocial.skillInput();

			})
		},
		skillInput:function(){

			$('.skillInput').blur(function(){

				$(this).parent('span').text($(this).val());



				ProfileSocial.skillName();

				
			})
		},
		initDemand:function(){



			  	function onAddTag(tag) {
						alert("添加新标签: " + tag);
					}
					function onRemoveTag(tag) {
						alert("Removed a tag: " + tag);
					}

					function onChangeTag(input,tag) {
						alert("Changed a tag: " + tag);
					}

					$(function() {

						$('#tags_1').tagsInput({width:'auto'});
						$('#tags_2').tagsInput({
							width: 'auto',

						    'defaultText':'添加',
						    'placeholderColor' : '#000',
							onChange: function(elem, elem_tags)
							{
								var languages = ['php','ruby','javascript'];
								$('.tag', elem_tags).each(function()
								{
									if($(this).text().search(new RegExp('\\b(' + languages.join('|') + ')\\b')) >= 0)
										$(this).css('background-color', 'red');
								});
							}
						});
						$('#tags_3').tagsInput({
							width: 'auto',

							//autocomplete_url:'test/fake_plaintext_endpoint.html' //jquery.autocomplete (not jquery ui)
							autocomplete_url:'test/fake_json_endpoint.html' // jquery ui autocomplete requires a json endpoint
						});


			// Uncomment this line to see the callback functions in action
			//			$('input.tags').tagsInput({onAddTag:onAddTag,onRemoveTag:onRemoveTag,onChange: onChangeTag});

			// Uncomment this line to see an input with no interface for adding new tags.
			//			$('input.tags').tagsInput({interactive:false});
					});

		},
		initCropit:function(){
			    $('.image-editor').cropit();

			    $('form').submit(function() {
			      // Move cropped image data to hidden input
			      var imageData = $('.image-editor').cropit('export');
			      $('.hidden-image-data').val(imageData);

			      // Print HTTP request params
			      var formValue = $(this).serialize();


			      $.ajax({
			      	type:'post',
			      	data:formValue,
			      	url:'/user/api/api-image',
			      	success:function(res){

			      		
			      		location.reload();
			      	},
			      	error:function(res){
			      		console.log(res);
			      	}


			      })
			      //$('#result-data').text(formValue);

			      // Prevent the form from actually submitting
			      return false;
   				 });
		},
		initInfo:function(){
			$('#infoForm').submit(function(){

				var data = $(this).serialize();

				var action = $(this).attr('action');

				$.ajax({
					type:'POST',
					data:data,
					url:action,
					success:function(res){

						if(res.return_code == 0){

							window.history.back();
						}
					},
					error:function(res){

					}
				})

				return false;
			})
		},
		initSkills:function(){

			

			$('.slider3-rounded').each(function(){

				var mark = $(this).attr('mark');

				$(this).children('a').css({'left':mark/400*100+'%'});

				var data = new Array("了解",'熟悉',"掌握","精通","专家");

				$(this).siblings('label').children('span.slider3-value-rounded').text(data[mark/100])

			
			})
			ProfileSocial.skillName();

			$('#saveSkill').click(function(){
				var data = {};
				var obj = $('.skillName');
				obj.each(function(index){
					var mark = $(this).attr('mark');
					var value = $(this).text();
					data[index] = {'value':value,'mark':mark};
				})
			
				 $.ajax({

					type:'POST',
					data:data,
					url:'/user/api/api-skills',
					success:function(res){
						
						location.reload();
					},
					error:function(res){

					}
				})

			})


			$('#addSkill').click(function(){

				var dom = '<section><label class="label rounded-x"><span class="skillName" mark="100">请输入技能名称</span>(<span class="slider3-value-rounded">了解</span>)</label><div class="slider3-rounded"></div></section>';

				$('.skillField').prepend(dom);
				FormSliders.initFormSliders();
				ProfileSocial.skillName();


			})
		}
	}
}();