<?php
	$user_id = empty($_GET['user_id']) ? $_SESSION['user']['id']:$_GET['user_id'];
	if(isset($user_id)){
        //$user = $_SESSION['user'];
        $user = $wpdb->get_row("SELECT * FROM wp_members WHERE id = '".$user_id."'", ARRAY_A);
    }	
?>
<section id="page-title" class="page-title events-title">
    <div class="container">
				
        <h1><?php echo strtoupper($user['p_naam'].' '.$user['p_voornaam']); ?></h1>
    </div>
</section>