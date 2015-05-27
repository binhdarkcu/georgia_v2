<div class="popup" id="login-user" style="display: none;">
	<div class="overlays"></div>
	<form id="loginForm" method="post" class="" action="">
		<input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
		<div class="popup-content">
			<img src="images/logo.png"/>
			<div class="login-form">
				<div class="l-left">
					<h4>LOG IN </h4>
					<p>
						<input type="text" value="" name="login_email" placeholder="e-mailadres" class="email"/>
					</p>
					<p>
						<input type="password" value="" name="p_password" placeholder="paswoord" />
					</p>
					<a href="javascript:void(0)" id="btn-user-login" class="btn">LOG IN</a>
					<p class="txt">
						paswoord vergeten? <a href="<?php echo bloginfo('home')?>/paswoord-vergeten">klik dan hier</a>
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