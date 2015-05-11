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
							<form method="post" id="MyUploadForm" enctype="multipart/form-data">
								<input name="action" type="hidden" class="action" value="user_update_avatar"/>
								<div class="img-box pictureUpload">
									<input data-picture = "<?php echo $_FILES['p_picture']['tmp_name'];?>" name="p_picture" type="file" id="filePicture" style="display:none">
									<img data-dir = "<?php echo $user['p_voornaam']?>" src="<?php echo content_url().'/uploads/avatar/'.$user['p_picture']; ?>"  class="imgPreview"/>
									<input name="user_id" type="hidden" value="<?php echo $user['id']; ?>"/>
								</div>
							
								<div class="profile-name">
									 <span><?php echo $user['p_voornaam']; ?></span>
									 <input type="submit" id="submit-btn" value="Upload" />
									 <a href="javascript: void(0)" id="editPhoto" class="fa editPhoto"><span>edit photo</span></a>
								</div>
							</form>
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
							<div class="col2"><input type="text" name="p_straat" value="<?php echo $user['p_straat']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="p_straat" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Nr.</div>
							<div class="col2"><input type="text" name="p_nr" value="<?php echo $user['p_nr']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="p_nr" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Postcode</div>
							<div class="col2"><input type="text" name="p_postcode" value="<?php echo $user['p_postcode']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="p_postcode" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Plaats</div>
							<div class="col2"><input type="text" name="p_plaats" value="<?php echo $user['p_plaats']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="p_plaats" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Land/Regio</div>
							<div class="col2"><input type="text" name="p_land" value="<?php echo $user['p_land']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="p_land" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Telefoon</div>
							<div class="col2"><span class="empty"><?php if(empty($user['p_telefoon'])) echo '-';?></span><input type="text" name="p_telefoon" value="<?php echo $user['p_telefoon']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="p_telefoon" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
							
						</div>
						<div class="row-f">
							<div class="col1">Fax</div>
							<div class="col2"><span class="empty"><?php if(empty($user['p_fax'])) echo '-';?></span><input type="text" name="p_fax" value="<?php echo $user['p_fax']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="p_fax" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">GSM</div>
							<div class="col2"><input type="text" name="p_gsm" value="<?php echo $user['p_gsm']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="p_gsm" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
			
						</div>
						<div class="row-f">
							<div class="col1">Privé emailadres</div>
							<div class="col2"><a href="mailto:<?php echo $user['p_email']; ?>"><?php echo $user['p_email']; ?></a></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Linkedin Profiel pagina</div>
							<div class="col2"><span class="empty"><?php if(empty($user['p_likedin'])) echo '-';?></span><input type="text" name="p_likedin" value="<?php echo $user['p_fax']; ?>" disabled=""/></div>
								<div class="col3"><a href="#" data-fieldname="p_likedin" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="clear"></div>
					</div>
                </div>

                
            </div>

        </div>
    </div>

<?php get_footer();?>