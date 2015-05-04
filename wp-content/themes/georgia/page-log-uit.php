<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
$home_url = get_bloginfo('home');
wp_redirect($home_url); //to redirect back to "index.php" after logging out
exit();
?>