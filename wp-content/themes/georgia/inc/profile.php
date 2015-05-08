<?php
add_action("wp_ajax_user_update_profile", "updateProfile");
add_action("wp_ajax_nopriv_user_update_profile", "updateProfile");

function updateProfile(){
	$setfield = $_REQUEST['setfield'];
	$fieldname = $_REQUEST['fieldname'];
	$id = $_REQUEST['id'];
	global $wpdb;	
	$execute = $wpdb->update( 
		'wp_members', 
		array( 
			$fieldname => $setfield
		), 
		array( 'id' => $id ), 
		array( 
			'%s'
		),
		array( '%d' ) 
	);
}

function saveFile($filename){
	$root = getcwd();
	$upload_dir = $root.'/wp-content/uploads/'.$data['p_voornaam'].'/';
	$target_file = $upload_dir.basename($filename);
	move_uploaded_file($filename, $target_file);
}

add_action("wp_ajax_register_action", "checkEmail");
add_action("wp_ajax_nopriv_register_action", "checkEmail");
function checkEmail(){
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        $p_email = $_REQUEST['p_email'];
		if(!empty($p_email)){
			$checkEmail = $wpdb->get_row("SELECT p_email FROM wp_members WHERE p_email = '".$p_email."'");
	        if(!empty($checkEmail)){
	            echo '<script>alert("Your email exists, please choose other email.")</script>';
	            //$link = get_site_url().'/word-lid';
	            //echo "<script>setTimeout(function(){window.location.href = '$link';},10);</script>";
				exit();
	        }
		}else{
			echo 'false';
		}
    }
}
