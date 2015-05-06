<?php 
	get_header();
?>
<?php
    //VALIDATE EMAIL
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        $p_email = $_POST['p_email'];
        $results = $wpdb->get_row("SELECT * FROM wp_members WHERE p_email = '$p_email'");
        if(!empty($results)){
            echo 'false';
            exit;
        }
        else{
            echo 'true';
            exit;
        }
    }

    
    if(isset($_SESSION['user'])){
        $link = get_site_url().'/profile';
        echo "<script>window.location.href = '$link';</script>";
    }
    $logged = false;
    $message = "";
    if(isset($_POST['b_email']))
    {
        global $wpdb;
        $data['p_naam'] = $_POST['p_naam'];
        $data['p_voornaam'] = $_POST['p_voornaam'];
        $data['p_geboortedatum'] = $_POST['p_geboortedatum'];
        $data['p_geboorteplaats'] = $_POST['p_geboorteplaats'];
        $data['p_straat'] = $_POST['p_straat'];
        $data['p_nr'] = $_POST['p_nr'];
        $data['p_postcode'] = $_POST['p_postcode'];
        $data['p_plaats'] = $_POST['p_plaats'];
        $data['p_land'] = $_POST['p_land'];
        $data['p_telefoon'] = $_POST['p_telefoon'];
        $data['p_fax'] = $_POST['p_fax'];
        $data['p_gsm'] = $_POST['p_gsm'];
        $data['p_email'] = $_POST['p_email'];
        $data['p_likedin'] = $_POST['p_likedin'];
        $data['p_picture'] = $_FILES['p_picture']['name'];
		
		if (!empty($data['p_picture'])) {
			$root = getcwd();
			$upload_dir = $root.'/wp-content/uploads/'.$data['p_voornaam'].'/';
			if (!file_exists($upload_dir)) {
				mkdir($upload_dir);
			}
			$target_file = $upload_dir.basename($data['p_picture']);
			move_uploaded_file($_FILES['p_picture']['tmp_name'], $target_file);
		}
		
		$data['p_password'] = sha1($_POST['p_password']);
		
		$data['p_picture'] = $data['p_voornaam'].'/'.$data['p_picture']; 
        $data['b_naam'] = $_POST['p_naam'];
		$data['b_hoofd'] = $_POST['b_hoofd'];
        $data['b_firma'] = $_POST['b_firma'];
        $data['b_straat'] = $_POST['b_straat'];
        $data['b_nr'] = $_POST['b_nr'];
        $data['b_postcode'] = $_POST['b_postcode'];
        $data['b_plaats'] = $_POST['b_plaats'];
        $data['b_land'] = $_POST['b_land'];
        $data['b_telefoon'] = $_POST['b_telefoon'];
        $data['b_fax'] = $_POST['b_fax'];
        $data['b_gsm'] = $_POST['b_gsm'];
        $data['b_email'] = $_POST['b_email'];
        $data['b_organisatie'] = $_POST['b_organisatie'];
        $data['b_functies'] = $_POST['b_functies'];
		
		
		$data['r_naam'] = $_POST['r_naam'];
		$data['r_voornaam'] = $_POST['r_voornaam'];
        $data['r_telefoon'] = $_POST['r_telefoon'];
        $data['r_email'] = $_POST['r_email'];
        $data['r_naam_2'] = $_POST['r_naam_2'];
		$data['r_voornaam_2'] = $_POST['r_voornaam_2'];
        $data['r_telefoon_2'] = $_POST['r_telefoon_2'];
        $data['r_email_2'] = $_POST['r_email_2'];
		
		
		$data['f_personname'] = $_POST['f_personname'];
		$data['f_telefoon'] = $_POST['f_telefoon'];
        $data['f_fax'] = $_POST['f_fax'];
        $data['f_email'] = $_POST['f_email'];
        $data['f_btw'] = $_POST['f_btw'];
		$interests = $_POST['f_interest'];
		$inter = array();
		foreach ($interests as $interest) {
			array_push($inter,$interest);
		}
		$data['f_interest'] = $inter.join(',');
		
		$pay = array();
		$payments = $_POST['f_addresspayment'];
		foreach ($payments as $payment) {
			array_push($pay,$payment);
		}
		$data['f_addresspayment'] = $pay.join(',');
		
		$data['f_notepayment'] = $_POST['f_notepayment'];
		
		$data['created'] = date('Y-m-d h:i:s');
        $data['modified'] = date('Y-m-d h:i:s');
        
        $results = $wpdb->insert('wp_members', $data);
        if($results){
            $logged = true;
            $message = "Register success";
            unset($data['password']);
            $_SESSION['user'] = $data;
            $link = get_site_url().'/success';
            echo "<script>setTimeout(function(){window.location.href = '$link';},1000);</script>";
        }
        else{
            $message = "Register failed";
        }
    }
