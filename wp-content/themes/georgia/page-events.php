<?php get_header('events');?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
		        <section id="page-title" class="page-title">
            <div class="container">

                <div class="breadcrumb-trail breadcrumb breadcrumbs">
                    <span class="trail-begin"><a href="http://demo.toko.press/eventica-tecpro" title="Eventica">Home</a></span>
                    <span class="sep">&#047;</span> <span class="trail-end"><a href="http://demo.toko.press/eventica-tecpro/events/" title="Events">Events</a></span>
                </div>					<h1>Events</h1>
            </div>
        </section>


        <div class="container ">


            <div id="tribe-events-bar">

                <form id="tribe-bar-form" class="tribe-clearfix" name="tribe-bar-form" method="post" action="http://demo.toko.press/eventica-tecpro/events?post_type=tribe_events&amp;eventDisplay=default">

                    <!-- Mobile Filters Toggle -->

                    <div id="tribe-bar-collapse-toggle">
                        Find Events<span class="tribe-bar-toggle-arrow"></span>
                    </div>

                    <!-- Views -->
                    <div id="tribe-bar-views">
                        <div class="tribe-bar-views-inner tribe-clearfix">
                            <h3 class="tribe-events-visuallyhidden">Event Views Navigation</h3>
                            <label>View As</label>
                            <select class="tribe-bar-views-select tribe-no-param" name="tribe-bar-view">
                                <option selected value="http://demo.toko.press/eventica-tecpro/events/list/" data-view="list">
                                    List
                                </option>
                                <option tribe-inactive value="http://demo.toko.press/eventica-tecpro/events/month/" data-view="month">
                                    Month
                                </option>
                                <option tribe-inactive value="http://demo.toko.press/eventica-tecpro/events/week/" data-view="week">
                                    Week
                                </option>
                                <option tribe-inactive value="http://demo.toko.press/eventica-tecpro/events/today/" data-view="day">
                                    Day
                                </option>
                                <option tribe-inactive value="http://demo.toko.press/eventica-tecpro/events/map/" data-view="map">
                                    Map
                                </option>
                                <option tribe-inactive value="http://demo.toko.press/eventica-tecpro/events/photo/" data-view="photo">
                                    Photo
                                </option>
                            </select>
                        </div>
                        <!-- .tribe-bar-views-inner -->
                    </div><!-- .tribe-bar-views -->

                    <div class="tribe-bar-filters">
                        <div class="tribe-bar-filters-inner tribe-clearfix">
                            <div class="tribe-bar-date-filter">
                                <label class="label-tribe-bar-date" for="tribe-bar-date">Events From</label>
                                <input type="text" name="tribe-bar-date" style="position: relative;" id="tribe-bar-date" value="" placeholder="Date">
                                <input type="hidden" name="tribe-bar-date-day" id="tribe-bar-date-day" class="tribe-no-param" value="">
                            </div>
                            <div class="tribe-bar-search-filter">
                                <label class="label-tribe-bar-search" for="tribe-bar-search">Search</label>
                                <input type="text" name="tribe-bar-search" id="tribe-bar-search" value="" placeholder="Search">
                            </div>
                            <div class="tribe-bar-geoloc-filter">
                                <label class="label-tribe-bar-geoloc" for="tribe-bar-geoloc">Near</label>
                                <input type="hidden" name="tribe-bar-geoloc-lat" id="tribe-bar-geoloc-lat" value="" /><input type="hidden" name="tribe-bar-geoloc-lng" id="tribe-bar-geoloc-lng" value="" /><input type="text" name="tribe-bar-geoloc" id="tribe-bar-geoloc" value="" placeholder="Location">
                            </div>
                            <div class="tribe-bar-submit">
                                <input class="tribe-events-button tribe-no-param" type="submit" name="submit-bar" value="Find Events" />
                            </div>
                            <!-- .tribe-bar-submit -->
                        </div>
                        <!-- .tribe-bar-filters-inner -->
                    </div><!-- .tribe-bar-filters -->

                </form>
                <!-- #tribe-bar-form -->

            </div><!-- #tribe-events-bar -->
        </div>


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
                                            <h2 class="tribe-events-page-title">Upcoming Events</h2>
                                        </div>

                                        <!-- Notices -->
                                        <!-- List Header -->
                                        <div id="tribe-events-header" data-title="Upcoming Events | Eventica" data-startofweek="1" data-view="list" data-baseurl="http://demo.toko.press/eventica-tecpro/events/list/">
                                            <!-- Header Navigation -->
                                        </div>
                                        <!-- #tribe-events-header -->
                                        <!-- Events Loop -->

                                        <div class="events-loop tribe-events-loop vcalendar">

                                            <div class="row">


                                                <!-- Month / Year Headers -->
                                                <span class='tribe-events-list-separator-month'><span>April 2015</span></span>
                                                <!-- Event  -->
                                                <div id="post-2053" class="hentry vevent type-tribe_events post-2053 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2054 tribe-events-first col-sm-6">


                                                    <div class="even-list-wrapper">
                                                        <div class="event-list-wrapper-top">
                                                            <div class="tribe-events-event-image">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-bratislava/" title="WordCamp Bratislava">
                                                                    <img width="400" height="200" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2012/01/eventica-dummy-image-23-400x200.jpg" class="attachment-blog-thumbnail wp-post-image" alt="Eventica Dummy Image 23" />
                                                                </a>
                                                            </div>

                                                            <div class="tribe-events-event-date">
                                                                <span class="dd">18</span>
                                                                <span class="mm">April</span>
                                                                <span class="yy">2015</span>
                                                            </div>
                                                        </div>

                                                        <div class="event-list-wrapper-bottom">
                                                            <div class="wraper-bottom-left">
                                                                <!-- Event Title -->
                                                                <h2 class="tribe-events-list-event-title entry-title summary">
                                                                    <a class="url" href="http://demo.toko.press/eventica-tecpro/event/wordcamp-bratislava/" title="WordCamp Bratislava" rel="bookmark">
                                                                        WordCamp Bratislava
                                                                    </a>
                                                                </h2>

                                                                <!-- Event Meta -->
                                                                <div class="tribe-events-event-meta vcard">
                                                                    <div class="author  location">

                                                                        <!-- Venue Display Info -->
                                                                        <div class="tribe-events-venue-details">
                                                                            <a href="http://demo.toko.press/eventica-tecpro/venue/bratislava/">Bratislava</a>
                                                                        </div> <!-- .tribe-events-venue-details -->

                                                                        <div class="time-details">
                                                                            8:00 am - 5:00 pm
                                                                        </div>

                                                                    </div>
                                                                </div><!-- .tribe-events-event-meta -->
                                                            </div>
                                                            <div class="wraper-bottom-right valign-wrapper">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-bratislava/" class="more-link valign">
                                                                    <i class="fa fa-ticket"></i>
                                                                    <br /><span class="cost">$47</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .hentry .vevent -->
                                                <!-- Month / Year Headers -->
                                                <!-- Event  -->
                                                <div id="post-2055" class="hentry vevent type-tribe_events post-2055 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2056 col-sm-6">


                                                    <div class="even-list-wrapper">
                                                        <div class="event-list-wrapper-top">
                                                            <div class="tribe-events-event-image">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-belgrade/" title="WordCamp Belgrade">
                                                                    <img width="400" height="200" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2012/03/eventica-dummy-image-29-400x200.jpg" class="attachment-blog-thumbnail wp-post-image" alt="Eventica Dummy Image 29" />
                                                                </a>
                                                            </div>

                                                            <div class="tribe-events-event-date">
                                                                <span class="dd">18</span>
                                                                <span class="mm">April</span>
                                                                <span class="yy">2015</span>
                                                            </div>
                                                        </div>

                                                        <div class="event-list-wrapper-bottom">
                                                            <div class="wraper-bottom-left">
                                                                <!-- Event Title -->
                                                                <h2 class="tribe-events-list-event-title entry-title summary">
                                                                    <a class="url" href="http://demo.toko.press/eventica-tecpro/event/wordcamp-belgrade/" title="WordCamp Belgrade" rel="bookmark">
                                                                        WordCamp Belgrade
                                                                    </a>
                                                                </h2>

                                                                <!-- Event Meta -->
                                                                <div class="tribe-events-event-meta vcard">
                                                                    <div class="author  location">

                                                                        <!-- Venue Display Info -->
                                                                        <div class="tribe-events-venue-details">
                                                                            <a href="http://demo.toko.press/eventica-tecpro/venue/belgrade/">Belgrade</a>
                                                                        </div> <!-- .tribe-events-venue-details -->

                                                                        <div class="time-details">
                                                                            1 day
                                                                        </div>

                                                                    </div>
                                                                </div><!-- .tribe-events-event-meta -->
                                                            </div>
                                                            <div class="wraper-bottom-right valign-wrapper">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-belgrade/" class="more-link valign">
                                                                    <i class="fa fa-ticket"></i>
                                                                    <br /><span class="cost">$47</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .hentry .vevent -->
                                                <!-- Month / Year Headers -->
                                                <!-- Event  -->
                                                <div id="post-2057" class="hentry vevent type-tribe_events post-2057 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2058 col-sm-6">


                                                    <div class="even-list-wrapper">
                                                        <div class="event-list-wrapper-top">
                                                            <div class="tribe-events-event-image">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-minneapolis/" title="WordCamp Minneapolis">
                                                                    <img width="400" height="200" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2013/01/eventica-dummy-image-31-400x200.jpg" class="attachment-blog-thumbnail wp-post-image" alt="Eventica Dummy Image 31" />
                                                                </a>
                                                            </div>

                                                            <div class="tribe-events-event-date">
                                                                <span class="dd">25</span>
                                                                <span class="mm">April</span>
                                                                <span class="yy">2015</span>
                                                            </div>
                                                        </div>

                                                        <div class="event-list-wrapper-bottom">
                                                            <div class="wraper-bottom-left">
                                                                <!-- Event Title -->
                                                                <h2 class="tribe-events-list-event-title entry-title summary">
                                                                    <a class="url" href="http://demo.toko.press/eventica-tecpro/event/wordcamp-minneapolis/" title="WordCamp Minneapolis" rel="bookmark">
                                                                        WordCamp Minneapolis
                                                                    </a>
                                                                </h2>

                                                                <!-- Event Meta -->
                                                                <div class="tribe-events-event-meta vcard">
                                                                    <div class="author  location">

                                                                        <!-- Venue Display Info -->
                                                                        <div class="tribe-events-venue-details">
                                                                            <a href="http://demo.toko.press/eventica-tecpro/venue/minneapolis/">Minneapolis</a>
                                                                        </div> <!-- .tribe-events-venue-details -->

                                                                        <div class="time-details">
                                                                            1 day
                                                                        </div>

                                                                    </div>
                                                                </div><!-- .tribe-events-event-meta -->
                                                            </div>
                                                            <div class="wraper-bottom-right valign-wrapper">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-minneapolis/" class="more-link valign">
                                                                    <i class="fa fa-ticket"></i>
                                                                    <br /><span class="cost">$47</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .hentry .vevent -->
                                                <!-- Month / Year Headers -->
                                                <span class='tribe-events-list-separator-month'><span>June 2015</span></span>
                                                <!-- Event  -->
                                                <div id="post-2059" class="hentry vevent type-tribe_events post-2059 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2060 col-sm-6">


                                                    <div class="even-list-wrapper">
                                                        <div class="event-list-wrapper-top">
                                                            <div class="tribe-events-event-image">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-lyon/" title="WordCamp Lyon">
                                                                    <img width="400" height="200" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2012/03/eventica-dummy-image-28-400x200.jpg" class="attachment-blog-thumbnail wp-post-image" alt="Eventica Dummy Image 28" />
                                                                </a>
                                                            </div>

                                                            <div class="tribe-events-event-date">
                                                                <span class="dd">05</span>
                                                                <span class="mm">June</span>
                                                                <span class="yy">2015</span>
                                                            </div>
                                                        </div>

                                                        <div class="event-list-wrapper-bottom">
                                                            <div class="wraper-bottom-left">
                                                                <!-- Event Title -->
                                                                <h2 class="tribe-events-list-event-title entry-title summary">
                                                                    <a class="url" href="http://demo.toko.press/eventica-tecpro/event/wordcamp-lyon/" title="WordCamp Lyon" rel="bookmark">
                                                                        WordCamp Lyon
                                                                    </a>
                                                                </h2>

                                                                <!-- Event Meta -->
                                                                <div class="tribe-events-event-meta vcard">
                                                                    <div class="author  location">

                                                                        <!-- Venue Display Info -->
                                                                        <div class="tribe-events-venue-details">
                                                                            <a href="http://demo.toko.press/eventica-tecpro/venue/lyon/">Lyon</a>
                                                                        </div> <!-- .tribe-events-venue-details -->

                                                                        <div class="time-details">
                                                                            8:00 am - 5:00 pm
                                                                        </div>

                                                                    </div>
                                                                </div><!-- .tribe-events-event-meta -->
                                                            </div>
                                                            <div class="wraper-bottom-right valign-wrapper">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-lyon/" class="more-link valign">
                                                                    <i class="fa fa-ticket"></i>
                                                                    <br /><span class="cost">$47</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .hentry .vevent -->
                                                <!-- Month / Year Headers -->
                                                <!-- Event  -->
                                                <div id="post-2061" class="hentry vevent type-tribe_events post-2061 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2062 tribe-events-organizer-2080 col-sm-6">


                                                    <div class="even-list-wrapper">
                                                        <div class="event-list-wrapper-top">
                                                            <div class="tribe-events-event-image">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-cologne/" title="WordCamp Cologne">
                                                                    <img width="400" height="200" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2009/07/eventica-dummy-image-11-400x200.jpg" class="attachment-blog-thumbnail wp-post-image" alt="Eventica Dummy Image 11" />
                                                                </a>
                                                            </div>

                                                            <div class="tribe-events-event-date">
                                                                <span class="dd">06</span>
                                                                <span class="mm">June</span>
                                                                <span class="yy">2015</span>
                                                            </div>
                                                        </div>

                                                        <div class="event-list-wrapper-bottom">
                                                            <div class="wraper-bottom-left">
                                                                <!-- Event Title -->
                                                                <h2 class="tribe-events-list-event-title entry-title summary">
                                                                    <a class="url" href="http://demo.toko.press/eventica-tecpro/event/wordcamp-cologne/" title="WordCamp Cologne" rel="bookmark">
                                                                        WordCamp Cologne
                                                                    </a>
                                                                </h2>

                                                                <!-- Event Meta -->
                                                                <div class="tribe-events-event-meta vcard">
                                                                    <div class="author  location">

                                                                        <!-- Venue Display Info -->
                                                                        <div class="tribe-events-venue-details">
                                                                            <a href="http://demo.toko.press/eventica-tecpro/venue/cologne/">Cologne</a>
                                                                        </div> <!-- .tribe-events-venue-details -->

                                                                        <div class="time-details">
                                                                            1 day
                                                                        </div>

                                                                    </div>
                                                                </div><!-- .tribe-events-event-meta -->
                                                            </div>
                                                            <div class="wraper-bottom-right valign-wrapper">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-cologne/" class="more-link valign">
                                                                    <i class="fa fa-ticket"></i>
                                                                    <br /><span class="cost">$47</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .hentry .vevent -->
                                                <!-- Month / Year Headers -->
                                                <!-- Event  -->
                                                <div id="post-2063" class="hentry vevent type-tribe_events post-2063 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2064 tribe-events-last col-sm-6">


                                                    <div class="even-list-wrapper">
                                                        <div class="event-list-wrapper-top">
                                                            <div class="tribe-events-event-image">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-orange-county/" title="WordCamp Orange County">
                                                                    <img width="400" height="200" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2015/01/eventica-dummy-image-04-400x200.jpg" class="attachment-blog-thumbnail wp-post-image" alt="Eventica Dummy Image 04" />
                                                                </a>
                                                            </div>

                                                            <div class="tribe-events-event-date">
                                                                <span class="dd">06</span>
                                                                <span class="mm">June</span>
                                                                <span class="yy">2015</span>
                                                            </div>
                                                        </div>

                                                        <div class="event-list-wrapper-bottom">
                                                            <div class="wraper-bottom-left">
                                                                <!-- Event Title -->
                                                                <h2 class="tribe-events-list-event-title entry-title summary">
                                                                    <a class="url" href="http://demo.toko.press/eventica-tecpro/event/wordcamp-orange-county/" title="WordCamp Orange County" rel="bookmark">
                                                                        WordCamp Orange County
                                                                    </a>
                                                                </h2>

                                                                <!-- Event Meta -->
                                                                <div class="tribe-events-event-meta vcard">
                                                                    <div class="author  location">

                                                                        <!-- Venue Display Info -->
                                                                        <div class="tribe-events-venue-details">
                                                                            <a href="http://demo.toko.press/eventica-tecpro/venue/orange-county/">Orange County</a>
                                                                        </div> <!-- .tribe-events-venue-details -->

                                                                        <div class="time-details">
                                                                            1 day
                                                                        </div>

                                                                    </div>
                                                                </div><!-- .tribe-events-event-meta -->
                                                            </div>
                                                            <div class="wraper-bottom-right valign-wrapper">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-orange-county/" class="more-link valign">
                                                                    <i class="fa fa-ticket"></i>
                                                                    <br /><span class="cost">$47</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .hentry .vevent -->



                                            </div>

                                        </div><!-- .tribe-events-loop -->
                                        <!-- List Footer -->
                                        <div id="tribe-events-footer">

                                            <!-- Footer Navigation -->

                                            <div class="tribe-events-pagination pagination clearfix">
                                                <h3 class="tribe-events-visuallyhidden">Events List Navigation</h3>
                                                <ul class="tribe-events-sub-nav">
                                                    <!-- Left Navigation -->

                                                    <li class="prev page-numbers tribe-events-nav-previous tribe-events-nav-left tribe-events-past">
                                                        <a href="http://demo.toko.press/eventica-tecpro/events/list/" rel="prev">Previous Events</a>
                                                    </li><!-- .tribe-events-nav-left -->
                                                    <!-- Right Navigation -->
                                                    <li class="next page-numbers tribe-events-nav-next tribe-events-nav-right">
                                                        <a href="http://demo.toko.press/eventica-tecpro/events/list/" rel="next">Next Events</a>
                                                    </li><!-- .tribe-events-nav-right -->
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- #tribe-events-footer -->
                                        <a class="tribe-events-ical tribe-events-button" title="Use this to share calendar data with Google Calendar, Apple iCal and other compatible apps" href="http://demo.toko.press/eventica-tecpro/events/?ical=1">+ Export Listed Events</a>
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
                        <div id="sidebar">

                            <section id="tribe-mini-calendar-3" class="widget tribe_mini_calendar_widget">
                                <div class="widget-inner">
                                    <h3 class="widget-title">Events Calendar</h3>

                                    <!-- Removing this wrapper class will break the claendar javascript, please avoid and extend as needed -->

                                    <div class="tribe-mini-calendar-wrapper">

                                        <!-- Grid -->

                                        <div class="tribe-mini-calendar-grid-wrapper">
                                            <table class="tribe-mini-calendar" data-count="5" data-eventdate="2015-04-01" data-tax-query="" data-nonce="be58955e03">
                                                <thead class="tribe-mini-calendar-nav">
                                                    <tr>
                                                        <td colspan="7">
                                                            <div>
                                                                <a class="tribe-mini-calendar-nav-link prev-month" href="#" data-month="2015-03-01" title="March"><span>&laquo;</span></a>					<span id="tribe-mini-calendar-month">Apr 2015</span>
                                                                <a class="tribe-mini-calendar-nav-link next-month" href="#" data-month="2015-05-01" title="May"><span>&raquo;</span></a>					<img id="ajax-loading-mini" src="http://demo.toko.press/eventica-tecpro/wp-content/plugins/the-events-calendar/resources/images/tribe-loading.gif" alt="loading..." />
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <thead>
                                                    <tr>
                                                        <th class="tribe-mini-calendar-dayofweek">Mon</th>
                                                        <th class="tribe-mini-calendar-dayofweek">Tue</th>
                                                        <th class="tribe-mini-calendar-dayofweek">Wed</th>
                                                        <th class="tribe-mini-calendar-dayofweek">Thu</th>
                                                        <th class="tribe-mini-calendar-dayofweek">Fri</th>
                                                        <th class="tribe-mini-calendar-dayofweek">Sat</th>
                                                        <th class="tribe-mini-calendar-dayofweek">Sun</th>

                                                    </tr>
                                                </thead>


                                                <tbody class="hfeed vcalendar">

                                                    <tr>
                                                        <td class="tribe-events-othermonth tribe-events-past mobile-trigger tribe-event-day-30">



                                                            <div id="daynum-30">
                                                                <span class="tribe-mini-calendar-no-event">30</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-othermonth tribe-events-past mobile-trigger tribe-event-day-31">



                                                            <div id="daynum-31">
                                                                <span class="tribe-mini-calendar-no-event">31</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-event-day-01">



                                                            <div id="daynum-1">
                                                                <span class="tribe-mini-calendar-no-event">1</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-event-day-02">



                                                            <div id="daynum-2">
                                                                <span class="tribe-mini-calendar-no-event">2</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-event-day-03 tribe-events-right">



                                                            <div id="daynum-3">
                                                                <span class="tribe-mini-calendar-no-event">3</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-event-day-04 tribe-events-right">



                                                            <div id="daynum-4">
                                                                <span class="tribe-mini-calendar-no-event">4</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-event-day-05 tribe-events-right">



                                                            <div id="daynum-5">
                                                                <span class="tribe-mini-calendar-no-event">5</span>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-event-day-06">



                                                            <div id="daynum-6">
                                                                <span class="tribe-mini-calendar-no-event">6</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-event-day-07">



                                                            <div id="daynum-7">
                                                                <span class="tribe-mini-calendar-no-event">7</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-event-day-08">



                                                            <div id="daynum-8">
                                                                <span class="tribe-mini-calendar-no-event">8</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-event-day-09">



                                                            <div id="daynum-9">
                                                                <span class="tribe-mini-calendar-no-event">9</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-event-day-10 tribe-events-right">



                                                            <div id="daynum-10">
                                                                <span class="tribe-mini-calendar-no-event">10</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past tribe-events-has-events mobile-trigger tribe-event-day-11 tribe-events-right">



                                                            <div id="daynum-11">
                                                                <a href="#" data-day="2015-04-11" class="tribe-mini-calendar-day-link">11</a>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-event-day-12 tribe-events-right">



                                                            <div id="daynum-12">
                                                                <span class="tribe-mini-calendar-no-event">12</span>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tribe-events-thismonth tribe-events-past mobile-trigger tribe-event-day-13">



                                                            <div id="daynum-13">
                                                                <span class="tribe-mini-calendar-no-event">13</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-present mobile-trigger tribe-event-day-14">



                                                            <div id="daynum-14">
                                                                <span class="tribe-mini-calendar-no-event">14</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-event-day-15">



                                                            <div id="daynum-15">
                                                                <span class="tribe-mini-calendar-no-event">15</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-event-day-16">



                                                            <div id="daynum-16">
                                                                <span class="tribe-mini-calendar-no-event">16</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-event-day-17 tribe-events-right">



                                                            <div id="daynum-17">
                                                                <span class="tribe-mini-calendar-no-event">17</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future tribe-events-has-events mobile-trigger tribe-event-day-18 tribe-events-right">



                                                            <div id="daynum-18">
                                                                <a href="#" data-day="2015-04-18" class="tribe-mini-calendar-day-link">18</a>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future tribe-events-has-events mobile-trigger tribe-event-day-19 tribe-events-right">



                                                            <div id="daynum-19">
                                                                <a href="#" data-day="2015-04-19" class="tribe-mini-calendar-day-link">19</a>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-event-day-20">



                                                            <div id="daynum-20">
                                                                <span class="tribe-mini-calendar-no-event">20</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-event-day-21">



                                                            <div id="daynum-21">
                                                                <span class="tribe-mini-calendar-no-event">21</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-event-day-22">



                                                            <div id="daynum-22">
                                                                <span class="tribe-mini-calendar-no-event">22</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-event-day-23">



                                                            <div id="daynum-23">
                                                                <span class="tribe-mini-calendar-no-event">23</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-event-day-24 tribe-events-right">



                                                            <div id="daynum-24">
                                                                <span class="tribe-mini-calendar-no-event">24</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future tribe-events-has-events mobile-trigger tribe-event-day-25 tribe-events-right">



                                                            <div id="daynum-25">
                                                                <a href="#" data-day="2015-04-25" class="tribe-mini-calendar-day-link">25</a>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future tribe-events-has-events mobile-trigger tribe-event-day-26 tribe-events-right">



                                                            <div id="daynum-26">
                                                                <a href="#" data-day="2015-04-26" class="tribe-mini-calendar-day-link">26</a>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-event-day-27">



                                                            <div id="daynum-27">
                                                                <span class="tribe-mini-calendar-no-event">27</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-event-day-28">



                                                            <div id="daynum-28">
                                                                <span class="tribe-mini-calendar-no-event">28</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-event-day-29">



                                                            <div id="daynum-29">
                                                                <span class="tribe-mini-calendar-no-event">29</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-thismonth tribe-events-future mobile-trigger tribe-event-day-30">



                                                            <div id="daynum-30">
                                                                <span class="tribe-mini-calendar-no-event">30</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-othermonth tribe-events-future mobile-trigger tribe-event-day-01 tribe-events-right">



                                                            <div id="daynum-1">
                                                                <span class="tribe-mini-calendar-no-event">1</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-othermonth tribe-events-future mobile-trigger tribe-event-day-02 tribe-events-right">



                                                            <div id="daynum-2">
                                                                <span class="tribe-mini-calendar-no-event">2</span>
                                                            </div>

                                                        </td>
                                                        <td class="tribe-events-othermonth tribe-events-future mobile-trigger tribe-event-day-03 tribe-events-right">



                                                            <div id="daynum-3">
                                                                <span class="tribe-mini-calendar-no-event">3</span>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> <!-- .tribe-mini-calendar-grid-wrapper -->
                                        <!-- List -->

                                        <div class="tribe-mini-calendar-list-wrapper">
                                            <div class="tribe-events-loop hfeed vcalendar">


                                                <!-- Event  -->
                                                <div class="hentry vevent type-tribe_events post-2053 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2054 tribe-events-first">

                                                    <div class="tribe-mini-calendar-event event-0">
                                                        <div class="list-date">
                                                            <span class="list-dayname">Sat</span>
                                                            <span class="list-daynumber">18</span>
                                                        </div>

                                                        <div class="list-info">

                                                            <h2 class="entry-title summary">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-bratislava/" rel="bookmark">WordCamp Bratislava</a>
                                                            </h2>



                                                            <div class="duration">
                                                                <span class="date-start dtstart">April 18 @ 8:00 am<span class="value-title" title="2015-04-18UTC08:00"></span></span> - <span class="end-time dtend">5:00 pm<span class="value-title" title="2015-04-18UTC05:00"></span></span>
                                                            </div>


                                                            <div class="vcard adr location">









                                                            </div> <!-- .vcard.adr.location -->


                                                        </div> <!-- .list-info -->
                                                    </div>
                                                </div><!-- .hentry .vevent -->
                                                <!-- Event  -->
                                                <div class="hentry vevent type-tribe_events post-2055 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2056">

                                                    <div class="tribe-mini-calendar-event event-1 first ">
                                                        <div class="list-date">
                                                            <span class="list-dayname">Sat</span>
                                                            <span class="list-daynumber">18</span>
                                                        </div>

                                                        <div class="list-info">

                                                            <h2 class="entry-title summary">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-belgrade/" rel="bookmark">WordCamp Belgrade</a>
                                                            </h2>



                                                            <div class="duration">
                                                                <span class="date-start dtstart">April 18 @ 8:00 am<span class="value-title" title="2015-04-18UTC08:00"></span></span> - <span class="date-end dtend">April 19 @ 5:00 pm<span class="value-title" title="2015-04-19UTC05:00"></span></span>
                                                            </div>


                                                            <div class="vcard adr location">









                                                            </div> <!-- .vcard.adr.location -->


                                                        </div> <!-- .list-info -->
                                                    </div>
                                                </div><!-- .hentry .vevent -->
                                                <!-- Event  -->
                                                <div class="hentry vevent type-tribe_events post-2057 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2058 tribe-events-last">

                                                    <div class="tribe-mini-calendar-event event-2 last ">
                                                        <div class="list-date">
                                                            <span class="list-dayname">Sat</span>
                                                            <span class="list-daynumber">25</span>
                                                        </div>

                                                        <div class="list-info">

                                                            <h2 class="entry-title summary">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-minneapolis/" rel="bookmark">WordCamp Minneapolis</a>
                                                            </h2>



                                                            <div class="duration">
                                                                <span class="date-start dtstart">April 25 @ 8:00 am<span class="value-title" title="2015-04-25UTC08:00"></span></span> - <span class="date-end dtend">April 26 @ 5:00 pm<span class="value-title" title="2015-04-26UTC05:00"></span></span>
                                                            </div>


                                                            <div class="vcard adr location">









                                                            </div> <!-- .vcard.adr.location -->


                                                        </div> <!-- .list-info -->
                                                    </div>
                                                </div><!-- .hentry .vevent -->


                                            </div><!-- .tribe-events-loop -->
                                        </div> <!-- .tribe-mini-calendar-list-wrapper -->
                                    </div>
                                </div>
                            </section><section id="tribe-events-countdown-widget-3" class="widget tribe-events-countdown-widget">
                                <div class="widget-inner">
                                    <h3 class="widget-title">WordCamp Europe</h3>
                                    <div class="tribe-countdown-text"><a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-europe/">WordCamp Europe</a></div>
                                    <div class="tribe-countdown-timer">
                                        <span class="tribe-countdown-seconds">6323223</span>
                                        <span class="tribe-countdown-format">
                                            <div class="tribe-countdown-timer tribe-clearfix">
                                                <div class="tribe-countdown-days tribe-countdown-number">
                                                    DD<br />
                                                    <span class="tribe-countdown-under">days</span>
                                                </div>
                                                <div class="tribe-countdown-colon">:</div>
                                                <div class="tribe-countdown-hours tribe-countdown-number">
                                                    HH<br />
                                                    <span class="tribe-countdown-under">hours</span>
                                                </div>
                                                <div class="tribe-countdown-colon">:</div>
                                                <div class="tribe-countdown-minutes tribe-countdown-number">
                                                    MM<br />
                                                    <span class="tribe-countdown-under">min</span>
                                                </div>
                                                <div class="tribe-countdown-colon">:</div>
                                                <div class="tribe-countdown-seconds tribe-countdown-number tribe-countdown-right">
                                                    SS<br />
                                                    <span class="tribe-countdown-under">sec</span>
                                                </div>
                                            </div>


                                        </span>
                                        <h3 class="tribe-countdown-complete">Hooray!</h3>
                                    </div>
                                </div>
                            </section>		<section id="tokopress-recent-posts-4" class="widget widget_recent_posts">
                                <div class="widget-inner">
                                    <h3 class="widget-title">Recent Posts</h3>		<ul>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/how-to-live-life-free-of-stress-an-interview-with-joe-dimaggio/" title="">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2013/01/eventica-dummy-image-33-150x150.jpg" class="attachment-thumbnail wp-post-image" alt="Eventica Dummy Image 33" />
                                            </a>
                                            <a class="tp-entry-title" href="http://demo.toko.press/eventica-tecpro/how-to-live-life-free-of-stress-an-interview-with-joe-dimaggio/">How To Live Life Free Of Stress An Interview With Joe Dimaggio</a>
                                            <span class="tp-entry-date">January 11, 2013</span>
                                        </li>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/exciting-multi-activity-corporate-events-in-oxfordshire/" title="">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2013/01/eventica-dummy-image-32-150x150.jpg" class="attachment-thumbnail wp-post-image" alt="Eventica Dummy Image 32" />
                                            </a>
                                            <a class="tp-entry-title" href="http://demo.toko.press/eventica-tecpro/exciting-multi-activity-corporate-events-in-oxfordshire/">Exciting Multi Activity Corporate Events In Oxfordshire</a>
                                            <span class="tp-entry-date">January 10, 2013</span>
                                        </li>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/arizona-the-host-of-great-events/" title="">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2013/01/eventica-dummy-image-31-150x150.jpg" class="attachment-thumbnail wp-post-image" alt="Eventica Dummy Image 31" />
                                            </a>
                                            <a class="tp-entry-title" href="http://demo.toko.press/eventica-tecpro/arizona-the-host-of-great-events/">Arizona The Host Of Great Events</a>
                                            <span class="tp-entry-date">January 9, 2013</span>
                                        </li>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/great-british-sporting-events/" title="">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2013/01/eventica-dummy-image-30-150x150.jpg" class="attachment-thumbnail wp-post-image" alt="Eventica Dummy Image 30" />
                                            </a>
                                            <a class="tp-entry-title" href="http://demo.toko.press/eventica-tecpro/great-british-sporting-events/">Great British Sporting Events</a>
                                            <span class="tp-entry-date">January 5, 2013</span>
                                        </li>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/special-relativity-lite-simplified-version/" title="">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2013/01/eventica-dummy-image-12-150x150.jpg" class="attachment-thumbnail wp-post-image" alt="Eventica Dummy Image 12" />
                                            </a>
                                            <a class="tp-entry-title" href="http://demo.toko.press/eventica-tecpro/special-relativity-lite-simplified-version/">Special Relativity Lite Simplified Version</a>
                                            <span class="tp-entry-date">January 5, 2013</span>
                                        </li>
                                    </ul>
                                </div>
                            </section>		<section id="woocommerce_products-7" class="widget woocommerce widget_products">
                                <div class="widget-inner">
                                    <h3 class="widget-title">Recent Products</h3><ul class="product_list_widget">
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/shop/everlast-pro-style-training-gloves/" title="Everlast Pro Style Training Gloves">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2013/06/eventica-dummy-image-57-150x150.jpg" class="attachment-shop_thumbnail wp-post-image" alt="Eventica Dummy Image 57" />		<span class="product-title">Everlast Pro Style Training Gloves</span>
                                            </a>
                                            <del><span class="amount">&#36;3.00</span></del> <ins><span class="amount">&#36;2.00</span></ins>
                                        </li>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/shop/wilson-a360-series-13-slowpitch-softball-glove/" title="Wilson A360 Series 13&quot; Slowpitch Softball Glove">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2013/06/eventica-dummy-image-56-150x150.jpg" class="attachment-shop_thumbnail wp-post-image" alt="Eventica Dummy Image 56" />		<span class="product-title">Wilson A360 Series 13" Slowpitch Softball Glove</span>
                                            </a>
                                            <span class="amount">&#36;9.00</span>
                                        </li>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/shop/mizuno-prospect-youth-fastpitch-softball-glove/" title="Mizuno Prospect Youth Fastpitch Softball Glove ">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2013/06/eventica-dummy-image-55-150x150.jpg" class="attachment-shop_thumbnail wp-post-image" alt="Eventica Dummy Image 55" />		<span class="product-title">Mizuno Prospect Youth Fastpitch Softball Glove </span>
                                            </a>
                                            <span class="amount">&#36;2.00</span>&ndash;<span class="amount">&#36;4.00</span>
                                        </li>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/shop/running-shoe/" title="Running Shoe">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2013/06/eventica-dummy-image-54-150x150.jpg" class="attachment-shop_thumbnail wp-post-image" alt="Eventica Dummy Image 54" />		<span class="product-title">Running Shoe</span>
                                            </a>
                                            <span class="amount">&#36;9.00</span>
                                        </li>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/shop/nike-mens-soccer-shoes/" title="Nike Men&#039;s Soccer Shoes">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2013/06/eventica-dummy-image-53-150x150.jpg" class="attachment-shop_thumbnail wp-post-image" alt="Eventica Dummy Image 53" />		<span class="product-title">Nike Men's Soccer Shoes</span>
                                            </a>
                                            <span class="amount">&#36;9.00</span>
                                        </li>
                                    </ul>
                                </div>
                            </section>		<section id="tokopress-upcoming-events-4" class="widget widget_upcoming_events">
                                <div class="widget-inner">
                                    <h3 class="widget-title">Upcoming Events</h3>		<ul>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-bratislava/" title="">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2012/01/eventica-dummy-image-23-150x150.jpg" class="attachment-thumbnail wp-post-image" alt="Eventica Dummy Image 23" />
                                            </a>
                                            <a class="tp-entry-title" href="http://demo.toko.press/eventica-tecpro/event/wordcamp-bratislava/">WordCamp Bratislava</a>
                                            <span class="tp-entry-date"><span class="date-start dtstart">April 18 @ 8:00 am<span class="value-title" title="2015-04-18UTC08:00"></span></span> - <span class="end-time dtend">5:00 pm<span class="value-title" title="2015-04-18UTC05:00"></span></span></span>
                                        </li>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-belgrade/" title="">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2012/03/eventica-dummy-image-29-150x150.jpg" class="attachment-thumbnail wp-post-image" alt="Eventica Dummy Image 29" />
                                            </a>
                                            <a class="tp-entry-title" href="http://demo.toko.press/eventica-tecpro/event/wordcamp-belgrade/">WordCamp Belgrade</a>
                                            <span class="tp-entry-date"><span class="date-start dtstart">April 18 @ 8:00 am<span class="value-title" title="2015-04-18UTC08:00"></span></span> - <span class="date-end dtend">April 19 @ 5:00 pm<span class="value-title" title="2015-04-19UTC05:00"></span></span></span>
                                        </li>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-minneapolis/" title="">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2013/01/eventica-dummy-image-31-150x150.jpg" class="attachment-thumbnail wp-post-image" alt="Eventica Dummy Image 31" />
                                            </a>
                                            <a class="tp-entry-title" href="http://demo.toko.press/eventica-tecpro/event/wordcamp-minneapolis/">WordCamp Minneapolis</a>
                                            <span class="tp-entry-date"><span class="date-start dtstart">April 25 @ 8:00 am<span class="value-title" title="2015-04-25UTC08:00"></span></span> - <span class="date-end dtend">April 26 @ 5:00 pm<span class="value-title" title="2015-04-26UTC05:00"></span></span></span>
                                        </li>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-lyon/" title="">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2012/03/eventica-dummy-image-28-150x150.jpg" class="attachment-thumbnail wp-post-image" alt="Eventica Dummy Image 28" />
                                            </a>
                                            <a class="tp-entry-title" href="http://demo.toko.press/eventica-tecpro/event/wordcamp-lyon/">WordCamp Lyon</a>
                                            <span class="tp-entry-date"><span class="date-start dtstart">June 5 @ 8:00 am<span class="value-title" title="2015-06-05UTC08:00"></span></span> - <span class="end-time dtend">5:00 pm<span class="value-title" title="2015-06-05UTC05:00"></span></span></span>
                                        </li>
                                        <li>
                                            <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-cologne/" title="">
                                                <img width="150" height="150" src="http://demo.toko.press/eventica-tecpro/wp-content/uploads/2009/07/eventica-dummy-image-11-150x150.jpg" class="attachment-thumbnail wp-post-image" alt="Eventica Dummy Image 11" />
                                            </a>
                                            <a class="tp-entry-title" href="http://demo.toko.press/eventica-tecpro/event/wordcamp-cologne/">WordCamp Cologne</a>
                                            <span class="tp-entry-date"><span class="date-start dtstart">June 6 @ 8:00 am<span class="value-title" title="2015-06-06UTC08:00"></span></span> - <span class="date-end dtend">June 7 @ 5:00 pm<span class="value-title" title="2015-06-07UTC05:00"></span></span></span>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div><!-- ./ sidebar -->
                </div>
            </div>

        </div>
        </div>

<?php get_footer('events');?>