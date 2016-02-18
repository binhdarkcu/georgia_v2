<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">				
                <h1>NIEUWS</h1>
            </div>
        </section>
		<style type="text/css">
            .news-meta{
                margin-bottom: 38px;
            }
            .news-text h3{
                color: #887554;
                font-family: 'Raleway', sans-serif;
                font-style: normal;
                font-weight: 700;
                font-size: 18px;
                line-height: 1.1;                
            }
            .news-text p{
                color: #FFF;
                font-family: 'Raleway', sans-serif;
                font-style: normal;
                font-weight: 550;
                font-size: 12px;
                line-height: 1.6;
                text-align: left;
            }
            .border-horizontal{
                border-bottom: 1px solid #ddd;
                border-left: 0px;
                border-top: 0;
                border-right: 0;
            }
            .border-vertical{
                border-left: 1px solid #ddd;
                border-bottom: 0px;
                border-top: 0;
                border-right: 0;
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
        </style>
        <div id="main-content" class="contact-page">

            <div class="container">
                <div class="row">

                    <div class="col-md-9">
						<div class="location-box">
                            <div class="loc-title persons row-centered">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 preson col-centered">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/new-1.jpg" class="img-responsive">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="news-meta">
                                            Datum: 8 December 2015<br>
                                            Gepost door: Jurgen Van Grieken
                                        </div>
                                        <div class="border-horizontal">

                                        </div>  
                                        <div class="news-gallery">                                                
                                            <ul>
                                                <li>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/news/news_01.png">
                                                </li>
                                                <li>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/news/news_02.png">
                                                </li>
                                                <li>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/news/news_03.png">
                                                </li>
                                                <li>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/news/news_04.png">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-7 border-vertical">
                                        <div class="news-text">
                                            <h3>This is a newspost title</h3>
                                            <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. . Suspendisse in orci enim.This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>                                            
                                        </div>
                                    </div>
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

<?php get_footer();?>