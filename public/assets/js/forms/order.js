var OrderForm = function () {

    return {
        
        //Order Form
        initOrderForm: function () {
	        // Datepickers
	        // $('#start').datepicker({
	        //     dateFormat: 'dd.mm.yy',
	        //     prevText: '<i class="icon-chevron-left"></i>',
	        //     nextText: '<i class="icon-chevron-right"></i>',
	        //     onSelect: function( selectedDate )
	        //     {
	        //         $('#finish').datepicker('option', 'minDate', selectedDate);
	        //     }
	        // });
	        // $('#finish').datepicker({
	        //     dateFormat: 'dd.mm.yy',
	        //     prevText: '<i class="icon-chevron-left"></i>',
	        //     nextText: '<i class="icon-chevron-right"></i>',
	        //     onSelect: function( selectedDate )
	        //     {
	        //         $('#start').datepicker('option', 'maxDate', selectedDate);
	        //     }
	        // });
	        
	        // Validation
	        $("#demandForm").validate({
	            // Rules for form validation
	         
	            rules:
	            {
	             
	               
	                content:
	                {
	                    required: true
	                },
	                parent:
	                {
	                	required:true
	                }
	             
	            },
	                                
	            // Messages for form validation
	            messages:
	            {
	                content:
	                {
	                    required: '说点什么吧！'
	                },
	                parent:
	                {
	                	required:'请选择分类'
	                }
	     
	            },

	            // Ajax form submition
	            submitHandler: function(form)
	            {
	            	
	            	
	                $(form).ajaxSubmit(
	                {

	                	type:'post',
	                
	                	url:$(this).attr('action'),
	                	success:function(res){
	                		console.log(res);
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

    };

}();