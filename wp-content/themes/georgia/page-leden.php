<?php get_header();?>

<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">
			
                <h1>LEDEN</h1>
            </div>
        </section>


        <div id="main-content" class="ledenPage">

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
                                        <div class="tribe-events-page-title-wrap no-pad">
                                        	<?php
                                        		global $wpdb;
												$query_count = "SELECT COUNT( * ) as TOTALMEMBER
																	FROM  `wp_members`";
												$total_row = $wpdb->get_results($query_count);
                                        	?>
                                            <h2 class="tribe-events-page-title">MOMENTEEL TELT GEORGIA <b><?php echo $total_row[0]->TOTALMEMBER;?> LEDEN</b></h2>
                                        </div>

                                        <!-- Notices -->
                                        <!-- List Header -->
                                        <div id="tribe-events-header" data-title="Upcoming Events | Eventica" data-startofweek="1" data-view="list" data-baseurl="http://demo.toko.press/eventica-tecpro/events/list/">
                                            <!-- Header Navigation -->
                                        </div>
                                        <!-- #tribe-events-header -->
                                        <!-- Events Loop -->

                                        <div class="ledenChart">
                                        	<div class="chart-left">
                                        		<h3>LEDEN PER BEROEP</h3>
                                        		<div class="canvas-holder">
													<canvas id="modular-doughnut" class="clschart" width="200" height="200">
													</canvas>
												</div>
                                        	</div>
                                        	<div class="chart-right">
                                        		<h3>LEDEN PER REGIO</h3>
                                        		<div class="canvas-holder">
													<canvas id="modular-doughnut-2" class="clschart" width="200" height="200">
													</canvas>
												</div>
                                        	</div>
                                        	<div class="clear"></div>
                                        </div>
                                        <?php if(isset($_SESSION['user'])){ ?>
                                        <div class="ledenList">
                                        	<div class="pad">
                                        		<div class="divtitle">
                                        			<div class="col col1">&nbsp;</div>
	                                        		<div class="col col2">NAAM</div>
	                                        		<div class="col col3">&nbsp;</div>
	                                        		<div class="col col4">BEROEP</div>
	                                        		<div class="col col5">BEDRIJF</div>
	                                        		<div class="col col6">REGIO</div>
	                                        	</div>
	                                        	<div class="scrollbar">
                                                    <?php
                                                        global $wpdb;
                                                        $join_query = "SELECT m.id,m.p_picture,m.p_naam, m.p_voornaam, m.p_likedin, m.b_firma,m.b_land, m.b_organisatie, m.p_plaats FROM wp_members m";
                                                        $members = $wpdb->get_results($join_query);
                                                        foreach($members as $member){
                                                            $srcimage = content_url().'/uploads/avatar/'.$member->{'p_picture'};

                                                            $upload_dir = wp_upload_dir();
                                                            $upload_image = $upload_dir['basedir'].'/avatar/'.$member->{'p_picture'};

                                                            if( !file_exists( $upload_image ) ) {
                                                                $srcimage = get_template_directory_uri().'/images/favicon.png';
                                                            }


                                                            $search  = array('http://', '.com/', '.be/', '.eu/');
                                                            $replace = array('', '.com', '.be', '.eu');

                                                            $str_organisatie = str_replace($search, $replace, $member->{'b_organisatie'});

                                                            ?>
	                                        		<div class="divrow">
	                                        			
														
														<div class="col col1">
	                                        				<img src="<?php echo $srcimage; ?>" style="width: 45px; height: 45px;"/>
	                                        			</div>
	                                        			<div class="col col2"><div class="middle"><a href="<?php echo bloginfo('home')?>/profile/<?php if($member->{'id'}!=$_SESSION['user']['id']) echo '?user_id='.$member->{'id'};?>"><?php echo $member->{'p_naam'}.' '.$member->{'p_voornaam'} ?></a></div></div>
	                                        			<div class="col col3"><div class="middle"><a href="<?php echo $member->{'p_likedin'} ?>" class="fa fa-linkedin"></a></div></div>
	                                        			<div class="col col4">
	                                        				<div class="middle">
	                                        					<?php
								                                $bussiness_location_array = get_field('business_sector', 'option');
																foreach($bussiness_location_array as $bussiness_location){
																	if($bussiness_location['no'] == $member->{'b_firma'}){
																		echo $bussiness_location['title'];
																	}
																}
								                                ?>
	                                        					
	                                        				</div>
	                                        			</div>
	                                        			<div class="col col5"><div class="middle"><a target="_blank" href="<?php echo $member->{'b_organisatie'} ?>"><?php echo $str_organisatie;?></a></div></div>
	                                        			<div class="col col6">
	                                        				<div class="middle">
	                                        					<?php
								                                $region_location_array = get_field('region_location', 'option');
																foreach($region_location_array as $region_location){
																	if($region_location['no'] == $member->{'b_land'}){
																		echo $region_location['title'];
																	}
																}
								                                ?>
	                                        				</div>
	                                        			</div>
														
	                                        		</div>
	                                        		<?php }//end foreach ?>
	                                        	</div>
	                                        	<div class="clear"></div>
                                        	</div>
                                        </div>
                                        <?php }?>
                                        <div class="ledenOrg" style="margin-top: 12px;">
                                        	<div class="home-featured-event">
                                        		<div class="featured-event-title">
			                                        <h2>firma bestuurders</h2>
			                                    </div>
                                        	</div>
                                        	<div class="leden-logo">
                                        		<ul>
                                        			<?php
                                        				$orevent = array(
														  'post_type'      => 'organisaties',
														  'posts_per_page' => -1
														);
														
														$organisaties = query_posts( $orevent );
														if(have_posts($organisaties->$post)): while(have_posts($organisaties->$post)): the_post($organisaties->$post);
															$bigImg = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
															//$link = get_post_meta(get_the_ID(),'tt_organisaties_link', true);
                                                            $link = get_field('org_link', get_the_ID());
                                        			?>
                                        			<li><a href="<?php echo $link;?>" target="_blank"><img src="<?php echo $bigImg;?>"/></a></li>
                                        			<?php endwhile; endif;?>
                                        		</ul>
                                        		<div class="clear"></div>
                                        	</div>
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

        <?php
            //ARRAY LOCATION
            $region_location_array = get_field('region_location', 'option');

            $array_region_location = array();
            foreach($region_location_array as $region_location)
            {
                $no = $region_location['no'];
                $title = $region_location['title'];
                $color = $region_location['color'];
                $array_region_location[$no] = array(
                    "title" => $title,
                    "color" => $color
                );

            }

            //ARRAY BUSINESSS
            $business_sector_array = get_field('business_sector', 'option');

            $array_business_sector = array();
            foreach($business_sector_array as $business_sector)
            {
                $no = $business_sector['no'];
                $title = $business_sector['title'];
                $color = $business_sector['color'];
                $array_business_sector[$no] = array(
                    "title" => $title,
                    "color" => $color
                );
            }

            //SQL FOR LOCATION
            $strsql = 'select b_land, count(*) as count, sum(100) / total as percentage from wp_members cross join (select count(*) as total from wp_members) x group by 1';
            $array_land = $wpdb->get_results($strsql);

            $strArrayColor1 = '';
            $str_moduleData1 = '';
            foreach($array_land as $land){
                $no = $land->{'b_land'};
                $percentage = $land->{'percentage'};
                $title = $array_region_location[$no]['title'];
                $color = $array_region_location[$no]['color'];
                $strArrayColor1 .= '"'.$title.'": "'.$color.'",';
                $str_moduleData1 .= '{value: '.$percentage.',color: "'.$color.'",highlight: Colour("'.$color.'", 10),label: "'.$title.'"},';
            }

            //SQL FOR LOCATION
            $strsql = 'select b_land, count(*) as count, sum(100) / total as percentage from wp_members cross join (select count(*) as total from wp_members) x group by 1';
            $array_land = $wpdb->get_results($strsql);

            $strArrayColor1 = '';
            $str_moduleData1 = '';
            foreach($array_land as $land){
                $no = $land->{'b_land'};
                $percentage = $land->{'count'};
                $title = $array_region_location[$no]['title'];
                $color = $array_region_location[$no]['color'];
                $strArrayColor1 .= '"'.$title.'": "'.$color.'",';
                $str_moduleData1 .= '{value: '.$percentage.',color: "'.$color.'",highlight: Colour("'.$color.'", 10),label: "'.$title.'"},';
            }

            //SQL FOR BUSINESS
            $strsql = 'select b_firma, count(*) as count, sum(100) / total as percentage from wp_members cross join (select count(*) as total from wp_members) x group by 1';
            $array_business = $wpdb->get_results($strsql);

            $strArrayColor2 = '';
            $str_moduleData2 = '';
            foreach($array_business as $business){
                $no = $business->{'b_firma'};
                $percentage = $business->{'count'};
                $title = $array_business_sector[$no]['title'];
                $color = $array_business_sector[$no]['color'];
                $strArrayColor2 .= '"'.$title.'": "'.$color.'",';
                $str_moduleData2 .= '{value: '.$percentage.',color: "'.$color.'",highlight: Colour("'.$color.'", 10),label: "'.$title.'"},';
            }
        ?>


    <script>

        // Modular doughnut
        (function(){
            var data = [],
                barsCount = 50,
                labels = new Array(barsCount),
                updateDelayMax = 500,
                $id = function(id){
                    return document.getElementById(id);
                },
                random = function(max){ return Math.round(Math.random()*100)},
                helpers = Chart.helpers;
                chart1();

            function chart1(){
                //char1
                var canvas = $id('modular-doughnut'),
                    colours = {
                        <?php echo $strArrayColor2;?>
                    };

                var moduleData = [<?php echo $str_moduleData2;?>];
                //
                var moduleDoughnut = new Chart(canvas.getContext('2d')).Doughnut(moduleData, {
                        segmentStrokeColor : "#000",
                        tooltipTemplate : "<%if (label){%><%=label%>: <%}%><%= value %>", animation: false }
                );
                //
                var legendHolder = document.createElement('div');
                legendHolder.innerHTML = moduleDoughnut.generateLegend();
                // Include a html legend template after the module doughnut itself
                helpers.each(legendHolder.firstChild.childNodes, function(legendNode, index){
                    helpers.addEvent(legendNode, 'mouseover', function(){
                        var activeSegment = moduleDoughnut.segments[index];
                        activeSegment.save();
                        activeSegment.fillColor = activeSegment.highlightColor;
                        moduleDoughnut.showTooltip([activeSegment]);
                        activeSegment.restore();
                    });
                });
                helpers.addEvent(legendHolder.firstChild, 'mouseout', function(){
                    moduleDoughnut.draw();
                });
                canvas.parentNode.parentNode.appendChild(legendHolder.firstChild);
            }

            //chart 2
            var canvas_2 = $id('modular-doughnut-2'),
                colours = {
                    <?php echo $strArrayColor1;?>
                };

            var moduleData = [<?php echo $str_moduleData1;?>];
            //
            var moduleDoughnut_2 = new Chart(canvas_2.getContext('2d')).Doughnut(moduleData, {
                    segmentStrokeColor : "#000",
                    tooltipTemplate : "<%if (label){%><%=label%>: <%}%><%= value %>", animation: false }
            );
            //
            var legendHolder_2 = document.createElement('div');
            legendHolder_2.innerHTML = moduleDoughnut_2.generateLegend();
            // Include a html legend template after the module doughnut itself
            helpers.each(legendHolder_2.firstChild.childNodes, function(legendNode, index){
                helpers.addEvent(legendNode, 'mouseover', function(){
                    var activeSegment = moduleDoughnut_2.segments[index];
                    activeSegment.save();
                    activeSegment.fillColor = activeSegment.highlightColor;
                    moduleDoughnut_2.showTooltip([activeSegment]);
                    activeSegment.restore();
                });
            });
            helpers.addEvent(legendHolder_2.firstChild, 'mouseout', function(){
                moduleDoughnut_2.draw();
            });
            canvas_2.parentNode.parentNode.appendChild(legendHolder_2.firstChild);


            function Colour(col, amt) {

                var usePound = false;

                if (col[0] == "#") {
                    col = col.slice(1);
                    usePound = true;
                }

                var num = parseInt(col,16);

                var r = (num >> 16) + amt;

                if (r > 255) r = 255;
                else if  (r < 0) r = 0;

                var b = ((num >> 8) & 0x00FF) + amt;

                if (b > 255) b = 255;
                else if  (b < 0) b = 0;

                var g = (num & 0x0000FF) + amt;

                if (g > 255) g = 255;
                else if (g < 0) g = 0;

                return (usePound?"#":"") + (g | (b << 8) | (r << 16)).toString(16);

            }

        })();


    </script>