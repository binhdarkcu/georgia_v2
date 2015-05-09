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
add_action("wp_ajax_user_user_update_avatar", "saveFile");
add_action("wp_ajax_nopriv_user_update_avatar", "saveFile");
function saveFile(){
	$filename = $_REQUEST['filename'];
	$dir = $_REQUEST['dir'];
	$root = getcwd();
	$upload_dir = $root.'/wp-content/uploads/'.$dir.'/';
	$target_file = $upload_dir.basename($filename);
	echo $target_file;
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
