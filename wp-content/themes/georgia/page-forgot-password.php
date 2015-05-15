<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">
				<?php $query_object = get_queried_object();?>
                <div class="breadcrumb-trail breadcrumb breadcrumbs">
                    <span class="trail-begin"><a href="http://demo.toko.press/eventica-tecpro" title="Eventica">Home</a></span>
                    <span class="sep">&#047;</span> <span class="trail-end"><a href="<?php echo bloginfo('home').'/'.$query_object->post_name;?>" title="Events"><?php echo get_the_title($query_object->ID);?></a></span>
                </div>					
                <h1>Forgot Password</h1>
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

                                        <div class="events-loop tribe-events-loop vcalendar forgotPassword">
                                        	<h4>Find Your Account</h4>
                                        	<?php
	                                        	
												$message = "";
                                        		if(!empty($_POST) && wp_verify_nonce($_POST['act_forgot_password'],'forgot_password')){
	                                        		global $wpdb;
													$p_email = $_POST['fp_email'];
	                                        		$results = $wpdb->get_row("SELECT p_email FROM wp_members WHERE p_email = '".$p_email."'");
													//print_r($results);
											        if(!empty($results)){
											        	$password =  substr(md5(uniqid(rand(),true)), 10,15); 
											        	$data['p_password'] = sha1($password);
														//print_r($password.'  '.$data['p_password']);
											           	$update_query = $wpdb->update( 
															'wp_members', 
															$data,
															array( 'p_email' => $p_email)
														);
														send_password($p_email,'Your password'.$password);
											            $message = "Your password is send to your email.";
														
											        }
											        else{
											        	$message = "Email not exist. Please choose other email.";
											            
											        }
												}
                                        	?>
											<form action="" method="post">
												<?php
						                            if($message != "")
						                            {
						                                echo '<div class="alert" style="padding-bottom: 20px;color: red;padding-top: 20px;font-family: Noto Sans; font-size: 12px;">'.$message.'</div>';
						                            }
						                                
						                        ?>  
												<div class="searchpass">
													<div class="col1">
														Your email
													</div>
													<div class="col2">
														<input value="" type="text" autocomplete="off" name="fp_email" placeholder=""/>
													</div>
													<div class="clear"></div>
													<input type="submit" value="Find" class="btn" />
													<?php wp_nonce_field('forgot_password','act_forgot_password');?>
												</div>
											</form>
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