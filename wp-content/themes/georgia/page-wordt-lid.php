<?php get_header();?>
<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">

                <div class="breadcrumb-trail breadcrumb breadcrumbs">
                    <span class="trail-begin"><a href="http://demo.toko.press/eventica-tecpro" title="Eventica">WORD LID</a></span>
                    
                </div>					
                <h1>REGISTREER JE HIER</h1>
            </div>
        </section>


        <div id="main-content" class="registerPage">

            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                    	<div class="registerBox">
                    		<div class="intro">
                    			<span>Vul hieronder je gegevens in, wij contacteren jou zo snel mogelijk en valideren uw aanzoek.</span>
                    			<span class="s-2">Indien uw aanzoek werd goedgekeurd ontvangt u van ons een log in en paswoord waarmee u toegang krijgt en kan deelnemen aan </span>
                    			<span class="s-3">de evenementen.</span>	
                    			<span><a href="#">Lees eerste de voorwaarden en reglementen</a></span>
                    		</div>
                    		<form action="" method="" id="registerForm">
								<div class="informationBox">
									<div class="reg-left">
										<h3>PRIVEGEGEVENS</h3>
										<div class="reg-row">
											<div class="col1">
												<label>Naam<span class="red">*</span></label>
												<input type="text" name="p_naam" value="" />
											</div>
											<div class="col2">
												<label>Voornaam<span class="red">*</span></label>
												<input type="text" name="p_voornaam" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="col1">
												<label>Geboortedatum<span class="red">*</span></label>
												<input type="text" name="p_geboortedatum" value="" />
											</div>
											<div class="col2">
												<label>Geboorteplaats<span class="red">*</span></label>
												<input type="text" name="p_geboorteplaats" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="col1">
												<label>Straat<span class="red">*</span></label>
												<input type="text" name="p_straat" value="" />
											</div>
											<div class="col2">
												<label>Nr.<span class="red">*</span></label>
												<input type="text" name="p_nr" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="col1">
												<label>Postcode<span class="red">*</span></label>
												<input type="text" name="p_postcode" value="" />
											</div>
											<div class="col2">
												<label>Plaats<span class="red">*</span></label>
												<input type="text" name="p_plaats" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="colfull">
												<label>Land<span class="red">*</span></label>
												<select name="p_land">
													<option value="0"></option>
												</select>
											</div>
										</div>
										<div class="reg-row">
											<div class="col1">
												<label>Telefoon></label>
												<input type="text" name="p_telefoon" value="" />
											</div>
											<div class="col2">
												<label>Fax</label>
												<input type="text" name="p_fax" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="colfull">
												<label>GSM<span class="red">*</span></label>
												<input type="text" name="p_gsm" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="colfull">
												<label>Privé emailadres<span class="red">*</span></label>
												<input type="text" name="p_email" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="colfull">
												<label>Linkedin Profiel pagina</label>
												<input type="text" name="p_likedin" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="colfull">
												<label>Profielfoto</label>
												<div class="pictureUpload">
													<img src="images/pic.png" />
													<div class="fileUpload ">
														<span>UPLOAD FOTO</span>
														<input type="file" class="upload" />
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="reg-right">
										<h3>BEROEPSGEGEVENS</h3>
										<div class="reg-row">
											<div class="col1">
												<label>Naam van firma/organisatie<span class="red">*</span></label>
												<input type="text" name="b_naam" value="" />
											</div>
											<div class="col2">
												<label>(Hoofd) Functie<span class="red">*</span></label>
												<input type="text" name="b_hoofd" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="colfull">
												<label>Aard van de firma/organisatie<span class="red">*</span></label>
												<select name="b_firma">
													<option value="0"></option>
												</select>
											</div>
										</div>
										
										<div class="reg-row">
											<div class="col1">
												<label>Straat<span class="red">*</span></label>
												<input type="text" name="b_straat" value="" />
											</div>
											<div class="col2">
												<label>Nr.<span class="red">*</span></label>
												<input type="text" name="b_nr" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="col1">
												<label>Postcode<span class="red">*</span></label>
												<input type="text" name="b_postcode" value="" />
											</div>
											<div class="col2">
												<label>Plaats<span class="red">*</span></label>
												<input type="text" name="b_plaats" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="colfull">
												<label>Land<span class="red">*</span></label>
												<select name="b_land">
													<option value="0"></option>
												</select>
											</div>
										</div>
										<div class="reg-row">
											<div class="col1">
												<label>Telefoon</label>
												<input type="text" name="b_telefoon" value="" />
											</div>
											<div class="col2">
												<label>Fax</label>
												<input type="text" name="b_fax" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="colfull">
												<label>GSM</label>
												<input type="text" name="b_gsm" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="colfull">
												<label>Emailadres</label>
												<input type="text" name="b_email" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="colfull">
												<label>Website bedrijf/organisatie</label>
												<input type="text" name="b_organisatie" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="colfull">
												<label>Andere functies en mandaten</label>
												<input type="text" name="b_functies" value="" />
											</div>
										</div>	
									</div>
									<div class="clear"></div>
								</div>
								<!--End first box-->
								<div class="referenceBox">
									<h3>REFERENTIEPERSONEN</h3>
									<span class="note">Leden (minimum 2) die uw aanvraag om lid te worden steuren</span>
									<div class="reg-now">
										<div class="col">
											<label>Naam<span class="red">*</span></label>
											<input type="text" name="r_naam" value="" />
										</div>
										<div class="col">
											<label>Voornaam<span class="red">*</span></label>
											<input type="text" name="r_voornaam" value="" />
										</div>
										<div class="col">
											<label>Telefoon<span class="red">*</span></label>
											<input type="text" name="r_telefoon" value="" />
										</div>
										<div class="col">
											<label>Email<span class="red">*</span></label>
											<input type="text" name="r_email" value="" />
										</div>
									</div>
									<div class="reg-now">
										<div class="col">
											<label>Naam<span class="red">*</span></label>
											<input type="text" name="r_naam_2" value="" />
										</div>
										<div class="col">
											<label>Voornaam<span class="red">*</span></label>
											<input type="text" name="r_voornaam_2" value="" />
										</div>
										<div class="col">
											<label>Telefoon<span class="red">*</span></label>
											<input type="text" name="r_telefoon_2" value="" />
										</div>
										<div class="col">
											<label>Email<span class="red">*</span></label>
											<input type="text" name="r_email_2" value="" />
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<!--End reference Box-->
								<div class="dt_memberBox">
									<h3>GEGEVENS VOOR LIDMAATSCHAPSDOSSIER</h3>
									<h4>SECETARIAAT</h4>
									<div class="reg-now">
										<div class="colfull">
											<label>Naam contactpersoon op uw secretariaat<span class="red">*</span></label>
											<input type="text" name="f_personname" value="" />
										</div>
									</div>
									<div class="reg-now">
										<div class="col1">
											<label>Telefoon<span class="red">*</span></label>
											<input type="text" name="f_telefoon" value="" />
										</div>
										<div class="col2">
											<label>Fax<span class="red">*</span></label>
											<input type="text" name="f_fax" value="" />
										</div>
									</div>
									<div class="reg-now">
										<div class="col1">
											<label>Telefoon<span class="red">*</span></label>
											<input type="text" name="f_telefoon" value="" />
										</div>
										<div class="col2">
											<label>Emailadres<span class="red">*</span></label>
											<input type="text" name="f_email" value="" />
										</div>
									</div>
									<div class="reg-now">
										<div class="col1">
											<label>Telefoon<span class="red">*</span></label>
											<input type="text" name="f_telefoon" value="" />
										</div>
										<div class="col2">
											<label>BTW nummer firma/organisatie<span class="red">*</span></label>
											<input type="text" name="f_btw" value="" />
										</div>
									</div>
								</div>
									<div class="interestBox">
										<h4>INTERESSEGEBIEDEN</h4>
										<span class="note">Wat zijn uw belangrijkste interessegebieden</span>
										<div class="radioGroup">
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest01"/>
												<label for="interest01">bedrijven  en bedrijfssectoren</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest02"/>
												<label for="interest02">economie</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest03"/>
												<label for="interest03">bridge</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest04"/>
												<label for="interest04">media</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest05"/>
												<label for="interest05">management</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest06"/>
												<label for="interest06">golf</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest07"/>
												<label for="interest07">cultuur</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest08"/>
												<label for="interest08">diplomatieke  ontmoetingen</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest09"/>
												<label for="interest09">reizen</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest10"/>
												<label for="interest10">filosofie</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest11"/>
												<label for="interest11">politiek</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest12"/>
												<label for="interest12">culinair</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest13"/>
												<label for="interest13">maatschappelijke thema’s</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest14"/>
												<label for="interest14">wetenschap</label>
											</div>
											<div class="radiocol rdother checkboxStyle">
												<input type="checkbox" name="interest" value="" id="interest15"/>
												<label for="interest15">andere, specifieer</label>
												
												<input type="text" name="otherinterest" value="" class="otherip"/>
												
											</div>
											
										</div>
									</div>
									<!--end interestBox-->
									<div class="factureBox">
										<h4>FACTURATIEGEGEVENS<span class="red"></span></h4>
										<span class="note">Factureringsadres voor de activiteiten van Georgia</span>
										<div class="colfull checkboxStyle">
											<input type="checkbox" name="f_addresspayment" value="" id="facture_address"/>
											<label for="facture_address">privé-adres</label>
										</div>
										<div class="colfull checkboxStyle">
											<input type="checkbox" name="f_addresspayment" value="" id="facture_kanaddress"/>
											<label for="facture_kanaddress">kantooradres</label>
										</div>
										<div class="colfull checkboxStyle">
											<input type="checkbox" name="f_addresspayment" value="" id="facture_anderaddress"/>
											<label for="facture_anderaddress">ander adres: volledig adres van BTW-nummer opgeven aub</label>
										</div>
										<div class="other colfull">
											<textarea name="f_addresspayment"></textarea>
										</div>
									</div>
									<!--end factureBox-->
									<div class="acceptBox">
										<div class="chkaccept">
											<input type="checkbox" name="accept" value="" id="acceptform"/>
											<label for="acceptform">
												Ik verklaar hierbij de <a href="#" target="_blank">voorwaarden en reglementen</a> te hebben gelezen en ga daarmee akkoord
											</label>
										</div>
										<a href="#" class="btn">VERSTUUR MIJN AANVRAAG</a>
									</div>
								</div>
							</form>
                    	</div>
                    </div>

                </div>
            </div>

        </div>
        </div>

<?php get_footer();?>