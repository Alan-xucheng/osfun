var ProfileSocial = function(){

	return {

		initMessage:function(){
			var height = $(window).height();
			var _height = height-117;
			$('.message-body').css('height',_height);
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