?>


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
                    		<form action="" method="post" id="registerForm" enctype="multipart/form-data">
                    			<?php
		                            if($message != "")
		                            {
		                                $alert = $logged == true ? "alert-success" : "alert-danger";
		                                echo '<div class="alert '.$alert.'">'.$message.'</div>';
		                            }
		                                
		                        ?>  
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
												<input type="date" name="p_geboortedatum" value="" />
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
													<option value="0">Please select...</option>
													<option value="Corporation">Corporation</option>
													<option value="Partnership">Partnership</option>
												</select>
											</div>
										</div>
										<div class="reg-row">
											<div class="col1">
												<label>Telefoon</label>
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
												<label>Password<span class="red">*</span></label>
												<input type="password" name="p_password" value="" />
											</div>
										</div>
										<div class="reg-row">
											<div class="colfull">
												<label>Profielfoto</label>
												<div class="pictureUpload">
													<img src="images/pic.png" class="imgPreview" style="width: 48px; height: 38px;"/>
													<div class="fileUpload ">
														<span>UPLOAD FOTO</span>
														<input type="file" class="upload" name="p_picture"/>
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
													<option value="0">Please select...</option>
													<option value="Corporation">Corporation</option>
													<option value="Partnership">Partnership</option>
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
													<option value="0">Please select...</option>
													<option value="Corporation">Corporation</option>
													<option value="Partnership">Partnership</option>
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
											<label>Emailadres<span class="red">*</span></label>
											<input type="text" name="f_email" value="" />
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
												<input type="checkbox" name="f_interest" id="interest01" class="ipinterests" value="bedrijven en bedrijfssectoren"/>
												<label for="interest01">bedrijven en bedrijfssectoren</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest02" class="ipinterests" value="economie"/>
												<label for="interest02">economie</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest03" class="ipinterests" value="bridge"/>
												<label for="interest03">bridge</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest04" class="ipinterests" value="media"/>
												<label for="interest04">media</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest05" class="ipinterests" value="management"/>
												<label for="interest05">management</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest06" class="ipinterests" value="golf"/>
												<label for="interest06">golf</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest07" class="ipinterests" value="cultuur"/>
												<label for="interest07">cultuur</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest08" class="ipinterests" value="diplomatieke ontmoetingen"/>
												<label for="interest08">diplomatieke ontmoetingen</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest09" class="ipinterests" value="reizen"/>
												<label for="interest09">reizen</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest10" class="ipinterests" value="filosofie"/>
												<label for="interest10">filosofie</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest11" class="ipinterests" value="politiek"/>
												<label for="interest11">politiek</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest12" class="ipinterests" value="culinair"/>
												<label for="interest12">culinair</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest13" class="ipinterests" value="maatschappelijke thema\’s"/>
												<label for="interest13">maatschappelijke thema’s</label>
											</div>
											<div class="radiocol checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest14" class="ipinterests" value="wetenschap"/>
												<label for="interest14">wetenschap</label>
											</div>
											<div class="radiocol rdother checkboxStyle">
												<input type="checkbox" name="f_interest" id="interest15" class="ipinterests" value="andere, specifieer"/>
												<label for="interest15">andere, specifieer</label>
												
												<input type="text" name="f_interest" class="otherip"/>
												
											</div>
											
										</div>
									</div>
									<!--end interestBox-->
									<div class="factureBox">
										<h4>FACTURATIEGEGEVENS<span class="red"></span></h4>
										<span class="note">Factureringsadres voor de activiteiten van Georgia</span>
										<div class="colfull checkboxStyle">
											<input type="checkbox" name="f_addresspayment" id="facture_address" value="privé-adres"/>
											<label for="facture_address">privé-adres</label>
										</div>
										<div class="colfull checkboxStyle">
											<input type="checkbox" name="f_addresspayment" id="facture_kanaddress" value="kantooradres"/>
											<label for="facture_kanaddress">kantooradres</label>
										</div>
										<div class="colfull checkboxStyle">
											<input type="checkbox" name="f_addresspayment" id="facture_anderaddress" value="ander adres: volledig adres van BTW-nummer opgeven aub"/>
											<label for="facture_anderaddress">ander adres: volledig adres van BTW-nummer opgeven aub</label>
										</div>
										<div class="other colfull">
											<textarea name="f_notepayment"></textarea>
										</div>
									</div>
									<!--end factureBox-->
									<div class="acceptBox">
										<div class="chkaccept checkboxStyle">
											<input type="checkbox" name="accept" id="acceptform"/>
											<label for="acceptform">
												Ik verklaar hierbij de <a href="#" target="_blank">voorwaarden en reglementen</a> te hebben gelezen en ga daarmee akkoord
											</label>
										</div>
										<a href="javascript:void(0)" onclick="jQuery('#registerForm').submit();" class="btn">VERSTUUR MIJN AANVRAAG</a>
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