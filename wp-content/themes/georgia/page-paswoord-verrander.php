<?php
	if(!isset($_SESSION['user'])){
		wp_redirect(home_url() ); //to redirect back to "index.php" after logging out
		exit();
	}
?>
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
                <h1>PASWOORD VERANDER</h1>
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
                                            <h2 class="tribe-events-page-title">VRAAG UW PASWOORD OPNIEUW AAN</h2>
                                        </div>

                                        <!-- Notices -->
                                        <!-- List Header -->
                                        <div id="tribe-events-header" data-title="Upcoming Events | Eventica" data-startofweek="1" data-view="list" data-baseurl="http://demo.toko.press/eventica-tecpro/events/list/">
                                            <!-- Header Navigation -->
                                        </div>
                                        <!-- #tribe-events-header -->
                                        <!-- Events Loop -->

                                        <div class="events-loop tribe-events-loop vcalendar forgotPassword">
                                        	
                                        	<?php
	                                        	
												$message = "";
												if(isset($_SESSION['user'])){
													if(!empty($_POST) && wp_verify_nonce($_POST['act_change_password'], 'change_password')){
														global $wpdb;
														$huidig_password = $_POST['huidig_password'];
														$nieuw_password = $_POST['nieuw_password'];
														$bevestig_password = $_POST['bevestig_password'];
														if (empty($huidig_password)) {
															$message = "Current password is required.";
														}
														else if (empty($nieuw_password)) {
															$message = "New password is required.";
														}
														else if (empty($bevestig_password)) {
															$message = "Confirm password is required.";
														}
														else if ($nieuw_password != $bevestig_password) {
															$message = "Confirm password is not match.";
														}
														else if ($nieuw_password == $huidig_password) {
															$message = "New password must not be the same as current password.";
														}
														else {
															$id = $_SESSION['user']['id'];
															$huidig_password = sha1($huidig_password);
															$nieuw_password = sha1($nieuw_password);
															$user = $wpdb->get_row("SELECT p_password FROM wp_members WHERE id = ".$id, ARRAY_A);
															if ($huidig_password == $user['p_password'])
															{
																$results = $wpdb->update( 
																	'wp_members', 
																	array( 
																		'p_password' => $nieuw_password
																	), 
																	array( 'id' => $id ), 
																	array( 
																		'%s'
																	), 
																	array( '%d' ) 
																);
																if(!empty($results)){
																	//send_password($p_email, $password);
																	$message = "Your password has been changed.";
																}
															}
															else {
																$message = "Your current password is not correct.";
															}
														}
														
													}
												}
												else {
													$message = "You are not logged in.";
												}
                                        	?>
											<form action="" method="post" id="change_password">
												<?php
						                            if($message != "")
						                            {
						                                echo '<div class="alert" style="padding-bottom: 20px;color: red;padding-top: 20px;font-family: Noto Sans; font-size: 12px;">'.$message.'</div>';
						                            }
						                                
						                        ?>  
												<div class="searchpass">
													<div class="col1">
														Huidig paswoord
													</div>
													<div class="col2">
														<input value="" type="password" autocomplete="off" name="huidig_password" placeholder=""/>
													</div>
													<div class="clear"></div>
													<div class="col1">
														Nieuw paswoord
													</div>
													<div class="col2">
														<input value="" type="password" id="nieuw_password" autocomplete="off" name="nieuw_password" placeholder=""/>
													</div>
													<div class="clear"></div>
													<div class="col1">
														Bevestig paswoord
													</div>
													<div class="col2">
														<input value="" type="password" autocomplete="off" name="bevestig_password" placeholder=""/>
													</div>
													<div class="clear"></div>
													<input type="submit" value="VERZENDEN" class="btn" />
													<?php wp_nonce_field('change_password','act_change_password');?>
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
<script>
	$(document).ready(function(){
		jQuery("#change_password").validate({
    		rules: {
                'huidig_password': { 
                    required: true
                },
                'nieuw_password': { 
                    required: true
                },
                'bevestig_password': { 
                    required: true,
                    equalTo : "#nieuw_password"
                }
    		},
    		submitHandler: function(form) {
                form.submit();
    		},
    	});
	});
</script>
<style>
	input[type="password"]{
		width: 200px;
	  height: 29px;
	  border: 1px solid #fff;
	  border-radius: 3px;
	  outline: none;
	}
	input[type="password"].error{
		border: 1px solid red;
	}
	#change_password label.error{
		display: none!important;
	}
</style>