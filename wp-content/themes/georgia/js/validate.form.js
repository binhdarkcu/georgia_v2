
jQuery(document).ready(function() {
	
	jQuery(".fileUpload input[type=file]").change(function (e) {
	    if(this.disabled) return alert('File upload not supported!');
	    var F = this.files;
	    if(F && F[0]) for(var i=0; i<F.length; i++) SiteMain.readImage( F[i] );
	});


    jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "");
	
    
    jQuery("#registerForm").validate({
        rules: {
            'p_naam': {
                required: true
            },
            'p_voornaam': {
                required: true
            },
            'p_geboortedatum': {
                required: true
            },
            'p_geboorteplaats': {
                required: true
            },
            'p_straat': {
                required: true
            },
            'p_nr': {
                selectcheck: true
            },
            'p_postcode':{
            	required: true
            },
            'p_plaats':{
            	required: true
            },
            'p_land':{
            	selectcheck: true
            },
            
            'p_gsm':{
            	required: true
            },
            'p_email':{
            	required: true,
            	email: true,
                remote: {
                        url: $('.ajaxurl').val(),
                        type: "post",
                        data: {
                            'p_email': function() {
			                    return $( "#p_email" ).val();
			                },
			               'action': 'check_user_email'
                        },
                        complete: function(data){
	                        if( data.responseText == "false" ) {
	                            $( "#p_email" ).focus();
	                            alert("Email address already in use. Please use other email.");
	                        }else{
	                        	$( "#p_email" ).removeClass('error');
	                        }
	                    }
                    }
            },
            'p_password':{
            	required: true,
            	minlength: 6
            },
            'p_telefoon':{
            	required: true,
            	minlength: 15
            },
            'p_picture':{
            	required: true
            },
            
            'b_naam':{
            	required: true
            },
            'b_hoofd': {
                required: true
            },
            'b_firma': {
                selectcheck: true
            },
            'b_straat': {
                required: true
            },
            'b_nr': {
                selectcheck: true
            },
            'b_postcode':{
            	required: true
            },
            'b_plaats':{
            	required: true
            },
            'b_land': {
                selectcheck: true
            },
            
            'r_naam': {
                required: true
            },
            'r_voornaam': {
                required: true
            },
            'r_telefoon': {
                required: true
            },
            'r_email': {
                required: true,
                email: true
            },
            'r_naam_2': {
                required: true
            },
            'r_voornaam_2': {
                required: true
            },
            'r_telefoon_2': {
                required: true
            },
            'r_email_2': {
                required: true,
                email: true
            },
            
            'f_personname': {
                required: true
            },
            'f_telefoon': {
                required: true
            },
            'f_email': {
                required: true,
                email: true
            },
            'f_btw': {
                required: true
            },
            
            'accept' :{
            	required: true
            }
        },
        errorPlacement: function(error, element){},
        highlight: function(element) {
            //console.log(element);
            if(jQuery(element).is(':checkbox'))
            {
                var name = jQuery(element).attr('name');
                jQuery('input[name='+name+']').parent().addClass('error');
            }
            else
            {
            	if(jQuery(element).is(':file'))
	            {
	                var name = jQuery(element).attr('name');
	                jQuery('input[name='+name+']').parent().addClass('error');
	            }else{
                	jQuery(element).addClass('error');
                }
            }
        },
        unhighlight: function(element, errorClass, validClass) {
            jQuery(element).removeClass(errorClass).addClass(validClass); // remove error class from elements/add valid class
            var name = jQuery(element).attr('name');
            jQuery('input[name='+name+']').parent().removeClass('error');
        },
        submitHandler: function(form) {
            var boxes = jQuery('.ipinterests:checkbox');
            if(boxes.length > 0) {
                if( jQuery('.ipinterests:checkbox:checked').length < 1) {
                    alert('Please select at least one checkbox');
                    boxes[0].focus();
                    return false;
                }
            }
            form.submit();
        },
    });
});