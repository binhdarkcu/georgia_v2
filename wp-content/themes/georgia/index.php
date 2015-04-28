<?php get_header();?>
<body class="home page page-id-1881 page-template page-template-page_home_event page-template-page_home_event-php sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive tribe-theme-eventica-wp">
    <div id="site-container" class="site-container sb-site-container">
        <?php get_template_part('tpl','menu');?>
        <?php get_template_part('tpl','slider');?>
		<?php $isLogin = ($_GET['islogin'] == 1)? "1":"0";?>
        <div id="main-content" class="home-plus-events">

            <?php get_template_part('tpl','comming-events')?>

            <div class="home-group-box">
                <div class="container">
                    <div class="row">

                        <div class="col-md-8 col-md-push-4">


                            <div class="home-featured-event">


                                <div class="featured-event-wrap ">
                                    <div class="featured-event-title">
                                        <h2>Event in de kijker</h2>
                                    </div>

                                    <div id="tribe-events-content" class="tribe-events-single vevent clearfix">



                                        <div class="events-single-right col-sm-6 col-sm-push-6">

                                            <div id="post-2059" class="post-2059 tribe_events type-tribe_events status-publish has-post-thumbnail tag-wordpress cat_wordcamp">
                                                <h2 class="entry-title">
                                                    <a class="url" href="http://demo.toko.press/eventica-tecpro/event/wordcamp-lyon/" title="WordCamp Lyon" rel="bookmark">
                                                        Event in Brussel
                                                    </a>
                                                </h2>
                                                <div class="tribe-events-event-image">
                                                    <img width="929" height="646" src="images/home/e-4.jpg" class="attachment-large wp-post-image" alt="Eventica Dummy Image 28" />
                                                </div>
                                                <div class="tribe-events-single-event-description tribe-events-content entry-content description">
                                                    <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="events-single-left col-sm-6 col-sm-pull-6">

                                            <div class="tribe-events-cta">
                                                <div class="tribe-events-cta-date">
                                                    <span class="mm">juni</span>
                                                    <span class="dd">05</span>
                                                    <span class="yy">2015</span>
                                                </div>
                                                <?php if($isLogin == 1){ ?>
                                                <div class="tribe-events-cta-btn">
                                                    <a class="btn" href="http://lyon.wordcamp.org/2015">
                                                        IK KOM
                                                    </a>
                                                </div>
                                                <?php }?>
                                            </div>


                                            <div class="tribe-events-meta-group tribe-events-meta-group-details">
                                                <table>
                                                    <tr>
                                                        <th> Datum: </th>
                                                        <td>
                                                            <abbr class="tribe-events-abbr updated published dtstart" title="2015-06-05">June 5</abbr>
                                                        </td>
                                                    </tr>

                                                    <tr class="last">
                                                        <th> van-tot: </th>
                                                        <td>
                                                            <abbr class="tribe-events-abbr updated published dtstart" title="2015-06-05">8:00 am - 5:00 pm</abbr>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

											<div class="tribe-events-meta-group tribe-events-meta-group-details number-events">
                                                <h4>62 <span>leden komen</span></h4>
                                                <?php if($isLogin == 1){ ?>
                                                <div class="scrollbar">
                                                	<ul>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-1.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-2.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-1.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-2.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-1.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-2.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-1.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                	<li>
	                                                		<a href="#">
	                                                			<img src="images/home/p-2.jpg"/>
	                                                			<p>Bastien Guggisberg</p>
	                                                		</a>
	                                                	</li>
	                                                </ul>
	                                                <div class="clear"></div>
                                                </div>
                                                <?php }?>
                                            </div>
                                            <div class="tribe-events-meta-group tribe-events-meta-group-venue events-location">
                                                <h3 class="tribe-events-single-section-title"> LOKATIE </h3>
                                                <div class="meta-inner">

                                                    <p class="author fn org">
                                                        Brussel 2000
                                                    </p>


                                                    <address class="tribe-events-address">


                                                        Brussel,  Belgie
                                                    </address>
                                                    <p class="location">
                                                        <a href="http://maps.google.com/maps?f=q&#038;source=s_q&#038;hl=en&#038;geocode=&#038;q=Lyon+France" title="Click to view a Google Map">+ Google Map</a>
                                                    </p>



                                                </div>
                                            </div>

                                            <div class="tribe-events-meta-group tribe-events-meta-group-schedule">
                                                <h3 class="tribe-events-single-section-title">
                                                    DAGINDELING
                                                </h3>
                                                <ul>
                                                    <li class="item">
                                                        08:00 - 09:00 Opening
                                                    </li>
                                                    <li class="item">
                                                        09:00 - 12:00 Session 1
                                                    </li>
                                                    <li class="item">
                                                        12:00 - 13:00 Break
                                                    </li>
                                                    <li class="item">13:00 - 17:00 Session 2</li>
                                                    <li class="timeline">&nbsp;</li>
                                                </ul>
                                            </div>


                                        </div>

                                        <div class="clearfix"></div>


                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-md-4 col-md-pull-8">
                        	
							<?php if($isLogin != 1){ ?> 
                            <div class="home-recent-posts ourgeorgia">

                                <div class="recent-post-wrap">

                                    <a class="recent-post-nav" href="http://demo.toko.press/eventica-tecpro/blog/">
                                        LEES MEER
                                        <i class="fa fa-chevron-right"></i>
                                    </a>

                                    <h2 class="recent-post-title">
                                        OVER GEORGIA
                                    </h2>

                                    <div class="row">


                                        <article id="post-1178" class="post-1178 post type-post status-publish format-standard has-post-thumbnail hentry category-stress-management blog-list col-sm-6 col-md-12">

                                            <div class="inner-loop">
                                                <div class="post-thumbnail">
                                                    <a href="http://demo.toko.press/eventica-tecpro/how-to-live-life-free-of-stress-an-interview-with-joe-dimaggio/" title="How To Live Life Free Of Stress An Interview With Joe Dimaggio">
                                                        <img width="400" height="200" src="images/home/our-georgia.jpg" class="attachment-blog-thumbnail wp-post-image" alt="Eventica Dummy Image 33" />
                                                    </a>
                                                </div>

                                                <div class="post-inner">
                                                    <div class="post-summary">
                                                        <p>Georgiaquat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora </p>
                                                        <p class="pad-bot-25">torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. </p>
                                                        <p>Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci eni.</p>
                                                        <p>Bent u geinteresseerd om lid te worden?</p>
                                                        <a class="btn" href="http://lyon.wordcamp.org/2015">
	                                                        WORD LID
	                                                    </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </article>
                                    </div>

                                </div>

                            </div>
                            <?php } else{ ?>
                            	<div class="lastestPhoto">
                            		<div class="home-featured-event">
                            			<div class="featured-event-title">
	                                        <h2>LAATSTE FOTO’S</h2>
	                                    </div>
                            		</div>
                            		<div class="lastestList">
                            			<ul>
                            				<li>
                            					<a href="#"><img src="images/home/photo-1.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-2.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-3.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-4.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-5.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-6.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-7.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-8.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-9.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-1.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-2.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-3.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-4.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-5.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-6.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-7.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-8.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-9.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-7.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-8.jpg"/></a>
                            				</li>
                            				<li>
                            					<a href="#"><img src="images/home/photo-9.jpg"/></a>
                            				</li>
                            			</ul>
                            		</div>
                            	</div>
                            <?php }?>
                        </div>

                    </div>
                </div>
            </div>



        </div>

<?php get_footer();?>