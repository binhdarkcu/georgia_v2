<?php
add_action("wp_ajax_user_update_guest", "update_guest");
add_action("wp_ajax_nopriv_user_update_guest", "update_guest");

function update_guest(){
	$guestid = $_REQUEST['id_guest'];
	$memberid = $_REQUEST['id_member'];
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
	$execute_member = $wpdb->update( 
		'wp_members', 
		array( 
			'p_naam' => $guestname,
			'p_voornaam' => $guestsurname
		), 
		array( 'id' => $memberid ), 
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
	$id_guest_new = $wpdb->insert_id;
	if($results){
		$insert_member = $wpdb->insert('wp_members',
			array(
			  'p_naam'		=> $guest_name,
			  'p_voornaam'          => $guest_surname,
			  'is_guest'          => $id_guest_new,
			  'created' => date('Y-m-d'),
			  'modified' => date('Y-m-d')
			),
			array(
			  '%s',
			  '%s',
			  '%s',
			  '%s'
			) 
		);
		$id_member = $wpdb->insert_id;
		$participate = $wpdb->insert('wp_participate',
			array(
			  'id_event'		=> $id_event,
			  'id_member'          => $id_member,
			  'status' => 'uninvoiced',
			  'guest_member' => $u_id,
			  'datejoin' => date('Y-m-d'),
			  'status_join' => 'yes'
		  ),
			array(
			  '%s',
			  '%s',
			  '%s',
			  '%s',
			  '%s',
			  '%s'
			) 
		);
	}
	$guest_count = "SELECT COUNT( * ) as COUNTGUEST
									FROM  `wp_guest` WHERE id_event=".$id_event." and id_member=".$u_id."";
	$count_row = $wpdb->get_results($guest_count);
	$total_guest = $count_row[0]->COUNTGUEST;
	
	if($results){
		$num = $total_guest - 1;
		$guest_member = "SELECT DISTINCT id_guest
							FROM  `wp_guest` WHERE id_event=".$id_event." and id_member=".$u_id."";
		$guest_row = $wpdb->get_results($guest_member);
		$get_member = "SELECT DISTINCT id
									FROM  `wp_members` WHERE is_guest=".$id_guest_new."";
		$member_row = $wpdb->get_results($get_member);
		?>
		<div class="guest_rownumber guest_rownumber_<?php echo $total_guest;?>">
			<h4>GUEST <?php echo $total_guest;?></h4>
			
			<p>
				<input name="guest_name" type="text" value="<?php echo $guest_name;?>" class="notedit" disabled=""/>
				-
				<input name="guest_surname" type="text" value="<?php echo $guest_surname;?>" class="notedit text2" disabled=""/>
				<a href="javascript:void(0);" data-guestname="guest_name" data-guestsurname="guest_surname" data-guestid="<?php echo $id_guest_new;?>" data-userid="<?php echo $member_row[0]->id; ?>" class="fa linkedit"><span>edit</span></a> <span>-</span>
				<a href="javascript:void(0);" data-guestname="guest_name" data-guestsurname="guest_surname" data-guestid="<?php echo $id_guest_new;?>" data-userid="<?php echo $member_row[0]->id; ?>" class="fa linkdelete"><span>delete</span></a>      
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

add_action("wp_ajax_user_delete_guest", "delete_guest");
add_action("wp_ajax_nopriv_user_delete_guest", "delete_guest");
function delete_guest(){
	$u_id = $_REQUEST['id_member'];
	$id_guest = $_REQUEST['id_guest'];
	$id_event = $_REQUEST['id_event'];
	global $wpdb;	
	$id_guest_member = $wpdb->get_row("select guest_member from wp_participate where id_member='".$ids."'");
	$query_delete_guest = $wpdb->query("DELETE FROM wp_guest WHERE id_guest = '".$id_guest."'");
	//print_r($id_guest_member->guest_member);
    $query_delete_part = $wpdb->query("DELETE FROM wp_participate WHERE id_event = '".$id_event."' and id_member='".$u_id."'");
	//echo $query_delete_guest;
	$query_delete_member = $wpdb->query("DELETE FROM wp_members WHERE id='".$u_id."'");
	die();
}

add_action("wp_ajax_user_select_event", "selectEvent");
add_action("wp_ajax_nopriv_user_select_event", "selectEvent");
function selectEvent(){
	global $wpdb;
	$ev_id = $_REQUEST['id_event'];
	$query_ev = "SELECT id,p_naam,p_voornaam, p_telefoon, p_email,is_guest FROM wp_members WHERE (is_guest=0 OR is_guest is NULL) AND id NOT IN (select id_member from wp_participate where id_event ='".$ev_id."') ORDER BY p_naam";
	
	$members = $wpdb->get_results($query_ev, ARRAY_A);
	
	foreach ($members as $ev) {
	?>
	<option value="<?php echo $ev['id']?>"><?php echo $ev['p_naam'].' '.$ev['p_voornaam'];?></option>
	<?php
	}
	die(); 
}

add_action("wp_ajax_user_select_member", "selectMember");
add_action("wp_ajax_nopriv_user_select_member", "selectMember");
function selectMember(){
	global $wpdb;
	$member_id = $_REQUEST['id'];
	$query_ev = "SELECT p_telefoon, p_email FROM wp_members where id ='".$member_id."'";
	
	$members = $wpdb->get_row($query_ev);
	$p_telefoon = $members->p_telefoon;
	$p_email = $members->p_email;
	$temp = array('p_telefoon'=>$p_telefoon, 'p_email'=>$p_email);
	echo json_encode($temp);
	die(); 
}