<?php get_header();?>
<?php
	if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">

                <div class="breadcrumb-trail breadcrumb breadcrumbs">
                    <span class="trail-begin"><a href="http://demo.toko.press/eventica-tecpro" title="Eventica">PROFIEL</a></span>
                    
                </div>					
                <h1><?php echo strtoupper($user['p_naam']); ?></h1>
            </div>
        </section>


        <div id="main-content" class="profilePage">
			<div class="row">
				<?php get_template_part('sidebar', 'profile'); ?>
                <div class="col-md-8">
					<div class="profileDetail">
						<div class="row-f">
							<div class="col1">Naam van firma/organisatie</div>
							<div class="col2"><?php echo $user['b_naam']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Aard van de firma/organisatie</div>
							<div class="col2"><?php echo $user['b_firma']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">(Hoofd) Functie</div>
							<div class="col2"><?php echo $user['b_hoofd']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Straat</div>
							<div class="col2"><?php echo $user['b_straat']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Nr.</div>
							<div class="col2"><?php echo $user['b_nr']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Postcode</div>
							<div class="col2"><?php echo $user['b_postcode']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Plaats</div>
							<div class="col2"><?php echo $user['b_plaats']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Land/Regio</div>
							<div class="col2"><?php echo $user['b_land']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Telefoon</div>
							<div class="col2"><?php echo $user['b_telefoon']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Fax</div>
							<div class="col2"><?php echo $user['b_fax']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">GSM</div>
							<div class="col2"><?php echo $user['b_gsm']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Emailadres</div>
							<div class="col2"><a href="#"><?php echo $user['b_email']; ?></a></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Website bedrijf/organisatie</div>
							<div class="col2"><a href="#"><?php echo $user['b_organisatie']; ?></a></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="row-f">
							<div class="col1">Andere functies en mandaten</div>
							<div class="col2"><?php echo $user['b_functies']; ?></div>
							<div class="col3"><a href="#" class="fa fedit"><span>edit</span></a></div>
						</div>
						<div class="clear"></div>
					</div>
                </div>

                
            </div>

        </div>
    </div>

<?php get_footer();?>