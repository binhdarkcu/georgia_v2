<div id="footer-block">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <div class="footer-credit">
                            <p>
                                &copy;Georgia Business Club - <a href="pdfs/Georgia_disclaimer.pdf" target="_blank">Disclaimer</a> - website by <a href="http://www.kiokarma.com/" target="_blank">Kiokarma</a>

                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="footer-menu">
                            <ul id="social-icon">
                                <li>
                                    <a href="https://www.linkedin.com/company/georgia-business-club-vzw" title="Twitter" class="twitter " target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- ./footer block -->
<script type="text/javascript">
    <?php
    $argevent = array(
        'post_type'      => 'post',
        'posts_per_page' => -1
    );
    $str1Array = '';
    $str2Array = '';

    $event_query = query_posts( $argevent );

    foreach ($event_query as $event) {
        $i++;
        $urlevent = get_the_permalink($event->ID);
        $datetime = get_field('datetime', $event->ID);
        $time = get_field('time', $event->ID);
        $loc = get_field('place_event', $event->ID);
        $address = $loc['address'] ;

        $day = substr($datetime, -2); // 13052015
        $year = substr($datetime, 0, 4);
        $month = substr($datetime, 5, 2);


        $title = get_the_title($event->ID);
        $bigImg = wp_get_attachment_url( get_post_thumbnail_id($event->ID) );

        $str1Array .= "'".$year.'-'.$month.'-'.$day."':{title:'".$title."',date:'".$year.'-'.$month.'-'.$day."',url:'".$urlevent."'},";
        $str2Array .= "'".$event->ID."':{'".$year.'-'.$month.'-'.$day."':{title:'".$title."',url:'".$urlevent."',time:'".$time."',src:'".$bigImg."',address:'".$address."'},},";
    }

    ?>

    var calendar_events = {<?php echo $str1Array;?>};
    var array_calendar_events = {<?php echo $str2Array;?>};
    var pageurl = '<?php echo get_bloginfo('url')?>';


    $(document).ready(function () {
        calendar_page.init(calendar_events,pageurl);
        calendar_sidebar.init(calendar_events,pageurl);
    });
</script>