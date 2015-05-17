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
						$('input[name=' + $fieldname + ']').prop('disabled',true).removeAttr('style');
						$('select[name=' + $fieldname + ']').removeAttr('style');
						$(self).find('span').text('edit');
						//alert('Profile updated.');
					}else{
						alert('Profile not updated.');
					}
				}
			});
		}else{
			$('input[name=' + $fieldname + '], select[name=' + $fieldname + ']').prop('disabled',false).css({'border':'1px solid #fff'});
			$('select[name=' + $fieldname + ']').css({'background':'#fff','color':'#333'});
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
});
