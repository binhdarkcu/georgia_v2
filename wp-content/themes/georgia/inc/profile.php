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

add_action("wp_ajax_check_user_email", "checkEmail");
add_action("wp_ajax_nopriv_check_user_email", "checkEmail");
function checkEmail(){
	global $wpdb;	
	$checkEmail = $wpdb->get_row("SELECT p_email FROM wp_members WHERE p_email = '".$_POST['p_email']."'");
     if(email_exists($_POST['p_email'])){
        echo ('false');
    }
    else{
        echo ('true');
    }
    die();
}
