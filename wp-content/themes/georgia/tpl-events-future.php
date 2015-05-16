
<div class="events-loop tribe-events-loop vcalendar">

    <div class="row">

		<?php
			
			$added = array();
		
			global $wpdb;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			//print_r($paged);
			$post_per_page = intval(get_query_var('posts_per_page'));
			$today = date('Y/m/d');
			$offset = ($paged - 1)*$post_per_page;
			
			$wp_query = "SELECT SQL_CALC_FOUND_ROWS DISTINCT COUNT( * ) AS TOTALEVENT, LEFT(wp_postmeta.meta_value,7) AS DATEEVENT
							FROM wp_postmeta
							JOIN wp_posts ON ( wp_postmeta.post_id = wp_posts.ID ) 
							WHERE 1 =1
							AND wp_posts.post_type =  'post'
							AND (
							wp_posts.post_status =  'publish'
							OR wp_posts.post_status =  'private'
							)
							AND (
							(
							wp_postmeta.meta_key =  'datetime'
							AND CAST( wp_postmeta.meta_value AS CHAR ) >=  '".$today."'
							)
							)
							GROUP BY wp_posts.ID
							ORDER BY wp_postmeta.meta_value DESC
						LIMIT ".$offset.",".$post_per_page;
						//print_r(new WP_Query($wp_query));
			$total_query = "SELECT FOUND_ROWS() AS TOTALEVENT;";
			$queryEvents = $wpdb->get_results($wp_query);
			$totalEvents = $wpdb->get_results($total_query);
			$totalPage = $totalEvents[0]->TOTALEVENT;
			
			foreach ($queryEvents as $event) {
				$datetime = $event->DATEEVENT;
				
                //$date = DateTime::createFromFormat( 'mY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));
                $year = substr($datetime, 0, 4);
				$month = substr($datetime, 5, 2);
                $month = convertMonths_String((int)$month,true);
				
			?>
				 <!-- Month / Year Headers -->
		        <span class='tribe-events-list-separator-month'><span><?php echo $month." ".$year;?></span></span>
		        <!-- Event  -->
			<?php 
				global $post;
				$argevent = array(
				  'post_type'      => 'post',
				  'posts_per_page' => -1,
				  'meta_query'     => array(
				    array(
				      'key'     => 'datetime',
				      'value'   => $year.'/'.substr($datetime, 5, 2),
				      'compare' => 'LIKE'
				    ),
				    array(
				      'key'     => 'datetime',
				      'value'   => $today,
				      'compare' => '>'
				    ) 
				  )
				);
				
				$event_query = query_posts( $argevent );
				if(have_posts($event_query->$post)): while(have_posts($event_query->$post)): the_post($event_query->$post);
					$datetime = get_field('datetime', get_the_ID());
					//$date = DateTime::createFromFormat( 'dmY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));
					$loc = get_field('place_event', get_the_ID());
					$time = get_field('time', get_the_ID());

                    $day = substr($datetime, -2); // 13052015
                    $year = substr($datetime, 0, 4);
                    $month = substr($datetime, 5, 2);
                	$month = convertMonths_String((int)$month,true);

					$bigImg = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
				?>
				<div id="post-2053" class="hentry vevent type-tribe_events post-2053 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2054 tribe-events-first col-sm-6">
		            <div class="even-list-wrapper">
		                <div class="event-list-wrapper-top">
		                    <div class="tribe-events-event-image">
		                        <a href="<?php echo get_the_permalink(get_the_ID());?>" title="WordCamp Bratislava">
		                            <img width="400" height="200" src="<?php echo $bigImg;?>" class="attachment-blog-thumbnail wp-post-image" alt="Eventica Dummy Image 23" />
		                        </a>
		                    </div>
		
		                    <div class="tribe-events-event-date">
		                        <span class="dd"><?php echo $day;?></span>
		                        <span class="mm"><?php echo $month;?></span>
		                        <span class="yy"><?php echo $year;?></span>
		                    </div>
		                </div>
		
		                <div class="event-list-wrapper-bottom">
		                    <div class="wraper-bottom-left">
		                        <!-- Event Title -->
		                        <h2 class="tribe-events-list-event-title entry-title summary">
		                            <a class="url" href="<?php echo get_the_permalink(get_the_ID());?>" title="<?php echo get_the_title(get_the_ID());?>" rel="bookmark">
		                                <?php echo get_the_title(get_the_ID());?>
		                            </a>
		                        </h2>
		
		                        <!-- Event Meta -->
		                        <div class="tribe-events-event-meta vcard">
		                            <div class="author  location">
		
		                                <!-- Venue Display Info -->
		                                <div class="tribe-events-venue-details">
		                                    <a href="<?php echo get_the_permalink(get_the_ID());?>"><?php echo $loc['address'];?></a>
		                                </div> <!-- .tribe-events-venue-details -->
		
		                                <div class="time-details">
		                                    <?php echo $time;?>
		                                </div>
		
		                            </div>
		                        </div><!-- .tribe-events-event-meta -->
		                    </div>
		                    
		                </div>
		            </div>
		        </div><!-- .hentry .vevent -->
				<?php endwhile; endif;
			}
	    ?>
    </div>

</div><!-- .tribe-events-loop -->
<!-- List Footer -->
<div id="tribe-events-footer">

    <!-- Footer Navigation -->
	
    <div class="tribe-events-pagination pagination clearfix" style="display: block!important;">
			<h3 class="tribe-events-visuallyhidden">Events List Navigation</h3>
		  <ul class="tribe-events-sub-nav">
			
			<li class="prev page-numbers tribe-events-nav-previous tribe-events-nav-left tribe-events-past">
				<a href="<?php echo get_bloginfo('home')?>/voorbije-events" rel="prev">VOORBIJE EVENTS</a>
			</li><!-- .tribe-events-nav-left -->
			
		</ul>
		</div>
</div>
<!-- #tribe-events-footer -->