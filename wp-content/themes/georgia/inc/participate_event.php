<?php

wp_enqueue_script('jquery');
function addEvent(){
	global $wpdb;	
	$data['id_event'] = $_REQUEST['id_event'];
	$data['id_member'] = $_REQUEST['id_member'];
	$results = $wpdb->insert('wp_participate', $data);
	if($results){
        $link = get_site_url();
        echo "<script>alert('Thank you participated this event.');setTimeout(function(){window.location.href = '$link';},1000);</script>";
    }
    else{
       echo "<script>alert('Participate fail.');setTimeout(function(){window.location.href = '$link';},1000);</script>";
    }
}
add_action("wp_ajax_add_event", "addEvent");
add_action("wp_ajax_nopriv_add_event", "addEvent");