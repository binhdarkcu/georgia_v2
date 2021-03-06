<div class="home-slider-events clearfix home-slider-events-active">
     <?php
        $i = 0;
        $args_slider = array(
            'post_type' 	 => 'post',
            'posts_per_page' => 5,
            'category_name' =>'slider',
            'meta_key'			=> 'datetime',
            'orderby'           => 'meta_value',
            'order'             => 'DESC'
        );


     $querySlider = get_posts($args_slider);
		date_default_timezone_set( 'Europe/Amsterdam' );
		setlocale(LC_ALL, 'nl_NL');
		$months = explode( ',', ',januari,februari,maart,april,mei,juni,juli,augustus,september,october,november,december' );
        foreach ($querySlider as $slider) {
            $i++;
			$url = get_field('image_for_slider',$slider->ID);
            //$url = wp_get_attachment_url(get_post_thumbnail_id($slider->ID));
			$datetime = get_field('datetime', $slider->ID);
			//$date = DateTime::createFromFormat( 'dmY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));
            $day = substr($datetime, -2); // 13052015
            $year = substr($datetime, 0, 4);
            $month = substr($datetime, 5, 2);
			$loc = get_field('place_event', $slider->ID);

    ?>
    <div class="slide-event item" style="background-image:url(<?php echo $url['url'];?>)">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5 col-lg-4">
                    <div class="slide-event-detail">
                        <h2 class="slide-event-title">
                            <a class="url" href="<?php echo get_the_permalink($slider->ID);?>" title="<?php echo get_the_title($slider->ID);?>" rel="bookmark">
                                <?php echo get_the_title($slider->ID);?>
                            </a>
                        </h2>
                        <div class="slide-event-cta">
                            <div class="slide-event-cta-date">
                                <span class="mm"><?php echo convertMonths_String( (int) $month,true);?></span>
                                <span class="dd"><?php echo $day ;?></span>
                                <span class="yy center"><?php echo $year ;?></span>
                            </div>
                            <a class="btn" href="<?php echo get_the_permalink($slider->ID);?>">
                                MEER INFO
                            </a>
                        </div>
                        <div class="slide-event-venue">
                            <div class="slide-event-venue-name">
                                <?php echo $loc['address'];?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }//end for
        wp_reset_postdata();
     ?>
    
</div>