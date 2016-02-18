<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <?php
		while ( have_posts() ) : the_post();
			//echo get_the_ID();
			$news_image = get_field('news_image', get_the_ID());
			$news_posted_date = get_field('news_posted_date', get_the_ID());
			$news_posted_date = DateTime::createFromFormat("Ymd", $news_posted_date);
		    if($news_posted_date)
		    	$news_posted_date = $news_posted_date->format("j F, Y");

		    $str_added_by = "";
		    $terms_added_by = get_the_terms(get_the_ID(), 'added_by');
		    if ($terms_added_by) {
			   foreach ($terms_added_by  as $row ) {
			   		if($str_added_by != "") $str_added_by .= ", ";
			   		$str_added_by .= $row->name;
			   }
			}
	?>
    
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">				
                <h1>NIEUWS</h1>
            </div>
        </section>

        <div id="main-content" class="singlePage">

            <div class="container">
                <div class="row">

                    <div class="col-md-9">

                        <div class="home-featured-event left-featured-events">

                                <div class="featured-event-wrap ">
                                    
                                    <div id="tribe-events-content" class="tribe-events-single vevent clearfix">
                                    	<div>
											<img src="<?php echo $news_image;?>" class="img-responsive">
                                    	</div>
										
                                        <div class="events-single-right col-sm-7 col-sm-push-5">

                                            <div id="post-<?echo get_the_ID();?>" class="post-2059 tribe_events type-tribe_events status-publish has-post-thumbnail tag-wordpress cat_wordcamp news-content">
                                                
                                                <h3><?php echo get_the_title(get_the_ID());?></h3>
                                                <div class="tribe-events-single-event-description tribe-events-content entry-content description">
                                                    <?php echo get_the_content(get_the_ID());?>
                                                </div>
                                                
                                            </div>

                                        </div>


                                        <div class="events-single-left col-sm-5 col-sm-pull-7">

                                            <div class="tribe-events-cta">
                                                <div class="tribe-events-cta-date meta">
                                                    Datum: <?php echo $news_posted_date;?><br>
													Gepost door: <?php echo $str_added_by;?>
                                                </div>
                                               <div class="tribe-events-cta-btn">
                                                    
                                                </div>
                                            </div>

                                            <div class="tribe-events-meta-group tribe-events-meta-group-details news-gallery">
                                                <ul>
	                                                <?php
														$galleryPhoto = get_post_meta(get_the_ID(), 'tt_image_gallery', false);
														foreach($galleryPhoto as $photo){
															$bigImg = wp_get_attachment_image_src( $photo,'full' );
													?>
															<li>
																<a class="fresco" data-fresco-group='galleryphoto' href="<?php echo $bigImg[0];?>"><div class="bg-thumb" style="background: url(<?php echo $bigImg[0]; ?>); background-size: cover;"></div></a>
															</li>
													<?php } ?>
	                                            </ul>
                                            </div>

                                        </div>

                                        <div class="clearfix"></div>


                                    </div>
									
                                </div>

                            </div>
							
                    </div>
					
                    <div class="col-md-3">
                        <?php get_sidebar("news");?>
                    </div><!-- ./ sidebar -->
                </div>
            </div>

        </div>
     </div>
<?php 	
	endwhile; 
?>
<style type="text/css" media="screen">
	#tribe-events-content.tribe-events-single{
		background: #000 !important;
	}
	.tribe-events-cta .meta{
		max-width: 100% !important;
	    max-width: calc( 200px );
	    text-align: left !important;
	    color: #FFF !important;
    	line-height: 21px !important;
	}
	.events-single-right .news-content{
		margin-top: 46px;
	}
	.events-single-right .news-content h3{
		color: #887554;
	    font-family: 'Raleway', sans-serif;
	    font-style: normal;
	    font-weight: 700;
	    font-size: 18px;
	    line-height: 1.1;
	    padding-bottom: 15px;
	}
	.events-single-right .news-content p{
		color: #FFF !important;
	}
	.news-gallery ul{
        width: 100%;
    }
    .news-gallery ul li{                
        float: left;
        height: 122px;
        margin: 0 10px 10px 0;
        width: 122px;
    }
    .news-gallery ul li:nth-child(even){
        margin-right:0;
    }
    .bg-thumb{
    	height: 122px !important;
    }
</style>
<?php get_footer();?>
<?php get_template_part('tpl','addguest');?>