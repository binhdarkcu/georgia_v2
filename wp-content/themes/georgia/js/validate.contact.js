$(document).ready(function(){
	jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "");
	 jQuery("#contactform").validate({
        rules: {
            'cname': {
                required: true
            },
            'cemail':{
            	required: true,
            	email: true,
            },
            'ckaccept': {
                required: true
            }
        },
        errorPlacement: function(error, element){},
        highlight: function(element) {
            
            if(jQuery(element).is(':checkbox'))
            {
                var name = jQuery(element).attr('name');
                console.log(element);
                jQuery('input[name='+name+']').parent().addClass('error');
            }
            else
            {
            	jQuery(element).addClass('error');
            }
        },
        unhighlight: function(element, errorClass, validClass) {
            jQuery(element).removeClass(errorClass).addClass(validClass); // remove error class from elements/add valid class
            var name = jQuery(element).attr('name');
            jQuery('input[name='+name+']').parent().removeClass('error');
        },
        submitHandler: function(form) {
            var boxes = $('#accept:checkbox');
            if(boxes.length > 0) {
                if( $('#accept:checkbox:checked').length < 1) {
                    alert('Please select at least one checkbox');
                    boxes[0].focus();
                    return false;
                }
            }
            form.submit();
        },
	});
});