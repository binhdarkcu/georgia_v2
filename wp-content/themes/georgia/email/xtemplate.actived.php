<?php
    //session_start();
    //echo session_id();
    function 	actived_form($name, $email, $password){
                include_once	'xtemplate.class.php';
                $header   	= 'Content-type: text/html; charset=utf-8\r\n';				
                $title 		= 'User Contact';
                $contact_email = $email;
                $contact_name = $name;
				//echo $contact_email;
                $date = date('d-m-Y');
                $parseTemplate	=	new XTemplate('xtemplate.actived.html');
                $parseTemplate->assign('name',$name);
                $parseTemplate->assign('date',$date);             
                $parseTemplate->assign('email',$email);	
				$parseTemplate->assign('password',$password);	
                $parseTemplate->parse('main');	
                return wp_mail($contact_email, $title, $parseTemplate->text('main'), $title);
            }
