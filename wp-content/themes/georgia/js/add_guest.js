$(document).ready(function() {
	$("#guest_form").validate({
		rules: {
			'guest_name': { 
				required: true
			},
			'guest_surname': { 
				required: true
			}
		},
		errorPlacement: function(error, element) { },
        unhighlight: function(element, errorClass, validClass) {
            jQuery(element).removeClass(errorClass).addClass(validClass); // remove error class from elements/add valid class
            var name = jQuery(element).attr('name');
            jQuery('input[name='+name+']').parent().removeClass('error');
        },
		submitHandler: function(form) {
			
			//form.submit();
		},
	});
	$("#guest_form").on('submit',(function(e){
		$form = $(this);
		$.ajax({
			type : "post",
			url : $('.ajaxurl').val(),
			//data : {action: "user_contact_form", u_name : $u_name, u_firstname : $u_firstname, u_email : $u_email, u_phone : $u_phone, u_gender : $u_gender, u_birthday : $u_birthday, u_postalcode : $u_postalcode, u_country : $u_country, p_files : $p_files},
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData:false,
			success: function(response) {
				if(response == 1){
					console.log('success');
				}else{
					console.log('not success');
				}
			}            
		});
	}));
});