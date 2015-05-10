<?php get_header();?>
<?php

	if(isset($_SESSION['user'])){
        $user = $wpdb->get_row("SELECT * FROM wp_members WHERE id = '".$_SESSION['user']['id']."'", ARRAY_A);
    }else{
    	//$home_url = get_bloginfo('home');
		wp_redirect(home_url() ); //to redirect back to "index.php" after logging out
		exit();
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
							<div class="col3"><a href="#" data-fieldname="b_naam" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Aard van de firma/organisatie</div>
							<div class="col2"><input type="text" name="b_firma" value="<?php echo $user['b_firma']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="b_firma" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						
						</div>
						<div class="row-f">
							<div class="col1">(Hoofd) Functie</div>
							<div class="col2"><input type="text" name="b_hoofd" value="<?php echo $user['b_hoofd']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="b_hoofd" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Straat</div>
							<div class="col2"><input type="text" name="b_straat" value="<?php echo $user['b_straat']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="b_straat" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Nr.</div>
							<div class="col2"><input type="text" name="b_nr" value="<?php echo $user['b_nr']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="b_nr" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Postcode</div>
							<div class="col2"><input type="text" name="b_postcode" value="<?php echo $user['b_postcode']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="b_postcode" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Plaats</div>
							<div class="col2"><input type="text" name="b_plaats" value="<?php echo $user['b_plaats']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="b_plaats" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Land/Regio</div>
							<div class="col2"><input type="text" name="b_land" value="<?php echo $user['b_land']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="b_land" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Telefoon</div>
							<div class="col2"><input type="text" name="b_telefoon" value="<?php echo $user['b_telefoon']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="b_telefoon" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Fax</div>
							<div class="col2"><input type="text" name="b_fax" value="<?php echo $user['b_fax']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="b_fax" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						
						</div>
						<div class="row-f">
							<div class="col1">GSM</div>
							<div class="col2"><input type="text" name="b_gsm" value="<?php echo $user['b_gsm']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="b_gsm" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Emailadres</div>
							<div class="col2"><?php if(empty($user['b_email'])){echo '-';} else {?>
								<a href="mailto:<?php echo $user['b_email']; ?>"><?php echo $user['b_email']; ?></a>
								<?php }?>
							</div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Website bedrijf/organisatie</div>
							<div class="col2"><input type="text" name="b_organisatie" value="<?php echo $user['b_organisatie']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="b_organisatie" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						
						</div>
						<div class="row-f">
							<div class="col1">Andere functies en mandaten</div>
							<div class="col2"><input type="text" name="b_functies" value="<?php echo $user['b_functies']; ?>" disabled=""/></div>
							<div class="col3"><a href="#" data-fieldname="b_functies" data-userid="<?php echo $user['id']; ?>" class="fa fedit"><span>edit</span></a></div>
						
						</div>
						<div class="clear"></div>
					</div>
                </div>

                
            </div>

        </div>
    </div>

<?php get_footer();?>