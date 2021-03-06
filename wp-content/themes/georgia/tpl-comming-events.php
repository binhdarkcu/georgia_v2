<div class="home-upcoming-events clearfix">
                <div class="container">

                    <a class="upcoming-event-nav" href="<?php echo bloginfo('home')?>/events">
                        ALLE EVENTS
                        <i class="fa fa-chevron-right"></i>
                    </a>

                    <h2 class="upcoming-event-title">
                        EERSTVOLGENDE EVENTS
                    </h2>

                    <div class="row">

                        <div class="upcoming-event-wrap tribe-events-list">

                            <div class="events-loop">
								<?php
							        $i = 0;
                                    $today = date('Y/m/d');
							        $args_coming = array(
							            'post_type' 	 => 'post',
							            'posts_per_page' => 3,
							            'meta_key' => 'datetime',
                                        'order'			 => 'asc',
                                        'meta_query'     => array(
                                            array(
                                                'key'     => 'datetime',
                                                'value'   => $today,
                                                'compare' => '>='
                                            )
                                        )
							        );
							        $queryComing = get_posts($args_coming);
									date_default_timezone_set( 'Europe/Amsterdam' );
									setlocale(LC_ALL, 'nl_NL');
							        foreach ($queryComing as $coming) {
							            $i++;
							            $url = wp_get_attachment_url(get_post_thumbnail_id($coming->ID));
										$datetime = get_field('datetime', $coming->ID);
										//$date = DateTime::createFromFormat( 'dmY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));
                                        $day = substr($datetime, -2); // 13052015
                                        $year = substr($datetime, 0, 4);
                                        $month = substr($datetime, 5, 2);

										$loc = get_field('place', $coming->ID);
										$start_time = get_field('start_time', $coming->ID);
										$end_time = get_field('end_time', $coming->ID);
										$time = $start_time.' - '.$end_time;
							    ?>
                                <div id="post-<?php echo $coming->ID;?>" class="hentry vevent type-tribe_events post-2053 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2054 col-sm-6 col-md-4">


                                    <div class="even-list-wrapper">
                                        <div class="event-list-wrapper-top">
                                            <div class="tribe-events-event-image">
                                                <a href="<?php echo get_the_permalink($coming->ID);?>" title="<?php echo get_the_title($coming->ID);?>">
                                                    <img width="400" height="200" src="<?php echo $url;?>" class="attachment-blog-thumbnail wp-post-image" alt="<?php echo get_the_title($coming->ID);?>" />
                                                </a>
                                            </div>

                                            <div class="tribe-events-event-date">
                                                <span class="dd"><?php echo $day;?></span>
                                                <span class="mm"><?php echo convertMonths_String( (int) $month,true);?></span>
                                                <span class="yy"><?php echo $year;?></span>
                                            </div>
                                        </div>

                                        <div class="event-list-wrapper-bottom">
                                            <div class="wraper-bottom-left">
                                                <!-- Event Title -->
                                                <h2 class="tribe-events-list-event-title entry-title summary">
                                                    <a class="url" href="<?php echo get_the_permalink($coming->ID);?>" title="WordCamp Bratislava" rel="bookmark">
                                                        <?php echo get_the_title($coming->ID);?>
                                                    </a>
                                                </h2>

                                                <!-- Event Meta -->
                                                <div class="tribe-events-event-meta vcard">
                                                    <div class="author  location">

                                                        <!-- Venue Display Info -->
                                                        <div class="tribe-events-venue-details">
                                                            <a href="<?php echo get_the_permalink($coming->ID);?>"><?php echo $loc['address'];?></a>
                                                        </div> <!-- .tribe-events-venue-details -->

                                                        <div class="time-details">
                                                            <?php echo $time;?>
                                                        </div>

                                                    </div>
                                                </div><!-- .tribe-events-event-meta -->
                                            </div>

                                        </div>
                                    </div>
                                </div>
								<?php
							        }//end for
							    ?>
                            </div>

                        </div>

                    </div>
                </div>

            </div>