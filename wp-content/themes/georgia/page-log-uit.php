<?php   
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
$home = get_bloginfo('home');
header($home); //to redirect back to "index.php" after logging out
exit();
?>