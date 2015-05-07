<div id="footer-block">
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <div class="footer-credit">
                            <p>
                                &copy;Georgia Business Club 2015

                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="footer-menu">
                            <ul id="social-icon">
                                <li>
                                    <a href="#" title="Facebook" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" title="Twitter" class="twitter"><i class="fa fa-twitter"></i></a>																															
                                    <a href="#" title="gPlus" class="google-plus"><i class="fa fa-google-plus"></i></a>																															<a href="#" title="Linkedin" class="linkedin"><i class="fa fa-linkedin"></i></a>
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
        $url = wp_get_attachment_url(get_post_thumbnail_id($event->ID));
        $datetime = get_field('datetime', $event->ID);
        $day = substr($datetime, -2); // 13052015
        $year = substr($datetime, 0, 4);
        $month = substr($datetime, 5, 2);

        $title = get_the_title($event->ID);

        $str1Array .= "'".$year.'-'.$month.'-'.$day."':{title:'".$title."',date:'".$year.'-'.$month.'-'.$day."',url:'".$urlevent."'},";
        $str2Array .= "'".$event->ID."':{'".$year.'-'.$month.'-'.$day."':{title:'".$title."',url:'".$urlevent."'},},";
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