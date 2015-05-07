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
