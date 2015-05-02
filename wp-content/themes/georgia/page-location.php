<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">

                <div class="breadcrumb-trail breadcrumb breadcrumbs">
                    <span class="trail-begin"><a href="<?php echo bloginfo('home')?>" title="Home">Home</a></span>
                    <span class="sep">&#047;</span> <span class="trail-end"><a href="<?php echo bloginfo('home')?>/location/" title="LOCATIES">LOCATIES</a></span>
                </div>							
                <h1>LOCATIES</h1>
            </div>
        </section>


        <div id="main-content">

            <div class="container">
                <div class="row">

                    <div class="col-md-9">
						<div class="location-box">
							<div class="loc-title">
								<h3>LOCATIE ANTWERPEN</h3>
								<p>
									Georgia bvba<br/>
									Straat 57<br/>
									200 Antwerpen
								</p>
							</div>
							<div class="gmap">
								<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:500px;width:100%;"><div id="gmap_canvas" style="height:500px;width:100%;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://wordpress-themes.org" id="get-map-data">http://wordpress-themes.org/</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(40.7127837,-74.00594130000002),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(40.7127837, -74.00594130000002)});infowindow = new google.maps.InfoWindow({content:"<b>Antwerpen</b><br/>Georgia bvba Straat 57 200 Antwerpen<br/> New York" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});}google.maps.event.addDomListener(window, 'load', init_map);</script>
							</div>
						</div>
						<div class="location-box">
							<div class="loc-title">
								<h3>LOCATIE BRUSSEL</h3>
								<p>
									Georgia bvba<br/>
									Straat 57<br/>
									200 Antwerpen
								</p>
							</div>
							<div class="gmap">
								<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:500px;width:100%;"><div id="gmap_canvas_2" style="height:500px;width:100%;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://wordpress-themes.org" id="get-map-data">http://wordpress-themes.org/</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:15,center:new google.maps.LatLng(40.7127837,-74.00594130000002),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas_2"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(40.7127837, -74.00594130000002)});infowindow = new google.maps.InfoWindow({content:"<b>Georgia Brussel</b><br/>Georgia bvba Straat 57 200 Brussel<br/> New York" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});}google.maps.event.addDomListener(window, 'load', init_map);</script>
							</div>
						</div>
                    </div>

                    <div class="col-md-3">
                        <?php get_sidebar();?>
                    </div><!-- ./ sidebar -->
                </div>
            </div>

        </div>
        </div>

<?php get_footer();?>