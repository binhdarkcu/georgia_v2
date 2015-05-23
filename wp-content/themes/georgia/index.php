﻿<?php get_header();?>
<body class="home page page-id-1881 page-template page-template-page_home_event page-template-page_home_event-php sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive tribe-theme-eventica-wp">
    <div id="site-container" class="site-container sb-site-container">
        <?php get_template_part('tpl','menu');?>
        <?php get_template_part('tpl','slider');?>
        <div id="main-content" class="home-plus-events">

            <?php get_template_part('tpl','comming-events')?>
			
            <div class="home-group-box">
                <div class="container">
                    <div class="row">

                        <div class="col-md-8 col-md-push-4">

							<?php
							
								$today = date('Y/m/d');
								$args_featured = array(
						            'post_type' 	 => 'post',
						            'posts_per_page' => -1,
						            'order'			 => 'asc',
						            'meta_query'     => array(
									    array(
									      'key'     => 'datetime',
									      'value'   => $today,
									      'compare' => '>='
									    ) 
									  )
						        );
						        //$queryFeatured = new WP_Query($args_featured);
						        $queryFeatured = get_posts($args_featured);
						        $neardate = closest($queryFeatured, $today);
								$datearr = array();
								foreach ($queryFeatured as $featured) {
									$datenew = get_field('datetime', $featured->ID);
									array_push($datearr, $datenew);
								}
								$neardate = closest($datearr, $today);
								
								//array get post near date
								$args_near = array(
						            'post_type' 	 => 'post',
						            'posts_per_page' => 1,
						            'order'			 => 'asc',
						            'meta_query'     => array(
									    array(
									      'key'     => 'datetime',
									      'value'   => $neardate,
									      'compare' => '='
									    ) 
									  )
						        );
								date_default_timezone_set( 'Europe/Amsterdam' );
								setlocale(LC_ALL, 'nl_NL');
								$months = explode( ',', ',januari,februari,maart,april,mei,juni,juli,augustus,september,october,november,december' );
						        $queryNears = get_posts($args_near);
						        foreach ($queryNears as $near) {
								$datetime = get_field('datetime', $near->ID);
								//$date = DateTime::createFromFormat( 'dmY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));
                                $day = substr($datetime, -2); // 13052015
                                $year = substr($datetime, 0, 4);
                                $month = substr($datetime, 5, 2);

								$start_time = get_field('start_time', $near->ID);
								$end_time = get_field('end_time', $near->ID);
								$time = $start_time.' - '.$end_time;
								$loc = get_field('place', $near->ID);
								$bigImg = wp_get_attachment_url( get_post_thumbnail_id($near->ID) );
							?>
                            <div class="home-featured-event">


                                <div class="featured-event-wrap ">
                                    <div class="featured-event-title">
                                        <h2>Event in de kijker</h2>
                                    </div>

                                    <div id="tribe-events-content" class="tribe-events-single vevent clearfix">



                                        <div class="events-single-right col-sm-6 col-sm-push-6">

                                            <div id="post-2059" class="post-2059 tribe_events type-tribe_events status-publish has-post-thumbnail tag-wordpress cat_wordcamp">
                                                <h2 class="entry-title">
                                                    <a class="url" href="<?php echo get_the_permalink($featured->ID)?>" title="<?php echo get_the_title($featured->ID);?>" rel="bookmark">
                                                        <?php echo get_the_title($near->ID);?>
                                                    </a>
                                                </h2>
                                                <div class="tribe-events-event-image">
                                                    <img src="images/home/e-4.jpg" class="attachment-large wp-post-image" alt="Eventica Dummy Image 28" />
                                                </div>
                                                <div class="tribe-events-single-event-description tribe-events-content entry-content description">
                                                    <?php echo $near->post_content;?>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="events-single-left col-sm-6 col-sm-pull-6">

                                            <div class="tribe-events-cta">
                                                <div class="tribe-events-cta-date">
                                                    <span class="mm"><?php echo convertMonths_String( (int) $month,true); ?></span>
					                                <span class="dd"><?php echo $day ;?></span>
					                                <span class="yy center"><?php echo $year;?></span>
                                                </div>
                                                <?php if(isset($_SESSION['user'])){ ?>
                                                <?php
                                                	global $wpdb;
													$join_query = "SELECT * 
																FROM  wp_participate
																WHERE id_member = ".$_SESSION['user']['id']."
																AND id_event = ".$near->ID."
																AND status_join = 'yes'"."
																LIMIT 0 , 30";
                                                	$isjoin = $wpdb->get_row($join_query);
													$canjoin = DateTime::createFromFormat('Y/m/d', $datetime) > DateTime::createFromFormat('Y/m/d', date('Y/m/d'));
													$diff = abs(dateDiff($datetime,date('Y/m/d')));
													if($canjoin){
                                                ?>
                                                
	                                                <div class="tribe-events-cta-btn">
	                                                	<input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
	                                                	<input name="action" type="hidden" class="action" value="<?php echo empty($isjoin) ? 'add' : 'cancel'; ?>_event"/>
	                                                   
	                                                    <?php
	                                                    	if(empty($isjoin)){
	                                                    ?>
	                                                    <a class="btn" rel="external" data-user-id="<?php echo $_SESSION['user']['id'];?>" data-event-id="<?php echo $featured->ID;?>" id="addEvent" href="javascript:void(0);">
	                                                        IK KOM
	                                                    </a>
	                                                    <?php }else {
	                                                    	if($diff >= 10)	{
	                                                    ?>
	                                                    <a class="btn" rel="external" data-user-id="<?php echo $_SESSION['user']['id'];?>" data-event-id="<?php echo $featured->ID;?>" id="addEvent" href="javascript:void(0);">
	                                                        CANCEL
	                                                    </a>
	                                                    <?php } else{?> 
		                                                    	<div class="blur"></div>
		                                                    	<a class="btn" rel="external" href="">
			                                                        CANCEL
			                                                    </a>
														<?php } }?>
	                                                    <input name="security" type="hidden" class="action" value="<?php echo wp_create_nonce('security')?>"/>
	                                                </div>
                                                <?php }?>
                                               	<?php }?>
                                            </div>


                                            <div class="tribe-events-meta-group tribe-events-meta-group-details">
                                                <table>
                                                    <tr>
                                                        <th> Datum: </th>
                                                        <td>
                                                            <abbr class="tribe-events-abbr updated published dtstart"><?php echo convertMonths_String( (int) $month,true)." ".$day;?></abbr>
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
                                                <?php
                                            			global $wpdb;
                                            			$p_query = "SELECT pt.id_member, mb.p_picture, mb.p_voornaam
																	FROM wp_participate pt
																	JOIN wp_members mb ON mb.id = pt.id_member
																	WHERE pt.id_event = ".$near->ID." AND pt.status_join = 'yes'"."
																	GROUP BY pt.id_member, pt.id
																	LIMIT 0 , 30";
														$joinEvents = $wpdb->get_results($p_query);
														$total_query = "SELECT FOUND_ROWS() AS TOTALUSER;";
														$totalUser = $wpdb->get_results($total_query);
                                                ?>
                                                <h4><?php echo $totalUser[0]->TOTALUSER;?> <span>leden komen</span></h4>
                                                <?php if(isset($_SESSION['user'])){ ?>
                                                <div class="scrollbar">
                                                	<ul>
                                                		<?php
															foreach ($joinEvents as $join) {			
                                                		?>
	                                                	<li>
	                                                		<img src="<?php echo content_url().'/uploads/avatar/'.$join->p_picture; ?>" width="45"/>
	                                                		<p><?php echo $join->p_voornaam;?></p>
	                                                	</li>
	                                                	<?php }?>
	                                                </ul>
	                                                <div class="clear"></div>
                                                </div>
                                                <?php }?>
                                            </div>
                                            <div class="tribe-events-meta-group tribe-events-meta-group-venue events-location">
                                                <h3 class="tribe-events-single-section-title"> LOKATIE </h3>
                                                <div class="meta-inner">

                                                    <p class="author fn org">
                                                         <?php echo $loc['address'];?>
                                                    </p>

                                                    <p class="location">
                                                        <a target="_blank" href="http://maps.google.com/maps?f=q&#038;source=s_q&#038;hl=en&#038;geocode=&#038;q=<?php echo $loc['address'];?>" title="Click to view a Google Map">+ Google Map</a>
                                                    </p>



                                                </div>
                                            </div>

                                            <div class="tribe-events-meta-group tribe-events-meta-group-schedule">
                                                <h3 class="tribe-events-single-section-title">
                                                    DAGINDELING
                                                </h3>
                                                <ul>
                                                    <?php
                                                    	$shedule = get_field('shedule', $near->ID); 
														//print_r($shedule);
		                                            	//if( have_rows('shedule') ): while ( have_rows('shedule') ) : the_row(); 
														foreach( $shedule as $s ){
															$start = get_sub_field('start');
															$finish = get_sub_field('finish');
															$action = get_sub_field('action');
		                                            ?>
                                                    <li class="item">
                                                    	<i></i>
                                                        <span><?php echo $s['start'].' - '.$s['finish'].' '.$s['action']?></span>
                                                    </li>
                                                     <?php }?>
                                                    <li class="timeline">&nbsp;</li>
                                                </ul>
                                            </div>


                                        </div>

                                        <div class="clearfix"></div>


                                    </div>

                                </div>

                            </div>
                            <?php 	
								}
							?>
                        </div>

                        <div class="col-md-4 col-md-pull-8">
                        	
							<?php if(!isset($_SESSION['user'])){ ?> 
                            <div class="home-recent-posts ourgeorgia">

                                <div class="recent-post-wrap">

                                    <a class="recent-post-nav" href="<?php echo bloginfo('home')?>/about">
                                        LEES MEER
                                        <i class="fa fa-chevron-right"></i>
                                    </a>

                                    <h2 class="recent-post-title">
                                        OVER GEORGIA
                                    </h2>

                                    <div class="row">


                                        <article id="post-1178" class="post-1178 post type-post status-publish format-standard has-post-thumbnail hentry category-stress-management blog-list col-sm-6 col-md-12">

                                            <div class="inner-loop">
                                                <div class="post-thumbnail">
                                                    <a href="#" title="How To Live Life Free Of Stress An Interview With Joe Dimaggio">
                                                        <img width="400" height="200" src="images/home/our-georgia.jpg" class="attachment-blog-thumbnail wp-post-image" alt="Eventica Dummy Image 33" />
                                                    </a>
                                                </div>

                                                <div class="post-inner">
                                                    <div class="post-summary">
                                                        <?php
															$aboutid = get_page_id_by_slug('about');
															$about = get_post($aboutid);
															$aboutContent = $about->post_content;
														?>
														<?php echo apply_filters('the_content', $aboutContent);?>
                                                        <a class="btn" href="<?php echo bloginfo('home')?>/word-lid">
							                                WORD LID
							                            </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </article>
                                    </div>

                                </div>

                            </div>
                            <?php } else{ ?>
                            	<div class="lastestPhoto">
                            		<div class="home-featured-event">
                            			<div class="featured-event-title">
	                                        <h2>LAATSTE FOTO’S</h2>
	                                    </div>
                            		</div>
                            		<div class="lastestList scrollbar">
                            			<ul>
                            				<?php
												$argphoto = array(
												  'post_type'      => 'post',
												  'category_name' =>'show-event',
												  'posts_per_page' => -1
												);
												$event_query = query_posts( $argphoto );
												if(have_posts($event_query->$post)): while(have_posts($event_query->$post)): the_post($event_query->$post);
													$galleryPhoto = get_post_meta(get_the_ID(), 'tt_image_gallery', false);
													
													foreach($galleryPhoto as $photo){
														$bigImg = wp_get_attachment_image_src( $photo,'medium' );
                            				?>
                            				<li>
                            					<a href="<?php echo get_permalink($photo)?>"><img src="<?php echo $bigImg[0];?>"/></a>
                            				</li>
                            				<?php } endwhile; endif;?>
                            			</ul>
                            		</div>
                            	</div>
                            <?php }?>
                        </div>

                    </div>
                </div>
            </div>



        </div>

<?php get_footer();?>