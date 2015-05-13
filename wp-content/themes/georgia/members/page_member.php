<?php

add_action('admin_menu','add_page_member');
function add_page_member()
{
	add_menu_page('Members', 'Members','administrator','view-member','page_view_member');
}

function page_view_member()
{
	global $wpdb;

	if (!empty($_GET['action']) && !empty($_GET['id'])) {
		if ($_GET['action'] == 'delete') {
			$delete = $wpdb->delete('wp_members', array('id' => $_GET['id']));
			if($delete != 1) {
				echo '<h3>Cant not delete!</h3>';
    		}
			else {
				?>
    			<script type="text/javascript">
    		        location.href='<?php  echo admin_url().'admin.php?page=view-member';?>';
    			</script>
    			
    			<?php 
			}
		}
	}
	
	$query = 'SELECT id, p_naam, p_voornaam, p_email, p_land FROM wp_members';
	$members = $wpdb->get_results($query);

	?>
	<div class="wrap">
	    <h3>All members</h3>
			<table style="height:10px;overflow: auto;">
				<tr>
					<th></th>
					<th style="text-align: center;width:200px;"><h3>Naam</h3></th>
					<th style="text-align: center;width:200px;"><h3>Voornaam</h3></th>
					<th style="text-align: center;width:200px;"><h3>Email</h3></th>
					<th style="text-align: center;width:200px;"><h3>Land</h3></th>
				</tr>
				<?php 
				if(!$members) {
				?>
					<tr>
						<td colspan="2">No data</td>
					</tr>
				<?php 
				}
				else 
				{
					$i = 0;
					foreach ($members as $member) {
						$i++;
				?>
				
					<tr>
						<td><?php echo $i;?></td>
						<td style="text-align: center;width:200px;text-transform:uppercase;"><?php echo $member->{'p_naam'};?></td>
						<td style="text-align: center;width:200px;text-transform:uppercase;"><?php echo $member->{'p_voornaam'};?></td>
						<td style="text-align: center;width:200px;text-transform:uppercase;"><?php echo $member->{'p_email'};?></td>
						<td style="text-align: center;width:200px;text-transform:uppercase;"><?php echo $member->{'p_land'};?></td>
						<td style="text-align: center;width:200px;"><a class="button-primary" onClick="return confirm('Are you sure?');" href="<?php admin_url();?>admin.php?page=view-member&action=delete&id=<?php echo $member->{'id'};?>">Edit</a></td>
						<td style="text-align: center;width:200px;"><a class="button-primary" onClick="return confirm('Are you sure?');" href="<?php admin_url();?>admin.php?page=view-member&action=delete&id=<?php echo $member->{'id'};?>">Delete</a></td>
					</tr>
				<?php
					}
				}
				?>
			
			</table>
	</div>
<style>
.table th {
    background-color: #D9E7FF;
    padding: 7px 8px 6px;
    text-align: left;
    white-space: nowrap;
}
</style>
	
	
<?php 
}





