<?php
    //session_start();
    //echo session_id();
    function 	send_password($email, $message){
                include_once	'xtemplate.class.php';
                $header   	= 'Content-type: text/html; charset=utf-8\r\n';				
                $title 		= 'Your new pasword for Georgia';
                $contact_email = $email;
                $contact_name = get_bloginfo('name');
				//echo $contact_email;
                $date = date('d-m-Y');
                $parseTemplate	=	new XTemplate('xtemplate.forgotpassword.html');
                $parseTemplate->assign('date',$date);     
				$parseTemplate->assign('message',$message);
				
                $parseTemplate->parse('main');	
                return wp_mail($contact_email, $title, $parseTemplate->text('main'), $title);
            }
