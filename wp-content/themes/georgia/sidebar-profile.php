<?php
	$is_profile = is_page('profile');
?>
<div class="col-md-4">
    <div class="nav-box">
        <ul>
            <li><a href="<?php echo bloginfo('home'); ?>/profile/<?php if(!empty($_GET['user_id'])) echo '?user_id='.$_GET['user_id'];?>" <?php echo $is_profile ? 'class="current"' : ''; ?>>PRIVEGEGEVENS</a></li>
            <li><a href="<?php echo bloginfo('home'); ?>/profile-professional/<?php if(!empty($_GET['user_id'])) echo '?user_id='.$_GET['user_id'];?>" <?php echo $is_profile ? '' : 'class="current"'; ?>>BEROEPSGEGEVENS</a></li>
        </ul>
    </div>
</div><!-- ./ sidebar -->