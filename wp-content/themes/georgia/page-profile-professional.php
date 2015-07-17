<?php get_header();?>
<?php
    $user_id = empty($_GET['user_id']) ? $_SESSION['user']['id']:$_GET['user_id'];
	
	if(isset($user_id)){
        $user = $wpdb->get_row("SELECT * FROM wp_members WHERE id = '".$user_id."'", ARRAY_A);
		if(empty($user) || !empty($user['is_guest'])){
			wp_redirect(home_url() ); //to redirect back to "index.php" after logging out
			exit();
		}
    }else{
    	//$home_url = get_bloginfo('home');
		wp_redirect(home_url() ); //to redirect back to "index.php" after logging out
		exit();
    }
	if(!empty($_GET['user_id'])){
		$other_user = true;
	}
?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		<?php get_template_part('tpl','profile-title');?>
		<input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
        <div id="main-content" class="profilePage">
			<div class="row">
				<?php  get_template_part('sidebar', 'profile'); ?>
                <div class="col-md-8">
					<div class="profileDetail">
						<div class="row-f">
							<div class="col1">Naam van firma/organisatie</div>
							<div class="col2"><input type="text" name="b_naam" value="<?php echo $user['b_naam']; ?>" disabled=""/></div>
							<div class="col3">
								<?php if($other_user == false){ ?><a href="#" data-fieldname="b_naam" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?>
							</div>
						
						</div>
						<div class="row-f">
							<div class="col1">Aard van de firma/organisatie</div>
							<div class="col2">
								<?php
								$business_sector_array = get_field('business_sector', 'option');

                                $stroption_business_sector = '';
                                foreach($business_sector_array as $business_sector)
                                {
                                    $no = $business_sector['no'];
                                    $title = $business_sector['title'];
                                    $stroption_business_sector .= '<option value="'.$no.'">'.$title.'</option>';
                                }
                                ?>
                                <select name="b_firma" disabled="">
                                    <?php echo str_replace('value="'.$user['b_firma'].'"', 'value="'.$user['b_firma'].'" selected', $stroption_business_sector);?>
								</select>
							</div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="b_firma" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						
						</div>
						<div class="row-f">
							<div class="col1">(Hoofd) Functie</div>
							<div class="col2"><span class="empty"><?php if(empty($user['b_hoofd'])) echo '-';?></span><input type="text" name="b_hoofd" value="<?php echo $user['b_hoofd']; ?>" disabled=""/></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="b_hoofd" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Straat</div>
							<div class="col2"><span class="empty"><?php if(empty($user['b_straat'])) echo '-';?></span><input type="text" name="b_straat" value="<?php echo $user['b_straat']; ?>" disabled=""/></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="b_straat" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Nr.</div>
							<div class="col2"><span class="empty"><?php if(empty($user['b_nr'])) echo '-';?></span><input type="text" name="b_nr" value="<?php echo $user['b_nr']; ?>" disabled=""/></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="b_nr" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Postcode</div>
							<div class="col2"><span class="empty"><?php if(empty($user['b_postcode'])) echo '-';?></span><input type="text" name="b_postcode" value="<?php echo $user['b_postcode']; ?>" disabled=""/></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="b_postcode" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Plaats</div>
							<div class="col2"><span class="empty"><?php if(empty($user['b_plaats'])) echo '-';?></span><input type="text" name="b_plaats" value="<?php echo $user['b_plaats']; ?>" disabled=""/></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="b_plaats" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Land/Regio</div>
							<div class="col2">
								<?php
                                $region_location_array = get_field('region_location', 'option');

                                $stroption_region_location = '';
                                foreach($region_location_array as $region_location)
                                {
                                    $no = $region_location['no'];
                                    $title = $region_location['title'];
                                    $stroption_region_location .= '<option value="'.$no.'">'.$title.'</option>';
                                }
                                ?>
								<select name="b_land" disabled="">
                                    <?php echo str_replace('value="'.$user['b_land'].'"', 'value="'.$user['b_land'].'" selected', $stroption_region_location);?>
								</select>
							</div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="b_land" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Telefoon</div>
							<div class="col2"><span class="empty"><?php if(empty($user['b_telefoon'])) echo '-';?></span><input type="text" name="b_telefoon" value="<?php echo $user['b_telefoon']; ?>" disabled=""/></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="b_telefoon" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Fax</div>
							<div class="col2"><span class="empty"><?php if(empty($user['b_fax'])) echo '-';?></span><input type="text" name="b_fax" value="<?php echo $user['b_fax']; ?>" disabled=""/></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="b_fax" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						
						</div>
						<div class="row-f">
							<div class="col1">GSM</div>
							<div class="col2"><span class="empty"><?php if(empty($user['b_gsm'])) echo '-';?></span><input type="text" name="b_gsm" value="<?php echo $user['b_gsm']; ?>" disabled=""/></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="b_gsm" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Emailadres</div>
							<div class="col2"><?php if(empty($user['b_email'])){echo '-';} else {?>
								<input type="text" name="b_email" value="<?php echo $user['b_email']; ?>" disabled=""/>
								<?php }?>
							</div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="b_email" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						</div>
						<div class="row-f">
							<div class="col1">Website bedrijf/organisatie</div>
							<div class="col2"><span class="empty"><?php if(empty($user['b_functies'])) echo '-';?></span><a href="<?php echo (empty($user['b_organisatie'])) ? 'javascript:void(0);': $user['b_organisatie']; ?>" target="_blank"><input type="text" name="b_organisatie" value="<?php echo $user['b_organisatie']; ?>" disabled=""/></a></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="b_organisatie" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Andere functies en mandaten</div>
							<div class="col2"><span class="empty"><?php if(empty($user['b_functies'])) echo '-';?></span><input type="text" name="b_functies" value="<?php echo $user['b_functies']; ?>" disabled=""/></div>
							<div class="col3"><?php if($other_user == false){ ?><a href="#" data-fieldname="b_functies" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a><?php }?></div>
						
						</div>
						<div class="clear"></div>
					</div>
                </div>

                
            </div>

        </div>
    </div>

<?php get_footer();?>