jQuery(document).ready(function(){
	$('#filePicture').change(function(){
		if(this.disabled) return alert('File upload not supported!');
	    var F = this.files;
	    if(F && F[0]) for(var i=0; i<F.length; i++) SiteMain.readImage( F[i] );
	   
	    $dir = jQuery('.pictureUpload img.imgPreview').attr('data-dir');
		$tablename = 'wp_members';
        $setfield = 'p_picture';
        
        $file = $(this)[0].files[0];
	    $fileName = $file.name;
	    $fileExt = '.' + $fileName.split('.').pop();
        
        $fieldname = $fileName;
	    jQuery.ajax({
            type : "post",
            url : $('.ajaxurl').val(),
            data : {action: "saveFile", fieldname:$fieldname},
            success: function(response) {
            	console.log(data);
            }
       });
	   
	
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
			$setfield = $('input[name=' + $fieldname + ']').val();
			$id = $(this).attr('data-userid');
			jQuery.ajax({
				type : "post",
				url : $('.ajaxurl').val(),
				data : {action: "user_update_profile", setfield:$setfield, fieldname:$fieldname, id:$id },
				success: function(data) {
					if(data){
						$('input[name=' + $fieldname + ']').prop('disabled',true).removeAttr('style');
						$(self).find('span').text('edit');
						alert('Profile updated.');
					}else{
						alert('Profile not updated.');
					}
				}
			});
		}else{
			$('input[name=' + $fieldname + ']').prop('disabled',false).css({'border':'1px solid #fff'});
			$('.empty').hide();
			$status = $(this).find('span').text('save');
		}
	});
	//ADD EVENT
	$(document).on('click','#addEvent',function(){
		$id_event = $(this).attr('data-event-id');
        $id_member = $(this).attr('data-user-id');
		$.ajax({
            type : "POST",
            url : $('.ajaxurl').val(),
            data : {action: "add_event", 'id_event':$id_event, 'id_member':$id_member},
            dataType:'json',
            success:function(data) {
            	if(data){
            		alert('Thank you participated this event.');
            	}else{
            		alert('You only participate once.');
            	}
	            
	        },
	        error: function(errorThrown){
	            alert('Participate fail.');
	        }

       });
	});
});
