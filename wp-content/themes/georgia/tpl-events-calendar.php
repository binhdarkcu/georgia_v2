<div class="responsive-calendar" id="calendar-page">

    <div class="day-headers">
        <div class="day header">maandag</div>
        <div class="day header">dinsdag</div>
        <div class="day header">woensdag</div>
        <div class="day header">donderdag</div>
        <div class="day header">vrijdag</div>
        <div class="day header">zaterdag</div>
        <div class="day header">zondag</div>
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
    $(document).ready(function () {
        calendar_page.init(calendar_events,pageurl);
    });
</script>
