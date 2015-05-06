<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <?php
    	date_default_timezone_set( 'Europe/Amsterdam' );
		setlocale(LC_ALL, 'nl_NL');
		$months = explode( ',', ',januari,februari,maart,april,mei,juni,juli,augustus,september,october,november,december' );
		while ( have_posts() ) : the_post();
		$datetime = get_field('datetime', get_the_ID());
		//$date = DateTime::createFromFormat( 'dmY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));
        $day = substr($datetime, 0, 2); // 13052015
        $year = substr($datetime, -4);
        $month = substr($datetime, 2, 2);
		$month = convertMonths_String((int)$month,true);

		$time = get_field('time', get_the_ID());
		$loc = get_field('place_event', get_the_ID());
		$bigImg = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
	?>
    
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">

                <div class="breadcrumb-trail breadcrumb breadcrumbs">
                    <span class="trail-begin"><a href="http://demo.toko.press/eventica-tecpro" title="Eventica">Home</a></span>
                    <span class="sep">&#047;</span> <span class="trail-end"><a href="http://demo.toko.press/eventica-tecpro/events/" title="Events">Events</a></span>
                </div>					
                <h1><?php echo get_the_title(get_the_ID());?></h1>
            </div>
        </section>


        <div id="main-content" class="singlePage">

            <div class="container">
                <div class="row">

                    <div class="col-md-9">

                        <div class="home-featured-event left-featured-events">


                                <div class="featured-event-wrap ">
                                    
                                    <div id="tribe-events-content" class="tribe-events-single vevent clearfix">



                                        <div class="events-single-right col-sm-7 col-sm-push-5">

                                            <div id="post-2059" class="post-2059 tribe_events type-tribe_events status-publish has-post-thumbnail tag-wordpress cat_wordcamp">
                                                
                                                <div class="tribe-events-event-image">
                                                    <img width="929" height="646" src="<?php echo $bigImg;?>" class="attachment-large wp-post-image" alt="Eventica Dummy Image 28" />
                                                </div>
                                                <div class="tribe-events-single-event-description tribe-events-content entry-content description">
                                                    <?php echo get_the_content(get_the_ID());?>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="events-single-left col-sm-5 col-sm-pull-7">

                                            <div class="tribe-events-cta">
                                                <div class="tribe-events-cta-date">
                                                    <span class="mm"><?php echo $month;?></span>
                                                    <span class="dd"><?php echo $day;?></span>
                                                    <span class="yy"><?php echo $year;?></span>
                                                </div>
                                               <div class="tribe-events-cta-btn">
                                                    <?php if(isset($_SESSION['user'])){ ?>
                                                    <a class="btn" href="<?php echo bloginfo('home')?>/word-lid">
                                                        IK KOM
                                                    </a>
                                                    <?php }?>
                                                </div>
                                            </div>


                                            <div class="tribe-events-meta-group tribe-events-meta-group-details">
                                                <table>
                                                    <tr>
                                                        <th> Datum: </th>
                                                        <td>
                                                            <abbr class="tribe-events-abbr updated published dtstart"><?php echo $month." ". $year ;?></abbr>
                                                        </td>
                                                    </tr>

                                                    <tr class="last">
                                                        <th> van-tot: </th>
                                                        <td>
                                                            <abbr class="tribe-events-abbr updated published dtstart"><?php echo $time;?></abbr>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

											<div class="tribe-events-meta-group tribe-events-meta-group-details number-events">
                                                <h4>62 <span>leden komen</span></h4>
                                                
                                                <div class="scrollbar">
                                                	<ul>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-1.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-2.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-1.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-2.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-1.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-2.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-1.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-2.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                </ul>
	                                                <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="tribe-events-meta-group tribe-events-meta-group-venue events-location">
                                                <h3 class="tribe-events-single-section-title"> LOKATIE </h3>
                                                <div class="meta-inner">

                                                    <p class="author fn org">
                                                        <?php echo $loc['address'];?>
                                                    </p>

                                                    <p class="location">
                                                        <a href="http://maps.google.com/maps?f=q&#038;source=s_q&#038;hl=en&#038;geocode=&#038;q=<?php echo $loc['address'];?>" target="_blank" title="Click to view a Google Map">+ Google Map</a>
                                                    </p>
                                                </div>
                                                <div class="googlemaps">
                                                	<?php
														if( !empty($loc) ):
														?>
														<div class="acf-map">
															<div class="marker" data-lat="<?php echo $loc['lat']; ?>" data-lng="<?php echo $loc['lng']; ?>"></div>
															<h4 style="font-size: 12px;"><?php echo $loc['address']; ?></h4>
														</div>
														<?php endif; 
									    			?>
                                                </div>
                                            </div>

                                            <div class="tribe-events-meta-group tribe-events-meta-group-schedule">
                                                <h3 class="tribe-events-single-section-title">
                                                    DAGINDELING
                                                </h3>
                                                
                                                <ul>
                                                	<?php
		                                            	if( have_rows('shedule') ): while ( have_rows('shedule') ) : the_row(); 
														$start = get_sub_field('start');
														$finish = get_sub_field('finish');
														$action = get_sub_field('action');
		                                            ?>
                                                    <li class="item">
                                                    	<i></i>
                                                        <span><?php echo $start.' - '.$finish.' '.$action?></span>
                                                    </li>
                                                     <?php endwhile; endif;?>
                                                    <li class="timeline">&nbsp;</li>
                                                </ul>
                                               
                                            </div>


                                        </div>

                                        <div class="clearfix"></div>


                                    </div>

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
<?php 	
	endwhile; 
?>
<?php get_footer();?>