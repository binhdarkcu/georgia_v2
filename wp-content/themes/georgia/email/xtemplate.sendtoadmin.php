<?php
    //session_start();
    //echo session_id();
    function 	send_new_subscriber($email){
                include_once	'xtemplate.class.php';
                $header   	= 'Content-type: text/html; charset=utf-8\r\n';				
                $title 		= 'Er is een nieuw lidmaatschap aanvraag voor Georgia';

                //$contact_email = 'info@georgia-bc.be';//get_option('admin_email');

                $multiple_recipients = array(
                    'info@georgia-bc.be',
                    'anouk.de.graef@georgia-bc.be',
                    'bart.verhavert@georgia-bc.be',
                    'dominik.de.jaeger@georgia-bc.be',
                    'jurgen.vangrieken@georgia-bc.be',
                    'patrick.leclair@georgia-bc.be'
                );

                /*$multiple_recipients = array(
                    'nguyenthai2010@gmail.com',
                    'nguyenthai2010@yahoo.com'
                );*/

                $date = date('d-m-Y');
                $parseTemplate	=	new XTemplate('xtemplate.sendtoadmin.html');
                $parseTemplate->assign('date',$date);             
                $parseTemplate->assign('email',$email);	
				
                $parseTemplate->parse('main');	
                return wp_mail($multiple_recipients, $title, $parseTemplate->text('main'), $title);
            }
