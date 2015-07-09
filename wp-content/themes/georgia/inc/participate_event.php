<?php
add_action("wp_ajax_add_event", "addEvent");
add_action("wp_ajax_nopriv_add_event", "addEvent");
function addEvent(){
	global $wpdb;	
	$data['id_event'] = $_REQUEST['id_event'];
	$data['id_member'] = $_REQUEST['id_member'];
	$data['status'] = 'uninvoiced';
	$data['status_join'] = 'yes';
	$data['datejoin'] = date('Y-m-d');
	$event = $wpdb->get_row("SELECT * FROM wp_participate WHERE (id_event = '".$data['id_event']."' AND id_member = '".$data['id_member']."')");
	if(!empty($event)){
        $execute = $wpdb->update( 
			'wp_participate', 
			array( 
				'status' => 'uninvoiced',
				'status_join'	=> 'yes',
				'datejoin' => $data['datejoin']
			), 
			array( 'id' => $event->{'id'} ), 
			array( 
				'%s'
			),
			array( '%d' ) 
		);
		echo 'true';
		exit();
    }
    else{
    	echo 'true';
        $wpdb->insert('wp_participate', $data);
		exit();
    }
	
}

add_action("wp_ajax_cancel_event", "cancelEvent");
add_action("wp_ajax_nopriv_cancel_event", "cancelEvent");
function cancelEvent(){
	global $wpdb;	
	$data['id_event'] = $_REQUEST['id_event'];
	$data['id_member'] = $_REQUEST['id_member'];
	$event = $wpdb->get_row("SELECT * FROM wp_participate WHERE (id_event = '".$data['id_event']."' AND id_member = '".$data['id_member']."')");
	if(!empty($event)){
		$execute = $wpdb->update( 
			'wp_participate', 
			array( 
				'status_join' => 'cancle'
			), 
			array(
				'id' => $event->{'id'}
			), 
			array( 
				'%s'
			),
			array( '%d' ) 
		);
		if($execute){
			$query_delete = $wpdb->query("DELETE FROM wp_guest WHERE id_event = '".$data['id_event']."' and id_member='".$data['id_member']."'");			
			$delete_guest = $wpdb->query("DELETE FROM wp_participate WHERE id_event = '".$data['id_event']."' and guest_member='".$data['id_member']."'");
			$delete_member = $wpdb->query("DELETE FROM wp_members WHERE is_guest='".$data['id_member']."'");
			echo 'true';
		}
		
		exit();
	}
}


function person_participate(){
	
}
