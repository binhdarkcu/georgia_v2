<?php
    //session_start();
    //echo session_id();
    function 	send_new_subscriber($email){
                include_once	'xtemplate.class.php';
                $header   	= 'Content-type: text/html; charset=utf-8\r\n';				
                $title 		= 'Theres a new subscriber waiting for approval';
                $contact_email = 'info@georgia-bc.be';//get_option('admin_email');
                
				//echo $contact_email;
                $date = date('d-m-Y');
                $parseTemplate	=	new XTemplate('xtemplate.sendtoadmin.html');
                $parseTemplate->assign('date',$date);             
                $parseTemplate->assign('email',$email);	
				
                $parseTemplate->parse('main');	
                return wp_mail($contact_email, $title, $parseTemplate->text('main'), $title);
            }
