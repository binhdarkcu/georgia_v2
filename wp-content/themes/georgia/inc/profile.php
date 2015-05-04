<?php
function updateProfile($tablename, $setfield, $fieldname, $id){
	global $wpdb;	
	$execute = $wpdb->update( 
		$tablename, 
		array( 
			$setfield => $fieldname
		), 
		array( 'ID' => $id ), 
		array( 
			'%s'
		)
	);
	return $execute;
}

function saveFile($filename){
	$root = getcwd();
	$upload_dir = $root.'/wp-content/uploads/'.$data['p_voornaam'].'/';
	$target_file = $upload_dir.basename($filename);
	move_uploaded_file($filename, $target_file);
}
