<?php
    //session_start();
    //echo session_id();
    function 	contact_form($name, $email, $message){
                include_once	'xtemplate.class.php';
                $header   	= 'Content-type: text/html; charset=utf-8\r\n';				
                $title 		= 'User Contact';
                $contact_email = get_option('admin_email');
                $contact_name = get_bloginfo('name');
				//echo $contact_email;
                $date = date('d-m-Y');
                $parseTemplate	=	new XTemplate('xtemplate.register.html');
                $parseTemplate->assign('name',$name);
                $parseTemplate->assign('date',$date);             
                $parseTemplate->assign('email',$email);	
				$parseTemplate->assign('message',$message);
				
                $parseTemplate->parse('main');	
                return wp_mail($contact_email, $title, $parseTemplate->text('main'), $title);
            }
