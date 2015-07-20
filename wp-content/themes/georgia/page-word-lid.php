<?php 
	get_header();
?>


<?php
    //VALIDATE EMAIL
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
    	
        $p_email = $_POST['p_email'];
		
        $results = $wpdb->get_row("SELECT p_email FROM wp_members WHERE p_email = '".$p_email."'");
        if($results == 'true'){
            echo 'false';
        }
        else{
            echo 'true';
        }
    }
    
    $logged = false;
    $message = "";
	if(!empty($_POST) && wp_verify_nonce($_POST['act_register_member'],'register_member')){
	    if(!empty($_POST['p_email']))
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
            $data['p_picture'] = $_POST['p_picture'];

			if (!empty($data['p_picture'])) {
				$root = getcwd();
				/*
				$upload_dir = $root.'/wp-content/uploads/avatar/';
				if (!file_exists($upload_dir)) {
					mkdir($upload_dir);
				}
				$fileName = time().$data['p_picture'];
				$target_file = $upload_dir.basename($fileName);
				move_uploaded_file($_FILES['p_picture']['tmp_name'], $target_file );
				$data['p_picture'] = $fileName;
				*/

                //get source file
                $picture_file = $data['p_picture'];

                list($picture_type, $picture_file) = explode(';', $picture_file);
                list(, $picture_file)      = explode(',', $picture_file);
                $picture_file = base64_decode($picture_file);
                $target_file = $upload_dir.basename($fileName);

                //get path file
                $upload_dir = $root.'/wp-content/uploads/avatar/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir);
                }
                $fileName = time().$_FILES['p_picture_temp']['name'];
                $target_file = $upload_dir.basename($fileName);
                $data['p_picture'] = $fileName;

                file_put_contents($target_file, $picture_file);
			}
			if(empty($data['p_picture'])){
				$data['p_picture'] = 'no-avatar.jpg';
			}
			$data['p_user_status'] = 0;
			$data['p_password'] = sha1($_POST['p_password']);
			$data['p_plain_password'] = $_POST['p_password'];
			$data['p_picture'] = $data['p_picture']; 
	        $data['b_naam'] = $_POST['b_naam'];
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
			
			$newinter = '';
			if(!empty($_POST['f_interest'])) {
			    foreach($_POST['f_interest'] as $f_inter) {
			        $newinter .= empty($newinter) ? $f_inter : ', '.$f_inter;
			    }
			}
			$data['f_interest'] = $newinter;
			
			$newpay = '';
			$w_pay = $_POST['f_addresspayment'];
			if(count($w_pay)>1){
				if(!empty($_POST['f_addresspayment'])) {
				    foreach($_POST['f_addresspayment'] as $f_pay) {
				        $newpay .= empty($newpay) ? $f_pay : ', '.$f_pay;
				    }
				}
				$data['f_addresspayment'] = $newpay;
			}else{
				$data['f_addresspayment'] = $w_pay;	
			}
			$data['f_notepayment'] = $_POST['f_notepayment'];
			//$data['f_user_status'] = $_POST['f_user_status'];
			$data['created'] = date('Y-m-d h:i:s');
	        $data['modified'] = date('Y-m-d h:i:s');
	        
	        $results = $wpdb->insert('wp_members', $data);

            //exit();

	        if($results){
	            $logged = true;
	            $message = "Register success";
	            //unset($data['password']);
	            //$_SESSION['user'] = $data;
				//$_SESSION['user_id'] = $data['id'];
				send_new_subscriber($data['p_email']);
	            $link = get_site_url().'/success';
	            echo "<script>setTimeout(function(){window.location.href = '$link';},1);</script>";
	        }
	        else{
	        	
	            $message = "Register failed";
	        }
	    }else{
	    	//$message = "Please type the field.";
	    }
	 }


?>


