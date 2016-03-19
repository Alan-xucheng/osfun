var Message = function(){

	return{


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
        }





	}



}()