<?php
	if(isset($_SESSION['user'])){
        $user = $wpdb->get_row("SELECT * FROM wp_members WHERE id = '".$_SESSION['user']['id']."'", ARRAY_A);
    }else{
    	//$home_url = get_bloginfo('home');
		wp_redirect(home_url() ); //to redirect back to "index.php" after logging out
		exit();
    }
?>
<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		<?php get_template_part('tpl','profile-title');?>
		<input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
        <div id="main-content" class="profilePage">
			<div class="row">
				<?php get_template_part('sidebar', 'profile'); ?>
                <div class="col-md-8">
					<div class="profileDetail">
						<div class="avatar-member">
							<input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
							<input name="action" type="hidden" class="action" value="user_update_profile"/>
							<div class="img-box pictureUpload">
								<input type="file" id="filePicture" style="display:none">
								<img data-dir = "<?php echo content_url().'/uploads/'.$user['p_voornaam']?>/" src="<?php echo content_url().'/uploads/'.$user['p_picture']; ?>"  class="imgPreview"/>
							</div>
							<div class="profile-name">
								 <span><?php echo $user['p_voornaam']; ?></span>
								 <a href="javascript: void(0)" id="editPhoto" class="fa fedit"><span>edit photo</span></a>
							</div>
						</div>
						<div class="row-f">
							<div class="col1">Geboortedatum</div>
							<div class="col2"><input type="text" name="p_geboortedatum" value="<?php echo $user['p_geboortedatum']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="p_geboortedatum" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Geboorteplaats</div>
							<div class="col2"><input type="text" name="p_geboorteplaats" value="<?php echo $user['p_geboorteplaats']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="p_geboorteplaats" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Straat</div>
							<div class="col2"><?php echo $user['p_straat']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Nr.</div>
							<div class="col2"><?php echo $user['p_nr']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Postcode</div>
							<div class="col2"><?php echo $user['p_postcode']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Plaats</div>
							<div class="col2"><?php echo $user['p_plaats']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Land/Regio</div>
							<div class="col2"><?php echo $user['p_land']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Telefoon</div>
							<div class="col2"><?php echo (!empty($user['p_telefoon']))? $user['p_telefoon'] : '-'; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Fax</div>
							<div class="col2"><?php echo (!empty($user['p_fax']))? $user['p_fax'] : '-'; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">GSM</div>
							<div class="col2"><?php echo $user['p_gsm']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Privé emailadres</div>
							<div class="col2"><a href="mailto:<?php echo $user['p_email']; ?>"><?php echo $user['p_email']; ?></a></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Linkedin Profiel pagina</div>
							<div class="col2">
								<?php if(!empty($user['p_likedin'])){?>
									<a href="<?php echo $user['p_fax']; ?>"><?php echo $user['p_fax']; ?></a>
								<?php } else { echo '-';}?>
							</div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="clear"></div>
					</div>
                </div>

                
            </div>

        </div>
    </div>

<?php get_footer();?>