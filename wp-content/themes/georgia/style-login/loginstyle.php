<?php

// add a new logo to the login page
function wptutsplus_login_logo() { ?>
    <style type="text/css">
        .login #login h1 a {
            background: url( <?php echo plugins_url( 'images/logo.png' , __FILE__ ); ?> );
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wptutsplus_login_logo' );
?>