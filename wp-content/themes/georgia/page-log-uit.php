<?php   

session_destroy(); //destroy the session
$home_url = get_home_url();
wp_redirect($home_url); //to redirect back to "index.php" after logging out
exit();
?>