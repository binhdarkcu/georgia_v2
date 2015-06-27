<?php
add_action("wp_ajax_user_add_guest", "add_guest");
add_action("wp_ajax_nopriv_user_add_guest", "add_guest");
function add_guest(){
	$u_id = $_REQUEST['user_id'];
	$guest_name = $_REQUEST['guest_name'];
	$guest_surname = $_REQUEST['guest_surname'];
	global $wpdb;	
	
	$results = $wpdb->insert('wp_guest',
		array(
		  'id_member'          => $u_id,
		  'guest_name'       => $guest_name,
		  'guest_surname'          => $guest_surname
		),
		array(
		  '%s',
		  '%s',
		  '%s'
		) 
	);
	
	if($results){
		echo '1';
		die();
	}
	else{
		echo '0';
		die('Error add guest');
	}
}