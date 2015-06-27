<div class="popup message-popup add_guest_popup" id="add_guest" style="display: block;">
	<div class="overlays" onclick="window.location.reload()"></div>
		<div class="popup-content">
			<?php
        		global $wpdb;
				$guest_count = "SELECT COUNT( * ) as COUNTGUEST, guest_name, guest_surname
									FROM  `wp_guest` WHERE id_member=".$_SESSION['user']['id']."";
				$count_row = $wpdb->get_results($guest_count);
				$total_guest = $total_row[0]->COUNTGUEST;
				
				$guest_member = "SELECT DISTINCT guest_name, guest_surname
									FROM  `wp_guest` WHERE id_member=".$_SESSION['user']['id']."";
				$guest_row = $wpdb->get_results($guest_member);
        	?>
			
			<a href="javascript:void(0)" class="close" onclick="window.location.reload()">x</a>
			<div class="guest_result">				
				<h4>GUEST 1</h4>
				<p style="<?php if(empty($guest_row[0])) echo 'display:none';?>">
					<input type="text" value="<?php echo $guest_row[0]->guest_name;?>" class="notedit" disabled=""/>
					-
					<input type="text" value="<?php echo $guest_row[0]->guest_surname;?>" class="notedit text2" disabled=""/>
					<a href="#" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a>      
				</p>
			</div>
			<div class="common_guest_form">
				<form action="" method="post" class="guest_form" id="guest_form">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'];?>" />
					<input type="text" name="guest_name" placeholder="Naam" />
					<input type="text" name="guest_surname" placeholder="Bedrijf" />
					<input type="submit" value="TOEVOEGEN"/>
					<input name="action" type="hidden" class="action" value="user_add_guest"/>
					<input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
				</form>
			</div>
			
			<?php
				if($total_guest == 2 ){
			?>
			<h4>GUEST 2</h4>
			<p>
				<input type="text" value="Yves Faes-Dupont" class="notedit" disabled=""/>
				-
				<input type="text" value="Kiokarma" class="notedit text2" disabled=""/>
				<a href="#" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a>      
			</p>
			<?php }?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$(".add_guest_popup p input").each(function () {
	        $(this).attr('size', $(this).attr('value').length);
	    });
	});
</script>