<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">

                <div class="breadcrumb-trail breadcrumb breadcrumbs">
                    <span class="trail-begin"><a href="<?php echo bloginfo('home')?>" title="Home">Home</a></span>
                    <span class="sep">&#047;</span> <span class="trail-end"><a href="<?php echo bloginfo('home')?>/location/" title="LOCATIES">LOCATIES</a></span>
                </div>							
                <h1>LOCATIES</h1>
            </div>
        </section>


        <div id="main-content">

            <div class="container">
                <div class="row">

                    <div class="col-md-9">
						<div class="location-box">
							<div class="loc-title">
								<h3>LOCATIE ANTWERPEN</h3>
								<p>
									Suikerui 5<br/>
									2000 Antwerpen
								</p>
							</div>
							<div class="gmap">
								<iframe src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d2498.895211754653!2d4.397294!3d51.221006!3m2!1i1024!2i768!4f13.1!3m2!1m1!2sCLUB+LANGE+WAPPER!5e0!3m2!1sen!2sbe!4v1430843598061" width="100%" height="500" frameborder="0" style="border:0"></iframe>
							</div>
						</div>
					
                    </div>

                    <div class="col-md-3">
                        <?php get_sidebar();?>
                    </div><!-- ./ sidebar -->
                </div>
            </div>

        </div>
        </div>

<?php get_footer();?>