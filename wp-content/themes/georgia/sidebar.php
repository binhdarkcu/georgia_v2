<div id="sidebar">

                            <section id="tribe-mini-calendar-3" class="widget tribe_mini_calendar_widget">
                                <div class="widget-inner">
                                    <h3 class="widget-title">Events Calendar</h3>

                                    <!-- Removing this wrapper class will break the claendar javascript, please avoid and extend as needed -->

                                    <div class="tribe-mini-calendar-wrapper">

                                        <!-- Grid -->

                                        <div class="tribe-mini-calendar-grid-wrapper" >
                                        <div class="responsive-calendar">
                                            <div class="controls">
                                                <a class="pull-left" data-go="prev"><div class="btn btn-primary">«</div></a>
                                                <h4><span data-head-year></span> <span data-head-month></span></h4>
                                                <a class="pull-right" data-go="next"><div class="btn btn-primary">»</div></a>
                                            </div><hr/>
                                            <div class="day-headers">
                                                <div class="day header">Mon</div>
                                                <div class="day header">Tue</div>
                                                <div class="day header">Wed</div>
                                                <div class="day header">Thu</div>
                                                <div class="day header">Fri</div>
                                                <div class="day header">Sat</div>
                                                <div class="day header">Sun</div>
                                            </div>
                                            <div class="days" data-group="days">

                                            </div>
                                        </div>

                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                var events = {
                                                    <?PHP
                                                        $argevent = array(
                                                            'post_type'      => 'post',
                                                            'posts_per_page' => -1
                                                        );
                                                    $event_query = query_posts( $argevent );
                                                    if(have_posts($event_query->$post)): while(have_posts($event_query->$post)): the_post($event_query->$post);
                                                    $datetime = get_field('datetime', get_the_ID());
                                                    $date = DateTime::createFromFormat( 'dmY', $datetime , new DateTimeZone( 'Europe/Amsterdam' ));
                                                    $day = $date->format('j');
                                                    $year = $date->format('Y');
                                                    $month = $date->format( 'm' );

                                                    ?>
                                                    "<?php echo $year.'-'.$month.'-'.$day ?>":{},
                                                    <?php endwhile; endif;?>

                                                }
                                                var url = '<?php echo get_bloginfo('url')?>';
                                                calendar_events.init(events,url);

                                            });
                                        </script>

                                        </div> <!-- .tribe-mini-calendar-grid-wrapper -->
                                        <!-- List -->

                                        <div class="tribe-mini-calendar-list-wrapper">
                                            <div class="tribe-events-loop hfeed vcalendar" id="sidebar-events-loop">


                                                <!-- Event  -->
                                                <div class="hentry vevent type-tribe_events post-2055 tribe-clearfix tribe-events-category-wordcamp tribe-events-venue-2056">

                                                    <div class="tribe-mini-calendar-event event-1 first ">
                                                        <div class="list-date">
                                                            <span class="list-dayname">FRI</span>
                                                            <span class="list-daynumber">20</span>
                                                        </div>

                                                        <div class="list-info">

                                                            <h2 class="entry-title summary">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-belgrade/" rel="bookmark">Event name here</a>
                                                            </h2>



                                                            <div class="duration">
                                                                <span class="date-start dtstart">Maart 20 @ 8:00 am<span class="value-title" title="2015-04-18UTC08:00"></span></span> - <span class="date-end dtend">Maart 20 @ 5:00 pm<span class="value-title" title="2015-04-19UTC05:00"></span></span>
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
                                                            <span class="list-dayname">FRI</span>
                                                            <span class="list-daynumber">20</span>
                                                        </div>

                                                        <div class="list-info">

                                                            <h2 class="entry-title summary">
                                                                <a href="http://demo.toko.press/eventica-tecpro/event/wordcamp-belgrade/" rel="bookmark">Event name here</a>
                                                            </h2>



                                                            <div class="duration">
                                                                <span class="date-start dtstart">Maart 20 @ 8:00 am<span class="value-title" title="2015-04-18UTC08:00"></span></span> - <span class="date-end dtend">Maart 20 @ 5:00 pm<span class="value-title" title="2015-04-19UTC05:00"></span></span>
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
                            </section>
                            
                        </div>