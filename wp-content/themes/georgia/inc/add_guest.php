<?php
add_action("wp_ajax_user_update_guest", "update_guest");
add_action("wp_ajax_nopriv_user_update_guest", "update_guest");

function update_guest(){
	$guestid = $_REQUEST['id_guest'];
	$guestname = $_REQUEST['guest_name'];
	$guestsurname = $_REQUEST['guest_surname'];
	global $wpdb;	
	$execute = $wpdb->update( 
		'wp_guest', 
		array( 
			'guest_name' => $guestname,
			'guest_surname' => $guestsurname
		), 
		array( 'id_guest' => $guestid ), 
		array( 
			'%s',
			'%s'
		),
		array( '%d' ) 
	);
	if($execute){
		echo '1'; die();
	}else{
		echo '0'; die();
	}
}


add_action("wp_ajax_user_add_guest", "add_guest");
add_action("wp_ajax_nopriv_user_add_guest", "add_guest");
function add_guest(){
	$u_id = $_REQUEST['user_id'];
	$id_guest = $_REQUEST['id_guest'];
	$id_event = $_REQUEST['id_event'];
	$guest_name = $_REQUEST['guest_name'];
	$guest_surname = $_REQUEST['guest_surname'];
	global $wpdb;	
	
	$results = $wpdb->insert('wp_guest',
		array(
		  'id_member'          => $u_id,
		  'id_event'		=> $id_event,
		  'guest_name'       => $guest_name,
		  'guest_surname'          => $guest_surname
		),
		array(
		  '%s',
		  '%s',
		  '%s',
		  '%s'
		) 
	);
	$guest_count = "SELECT COUNT( * ) as COUNTGUEST
									FROM  `wp_guest` WHERE id_event=".$id_event." and id_member=".$u_id."";
	$count_row = $wpdb->get_results($guest_count);
	$total_guest = $count_row[0]->COUNTGUEST;
	
	if($results){
		$guest_member = "SELECT DISTINCT id_guest
							FROM  `wp_guest` WHERE id_event=".$id_event." and id_member=".$u_id."";
		$guest_row = $wpdb->get_results($guest_member);
		?>
		<div class="guest_rownumber guest_rownumber_<?php echo $total_guest;?>">
			<h4>GUEST <?php echo $total_guest;?></h4>
			<p>
				<input name="guest_name" type="text" value="<?php echo $guest_name;?>" class="notedit" disabled=""/>
				-
				<input name="guest_surname" type="text" value="<?php echo $guest_surname;?>" class="notedit text2" disabled=""/>
				<a href="#" data-guestname="guest_name" data-guestsurname="guest_surname" data-guestid="<?php echo $guest_row[0]->id_guest;?>" data-userid="<?php echo $u_id; ?>" class="fa linkedit"><span>edit</span></a>      
			</p>
		</div>
	<?php
		//echo '1';
		die();
	}
	else{
		echo '0';
		die('Error add guest');
	}
}