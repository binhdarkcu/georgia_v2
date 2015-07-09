<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <?php
		while ( have_posts() ) : the_post();
		$post = get_post(get_the_ID());
		$datetime = get_field('datetime', get_the_ID());
		//$date = DateTime::createFromFormat( 'dmY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));
        $day = substr($datetime, -2); // 13052015
        $year = substr($datetime, 0, 4);
        $month = substr($datetime, 5, 2);
		$month = convertMonths_String((int)$month,true);

		$start_time = get_field('start_time', get_the_ID());
		$end_time = get_field('end_time', get_the_ID());
		$time = $start_time.' - '.$end_time;
		$loc = get_field('place_event', get_the_ID());
		$bigImg = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
	?>
    
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">
				
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
										<?php 
											$expire_date = strtotime(date("Y-m-d", strtotime($datetime)));
											$todate = strtotime(date('Y-m-d'));
											$future_date = $expire_date > $todate ? 1 : 0;
											global $wpdb;
											$join_query = "SELECT * 
														FROM  wp_participate 
														WHERE id_member = ".$_SESSION['user']['id']."
														AND id_event = ".get_the_ID()."
														AND status_join = 'yes'"."
														LIMIT 0 , 30";
                                        	$isjoin = $wpdb->get_row($join_query);
										?>

                                        <div class="events-single-right col-sm-7 col-sm-push-5">

                                            <div id="post-2059" class="post-2059 tribe_events type-tribe_events status-publish has-post-thumbnail tag-wordpress cat_wordcamp">
                                                
                                                <div class="tribe-events-event-image">
                                                    <img src="<?php echo $bigImg;?>" class="attachment-large wp-post-image" alt="Eventica Dummy Image 28" />
                                                </div>
                                                <div class="tribe-events-single-event-description tribe-events-content entry-content description">
                                                    <?php echo get_the_content(get_the_ID());?>
                                                </div>
                                                <?php if(isset($_SESSION['user'])){ 
												if($isjoin){
												?>
                                                	<div class="add_guest">
                                                <?php
													$guest_count = "SELECT COUNT( * ) as COUNTGUEST
																		FROM  `wp_guest` WHERE id_event=".get_the_ID()." and id_member=".$_SESSION['user']['id']."";
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
                                                		Gelieve <b><?php echo get_field('cost',get_the_ID());?> €</b> per persoon te betalen op rekeningnummer 
														<b><?php echo $account_number;?></b> op naam van Georgia met 
														vermelding "Kredietverstrekking <?php echo $day.' '.$month;?> - <?php echo $_SESSION['user']['p_voornaam'].' '.$_SESSION['user']['p_naam']?>" ten laatste de dag voor aanvang van het event. 
                                                	</div>
                                                </div>
												<?php }?>
                                                <?php
													if($future_date == 0){
														if($isjoin){
                                                ?>
												<div class="downloadbox">
													<?php if(get_field('presentation_files', get_the_ID())): ?>
														<ul>
														<?php while(has_sub_field('presentation_files')): 
															$buttonname = get_sub_field('button_name');	
															$filename = get_sub_field('file_name');	
														?>
															<li><a href="<?php echo $filename;?>" target="_blank"><?php echo $buttonname;?></a></li>
														<?php endwhile; ?>
														</ul>
													<?php endif; ?>
												</div>
												<?php } } ?>
												<?php } ?>
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
                                                    	<?php
		                                                	
															$canjoin = DateTime::createFromFormat('Y/m/d', $datetime) > DateTime::createFromFormat('Y/m/d', date('Y/m/d'));
															$date_event = DateTime::createFromFormat('Y/m/d', $datetime)->format('Y-m-d').' '.substr($start_time, 0, -3).':00';
															$hours_event = strtotime($date_event);
															$current_hours = strtotime(date('Y-m-d H:i:s'));
															$diff = round(($hours_event - $current_hours) / 3600);
															if($canjoin){
		                                                ?>
                                                    	<input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
	                                                	<input name="action" type="hidden" class="action" value="<?php echo empty($isjoin) ? 'add' : 'cancel'; ?>_event"/>
	                                                    <?php
															$limit_time_to_cancel = is_numeric(get_field('limit_time_to_cancel', 'option')) ? get_field('limit_time_to_cancel', 'option'):48;
	                                                    	if(!$isjoin){
																if($diff >= $limit_time_to_cancel)	{
	                                                    ?>
	                                                    <a class="btn" rel="external" data-user-id="<?php echo $_SESSION['user']['id'];?>" data-event-id="<?php echo get_the_ID();?>" id="addEvent" href="javascript:void(0);">
	                                                        IK KOM
	                                                    </a>
	                                                    <?php } }else {
	                                                    	if($diff >= $limit_time_to_cancel)	{
	                                                    ?>
		                                                    <a class="btn" rel="external" data-user-id="<?php echo $_SESSION['user']['id'];?>" data-event-id="<?php echo get_the_ID();?>" id="addEvent" href="javascript:void(0);">
		                                                        CANCEL
		                                                    </a>
		                                                    <?php } else{?> 
		                                                    	<div class="blur"></div>
		                                                    	<a class="btn" rel="external" href="javascript:void(0);" style="cursor: inherit;">
			                                                        CANCEL
			                                                    </a>
														<?php } }?>
	                                                    <input name="security" type="hidden" class="action" value="<?php echo wp_create_nonce('security')?>"/>
                                                    <?php }?>
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
                                                
                                                <?php
                                                        global $wpdb;
                                                        $p_query = "SELECT pt.id_member,pt.guest_member, mb.p_picture, mb.p_voornaam, mb.p_naam
                                                                    FROM wp_participate pt
                                                                    JOIN wp_members mb ON mb.id = pt.id_member
                                                                    WHERE pt.id_event = ".get_the_ID()." AND pt.status_join = 'yes'"."
                                                                    GROUP BY pt.id_member, pt.id
                                                                    LIMIT 0 , 30";
                                                        $joinEvents = $wpdb->get_results($p_query);
                                                        $total_query = "SELECT FOUND_ROWS() AS TOTALUSER";
                                                        $totalUser = $wpdb->get_results($total_query);

                                                    $extra_members =  (int) get_field('extra_members', get_the_ID());
                                                    $totalNumberDisplay = (int) $totalUser[0]->TOTALUSER + $extra_members;
												?>
                                                <h4><?php echo $totalNumberDisplay;?>  <span>leden komen</span></h4>
                                                <?php if(isset($_SESSION['user'])){ ?>
                                                <div class="scrollbar">
                                                	<ul>
	                                                	<li>
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
																<?php if($join->guest_member!=1){?>
		                                                		<p><a href="<?php echo bloginfo('home')?>/profile/<?php if($join->id_member!=$_SESSION['user']['id']) echo '?user_id='.$join->id_member;?>"><?php echo $join->p_naam.' '.$join->p_voornaam;?></a></p>
																<?php } else{ ?>
																<p class="p_guest"><?php echo $join->p_naam.' '.$join->p_voornaam;?></p>
																<?php }?>
		                                                	</li>
		                                                	<?php  }?>
	                                                	</li>
	                                                	<style>
														.p_guest{
															color: #827b5e;
														}
														</style>
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
							<!--
										photo gallery
									-->
									<?php if(isset($_SESSION['user'])) {?>
									<div class="ledenOrg" style="clear: both;">
										<div class="home-featured-event" style="margin-bottom: 0;">
											<div class="featured-event-title">
												<h2>FOTO Galerij</h2>
											</div>
										</div>
										<div class="leden-logo">
											<ul>
												<?php
													$galleryPhoto = get_post_meta(get_the_ID(), 'tt_image_gallery', false);
													foreach($galleryPhoto as $photo){
														$bigImg = wp_get_attachment_image_src( $photo,'full' );
												?>
												<li>
													<a class="fresco" data-fresco-group='galleryphoto' href="<?php echo $bigImg[0];?>"><div class="bg-thumb" style="background: url(<?php echo $bigImg[0]; ?>); background-size: cover;"></div></a>
												</li>
												<?php } ?>
											</ul>
											<div class="clear"></div>
										</div>
									</div>
									<?php }?>
									<style>
										.leden-logo{
											  padding-top: 30px;
											  padding-left: 30px;
											  background: #000;
											  padding-bottom: 19px;

										}
										.leden-logo ul li{
											  width: 121px;
											  height: 121px;
											  display: inline-block;
											  margin-right: 9px;
											  margin-bottom: 11px;
										}
										.leden-logo ul li img{
											width: 100%
										}
									</style>
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
<?php get_template_part('tpl','addguest');?>
<script type='text/javascript' src='js/add_guest.js'></script>