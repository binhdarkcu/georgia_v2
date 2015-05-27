	<?php get_template_part('tpl','footer')?>
    </div>
    <div class="<?php if(isset($_SESSION['user'])) echo 'loggedin';?>">
    	 <div class="sb-slidebar sb-left sb-style-push"></div>
    </div>
   

	<link rel='stylesheet' id='widget-calendar-pro-style-css' href='assets/css/widget-calendar-full.css?ver=3.9.1' type='text/css' media='all' />
    <link rel='stylesheet' id='tribe_events-widget-calendar-pro-style-css' href='assets/css/widget-calendar-theme.css?ver=3.9.1' type='text/css' media='all' />
   
    <script type='text/javascript' src='assets/js/add-to-cart.min.js?ver=2.3.7'></script>
    <script type='text/javascript' src='assets/js/jquery.blockUI.min.js?ver=2.60'></script>

    <script type='text/javascript' src='assets/js/cart-fragments.min.js?ver=2.3.7'></script>
    <script type='text/javascript' src='assets/js/superfish.js?ver=4.1.1'></script>
    <script type='text/javascript' src='assets/js/slidebars.js?ver=4.1.1'></script>
    <script type='text/javascript' src='assets/js/owl.carousel.min.js?ver=2.0'></script>
    <script type='text/javascript' src='assets/js/comment-reply.min.js?ver=4.1.1'></script>
    <script type='text/javascript' src='assets/js/eventica.js?ver=1.3'></script>
    
    <!--mcustomscrollbar-->
    <script type='text/javascript' src='js/mcustomscrollbar/jquery.mCustomScrollbar.js'></script>
    <link type="text/css" rel='stylesheet' href="js/mcustomscrollbar/jquery.mCustomScrollbar.css"/>
    <script type='text/javascript' src='js/Chart.js'></script>
    
    <!--Validate form-->
    <script type='text/javascript' src='js/validate.form.js'></script>
    <script type='text/javascript' src='js/jquery.validate.js'></script>
    
    <script type='text/javascript' src='js/update_profile.js'></script>
    <script type='text/javascript' src='js/class.SiteMain.js'></script>
    
    
	<script type='text/javascript' src='js/jquery-ui-1.10.1.min.js'></script>
	<link href="assets/css/jquery-ui-1.10.1.css" rel="stylesheet">
	<link type="text/css" rel='stylesheet' href="assets/css/latoja.datepicker.css"/>
	<script type="text/javascript">
		  $(function() {
		    $( "#date_geboortedatum, #date_geboorteplaats" ).datepicker({
				inline: true,
				changeMonth: true,
    			changeYear: true,
				showOtherMonths: true,
				yearRange: '1900:c',
			})
			.datepicker('widget').wrap('<div class="ll-skin-latoja"/>');
		  });
	</script>
	
    <!--calendar-->
    <script type='text/javascript' src='js/bootstrap.min.js'></script>
    <script type='text/javascript' src='js/responsive-calendar.js'></script>
    <script type='text/javascript' src='js/class.calendar-sidebar.js'></script>
    <script type='text/javascript' src='js/class.calendar-page.js'></script>
    
    <script type="text/javascript" src="js/fresco/fresco.js"></script>
	<link rel="stylesheet" type="text/css" href="js/fresco/fresco.css" />

    <?php get_template_part('tpl','login')?>
    <?php get_template_part('tpl','message-success')?>
    <?php get_template_part('tpl','message-cancle')?>
</body>
</html>
