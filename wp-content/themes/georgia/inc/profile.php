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

add_action("wp_ajax_user_active_profile", "activeProfile");
add_action("wp_ajax_nopriv_user_active_profile", "activeProfile");

function activeProfile(){
	$setfield = $_REQUEST['setfield'];
	$fieldname = $_REQUEST['fieldname'];
	$id = $_REQUEST['id'];
	$username = $_REQUEST['username'];
	$useremail = $_REQUEST['useremail'];
	global $wpdb;	
	$execute = $execute = $wpdb->update( 
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
	 if($execute){
	 	$s_password = actived_form($username, $useremail);
		if($s_password){
			echo 'Actived!';
		}else{
			echo 'can\'t send email!';
		}
	 }else{
	 	echo 'not Actived';
	 }
}

add_action("wp_ajax_user_update_avatar", "saveFile");
add_action("wp_ajax_nopriv_user_update_avatar", "saveFile");
function saveFile(){
	$user_id = $_POST['user_id'];
	//$dir = $_REQUEST['dir'];
	$root = get_home_path();
	$upload_dir = $root.'/wp-content/uploads/avatar/';
	if (!file_exists($upload_dir)) {
		mkdir($upload_dir);
	}
	$filename = time().$_FILES['p_picture']['name'];
	$target_file = $upload_dir.basename($filename);
	if(move_uploaded_file($_FILES['p_picture']['tmp_name'], $target_file )){
		global $wpdb;	
		$execute = $wpdb->update( 
			'wp_members', 
			array( 
				'p_picture' => $filename
			), 
			array( 'id' => $user_id ), 
			array( 
				'%s'
			),
			array( '%d' ) 
		);
	}else{
		die('error uploading File!');
	}
	//move_uploaded_file($_FILES['p_picture']['tmp_name'], $target_file);
}

add_action("wp_ajax_check_user_email", "checkEmail");
add_action("wp_ajax_nopriv_check_user_email", "checkEmail");
function checkEmail(){
	global $wpdb;	
	$checkEmail = $wpdb->get_row("SELECT p_email FROM wp_members WHERE p_email = '".$_POST['p_email']."'");
	
     if($checkEmail==true){
        echo ('false');
    }
    else{
        echo ('true');
    }
    die();
}

add_action("wp_ajax_user_login", "login");
add_action("wp_ajax_nopriv_user_login", "login");
function login(){
	global $wpdb;	
	$password = sha1($_POST['p_password']);
	$user = $wpdb->get_row("SELECT * FROM wp_members WHERE p_email = '".$_POST['p_email']."' AND p_password = '".$password."'", ARRAY_A);
	$isActivated = $user['p_user_status'];
	if ($isActivated == null) {
		$link = get_site_url().'/loginfail';
		echo ($link);
	}
    else if ($isActivated == 1) {
		$data = array();
		foreach ($user as $key => $value) {
			$data[$key] = $value;
		}
		unset($data['p_password']);
		$_SESSION['user'] = $data;
		$link = get_site_url().'/leden';
		echo ($link);
    }
    else {
        echo ('false');
    }
    die();
}
