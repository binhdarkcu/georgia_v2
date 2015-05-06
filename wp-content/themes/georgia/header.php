<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="ie6 oldie" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html class="ie7 oldie" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie8 oldie" lang="en-US">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <title>Georgia Business Club 2015</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo get_bloginfo('template_url')?>/"></base>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png?v=3" />
    <link rel='stylesheet' id='tribe-events-full-pro-calendar-style-css' href='assets/css/tribe-events-pro-full.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='tribe-events-calendar-pro-style-css' href='assets/css/tribe-events-pro-theme.min.css?ver=3.9.1' type='text/css' media='all' />
    <link rel='stylesheet' id='tribe-events-calendar-full-pro-mobile-style-css' href='assets/css/tribe-events-pro-full-mobile.min.css?ver=3.9.1' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' id='tribe-events-calendar-pro-mobile-style-css' href='assets/css/tribe-events-pro-theme-mobile.min.css?ver=3.9.1' type='text/css' media='only screen and (max-width: 768px)' />
    
    <link rel='stylesheet' id='tribe-events-full-calendar-style-css' href='assets/css/tribe-events-full.min.css?ver=3.9.1' type='text/css' media='all' />
    <link rel='stylesheet' id='tribe-events-calendar-style-css' href='assets/css/tribe-events-theme.min.css?ver=3.9.1' type='text/css' media='all' />
    <link rel='stylesheet' id='tribe-events-full-pro-calendar-style-css' href='assets/css/tribe-events-pro-full.min.css?ver=3.9.1' type='text/css' media='all' />
    <link rel='stylesheet' id='tribe-events-calendar-pro-style-css' href='assets/css/tribe-events-pro-theme.min.css?ver=3.9.1' type='text/css' media='all' />
    
    <link rel='stylesheet' id='mailchimp-for-wp-checkbox-css' href='assets/css/checkbox.min.css?ver=2.2.8' type='text/css' media='all' />
    <link rel='stylesheet' id='tokopress-fonts-css' href='http://fonts.googleapis.com/css?family=Noto+Sans%3A400%2C700%7CRaleway%3A400%2C700&#038;ver=1.3' type='text/css' media='all' />
    <link rel='stylesheet' id='mailchimp-for-wp-form-css' href='assets/css/form.min.css?ver=2.2.8' type='text/css' media='all' />
    <link rel='stylesheet' id='style-theme-css' href='assets/css/style.css?ver=1.3' type='text/css' media='all' />
    
    <link rel='stylesheet' id='style-theme-css' href='css/all.css?ver=1.3' type='text/css' media='all' />

    <script type='text/javascript' src='js/jquery.js?ver=1.11.1'></script>
    <script type='text/javascript' src='js/jquery-migrate.min.js?ver=1.2.1'></script>
   
	<script type="text/javascript" src="js/map_location.js"></script> 
	<style type="text/css">
	
	.acf-map {
		width: 100%;
		height: 400px;
	}
	
	</style>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var tribe_js_config = { "permalink_settings": "\/%postname%\/", "events_post_type": "tribe_events" };
        /* ]]> */
    </script>
    <script type='text/javascript' src='assets/js/tribe-events.min.js?ver=3.9.1'></script>
    
    <meta name="generator" content="Powered by Visual Composer - drag and drop page builder for WordPress." />
    <!--[if IE 8]><link rel="stylesheet" type="text/css" href="assets/css/vc-ie8.css" media="screen"><![endif]-->
    <style type="text/css">
        .mc4wp-form input[name="_mc4wp_required_but_not_really"] {
            display: none !important;
        }
    </style>

	<style type="text/css">
	
	.acf-map {
		width: 100%;
		height: 198px;
		right: 1px;
	}
	</style>

    <script type="text/javascript">

            <?php
            $argevent = array(
                'post_type'      => 'post',
                'posts_per_page' => -1
            );
            $str1Array = '';
            $str2Array = '';

            $event_query = query_posts( $argevent );

            /*if ( have_posts($event_query->$post) ) {
                while ( have_posts($event_query->$post) ) {
                    the_post($event_query->$post);

                    $datetime = get_field('datetime', get_the_ID()); //dmY
                    //$date = DateTime::createFromFormat( 'dmY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));

                    $day = substr($datetime, 0, 2); // 13052015
                    $year = substr($datetime, -4);
                    $month = substr($datetime, 2, 2);

                    $title = get_the_title(get_the_ID());

                    $str1Array .= "'".$year.'-'.$month.'-'.$day."':{title:'".$title."',date:'".$year.'-'.$month.'-'.$day."',url:'".$urlevent."'},";
                    $str2Array .= "'".get_the_ID()."':{'".$year.'-'.$month.'-'.$day."':{title:'".$title."',url:'".$urlevent."'},},";
                } // end while
                wp_reset_postdata();
            } // end if*/
            foreach ($event_query as $event) {
                $i++;
                $url = wp_get_attachment_url(get_post_thumbnail_id($event->ID));
                $datetime = get_field('datetime', $event->ID);
                $day = substr($datetime, 0, 2); // 13052015
                $year = substr($datetime, -4);
                $month = substr($datetime, 2, 2);

                $title = get_the_title($event->ID);

                $str1Array .= "'".$year.'-'.$month.'-'.$day."':{title:'".$title."',date:'".$year.'-'.$month.'-'.$day."',url:'".$urlevent."'},";
                $str2Array .= "'".$event->ID."':{'".$year.'-'.$month.'-'.$day."':{title:'".$title."',url:'".$urlevent."'},},";
			}

            ?>

        var calendar_events = {<?php echo $str1Array;?>};
        var pageurl = '<?php echo get_bloginfo('url')?>';
    </script>
</head>