<?php
add_action("wp_ajax_user_events_sidebar", "user_events_sidebar_callback");
add_action("wp_ajax_nopriv_user_events_sidebar", "user_events_sidebar_callback");

function user_events_sidebar_callback() {
    $data_day = sprintf('%02d', $_REQUEST["data_day"]) ;
    $data_month = sprintf('%02d', $_REQUEST["data_month"]) ;
    $data_year = $_REQUEST["data_year"];

    $str_result = '';
    $argevent = array(
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'meta_query'     => array(
            array(
                'key'     => 'datetime',
                'value'   => $data_year.'/'.$data_month.'/'.$data_day,
                'compare' => '='
            )
        )

    );


    $event_query = query_posts( $argevent );
    //wp_send_json_success( $event_query );

    if(have_posts($event_query->$post)): while(have_posts($event_query->$post)): the_post($event_query->$post);
        $datetime = get_field('datetime', get_the_ID());
        $loc = get_field('place', get_the_ID());
        $time = get_field('time', get_the_ID());
        $title = get_the_title(get_the_ID());
        $urlevent = get_the_permalink(get_the_ID());

        $d = substr($datetime, 0, 2);
        $m = substr($datetime, 2, 2);
        $y = substr($datetime, 4, 4);
        $timeunix = strtotime("{$d}-{$m}-{$y}");
        $strdate = date('D', $timeunix);
        //echo '<br>'.$datetime;
        echo '<div class="hentry vevent type-tribe_events post-2055 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2056"><div class="tribe-mini-calendar-event event-1 first "><div class="list-date"><span class="list-dayname">'.$strdate.'</span><span class="list-daynumber">'.$d.'</span></div><div class="list-info"><h2 class="entry-title summary"><a href="'.$urlevent.'" rel="bookmark">'.$title.'</a></h2><div class="duration"><span class="date-start dtstart"><span class="value-title" title="2015-04-18UTC08:00"></span></span><span class="date-end dtend">'.$time.'<span class="value-title" title="2015-04-19UTC05:00"></span></span></div><div class="vcard adr location"></div></div></div></div>';
    endwhile; endif;

    die();
}

