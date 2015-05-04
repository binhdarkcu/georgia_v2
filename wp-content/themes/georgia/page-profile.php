<?php
	if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
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
		 <section id="page-title" class="page-title events-title">
            <div class="container">

                <div class="breadcrumb-trail breadcrumb breadcrumbs">
                    <span class="trail-begin"><a href="<?php echo bloginfo('home')?>/profile/" title="PROFIEL">PROFIEL</a></span>
                    
                </div>					
                <h1><?php echo strtoupper($user['p_voornaam']); ?></h1>
            </div>
        </section>


        <div id="main-content" class="profilePage">
			<div class="row">
				<?php get_template_part('sidebar', 'profile'); ?>
                <div class="col-md-8">
					<div class="profileDetail">
						<div class="avatar-member">
							<img src="<?php echo content_url().'/uploads/'.$user['p_picture']; ?>" style="width: 199px"/>
							<div class="profile-name">
								 <span><?php echo $user['p_voornaam']; ?></span>
								 <a href="#" class="fa fedit"><span>edit photo</span></a>
							</div>
						</div>
						<div class="row-f">
							<div class="col1">Geboortedatum</div>
							<div class="col2"><?php echo $user['p_geboortedatum']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Geboorteplaats</div>
							<div class="col2"><?php echo $user['p_geboorteplaats']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
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
							<div class="col2"><?php echo $user['p_telefoon']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Fax</div>
							<div class="col2"><?php echo $user['p_fax']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">GSM</div>
							<div class="col2"><?php echo $user['p_gsm']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Privé emailadres</div>
							<div class="col2"><a href="#"><?php echo $user['p_email']; ?></a></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Linkedin Profiel pagina</div>
							<div class="col2"><a href="#"><?php echo $user['p_likedin']; ?></a></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="clear"></div>
					</div>
                </div>

                
            </div>

        </div>
    </div>

<?php get_footer();?>