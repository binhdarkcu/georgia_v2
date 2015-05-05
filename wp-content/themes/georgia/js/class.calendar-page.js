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

    //RETURN
    return {
        init:init,
        calHeight:calHeight
    };

})();



