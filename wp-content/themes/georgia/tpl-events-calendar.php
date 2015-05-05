<div class="responsive-calendar" id="calendar-page">

    <div class="day-headers">
        <div class="day header">MONDAY</div>
        <div class="day header">TUESDAY</div>
        <div class="day header">WEDNESDAY</div>
        <div class="day header">THURSDAY</div>
        <div class="day header">FRIDAY</div>
        <div class="day header">SATURDAY</div>
        <div class="day header">SUNDAY</div>
    </div>
    <div class="days" data-group="days">

    </div>
    <div class="controls">
        <div id="tribe-events-footer">

            <!-- Footer Navigation -->

            <div class="tribe-events-pagination pagination clearfix">
                <ul class="tribe-events-sub-nav">
                    <li class="prev page-numbers tribe-events-nav-previous">
                        <a data-month="2015-03" data-go="prev" rel="prev"><span>«</span> FEBRUARI </a>
                    </li>
                    <!-- .tribe-events-nav-previous -->
                    <li class="next page-numbers tribe-events-nav-next">
                        <a data-month="2015-05" data-go="next" rel="next">APRIL <span>»</span></a>
                    </li>
                    <!-- .tribe-events-nav-next -->
                </ul><!-- .tribe-events-sub-nav -->


            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    <?PHP
                $argevent = array(
                    'post_type'      => 'post',
                    'posts_per_page' => -1
                );
                $str1Array = '';
                $str2Array = '';
            $event_query = query_posts( $argevent );
            if(have_posts($event_query->$post)): while(have_posts($event_query->$post)): the_post($event_query->$post);
            $datetime = get_field('datetime', get_the_ID());
            $date = DateTime::createFromFormat( 'dmY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));
            $day = $date->format('j');
            $year = $date->format('Y');
            $month = $date->format( 'm' );

            $title = get_the_title(get_the_ID());
            $urlevent = get_the_permalink(get_the_ID());

            $str1Array .= "'".$year.'-'.$month.'-'.$day."':{title:'".$title."',postID:'".get_the_ID()."',url:'".$urlevent."'},";
            $str2Array .= "'".get_the_ID()."':{'".$year.'-'.$month.'-'.$day."':{title:'".$title."',url:'".$urlevent."'},},";

            endwhile; endif;
            ?>
    var array_calendar_events = {<?php echo $str2Array;?>};
    $(document).ready(function () {
        calendar_page.init(calendar_events,pageurl);
    });
</script>
