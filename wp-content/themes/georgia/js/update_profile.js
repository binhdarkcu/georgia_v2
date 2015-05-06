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
            	console.log(data);
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
