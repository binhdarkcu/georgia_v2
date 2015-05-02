
jQuery(document).ready(function() {
	function readImage(file) {
	
	    var reader = new FileReader();
	    var image  = new Image();
	
	    reader.readAsDataURL(file);  
	    reader.onload = function(_file) {
	        image.src    = _file.target.result;              // url.createObjectURL(file);
	        image.onload = function() {
	            var w = this.width,
	                h = this.height,
	                t = file.type,                           // ext only: // file.type.split('/')[1],
	                n = file.name,
	                s = ~~(file.size/1024) +'KB';
	            jQuery('.pictureUpload img.imgPreview').attr('src', this.src);
	        };
	        image.onerror= function() {
	            alert('Invalid file type: '+ file.type);
	        };      
	    };
	
	}
	
	jQuery(".fileUpload input[type=file]").change(function (e) {
	    if(this.disabled) return alert('File upload not supported!');
	    var F = this.files;
	    if(F && F[0]) for(var i=0; i<F.length; i++) readImage( F[i] );
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
            'p_telefoon':{
            	required: true
            },
            'p_fax':{
            	required: true
            },
            'p_gsm':{
            	required: true
            },
            'p_email':{
            	required: true,
            	email: true
            },
            'p_likedin':{
            	required: true
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
            'b_telefoon': {
                required: true
            },
            'b_fax': {
                required: true
            },
            'b_gsm':{
            	required: true
            },
            'b_email':{
            	required: true,
            	email: true
            },
            'b_organisatie': {
                required: true
            },
            'b_functies': {
                required: true
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
            'f_fax': {
                required: true
            },
            'f_interest': {
                required: true
            },
            'f_addresspayment': {
                required: true
            },
            'f_notepayment': {
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