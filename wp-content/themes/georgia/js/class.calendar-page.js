var calendar_page = (function() {
    // PARAMATERS
    var setting = {
        url : ''
    }

    // INIT
    function init(objEvents, url){
        setting.url = url;
        initEvents();
        build (objEvents);
    }

    function initEvents(){
        $(window).resize(function(e) {
            calendar_page.calHeight()
        });

        $(".event-child").hover(function () {

            },
            function () {

            });

        $(document).on({
            mouseenter: function () {
                $(this).find('.tribe-events-tooltip').css('display','block');
            },
            mouseleave: function () {
                $(this).find('.tribe-events-tooltip').css('display','none');
            }
        }, ".event-child"); //pass the element as an argument to .on

    }

    //BUILD
    function build (objEvents){
        var todaydate=new Date()
        var curmonth=todaydate.getMonth()+1 //get current month (1-12)
        var curyear=todaydate.getFullYear() //get current year

        $("#calendar-page").responsiveCalendar({
            time: curyear + '-' + curmonth,
            events: objEvents
        });
    }

    //FUNCTION
    function calHeight(){
        $('#calendar-page .days .day').height('auto');
        for (i = 1; i < 7; i++) {
            var height = 0;
            $('#calendar-page .days .day[data-numrow="'+i+'"]').each(function(index, element) {
                var newheight = $(this).height();

                if(newheight > height)
                     height = newheight;

            });
            $('#calendar-page .days .day[data-numrow="'+i+'"]').height(height);
        }
    }

    function setvalues(year , month){
        //change header
        $('#calendar-page-title').html( $arrayMonths_Long[month]  + ' ' + year);

        //change footer
        $prevmonth = month == 0 ? 11:month-1;
        $('#btnPrevMonth').html('<span>«</span> ' + $arrayMonths_Long[$prevmonth]);

        $nextmonth = month == 11 ? 0:month+1;
        $('#btnNextMonth').html('<span>«</span> ' + $arrayMonths_Long[$nextmonth]);
    }

    //RETURN
    return {
        init:init,
        calHeight:calHeight,
        setvalues:setvalues
    };

})();



