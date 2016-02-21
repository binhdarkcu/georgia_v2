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
				$('.guest_result').append(response);
				$form.get(0).reset();
                var numguest = $('.guest_rownumber').length + 1;
                $('.guest_form_ajax h4').html('GUEST ' + numguest);
				$(".add_guest_popup p input").each(function () {
			        $(this).attr('size', $(this).attr('value').length);
			    });
			    editGuest();
                $( ".guest_rownumber .linkdelete").unbind( "click" );
			    deleteGuest();
			}            
		});
	}));
	
	function editGuest(){
		$('.guest_rownumber .linkedit').click(function(e){
			e.preventDefault();
			$status = $(this).find('span').text();
			$field_guestname = $(this).attr('data-guestname');
			$field_guestsurname = $(this).attr('data-guestsurname');
			$id_event = $('input[name="id_event"]').val();
			var self = this;
			if($status == 'save'){
				$guestid = $(this).attr('data-guestid');
				$memberid = $(this).attr('data-userid');
				$set_guestname = $(self).parent().find('input[name=' + $field_guestname + ']').val();
				$set_guestsurname = $(self).parent().find('input[name=' + $field_guestsurname + ']').val();
				jQuery.ajax({
					type : "post",
					url : $('.ajaxurl').val(),
					data : {action: "user_update_guest", guest_name:$set_guestname, guest_surname:$set_guestsurname, id_guest:$guestid, id_event:$id_event, id_member: $memberid },
					success: function(data) {
						if(data){
							$(self).parent().find('input[type=text]').prop('disabled',true).addClass('notedit');
							$(self).find('span').text('edit');
							$(".add_guest_popup p input").each(function () {
						        $(this).attr('size', $(this).attr('value').length);
						    });
							
						}else{
							alert('Guest not updated.');
						}
					}
				});
			}else{
				$(this).parent().find('input[type=text]').prop('disabled',false).removeClass('notedit');
				$(this).attr('href','javascript:void(0)');
				
				$status = $(this).find('span').text('save');
			}
		});
	}
	editGuest();
	function deleteGuest(){
		$('.guest_rownumber .linkdelete').click(function(e){
			$guestid = $(this).attr('data-guestid');
			$memberid = $(this).attr('data-userid');
			$id_event = $('input[name="id_event"]').val();
            if (confirm('Bent u zeker dat u deze gast uit de lijst te verwijderen')) {
                jQuery.ajax({
                    type: "post",
                    url: $('.ajaxurl').val(),
                    data: {action: "user_delete_guest", id_guest: $guestid, id_event: $id_event, id_member: $memberid},
                    success: function (data) {
                        window.location.reload();

                    }
                });
            }
		});

	}
	deleteGuest();
});