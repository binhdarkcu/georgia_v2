<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template bgBlack">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		

        <div id="main-content">

            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="about-content privacy-content">
                        	<h3>HUISREGLEMENT</h3>
                        	<?php
								$aboutid = get_page_id_by_slug('voorwaarden-reglementen');
								$about = get_post($aboutid);
								$aboutContent = $about->post_content;
							?>
							<?php echo apply_filters('the_content', $aboutContent);?>
                            
                        </div>
                    </div>

                </div>
            </div>

        </div>
        </div>

<?php get_footer();?>