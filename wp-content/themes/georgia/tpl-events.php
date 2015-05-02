<div class="events-loop tribe-events-loop vcalendar">

    <div class="row">

		<?php
			$added = array();
			global $paged;
			
			
	        $args_event = array(
	            'post_type' 	 => 'post',
	            'posts_per_page' => 5,
			  	'paged'		=> $paged,		
	            'order'			 => 'asc',
	            'meta_key' => 'datetime'
	        );
	        $queryEvents = new WP_Query($args_event);
			
			date_default_timezone_set( 'Europe/Amsterdam' );
			setlocale(LC_ALL, 'nl_NL');
			$months = explode( ',', ',januari,februari,maart,april,mei,juni,juli,augustus,september,october,november,december' );
	        if ( $queryEvents->have_posts() ) : while ( $queryEvents->have_posts() ) : $queryEvents->the_post();
	        	
	        //foreach ($queryEvents as $event) {
	            $url = wp_get_attachment_url(get_post_thumbnail_id($event->ID));
				$datetime = get_field('datetime', $event->ID);
				$date = DateTime::createFromFormat( 'dmY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));
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
			      'value'   => substr($datetime, 2, 2).$year,
			      'compare' => 'RLIKE',
			      'type'    => 'NUMBERRIC'
			    ) 
			  )
			);
			
			$event_query = new WP_Query( $argevent );
			
			if ( $event_query->have_posts() ) : while ( $event_query->have_posts() ) : $event_query->the_post();
				$datetime = get_field('datetime', get_the_ID());
				$date = DateTime::createFromFormat( 'dmY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));
				$loc = get_field('place', get_the_ID());
				$time = get_field('time', get_the_ID());
				$day = $date->format('j');
				$year = $date->format('Y');
				$month = $months[ $date->format( 'n' ) ];
				$bigImg = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
				//print_r(get_the_ID());	
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
        <?php
			endwhile; endif;//}//end for
	    ?>
        <!-- Month / Year Headers -->
        <!-- Event  -->
        
       <?php
endwhile; endif;//}//end for
	        
	    ?>
    </div>

</div><!-- .tribe-events-loop -->
<!-- List Footer -->
<div id="tribe-events-footer">

    <!-- Footer Navigation -->

    <div class="tribe-events-pagination pagination clearfix" style="display: block!important;">
        <h3 class="tribe-events-visuallyhidden">Events List Navigation</h3>
        <?php global $totalPage;
		 	$totalPage = distinctPost($datetime);
		 ?>
        <?php echo bt_paginate($totalPage);?>
        
    </div>
</div>
<!-- #tribe-events-footer -->