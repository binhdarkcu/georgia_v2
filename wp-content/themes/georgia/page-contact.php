<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">
				
                <h1>CONTACT</h1>
            </div>
        </section>
		<?php
			if(!empty($_POST['cemail']))
			{
			    $data['name'] = $_POST['cname'];
			    $data['email'] = $_POST['cemail'];
			    $data['message'] = $_POST['cmessage'];
			    $sendmail = contact_form($data['name'], $data['email'],$data['message']);
			    if($sendmail){
			        $message = "Send message successful";
			    }
			    else
			        $message = 'Current can not send message. Please try again.';
			}
			
		?>

        <div id="main-content" class="contact-page">

            <div class="container">
                <div class="row">

                    <div class="col-md-9">
						<div class="location-box">
                            <div class="loc-title persons row-centered">
                                <?php
                                    $i = 0;
                                    $args_contact = array(
                                        'post_type' 	 => 'contacts',
                                        'posts_per_page' => -1,
                                        'order'			 => 'asc'
                                    );

                                    $queryContact = get_posts($args_contact);
                                    foreach ($queryContact as $contact) {
                                        $i++;
                                        $fullname = get_the_title($contact->ID);
                                        $title = get_field('title',$contact->ID);
                                        $email = get_field('email', $contact->ID);

                                        $phone_number = get_field('phone_number', $contact->ID);
                                        $company = get_field('company', $contact->ID);
                                        $website = get_field('website', $contact->ID);
                                        $image_arr = get_field('image', $contact->ID);

                                        $image = $image_arr['sizes']['thumbnail'];

                                        $search  = array('http://', '.com/', '.be/', '.eu/');
                                        $replace = array('', '.com', '.be', '.eu');

                                        $str_website = str_replace($search, $replace, $website);

                                        ?>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 preson col-centered">
                                    <a href="#" class="thumbnail"><img src="<?=$image?>" alt="" ></a>
                                    <p class="information">
                                        <span class="name"><?=$fullname?></span><br>
                                        <span><?=$title?></span>
                                    </p>

                                    <p>
                                        <a href="mailto:jurgen.vangrieken@georgia.be" class="color"><?=$email?></a><br>
                                        <span><?=$phone_number?></span>
                                    </p>

                                    <p>
                                        <span><?=$company?></span><br>
                                        <a href="<?=$website?>" target="_blank" class="color"><?=$str_website?></a>
                                    </p>

                                </div>
                                <?php
                                    }//end for
                                ?>

                            </div>

                            <div class="loc-title" style="clear: both">
								<h3>ALGEMENE CONTACT GEGEVENS</h3>
								<p>
                                    Georgia vzw<br/>
                                    Pater Damiaanstraat 71<br/>
                                    2610 Wilrijk<br/><br/>
									BTW 599.994.884<br/><br/>
									Tel. 0473/56.20.04<br/><br/>
									email: <a href="mailto:info@georgia.be">info@georgia.be</a>
								</p>
								<?php
							    if($message != "")
							    {
							        $alert = $logged == true ? "alert-success" : "alert-danger";
							        echo '<div class="alert '.$alert.'">'.$message.'</div>';
							    }
							
							    ?>
								<form action="" method="post" id="contactform"> 
									<div class="contact-box">
										<h3>STUUR ONS EEN BERICHT</h3>
										<p>
											<input type="text" value="" name="cname" placeholder="Naam" />
										</p>
										<p>
											<input type="text" value="" name="cemail" placeholder="E-mailadres" />
										</p>
										<p>
											<textarea name="cmessage" placeholder ="Bericht"></textarea>
										</p>
										<p class="checkboxStyle">
											<input type="checkbox" name="ckaccept" value="0" id="accept"/>
											<label for="accept">Stuur mij een copy van dit bericht</label>
										</p>
										<a href="javascript:void(0)" class="btn" onclick="jQuery('#contactform').submit();">VERSTUUR BERICHT</a>
									</div>
								</form>
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
<script src="js/validate.contact.js" type="text/javascript"></script>