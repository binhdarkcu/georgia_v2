<?php get_header();?>
<body class="home page page-id-1881 page-template page-template-page_home_event page-template-page_home_event-php sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive tribe-theme-eventica-wp">
    <div id="site-container" class="site-container sb-site-container">
        <?php get_template_part('tpl','menu');?>
        <?php get_template_part('tpl','slider');?>
        <div id="main-content" class="home-plus-events">

            <?php get_template_part('tpl','comming-events')?>
			<?php global $near_id;?>
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
								$loc = get_field('place_event', $near->ID);
								$bigImg = wp_get_attachment_url( get_post_thumbnail_id($near->ID) );
								global $wpdb;
								$expire_date = strtotime(date("Y-m-d", strtotime($datetime)));
								$todate = strtotime(date('Y-m-d'));
								$future_date = $expire_date > $todate ? 1 : 0;
								$join_query = "SELECT * 
											FROM  wp_participate
											WHERE id_member = ".$_SESSION['user']['id']."
											AND id_event = ".$near->ID."
											AND status_join = 'yes'"."
											LIMIT 0 , 30";
								$isjoin = $wpdb->get_row($join_query);
								$near_id = $near->ID;
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
                                                    <a class="url" href="<?php echo get_the_permalink($near->ID)?>" title="<?php echo get_the_title($featured->ID);?>" rel="bookmark">
                                                        <?php echo get_the_title($near->ID);?>
                                                    </a>
                                                </h2>
                                                <div class="tribe-events-event-image">
                                                    <img src="<?php echo $bigImg;?>" class="attachment-large wp-post-image" alt="Eventica Dummy Image 28" />
                                                </div>
                                                <div class="tribe-events-single-event-description tribe-events-content entry-content description">
                                                    <?php echo $near->post_content;?>
                                                </div>
												<?php if(isset($_SESSION['user'])){ 
												if($isjoin){
												?>
                                                	<div class="add_guest">
                                                <?php
													$guest_count = "SELECT COUNT( * ) as COUNTGUEST
																		FROM  wp_guest WHERE id_event=".$near->ID." and id_member=".$_SESSION['user']['id']."";
													$count_row = $wpdb->get_results($guest_count);
													$total_guest = $count_row[0]->COUNTGUEST;
													
														if($future_date > 0){
                                                ?>
	                                                
	                                                	<?php if($total_guest <= 0) {?>
	                                                		<a href="javascript:void(0);">Wenst u gasten mee te brengen?</a>
	                                                	<?php } else{?>
	                                                		U hebt zich ingeschreven samen met <a href="javascript:void(0);"><b><?php echo $total_guest;?> <?php if($total_guest == 1) echo 'gast'; else echo 'gasten';?></b></a>
	                                                	<?php }?>
	                                                
                                                <?php } ?>
                                                </div>
                                                <div class="infoPayment">
                                                	<?php $account_number = get_field('account_number', 'option');?>
                                                	<div class="pad">
                                                		Gelieve <b><?php echo get_field('cost',$near->ID);?> €</b> per persoon te betalen op rekeningnummer 
														<b><?php echo $account_number;?></b> op naam van Georgia met 
														vermelding "Kredietverstrekking <?php echo $day.' '.convertMonths_String((int)$month,true);?> - <?php echo $_SESSION['user']['p_voornaam'].' '.$_SESSION['user']['p_naam']?>" ten laatste de dag voor aanvang van het event. 
                                                	</div>
                                                </div>
												<?php } }?>
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
                                                	
													$canjoin = DateTime::createFromFormat('Y/m/d', $datetime) > DateTime::createFromFormat('Y/m/d', date('Y/m/d'));
													$date_event = DateTime::createFromFormat('Y/m/d', $datetime)->format('Y-m-d').' '.substr($start_time, 0, -3).':00';
													$hours_event = strtotime($date_event);
													$current_hours = strtotime(date('Y-m-d H:i:s'));
													$diff = round(($hours_event - $current_hours) / 3600);
													if($canjoin){
                                                ?>
                                                
	                                                <div class="tribe-events-cta-btn">
	                                                	<input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
	                                                	<input name="action" type="hidden" class="action" value="<?php echo empty($isjoin) ? 'add' : 'cancel'; ?>_event"/>
	                                                   
	                                                    <?php
															$limit_time_to_cancel = is_numeric(get_field('limit_time_to_cancel', 'option')) ? get_field('limit_time_to_cancel', 'option'):2;
	                                                    	if(!$isjoin){
																if($diff >= 48)	{
	                                                    ?>
															<a class="btn" rel="external" data-user-id="<?php echo $_SESSION['user']['id'];?>" data-event-id="<?php echo $near->ID;?>" id="addEvent" href="javascript:void(0);">
																IK KOM
															</a>
	                                                    <?php } }else {
	                                                    	if($diff >= 48)	{
	                                                    ?>
	                                                    <a class="btn" rel="external" data-user-id="<?php echo $_SESSION['user']['id'];?>" data-event-id="<?php echo $near->ID;?>" id="addEvent" href="javascript:void(0);">
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
                                            			$p_query = "SELECT pt.id_member,pt.guest_member,mb.p_email,  mb.p_picture, mb.p_voornaam,mb.p_naam
																	FROM wp_participate pt
																	JOIN wp_members mb ON mb.id = pt.id_member
																	WHERE pt.id_event = ".$near->ID." AND pt.status_join = 'yes'"."
																	GROUP BY pt.id_member, pt.id
																	LIMIT 0 , 30";
														$joinEvents = $wpdb->get_results($p_query);
														$total_query = "SELECT FOUND_ROWS() AS TOTALUSER;";
														$totalUser = $wpdb->get_results($total_query);

                                                    $extra_members =  (int) get_field('extra_members', $near->ID);
                                                    $totalNumberDisplay = (int) $totalUser[0]->TOTALUSER + $extra_members;
                                                ?>
                                                <h4><?php echo $totalNumberDisplay;?> <span>leden komen</span></h4>
                                                <?php if(isset($_SESSION['user'])){ ?>
                                                <div class="scrollbar">
                                                	<ul>
                                                		<?php
															foreach ($joinEvents as $join) {			
                                                		?>
	                                                	<li>
		                                                		<div class="avatar-box">
																	<?php
																		if(!empty($join->p_picture)){
																	?>
		                                                			<img src="<?php echo content_url().'/uploads/avatar/'.$join->p_picture; ?>"/>
																	<?php } else {
																	?>
																		<img src="<?php echo get_bloginfo('template_url')?>/images/avatar.jpg"/>
																	<?php }?>
		                                                		</div>
																<?php if(!empty($join->p_email)){?>
		                                                		<p><a href="<?php echo bloginfo('home')?>/profile/<?php if($join->id_member!=$_SESSION['user']['id']) echo '?user_id='.$join->id_member;?>"><?php echo $join->p_naam.' '.$join->p_voornaam;?></a></p>
																<?php } else{ ?>
																<p class="p_guest"><?php echo $join->p_naam.' '.$join->p_voornaam;?></p>
																<?php }?>
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
                            <?php  include 'tpl-addguest.php';?>
                            
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
														$bigImg = wp_get_attachment_image_src( $photo,'full' );
                            				?>
                            				<li>
                            					<a class="fresco" data-fresco-group='lastestphoto' href="<?php echo $bigImg[0];?>"><div class="bg-thumb" style="background: url(<?php echo $bigImg[0]; ?>); background-size: cover;"></div></a>
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

		<style>

		</style>

        </div>

<?php get_footer();?>

<script type='text/javascript' src='js/add_guest.js'></script>