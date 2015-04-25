<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">

                <div class="breadcrumb-trail breadcrumb breadcrumbs">
                    <span class="trail-begin"><a href="http://demo.toko.press/eventica-tecpro" title="Eventica">Home</a></span>
                    <span class="sep">&#047;</span> <span class="trail-end"><a href="http://demo.toko.press/eventica-tecpro/events/" title="Events">LOCATIES</a></span>
                </div>					
                <h1>LOCATIES</h1>
            </div>
        </section>


        <div id="main-content" class="contact-page">

            <div class="container">
                <div class="row">

                    <div class="col-md-9">
						<div class="location-box">
							<div class="loc-title">
								<h3>CONTACT GEGEVENS</h3>
								<p>
									Georgia bvba<br/>
									Straat 57<br/>
									200 Antwerpen<br/><br/>
									BTW 354 567 890<br/><br/>
									Tel. 012-345678<br/>
									Fax. 012-345678<br/><br/>
									email: <a href="mailto:info@georgia.be">info@georgia.be</a>
								</p>
								<div class="contact-box">
									<h3>STUUR ONS EEN BERICHT</h3>
									<p>
										<input type="text" value="" name="" placeholder="Naam" />
									</p>
									<p>
										<input type="text" value="" name="" placeholder="E-mailadres" />
									</p>
									<p>
										<textarea name="" placeholder ="Bericht"></textarea>
									</p>
									<p>
										<input type="checkbox" name="" value="0" id="accept"/>
										<label for="accept">Stuur mij een copy van dit bericht</label>
									</p>
									<a href="#" class="btn">VERSTUUR BERICHT</a>
								</div>
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