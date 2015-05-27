jQuery(document).ready(function(){
	$('#filePicture').change(function(){
		if(this.disabled) return alert('File upload not supported!');
	    var F = this.files;
	    if(F && F[0]) for(var i=0; i<F.length; i++) SiteMain.readImage( F[i] );
	    
	    /*
	    jQuery.ajax({
            type : "post",
            url : setting.url + '/wp-admin/admin-ajax.php',
            data : {action: "updateProfile", data_day : $data_day, data_month : $data_month, data_year : $data_year},
            success: function(response) {
                $('#sidebar-events-loop').html(response);
            }
       });*/
	});
	
	$("#MyUploadForm").on('submit',(function(e){
		e.preventDefault();
		$.ajax({
			url: $('.ajaxurl').val(),
			type: "POST",
			data:  new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success: function(){
				//alert('Avatar is updated.');
				$('#editPhoto').show();
	    		$('#submit-btn').hide();
			},
			error: function(){} 	        
		});
	}));
	$('#editPhoto').click(function(){
		$('#filePicture').click();
	});
	
	
	//EDIT PROFILE
	
	$('.fedit').click(function(e){
		e.preventDefault();
		$status = $(this).find('span').text();
		$fieldname = $(this).attr('data-fieldname');
		var self = this;
		if($status == 'save'){
			$setfield = $('input[name=' + $fieldname + ']').val() || $('select[name=' + $fieldname + ']').val();
			$id = $(this).attr('data-userid');
			jQuery.ajax({
				type : "post",
				url : $('.ajaxurl').val(),
				data : {action: "user_update_profile", setfield:$setfield, fieldname:$fieldname, id:$id },
				success: function(data) {
					if(data){
						$('input[name=' + $fieldname + ']').parent().attr('href',$setfield);
						$(this).parent().parent().find('a').attr('href',$('input[name=' + $fieldname + ']').val());
						$('input[name=' + $fieldname + ']').prop('disabled',true).removeAttr('style');
						$('select[name=' + $fieldname + ']').prop('disabled',true).removeAttr('style');
						$(self).find('span').text('edit');
						//alert('Profile updated.');
					}else{
						alert('Profile not updated.');
					}
				}
			});
		}else{
			$(this).parent().parent().find('a').attr('href','javascript:void(0)');
			$('input[name=' + $fieldname + '], select[name=' + $fieldname + ']').prop('disabled',false).css({'border':'1px solid #fff'});
			$('select[name=' + $fieldname + ']').prop('disabled',false).css({'background':'#fff','color':'#333'});
			$(this).parent().parent().find('.empty').hide();
			$status = $(this).find('span').text('save');
		}
	});
	//ADD EVENT
	$(document).on('click','#addEvent',function(){
		$id_event = $(this).attr('data-event-id');
        $id_member = $(this).attr('data-user-id');
		$action = $(this).parent().find('input[name=action]').val();
		$.ajax({
            type : "POST",
            url : $('.ajaxurl').val(),
            data : {action: $action, 'id_event':$id_event, 'id_member':$id_member},
            dataType:'json',
            success:function(data) {
            	if(data){
					if ($action == 'add_event') {
						//alert('Thank you participated this event.');
						$('#message-success').show();
					}
            		else if ($action == 'cancel_event') {
						//alert('Cancel successful.');
						$('#message-cancle').show();
					}
            		//window.location.reload();
            	}else{
            		alert('You only participate once.');
            	}
	            
	        },
	        error: function(errorThrown){
	            alert('Participate fail.');
	            $('#addEvent').hide();
	        }

       });
	});
	
	//LOGIN
	jQuery(document).ready(function() {
        jQuery("#loginForm").validate({
    		rules: {
                'p_email': { 
                    required: true, 
                    email: true,
                },
                'p_password': { 
                    required: true, 
                    minlength: 6, 
                }
    		},
    		submitHandler: function(form) {
                form.submit();
    		},
    	});
    });
	$('#btn-user-login').click(function() {
		$form = $('#loginForm');
		$p_email = $form.find('input[name=login_email]').val();
        $p_password = $form.find('input[name=p_password]').val();
        $check = false;
        $form.find('input').removeClass('error');
        if($p_email == ''){
        	$form.find('input[name=login_email]').addClass('error');
        	$check = true;
        }
        if($p_password == ''){
        	$form.find('input[name=p_password]').addClass('error');
        	$check = true;
        }else{
	    	if($form.find('input[name=login_email]').hasClass('email')){
				var h=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!h.test($p_email)){
					$form.find('input[name=login_email]').addClass('error');
					$check=true;
				}
			}
        }
        if(!$check){
		    jQuery.ajax({
	            type : "post",
	            url : $('.ajaxurl').val(),
	            data : {action: "user_login", p_email : $p_email, p_password : $p_password},
	            success: function(response) {
					if (response == 'false') {
						alert('Your account is not activated');
					}
					else {
						window.location.href = response;
					}
	            }
	       });
	    }
	});
});
