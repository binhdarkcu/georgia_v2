<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">
				<?php $query_object = get_queried_object();?>
             				
                <h1><?php $query_object->post_title;?></h1>
            </div>
        </section>


        <div id="main-content">

            <div class="container">
                <div class="row">

                    <div class="col-md-9">

                        <div id="events-calendar-plugins">
                            <div id="tribe-events" class="tribe-no-js" data-live_ajax="1" data-datepicker_format="" data-category="">
                                <div class="tribe-events-before-html"></div><span class="tribe-events-ajax-loading"><img class="tribe-events-spinner-medium" src="http://demo.toko.press/eventica-tecpro/wp-content/plugins/the-events-calendar/resources/images/tribe-loading.gif" alt="Loading Events" /></span>
                                <div id="tribe-events-content-wrapper" class="tribe-clearfix">
                                    <input type="hidden" id="tribe-events-list-hash" value="">

                                    <div id="tribe-events-content" class="tribe-events-list">

                                        <!-- List Title -->
                                        <div class="tribe-events-page-title-wrap">
                                            <h2 class="tribe-events-page-title"><?php the_title();?></h2>
                                        </div>

                                        <!-- Notices -->
                                        <!-- List Header -->
                                        <div id="tribe-events-header" data-title="Upcoming Events | Eventica" data-startofweek="1" data-view="list" data-baseurl="http://demo.toko.press/eventica-tecpro/events/list/">
                                            <!-- Header Navigation -->
                                        </div>
                                        <!-- #tribe-events-header -->
                                        <!-- Events Loop -->

                                        <div class="events-loop tribe-events-loop vcalendar">
											<h4 style="font-size: 15px;color: #fff;">Comming soon...</h4>
                                        </div>
                                        
                                    </div><!-- #tribe-events-content -->

                                    <div class="tribe-clear"></div>

                                </div> <!-- #tribe-events-content-wrapper -->

                                <div class="tribe-events-after-html"></div>
                            </div><!-- #tribe-events -->
                            <!--
                            This calendar is powered by The Events Calendar.
                            http://eventscalendarpro.com/
                            -->
                        </div> <!-- #tribe-events-pg-template -->

                    </div>

                    <div class="col-md-3">
                        <?php get_sidebar();?>
                    </div><!-- ./ sidebar -->
                </div>
            </div>

        </div>
        </div>

<?php get_footer();?>