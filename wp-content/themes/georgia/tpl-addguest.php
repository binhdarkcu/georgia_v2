<div class="popup message-popup add_guest_popup" id="add_guest" style="display: none;">
	<div class="overlays" onclick="window.location.reload()"></div>
		<div class="popup-content">
			<input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'];?>" />
			<input type="hidden" name="id_event" value="<?php echo get_the_ID();?>" />
			<input name="action" type="hidden" class="action" value="user_update_guest"/>
			<?php
        		global $wpdb;
				$guest_count = "SELECT COUNT( * ) as COUNTGUEST
									FROM  `wp_guest` WHERE id_event=".get_the_ID()." and id_member=".$_SESSION['user']['id']."";
				$count_row = $wpdb->get_results($guest_count);
				$total_guest = $count_row[0]->COUNTGUEST;
				
				$guest_member = "SELECT DISTINCT id_guest, guest_name, guest_surname
									FROM  `wp_guest` WHERE id_event=".get_the_ID()." and id_member=".$_SESSION['user']['id']."";
				$guest_row = $wpdb->get_results($guest_member);
        	?>
			
			<a href="javascript:void(0)" class="close" onclick="window.location.reload()">x</a>
			<?php
				if($total_guest > 1 ){
			?>
			<div class="guest_rownumber">
				<h4>GUEST 1</h4>
				<p>
					<input name="guest_name" type="text" value="<?php echo $guest_row[0]->guest_name;?>" class="notedit" disabled=""/>
					-
					<input name="guest_surname" type="text" value="<?php echo $guest_row[0]->guest_surname;?>" class="notedit text2" disabled=""/>
					<a href="#" data-guestname="guest_name" data-guestsurname="guest_surname" data-guestid="<?php echo $guest_row[0]->id_guest;?>" data-userid="<?php echo $user['id']; ?>" class="fa linkedit"><span>edit</span></a>      
				</p>
			</div>
			<div class="guest_rownumber">
				<h4>GUEST 2</h4>
				<p>
					<input name="guest_name" type="text" value="<?php echo $guest_row[1]->guest_name;?>" class="notedit" disabled=""/>
					-
					<input name="guest_surname" type="text" value="<?php echo $guest_row[1]->guest_surname;?>" class="notedit text2" disabled=""/>
					<a href="#" data-guestname="guest_name" data-guestsurname="guest_surname" data-guestid="<?php echo $guest_row[1]->id_guest;?>" data-userid="<?php echo $user['id']; ?>" class="fa linkedit"><span>edit</span></a>
				</p>
			</div>
			
			<?php } else{?>
				<?php
					if($total_guest == 1 ){
				?>
				<div class="guest_rownumber">
					<h4>GUEST 1</h4>
					<p>
						<input name="guest_name" type="text" value="<?php echo $guest_row[0]->guest_name;?>" class="notedit" disabled=""/>
						-
						<input name="guest_surname" type="text" value="<?php echo $guest_row[0]->guest_surname;?>" class="notedit text2" disabled=""/>
						<a href="#" data-guestname="guest_name" data-guestsurname="guest_surname" data-guestid="<?php echo $guest_row[1]->id_guest;?>" data-userid="<?php echo $user['id']; ?>" class="fa linkedit"><span>edit</span></a>  
					</p>
				</div>
				
			<?php }else { if($total_guest == 2) {?>
				<div class="guest_rownumber">
					<h4>GUEST 2</h4>
					<p>
						<input name="guest_name" type="text" value="<?php echo $guest_row[1]->guest_name;?>" class="notedit" disabled=""/>
						-
						<input name="guest_surname" type="text" value="<?php echo $guest_row[1]->guest_surname;?>" class="notedit text2" disabled=""/>
						<a href="#" data-guestname="guest_name" data-guestsurname="guest_surname" data-guestid="<?php echo $guest_row[1]->id_guest;?>" data-userid="<?php echo $user['id']; ?>" class="fa linkedit"><span>edit</span></a>
						     
					</p>
				</div>
			<?php
			} } }?>
			<div class="guest_result">				
				
			</div>
			<?php
				if($total_guest < 2 ){
			?>
			<div class="guest_form_ajax">
				<h4>GUEST <?php if($total_guest == 0) echo '1'; else echo '2';?></h4>
				<div class="common_guest_form" id="guest_form_01">
					<form action="" method="post" class="guest_form" id="guest_form">
						<input type="hidden" name="id_event" value="<?php echo get_the_ID();?>" />
						<input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'];?>" />
						<input type="text" name="guest_name" placeholder="Naam" />
						<input type="text" name="guest_surname" placeholder="Bedrijf" />
						<input type="submit" value="TOEVOEGEN"/>
						<input name="action" type="hidden" class="action" value="user_add_guest"/>
						<input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
					</form>
				</div>
			</div>
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