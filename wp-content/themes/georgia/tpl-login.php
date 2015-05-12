<div class="popup" id="login-user" style="display: none;">
	<?php
	    
		$logged = false;
	    	$message = "";
		    if(isset($_POST['p_email']))
		    {
		        global $wpdb;
		        $email = $_POST['p_email'];
		        $password = sha1($_POST['p_password']);
		        
		        $results = $wpdb->get_row("SELECT * FROM wp_members WHERE p_email = '$email' and p_password = '$password'");
		        if($results){
		            $data = array();
		            foreach ($results as $key => $value) {
		                $data[$key] = $value;
		            }
		            $logged = true;
		            $message = "Login success";
		            unset($data['p_password']);
		            $_SESSION['user'] = $data;
		            $link = get_site_url().'/leden';
		            echo "<script>setTimeout(function(){window.location.href = '$link';},0);</script>";
		        }
		        else{
		            echo '<script language="javascript">';
					echo 'alert("Login fail")';
					echo '</script>';
					$link = get_site_url().'/word-lid';
					echo "<script>setTimeout(function(){window.location.href = '$link';},0);</script>";
		        }
		     }
	
	?>
	<div class="overlays"></div>
	<form id="loginForm" method="post" class="" action="">
        <?php
            if($message != "")
            {
                $alert = $logged == true ? "alert-success" : "alert-danger";
                echo '<div class="alert '.$alert.'">'.$message.'</div>';
            }
        ?>
		<div class="popup-content">
			<img src="images/logo.png"/>
			<div class="login-form">
				<div class="l-left">
					<h4>LOG IN </h4>
					<p>
						<input type="text" value="" name="p_email" placeholder="e-mailadres" />
					</p>
					<p>
						<input type="password" value="" name="p_password" placeholder="paswoord" />
					</p>
					<a href="javascript:void(0)" onclick="jQuery('#loginForm').submit();"  class="btn">LOG IN</a>
					<p class="txt">
						paswoord vergeten? <a href="<?php echo bloginfo('home')?>/forgot-password">klik dan hier</a>
					</p>
				</div>
				<div class="l-right">
					<h4>NOG GEEN LID?</h4>
					<p class="txt">
						Wenst u zich aan te sluiten?<br/>
	 					<a href="<?php echo bloginfo('home')?>/word-lid">klik dan hier</a>
					</p>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</form>
	<style>
		.login-form p label.error{
			display: none!important;
		}
	</style>
</div>