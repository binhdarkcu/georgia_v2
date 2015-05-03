
<div class="events-loop tribe-events-loop vcalendar">

    <div class="row">

		<?php
			$added = array();
			global $paged;
			
			global $wpdb;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			print_r($paged);
			$post_per_page = intval(get_query_var('posts_per_page'));
			
			$offset = ($paged - 1)*$post_per_page;
			date_default_timezone_set( 'Europe/Amsterdam' );
			setlocale(LC_ALL, 'nl_NL');
			$months = explode( ',', ',januari,februari,maart,april,mei,juni,juli,augustus,september,october,november,december' );
			
			$wp_query = "SELECT SQL_CALC_FOUND_ROWS DISTINCT COUNT(*) AS TOTALEVENT,RIGHT( pm.meta_value, 6 ) AS DATEEVENT	
						FROM wp_postmeta pm
						JOIN wp_posts p ON p.ID = pm.post_id
						WHERE 1 =1
						AND p.post_type =  'post'
						AND (
						p.post_status =  'publish'
						)
						AND (
						pm.meta_key =  'datetime'
						)
						GROUP BY pm.post_id, RIGHT( pm.meta_value, 6 )
						ORDER BY p.post_date ASC 
						LIMIT ".$offset.",".$post_per_page;
			$total_query = "SELECT FOUND_ROWS() AS TOTALEVENT;";
			$queryEvents = $wpdb->get_results($wp_query);
			$totalEvents = $wpdb->get_results($total_query);
			$totalPage = $totalEvents[0]->TOTALEVENT;
			foreach ($queryEvents as $event) {
				$datetime = $event->DATEEVENT;
				$date = DateTime::createFromFormat( 'mY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));
				$year = $date->format('Y');
				$month = $months[ $date->format( 'n' ) ];
			?>
				 <!-- Month / Year Headers -->
		        <span class='tribe-events-list-separator-month'><span><?php echo $month." ".$year;?></span></span>
		        <!-- Event  -->
			<?php 
				$argevent = array(
				  'post_type'      => 'post',
				  'posts_per_page' => -1,
				  'meta_query'     => array(
				    array(
				      'key'     => 'datetime',
				      'value'   => $datetime,
				      'compare' => 'RLIKE',
				      'type'    => 'NUMBERRIC'
				    ) 
				  )
				);
				
				$event_query = query_posts( $argevent );
				if(have_posts($event_query->$post)): while(have_posts($event_query->$post)): the_post($event_query->$post);
					$datetime = get_field('datetime', get_the_ID());
					$date = DateTime::createFromFormat( 'dmY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));
					$loc = get_field('place', get_the_ID());
					$time = get_field('time', get_the_ID());
					$day = $date->format('j');
					$year = $date->format('Y');
					$month = $months[ $date->format( 'n' ) ];
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
        <!-- Left Navigation -->
		<?php 
			if($paged > 1){
				$prevPage = $paged-1;
		?>
        <li class="prev page-numbers tribe-events-nav-previous tribe-events-nav-left tribe-events-past">
            <a href="<?php echo get_bloginfo('home')?>/events/<?php echo ($paged == 1) ? '' : 'page/'.$prevPage; ?>" rel="prev">VOORBIJE EVENTS</a>
        </li><!-- .tribe-events-nav-left -->
        <?php }?>
        <?php 
			if($paged < $totalPage - 1){
		?>
        <li class="next page-numbers tribe-events-nav-next tribe-events-nav-right">
            <a href="<?php echo get_bloginfo('home')?>/events/page/<?php echo $paged + 1;?>" rel="next">eerstvolgende EVENTS</a>
        </li><!-- .tribe-events-nav-right -->
        <?php }?>
    </ul>
    </div>
</div>
<!-- #tribe-events-footer -->