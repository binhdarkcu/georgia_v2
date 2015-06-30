<?php
	$user_id = empty($_GET['user_id']) ? $_SESSION['user']['id']:$_GET['user_id'];
	if(isset($user_id)){
        $user = $wpdb->get_row("SELECT * FROM wp_members WHERE id = '".$user_id."'", ARRAY_A);
    }else{
    	//$home_url = get_bloginfo('home');
		wp_redirect(home_url() ); //to redirect back to "index.php" after logging out
		exit();
    }
	if(!empty($_GET['user_id'])){
		$other_user = true;
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
									<input name="p_picture_temp" type="file" id="filePicture" style="display:none">
									<img data-dir = "<?php echo $user['p_voornaam']?>" src="<?php echo content_url().'/uploads/avatar/'.$user['p_picture']; ?>"  class="imgPreview" title="Edit Image" onclick="SiteMain.openPopup('#message-cropit')"/>
                                    <textarea class="p_picture" name="p_picture" style="display: none;"></textarea>
									<input name="user_id" type="hidden" value="<?php echo $user['id']; ?>"/>
								</div>
							
								<div class="profile-name <?php if($other_user == true) echo 'pad';?>">
									 <span><?php echo $user['p_naam'].' '.$user['p_voornaam']; ?></span>
									 <input type="submit" id="submit-btn" class="savebtn" value="save" />
									 <?php if($other_user == false){ ?>
									 <a href="javascript: void(0)" id="editPhoto" class="fa editPhoto"><span>edit photo</span></a>
									 <a href="<?php echo bloginfo('home')?>/paswoord-verrander" class="fa editPhoto" style="margin-left: 30px;"><span>Verandering paswoord</span></a>
									 <?php }?>
								</div>
							</form>
						</div>
						<div class="row-f">
							<div class="col1">Geboortedatum</div>
							<div class="col2"><input id="date_geboortedatum" type="text" name="p_geboortedatum" value="<?php echo $user['p_geboortedatum']; ?>" disabled=""/></div>
							<div class="col3">
								<?php if($other_user == false){ ?><a href="#" data-fieldname="p_geboortedatum" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?>
							</div>
						</div>
						<div class="row-f">
							<div class="col1">Geboorteplaats</div>
							<div class="col2"><input type="text" name="p_geboorteplaats" value="<?php echo $user['p_geboorteplaats']; ?>" disabled=""/></div>
							<div class="col3">
								<?php if($other_user == false){ ?><a href="#" data-fieldname="p_geboorteplaats" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						</div>
						<div class="row-f">
							<div class="col1">Straat</div>
							<div class="col2"><input type="text" name="p_straat" value="<?php echo $user['p_straat']; ?>" disabled=""/></div>
							<div class="col3">
								<?php if($other_user == false){ ?><a href="#" data-fieldname="p_straat" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?>
							</div>
						</div>
						<div class="row-f">
							<div class="col1">Nr.</div>
							<div class="col2"><input type="text" name="p_nr" value="<?php echo $user['p_nr']; ?>" disabled=""/></div>
							<div class="col3">
								<?php if($other_user == false){ ?><a href="#" data-fieldname="p_nr" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?>
							</div>
						</div>
						<div class="row-f">
							<div class="col1">Postcode</div>
							<div class="col2"><span class="empty"><?php if(empty($user['p_postcode'])) echo '-';?></span><input type="text" name="p_postcode" value="<?php echo $user['p_postcode']; ?>" disabled=""/></div>
							<div class="col3">
								<?php if($other_user == false){ ?><a href="#" data-fieldname="p_postcode" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?>
							</div>
						</div>
						<div class="row-f">
							<div class="col1">Plaats</div>
							<div class="col2"><span class="empty"><?php if(empty($user['p_plaats'])) echo '-';?></span><input type="text" name="p_plaats" value="<?php echo $user['p_plaats']; ?>" disabled=""/></div>
							<div class="col3">
								<?php if($other_user == false){ ?><a href="#" data-fieldname="p_plaats" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?>
							</div>
						</div>
						<div class="row-f">
							<div class="col1">Land/Regio</div>
							<div class="col2">
								<?php
                                /*$region_location_array = get_field('region_location', 'option');

                                $stroption_region_location = '';
                                foreach($region_location_array as $region_location)
                                {
                                    $no = $region_location['no'];
                                    $title = $region_location['title'];
                                    $stroption_region_location .= '<option value="'.$no.'">'.$title.'</option>';
                                }*/
                                
                                ?>
								<!--select name="p_land" disabled="">
                                    <?php echo str_replace('value="'.$member['p_land'].'"', 'value="'.$member['p_land'].'" selected', $stroption_region_location);?>
								</select-->
								
								<?php echo countryArray('p_land',$user['p_land']);?>
							</div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="p_land" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						</div>
						<div class="row-f">
							<div class="col1">Telefoon</div>
							<div class="col2"><span class="empty"><?php if(empty($user['p_telefoon'])) echo '-';?></span><input type="text" name="p_telefoon" value="<?php echo $user['p_telefoon']; ?>" disabled=""/></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="p_telefoon" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
							
						</div>
						<div class="row-f">
							<div class="col1">Fax</div>
							<div class="col2"><span class="empty"><?php if(empty($user['p_fax'])) echo '-';?></span><span class="empty"><?php if(empty($user['p_fax'])) echo '-';?></span><input type="text" name="p_fax" value="<?php echo $user['p_fax']; ?>" disabled=""/></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="p_fax" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						</div>
						<div class="row-f">
							<div class="col1">GSM</div>
							<div class="col2"><span class="empty"><?php if(empty($user['p_gsm'])) echo '-';?></span><input type="text" name="p_gsm" value="<?php echo $user['p_gsm']; ?>" disabled=""/></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="p_gsm" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
			
						</div>
						<div class="row-f">
							<div class="col1">Privé emailadres</div>
							<div class="col2"><span class="empty"><?php if(empty($user['p_email'])) echo '-';?></span><input type="text" name="p_email" value="<?php echo $user['p_email']; ?>" autocomplete="off"/></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="p_email" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						</div>
						<div class="row-f">
							<div class="col1">Linkedin Profiel pagina</div>
							<div class="col2"><span class="empty"><?php if(empty($user['p_likedin'])) echo '-';?></span><input type="text" name="p_likedin" value="<?php echo $user['p_likedin']; ?>" disabled=""/></div>
								<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="p_likedin" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						</div>
						<div class="clear"></div>
					</div>
                </div>

                
            </div>

        </div>
    </div>
<?php get_template_part('tpl','message-cropit')?>
    <script>
        $(function() {
            $('.image-editor').cropit();
            $('.image-editor').cropit('imageSrc', $('.imgPreview').attr('src'));
        });
    </script>
<?php get_footer();?>