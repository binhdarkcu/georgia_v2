<?php
add_action("wp_ajax_add_event", "addEvent");
add_action("wp_ajax_nopriv_add_event", "addEvent");
function addEvent(){
	global $wpdb;	
	$data['id_event'] = $_REQUEST['id_event'];
	$data['id_member'] = $_REQUEST['id_member'];
	$event = $wpdb->get_row("SELECT * FROM wp_participate WHERE (id_event = '".$data['id_event']."' AND id_member = '".$data['id_member']."')");
	if(!empty($event)){
        echo 'false';
		exit();
    }
    else{
    	echo 'true';
        $wpdb->insert('wp_participate', $data);
		exit();
    }
	
}