<body class="tribe-filter-live  tribe-events-uses-geolocation sticky-header-no wpb-js-composer js-comp-ver-4.4.2 vc_responsive events-list events-archive tribe-theme-eventica-wp tribe-events-page-template">
    <div id="site-container" class="site-container sb-site-container">
    	<?php get_template_part('tpl','menu');?>
		 <section id="page-title" class="page-title events-title">
            <div class="container">

                <div class="breadcrumb-trail breadcrumb breadcrumbs">
                    <span class="trail-begin"><a href="<?php echo get_bloginfo('home')?>/word-lid" title="Eventica">WORD LID</a></span>
                    
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
                    			<span><a href="<?php echo bloginfo('home')?>/voorwaarden-reglementen" target="_blank">Lees eerste de voorwaarden en reglementen</a></span>
                    		</div>
                    		<form action="" method="post" id="registerForm" enctype="multipart/form-data">
                    			<?php
		                            if($message != "")
		                            {
		                                $alert = $logged == true ? "alert-success" : "alert-danger";
		                                echo '<div class="alert '.$alert.'" style="padding-bottom: 20px;">'.$message.'</div>';
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
												<input id="date_geboortedatum" type="text" name="p_geboortedatum" value="" />
											</div>
											<div class="col2">
												<label>Geboorteplaats<span class="red">*</span></label>
												<input type="text" name="p_geboorteplaats" value=""  />
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
                                                <?php
                                                /*$region_location_array = get_field('region_location', 'option');

                                                $stroption_region_location = '';
                                                foreach($region_location_array as $region_location)
                                                {
                                                    $no = $region_location['no'];
                                                    $title = $region_location['title'];
                                                    $stroption_region_location .= '<option value="'.$no.'">'.$title.'</option>';
                                                }*/
                                                
                                                ?>
												<!--select name="p_land">
													<option value="0">Please select...</option>
                                                    <?php echo $stroption_region_location;?>
												</select-->
												<?php echo countryArray('p_land','');?>	
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
												<label>Privé emailadres<span class="red">*</span> (u dient in te loggen met dit emailadres)</label>
												
												<input type="text" name="p_email" value="" id="p_email"/>
												<input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
												<input type="hidden" value="<?php echo get_site_url();?>" class="siteurl"/>
												<input name="action" type="hidden" class="action" value="check_user_email"/>
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
													<img src="images/pic.png" class="imgPreview" title="Edit Image"  style="width: 48px; height: 38px;" onclick="SiteMain.openPopup('#message-cropit')"/>
                                                    <textarea class="p_picture" name="p_picture" style="display: none;">data:image/jpg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABQAAD/4QMtaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjdBQzRDRUNGMDQ4MjExRTVCNDNEQ0Y4Qzk3RkY4RDM1IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjdBQzRDRUNFMDQ4MjExRTVCNDNEQ0Y4Qzk3RkY4RDM1IiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxNzZFMjgxMUZGMjYxMUU0ODIyNDgwRUEyQzNBRDY3NyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxNzZFMjgxMkZGMjYxMUU0ODIyNDgwRUEyQzNBRDY3NyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pv/uAA5BZG9iZQBkwAAAAAH/2wCEAAICAgICAgICAgIDAgICAwQD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</textarea>
													<div class="fileUpload ">
														<span>UPLOAD FOTO</span>
														<input type="file" class="upload cropit-image-input" name="p_picture_temp"/>
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
                                                <?php
                                                $business_sector_array = get_field('business_sector', 'option');

                                                $stroption_business_sector = '';
                                                foreach($business_sector_array as $business_sector)
                                                {
                                                    $no = $business_sector['no'];
                                                    $title = $business_sector['title'];
                                                    $stroption_business_sector .= '<option value="'.$no.'">'.$title.'</option>';
                                                }
                                                ?>
												<select name="b_firma">
													<option value="0">Please select...</option>

													<?php echo $stroption_business_sector;?>
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
												<label>Regio<span class="red">*</span></label>
												<?php
													$region_location_array = get_field('region_location', 'option');
		
					                                $stroption_region_location = '';
					                                foreach($region_location_array as $region_location)
					                                {
					                                    $no = $region_location['no'];
					                                    $title = $region_location['title'];
					                                    $stroption_region_location .= '<option value="'.$no.'">'.$title.'</option>';
					                                }
												?>
												<select name="b_land">
                                                    <option value="0">Please select...</option>
                                                    <?php echo $stroption_region_location;?>
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
												<input type="text" name="b_organisatie" value="" placeholder="http://www.yoursite.com" />
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
									<span class="note">Leden (minimum 2) die uw aanvraag om lid te worden steunen</span>
									<div class="reg-now">
										<div class="col">
											<label>Naam</label>
											<input type="text" name="r_naam" value="" />
										</div>
										<div class="col">
											<label>Voornaam</label>
											<input type="text" name="r_voornaam" value="" />
										</div>
										<div class="col">
											<label>Telefoon</label>
											<input type="text" name="r_telefoon" value="" />
										</div>
										<div class="col">
											<label>Email</label>
											<input type="text" name="r_email" value="" />
										</div>
									</div>
									<div class="reg-now">
										<div class="col">
											<label>Naam</label>
											<input type="text" name="r_naam_2" value="" />
										</div>
										<div class="col">
											<label>Voornaam</label>
											<input type="text" name="r_voornaam_2" value="" />
										</div>
										<div class="col">
											<label>Telefoon</label>
											<input type="text" name="r_telefoon_2" value="" />
										</div>
										<div class="col">
											<label>Email</label>
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
											<label>Naam contactpersoon op uw secretariaat</label>
											<input type="text" name="f_personname" value="" />
										</div>
									</div>
									<div class="reg-now">
										<div class="col1">
											<label>Telefoon</label>
											<input type="text" name="f_telefoon" value="" />
										</div>
										<div class="col2">
											<label>Fax</label>
											<input type="text" name="f_fax" value="" />
										</div>
									</div>
									
									<div class="reg-now">
										<div class="col1">
											<label>Emailadres</label>
											<input type="text" name="f_email" value="" />
										</div>
										<div class="col2">
											<label>BTW nummer firma/organisatie</label>
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
											<input type="checkbox" name="accept" id="acceptform" checked="checked"/>
											<label for="acceptform">
												Ik verklaar hierbij de <a href="<?php echo bloginfo('home')?>/voorwaarden-reglementen" target="_blank">voorwaarden en reglementen</a> te hebben gelezen en ga daarmee akkoord
											</label>
										</div>
										<input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
	                                    <input name="action" type="hidden" class="action" value="register_action"/>
										<a href="javascript:void(0)" onclick="jQuery('#registerForm').submit();" class="btn">VERSTUUR MIJN AANVRAAG</a>
										<?php wp_nonce_field('register_member','act_register_member');?>
										<input type="hidden" name="f_user_status" value="verified"/>
									</div>
								</div>
							</form>
                    	</div>
                    </div>

                </div>
            </div>

        </div>
        </div>

<?php get_template_part('tpl','message-cropit')?>
<script>
    $(function() {
        $('.image-editor').cropit({
            imageState: {src:"images/avatar.jpg"}
        });
    });
</script>
<?php get_footer();?>