<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
<div id="site-container" class="site-container sb-site-container">
    <?php get_template_part('tpl','menu');?>
    <section id="page-title" class="page-title events-title">
        <div class="container">
            <?php $query_object = get_queried_object();
            ?>

            <h1><?php echo get_the_title();?></h1>
        </div>
    </section>


    <div id="main-content">

        <div class="container">
            <div class="row">

                <div class="col-md-9">

                    <div class="home-featured-event left-featured-events">
                        <div class="featured-event-wrap ">
                            <div id="tribe-events-content-wrapper" class="tribe-clearfix">
                                <input type="hidden" id="tribe-events-list-hash" value="">

                                <div id="tribe-events-content" class="tribe-events-single bgblack vevent clearfix">

                                    <!-- Notices -->
                                    <!-- Events Loop -->
                                    <div class="news-content">
                                        <img src="images/new-1.jpg"/>
                                        <div class="post-content">

                                            <div class="events-single-right col-sm-7 col-sm-push-5">
                                                bbb
                                            </div>
                                            <div class="events-single-left col-sm-5 col-sm-pull-7">
                                                aaa
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- #tribe-events-content -->


                            </div> <!-- #tribe-events-content-wrapper -->

                        </div><!-- #tribe-events -->
                        <!--
                        This calendar is powered by The Events Calendar.
                        http://eventscalendarpro.com/
                        -->
                    </div> <!-- #tribe-events-pg-template -->

                </div>

                <div class="col-md-3">

                    <div id="sidebar">

                        <section id="tribe-mini-calendar-3" class="widget tribe_mini_calendar_widget">
                            <div class="widget-inner">
                                <h3 class="widget-title">LAATSTE NIEUWSARTIKELEN</h3>

                                <!-- Removing this wrapper class will break the claendar javascript, please avoid and extend as needed -->

                                <div class="tribe-mini-calendar-wrapper">

                                    <div class="tribe-mini-calendar-list-wrapper">
                                        <div class="tribe-events-loop hfeed vcalendar">
                                            <div class="hentry vevent type-tribe_events post-2055 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2056"><div class="tribe-mini-calendar-event event-1 first "><div class="list-date"><span class="list-dayname">Sun</span><span class="list-daynumber">17</span></div><div class="list-info"><h2 class="entry-title summary"><a href="http://localhost/PHP/BLISS/www/YVES/georgia/sourcecode/version2/launch-georgia-vzw/" rel="bookmark">Launch Georgia VZW</a></h2><div class="duration"><span class="date-start dtstart"><span class="value-title" title="2015-04-18UTC08:00"></span></span><span class="date-end dtend"><span class="value-title" title="2015-04-19UTC05:00"></span></span></div><div class="vcard adr location"></div></div></div></div>
                                        </div><!-- .tribe-events-loop -->
                                    </div> <!-- .tribe-mini-calendar-list-wrapper -->
                                </div>
                            </div>
                        </section>

                    </div>
                </div><!-- ./ sidebar -->
            </div>
        </div>

    </div>
</div>

<?php get_footer();?>