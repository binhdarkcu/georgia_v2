var calendar_sidebar = (function() {
    // PARAMATERS
    var setting = {
        url : ''
    }
    // INIT
    function init(objEvents, url){
        setting.url = url;
        initEvents();
        build (objEvents);
        setTimeout(function(){
            gotofirstdate();
        },200)

    }

    function initEvents(){
        $(document).on('click','#calendar-sidebar .day.active a',function(){

            $data_day = $(this).attr('data-day');
            $data_month = $(this).attr('data-month');
            $data_year = $(this).attr('data-year');

            jQuery.ajax({
                type : "post",
                cache: false,
                url : setting.url + '/wp-admin/admin-ajax.php',
                data : {action: "user_events_sidebar", data_day : $data_day, data_month : $data_month, data_year : $data_year},
                success: function(response) {
                    $('#sidebar-events-loop').html(response);
                }
            })

            return false;
        });
    }

    var onetime = false;
    function gotofirstdate(){

        $('.day.future.active').each(function(){
            $this = $(this);

            $this.find('a').click();

        });
    }
    //BUILD
    function build (objEvents){
        var todaydate=new Date()
        var curmonth=todaydate.getMonth()+1 //get current month (1-12)
        var curyear=todaydate.getFullYear() //get current year

        $("#calendar-sidebar").responsiveCalendar({
            time: curyear + '-' + curmonth,
            events: objEvents
        });
    }

    //RETURN
    return {
        init:init
    };

})();



