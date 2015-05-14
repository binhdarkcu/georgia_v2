<?php get_header();?>
<?php 
	global $wpdb;
	$join_query = "SELECT DISTINCT m.p_picture, m.p_voornaam, m.p_likedin, m.b_firma, m.b_organisatie, m.p_plaats
				FROM wp_members m
				JOIN wp_participate t ON m.id = t.id_member
				JOIN wp_posts p on t.id_event = p.id
				GROUP BY m.id";
	$members = $wpdb->get_results($join_query);
?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">

                <div class="breadcrumb-trail breadcrumb breadcrumbs">
                    <span class="trail-begin"><a href="<?php echo get_bloginfo('home')?>" title="Eventica">Home</a></span>
                    <span class="sep">&#047;</span> <span class="trail-end"><a href="<?php echo get_bloginfo('home')?>/leden/" title="Events">LEDEN</a></span>
                </div>					
                <h1>LEDEN</h1>
            </div>
        </section>


        <div id="main-content" class="ledenPage">

            <div class="container">
                <div class="row">

                    <div class="col-md-9">

                        <div id="events-calendar-plugins">
                            <div id="tribe-events" class="tribe-no-js" data-live_ajax="1" data-datepicker_format="" data-category="">
                                <div class="tribe-events-before-html"></div><span class="tribe-events-ajax-loading"><img class="tribe-events-spinner-medium" src="http://demo.toko.press/eventica-tecpro/wp-content/plugins/the-events-calendar/resources/images/tribe-loading.gif" alt="Loading Events" /></span>
                                <div id="tribe-events-content-wrapper" class="tribe-clearfix">
                                    <input type="hidden" id="tribe-events-list-hash" value="">

                                    <div id="tribe-events-content" class="tribe-events-list">

                                        <!-- List Title -->
                                        <div class="tribe-events-page-title-wrap no-pad">
                                            <h2 class="tribe-events-page-title">MOMENTEEL TELT GEORGIA <b>240 LEDEN</b></h2>
                                        </div>

                                        <!-- Notices -->
                                        <!-- List Header -->
                                        <div id="tribe-events-header" data-title="Upcoming Events | Eventica" data-startofweek="1" data-view="list" data-baseurl="http://demo.toko.press/eventica-tecpro/events/list/">
                                            <!-- Header Navigation -->
                                        </div>
                                        <!-- #tribe-events-header -->
                                        <!-- Events Loop -->

                                        <div class="ledenChart">
                                        	<div class="chart-left">
                                        		<h3>LEDEN PER BEROEP</h3>
                                        		<div class="canvas-holder">
													<canvas id="modular-doughnut" class="clschart" width="200" height="200">
													</canvas>
												</div>
                                        	</div>
                                        	<div class="chart-right">
                                        		<h3>LEDEN PER REGIO</h3>
                                        		<div class="canvas-holder">
													<canvas id="modular-doughnut-2" class="clschart" width="200" height="200">
													</canvas>
												</div>
                                        	</div>
                                        	<div class="clear"></div>
                                        </div>
                                        <?php if(isset($_SESSION['user'])){ ?>
                                        <div class="ledenList">
                                        	<div class="pad">
                                        		<div class="divtitle">
                                        			<div class="col col1">&nbsp;</div>
	                                        		<div class="col col2">NAAM</div>
	                                        		<div class="col col3">&nbsp;</div>
	                                        		<div class="col col4">BEROEP</div>
	                                        		<div class="col col5">BEDRIJF</div>
	                                        		<div class="col col6">REGIO</div>
	                                        	</div>
	                                        	<div class="scrollbar">
	                                        		<div class="divrow">
	                                        			
														<?php
															foreach($members as $member){
														?>
														<div class="col col1">
	                                        				<img src="<?php echo content_url().'/uploads/avatar/'.$member->{'p_picture'}; ?>" style="width: 45px; height: 45px;"/>
	                                        			</div>
	                                        			<div class="col col2"><div class="middle"><a href="<?php echo $member->{'p_likedin'} ?>"><?php echo $member->{'p_voornaam'} ?></a></div></div>
	                                        			<div class="col col3"><div class="middle"><a href="<?php echo $member->{'p_likedin'} ?>" class="fa fa-linkedin"></a></div></div>
	                                        			<div class="col col4"><div class="middle"><?php echo $member->{'b_firma'} ?></div></div>
	                                        			<div class="col col5"><div class="middle"><a href="<?php echo $member->{'b_organisatie'} ?>"><?php echo $member->{'b_organisatie'} ?></a></div></div>
	                                        			<div class="col col6"><div class="middle"><?php echo $member->{'b_land'} ?></div></div>
														<?php } ?>
	                                        		</div>
	                                        	</div>
	                                        	<div class="clear"></div>
                                        	</div>
                                        </div>
                                        <?php }?>
                                        <div class="ledenOrg" style="margin-top: 12px;">
                                        	<div class="home-featured-event">
                                        		<div class="featured-event-title">
			                                        <h2>FIRMA’S/ORGANISATIES</h2>
			                                    </div>
                                        	</div>
                                        	<div class="leden-logo">
                                        		<ul>
                                        			<?php
                                        				$orevent = array(
														  'post_type'      => 'organisaties',
														  'posts_per_page' => -1
														);
														
														$organisaties = query_posts( $orevent );
														if(have_posts($organisaties->$post)): while(have_posts($organisaties->$post)): the_post($organisaties->$post);
															$bigImg = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
															$link = get_field('url_link', get_the_ID());
                                        			?>
                                        			<li><a href="<?php echo $link;?>" target="_blank"><img src="<?php echo $bigImg;?>"/></a></li>
                                        			<?php endwhile; endif;?>
                                        		</ul>
                                        		<div class="clear"></div>
                                        	</div>
                                        </div>
                                    </div><!-- #tribe-events-content -->

                                    <div class="tribe-clear"></div>

                                </div> <!-- #tribe-events-content-wrapper -->

                                <div class="tribe-events-after-html"></div>
                            </div><!-- #tribe-events -->
                            <!--
                            This calendar is powered by The Events Calendar.
                            http://eventscalendarpro.com/
                            -->
                        </div> <!-- #tribe-events-pg-template -->

                    </div>

                    <div class="col-md-3">
                        <?php get_sidebar();?>
                    </div><!-- ./ sidebar -->
                </div>
            </div>

        </div>
        </div>

<?php get_footer();?>
<?php
    $strsql = 'select b_land, count(*) as count, sum(100) / total as percentage from wp_members cross join (select count(*) as total from wp_members) x group by 1';
?>
<script type='text/javascript' src='js/donout.chart.js'></script>