<?php
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class TT_Member_List_Table extends WP_List_Table {
    
    /** ************************************************************************
     * Normally we would be querying data from a database and manipulating that
     * for use in your list table. For this example, we're going to simplify it
     * slightly and create a pre-built array. Think of this as the data that might
     * be returned by $wpdb->query().
     * 
     * @var array 
     **************************************************************************/
    var $example_data = array(
            array(
                'ID'        => 1,
                'title'     => '300',
                'rating'    => 'R',
                'director'  => 'Zach Snyder'
            ),
            array(
                'ID'        => 2,
                'title'     => 'Eyes Wide Shut',
                'rating'    => 'R',
                'director'  => 'Stanley Kubrick'
            ),
            array(
                'ID'        => 3,
                'title'     => 'Moulin Rouge!',
                'rating'    => 'PG-13',
                'director'  => 'Baz Luhrman'
            ),
            array(
                'ID'        => 4,
                'title'     => 'Snow White',
                'rating'    => 'G',
                'director'  => 'Walt Disney'
            ),
            array(
                'ID'        => 5,
                'title'     => 'Super 8',
                'rating'    => 'PG-13',
                'director'  => 'JJ Abrams'
            ),
            array(
                'ID'        => 6,
                'title'     => 'The Fountain',
                'rating'    => 'PG-13',
                'director'  => 'Darren Aronofsky'
            ),
            array(
                'ID'        => 7,
                'title'     => 'Watchmen',
                'rating'    => 'R',
                'director'  => 'Zach Snyder'
            )
        );


    function __construct(){
        global $status, $page;
                
        //Set parent defaults
        parent::__construct( array(
            'singular'  => 'member',     //singular name of the listed records
            'plural'    => 'members',    //plural name of the listed records
            'ajax'      => false        //does this table support ajax?
        ) );
        
    }

    function column_default($item, $column_name){
        switch($column_name){
            case 'p_picture': 
				echo '<img src="' . home_url().'/wp-content/uploads/avatar/' . $item[ $column_name ].'" width="38"/>';
				break;
	        case 'p_naam':
	        case 'p_voornaam':
			case 'p_email':
	        case 'p_land':
				$region_location_array = get_field('region_location', 'option');
				foreach($region_location_array as $region_location){
					if($region_location['no'] == $item[ $column_name ]){
						return $region_location['title'];
					}
				}
			case 'p_telefoon':
			case 'p_plaats':
	            return $item[ $column_name ];
	        default:
	            return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
        }
    }

    function column_p_naam($item){
        
        //Build row actions
        $actions = array(
            'edit'      => sprintf('<a href="?page=%s&action=%s&id=%s">Edit</a>',$_REQUEST['page'],'edit',$item['id']),
            'delete'    => sprintf('<a href="?page=%s&action=%s&id=%s">Delete</a>',$_REQUEST['page'],'delete',$item['id']),
            'detail'    => sprintf('<a href="?page=%s&action=%s&id=%s">Detail</a>',$_REQUEST['page'],'detail',$item['id']),
        );
        
        //Return the title contents
        return sprintf('%1$s %2$s', $item['p_naam'], $this->row_actions($actions) );
    }


    function column_cb($item){
        return sprintf(
            '<input type="checkbox" name="%1$s[]" value="%2$s" />',
            /*$1%s*/ $this->_args['singular'],  //Let's simply repurpose the table's singular label ("movie")
            /*$2%s*/ $item['id']                //The value of the checkbox should be the record's id
        );
    }


    /** ************************************************************************
     * REQUIRED! This method dictates the table's columns and titles. This should
     * return an array where the key is the column slug (and class) and the value 
     * is the column's title text. If you need a checkbox for bulk actions, refer
     * to the $columns array below.
     * 
     * The 'cb' column is treated differently than the rest. If including a checkbox
     * column in your table you must create a column_cb() method. If you don't need
     * bulk actions or checkboxes, simply leave the 'cb' entry out of your array.
     * 
     * @see WP_List_Table::::single_row_columns()
     * @return array An associative array containing column information: 'slugs'=>'Visible Titles'
     **************************************************************************/
    function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />', //Render a checkbox instead of text
            'p_picture' =>'Avatar',
            'p_naam'     => 'Naam',
            'p_voornaam'    => 'Voornaam',
            'p_email'    => 'Email',
            'p_land'      => 'Land',
			'p_telefoon'    => 'Telefoon',
            'p_plaats'      => 'Plaats'
        );
        return $columns;
    }


    /** ************************************************************************
     * Optional. If you want one or more columns to be sortable (ASC/DESC toggle), 
     * you will need to register it here. This should return an array where the 
     * key is the column that needs to be sortable, and the value is db column to 
     * sort by. Often, the key and value will be the same, but this is not always
     * the case (as the value is a column name from the database, not the list table).
     * 
     * This method merely defines which columns should be sortable and makes them
     * clickable - it does not handle the actual sorting. You still need to detect
     * the ORDERBY and ORDER querystring variables within prepare_items() and sort
     * your data accordingly (usually by modifying your query).
     * 
     * @return array An associative array containing all the columns that should be sortable: 'slugs'=>array('data_values',bool)
     **************************************************************************/
    function get_sortable_columns() {
        $sortable_columns = array(
            'p_picture' => array('p_picture',false),
		    'p_naam'  => array('p_naam',false),
		    'p_voornaam' => array('p_voornaam',false),
		    'p_email' => array('p_email',false),
		    'p_land'   => array('p_land',false),
			'p_telefoon' => array('p_telefoon',false),
		    'p_plaats'   => array('p_land',false)
        );
        return $sortable_columns;
    }


    /** ************************************************************************
     * Optional. If you need to include bulk actions in your list table, this is
     * the place to define them. Bulk actions are an associative array in the format
     * 'slug'=>'Visible Title'
     * 
     * If this method returns an empty value, no bulk action will be rendered. If
     * you specify any bulk actions, the bulk actions box will be rendered with
     * the table automatically on display().
     * 
     * Also note that list tables are not automatically wrapped in <form> elements,
     * so you will need to create those manually in order for bulk actions to function.
     * 
     * @return array An associative array containing all the bulk actions: 'slugs'=>'Visible Titles'
     **************************************************************************/
    function get_bulk_actions() {
        $actions = array(
            'delete'    => 'Delete'
        );
        return $actions;
    }


    /** ************************************************************************
     * Optional. You can handle your bulk actions anywhere or anyhow you prefer.
     * For this example package, we will handle it in the class to keep things
     * clean and organized.
     * 
     * @see $this->prepare_items()
     **************************************************************************/
    
    function process_bulk_action() {
        
        //Detect when a bulk action is being triggered...
       /* if( 'delete'===$this->current_action() ) {
        	global $wpdb;
			echo '<script>alert('.$_GET['id'].')</script>';
            $wpdb->delete('wp_members', array('id' => $_GET['id']));
			$link = admin_url().'admin.php?page=tt_member';*/
			//echo "<script>setTimeout(function(){window.location.href = '".$link."';},10);</script>";
            //wp_die('Items deleted (or they would be if we had items to delete)!');
        
        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);

            if (!empty($ids)) {
                global $wpdb;
	            $wpdb->delete('wp_members', array('id' => $_GET['id']));
				$link = admin_url().'admin.php?page=tt_member';
            }
        }
		  // If the delete bulk action is triggered
		  if ( ( isset( $_GET['action'] ) && $_GET['action'] == 'delete' )) {
		 	
		    $ids = isset($_GET['member']) ? $_GET['member'] : array();
		    foreach ( $ids as $id ) {
		      //self::delete_customer( $id );
		 		global $wpdb;
            	$wpdb->delete('wp_members', array('id' => $id));
				$link = admin_url().'admin.php?page=tt_member';
				echo "<script>setTimeout(function(){window.location.href = '".$link."';},10);</script>";
		    }
		 
		  }
    }
	//edit member
	function process_edit_action() {
	    
	    //Detect when a bulk action is being triggered...
	    if( 'edit'===$this->current_action() ) {
	    	
			
			global $wpdb;
			$query = 'SELECT * FROM wp_members WHERE id = '.$_GET['id'];
			$member = $wpdb->get_row($query, ARRAY_A);
		?>
	    	<script src="<?php echo bloginfo('template_url')?>/js/jquery.js?ver=1.11.1"></script>
	    	<script src="<?php echo bloginfo('template_url')?>/members/js/jquery-ui-1.10.1.min.js"></script>
			<script src="<?php echo bloginfo('template_url')?>/members/js/update_member.js"></script>
	    	<link href="<?php echo bloginfo('template_url')?>/members/css/jquery-ui-1.10.1.css" rel="stylesheet">
			<link type="text/css" rel='stylesheet' href="<?php echo bloginfo('template_url')?>/members/css/latoja.datepicker.css"/>
			<script type="text/javascript">
				  $(function() {
				    $( "#date_geboortedatum, #date_geboorteplaats" ).datepicker({
						inline: true,
						changeMonth: true,
		    			changeYear: true,
						showOtherMonths: true
					})
					.datepicker('widget').wrap('<div class="ll-skin-latoja"/>');
				  });
			</script>
	    	<div class="registerPage ">
	    		<div class="registerBox">
		    		<form action="" method="post" enctype="multipart/form-data">
		    			<h3>Edit member</h3>
		    			<div style="float: left;">
		    				<h4>Naam: <?php echo $member['p_naam']; ?></h4>
		    				<img src="<?php echo bloginfo('home')?>/wp-content/uploads/avatar/<?php echo $member['p_picture'];?>" style="width: 148px;"/>
		    			</div>
		    			<div class="informationBox" style="float: right;">
							<div class="reg-left">
								<h3>PRIVEGEGEVENS</h3>
								<div class="reg-row">
									<div class="col1">
										<label>Naam<span class="red">*</span></label>
										<input type="text" name="p_naam" value="<?php echo $member['p_naam']; ?>" />
									</div>
									<div class="col2">
										<label>Voornaam<span class="red">*</span></label>
										<input type="text" name="p_voornaam" value="<?php echo $member['p_voornaam']; ?>" />
									</div>
								</div>
								<div class="reg-row">
									<div class="col1">
										<label>Geboortedatum<span class="red">*</span></label>
										<input id="date_geboortedatum" type="text" name="p_geboortedatum" value="<?php echo $member['p_geboortedatum']; ?>" />
									</div>
									<div class="col2">
										<label>Geboorteplaats<span class="red">*</span></label>
										<input id="date_geboorteplaats" type="text" name="p_geboorteplaats" value="<?php echo $member['p_geboorteplaats']; ?>"  />
									</div>
								</div>
								<div class="reg-row">
									<div class="col1">
										<label>Straat<span class="red">*</span></label>
										<input type="text" name="p_straat" value="<?php echo $member['p_straat']; ?>" />
									</div>
									<div class="col2">
										<label>Nr.<span class="red">*</span></label>
										<input type="text" name="p_nr" value="<?php echo $member['p_nr']; ?>" />
									</div>
								</div>
								<div class="reg-row">
									<div class="col1">
										<label>Postcode<span class="red">*</span></label>
										<input type="text" name="p_postcode" value="<?php echo $member['p_postcode']; ?>" />
									</div>
									<div class="col2">
										<label>Plaats<span class="red">*</span></label>
										<input type="text" name="p_plaats" value="<?php echo $member['p_plaats']; ?>" />
									</div>
								</div>
								<div class="reg-row">
									<div class="colfull">
										<label>Land<span class="red">*</span></label>
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
										<select name="p_land">
		                                    <?php echo str_replace('value="'.$member['p_land'].'"', 'value="'.$member['p_land'].'" selected', $stroption_region_location);?>
										</select>
									</div>
								</div>
								<div class="reg-row">
									<div class="col1">
										<label>Telefoon</label>
										<input type="text" name="p_telefoon" value="<?php echo $member['p_telefoon']; ?>" />
									</div>
									<div class="col2">
										<label>Fax</label>
										<input type="text" name="p_fax" value="<?php echo $member['p_fax']; ?>" />
									</div>
								</div>
								<div class="reg-row">
									<div class="colfull">
										<label>GSM<span class="red">*</span></label>
										<input type="text" name="p_gsm" value="<?php echo $member['p_gsm']; ?>" />
									</div>
								</div>
								<div class="reg-row">
									<div class="colfull">
										<label>Privé emailadres<span class="red">*</span></label>
										
										<input disabled="disabled" type="text" name="p_email" value="<?php echo $member['p_email']; ?>" id="p_email"/>
										<input type="hidden" name="p_email" value="<?php echo $member['p_email']; ?>" id="p_email"/>
										<input name="action" type="hidden" class="action" value="check_user_email"/>
									</div>
								</div>
								<div class="reg-row">
									<div class="colfull">
										<label>Linkedin Profiel pagina</label>
										<input type="text" name="p_likedin" value="<?php echo $member['p_likedin']; ?>" />
									</div>
								</div>
								
								<div class="reg-row">
									<div class="colfull">
										<label>Profielfoto</label>
										<div class="pictureUpload">
											<img src="<?php echo bloginfo('home')?>/wp-content/uploads/avatar/<?php echo $member['p_picture'];?>" class="imgPreview" style="width: 48px; height: 38px;"/>
											<div class="fileUpload ">
												<span>UPLOAD FOTO</span>
												<input type="file" class="upload" name="p_picture" id="filePicture"/>
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
										<input type="text" name="b_naam" value="<?php echo $member['b_naam']; ?>" />
									</div>
									<div class="col2">
										<label>(Hoofd) Functie<span class="red">*</span></label>
										<input type="text" name="b_hoofd" value="<?php echo $member['b_hoofd']; ?>" />
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
											<?php echo str_replace('value="'.$member['b_firma'].'"', 'value="'.$member['b_firma'].'" selected', $stroption_business_sector);?>
										</select>
									</div>
								</div>
								
								<div class="reg-row">
									<div class="col1">
										<label>Straat<span class="red">*</span></label>
										<input type="text" name="b_straat" value="<?php echo $member['b_straat']; ?>" />
									</div>
									<div class="col2">
										<label>Nr.<span class="red">*</span></label>
										<input type="text" name="b_nr" value="<?php echo $member['b_nr']; ?>" />
									</div>
								</div>
								<div class="reg-row">
									<div class="col1">
										<label>Postcode<span class="red">*</span></label>
										<input type="text" name="b_postcode" value="<?php echo $member['b_postcode']; ?>" />
									</div>
									<div class="col2">
										<label>Plaats<span class="red">*</span></label>
										<input type="text" name="b_plaats" value="<?php echo $member['b_plaats']; ?>" />
									</div>
								</div>
								<div class="reg-row">
									<div class="colfull">
										<label>Land<span class="red">*</span></label>
		
										<select name="b_land">
		                                    <?php echo str_replace('value="'.$member['b_land'].'"', 'value="'.$member['b_land'].'" selected', $stroption_region_location);?>
										</select>
									</div>
								</div>
								<div class="reg-row">
									<div class="col1">
										<label>Telefoon</label>
										<input type="text" name="b_telefoon" value="<?php echo $member['b_telefoon']; ?>" />
									</div>
									<div class="col2">
										<label>Fax</label>
										<input type="text" name="b_fax" value="<?php echo $member['b_fax']; ?>" />
									</div>
								</div>
								<div class="reg-row">
									<div class="colfull">
										<label>GSM</label>
										<input type="text" name="b_gsm" value="<?php echo $member['b_gsm']; ?>" />
									</div>
								</div>
								<div class="reg-row">
									<div class="colfull">
										<label>Emailadres</label>
										<input type="text" name="b_email" value="<?php echo $member['b_email']; ?>" />
									</div>
								</div>
								<div class="reg-row">
									<div class="colfull">
										<label>Website bedrijf/organisatie</label>
										<input type="text" name="b_organisatie" value="<?php echo $member['b_organisatie']; ?>" />
									</div>
								</div>
								<div class="reg-row">
									<div class="colfull">
										<label>Andere functies en mandaten</label>
										<input type="text" name="b_functies" value="<?php echo $member['b_functies']; ?>" />
									</div>
								</div>	
							</div>
							<div class="clear"></div>
							<input type="submit"  value="Update" class="btn" />
							<?php wp_nonce_field('update_member','act_update_member');?>
						</div>
						
		    		</form>
		    	</div>
	    	</div>
	    <?php 
			exit();
		}
	}
	function process_detail_action(){
		if( 'detail'===$this->current_action() ) {
			global $wpdb;
			$query = 'SELECT * FROM wp_members WHERE id = '.$_GET['id'];
			$member = $wpdb->get_row($query, ARRAY_A);
		?>
			<div class="registerPage ">
	    		<div class="registerBox">
					<h3>Member detail</h3>
					<div style="float: left;">
						<h4>Naam: <?php echo $member['p_naam']; ?></h4>
						<img src="<?php echo bloginfo('home')?>/wp-content/uploads/avatar/<?php echo $member['p_picture'];?>" style="width: 148px;"/>
					</div>
					<div class="informationBox" style="float: right;">
						<div class="reg-left">
							<h3>PRIVEGEGEVENS</h3>
							<div class="reg-row">
								<div class="col1">
									<label><b>Naam:</b></label>
									<span><?php echo $member['p_naam']; ?></span>
								</div>
								<div class="col2">
									<label><b>Voornaam:</b></label>
									<span><?php echo $member['p_voornaam']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="col1">
									<label><b>Geboortedatum:</b></label>
									<span><?php echo $member['p_geboortedatum']; ?></span>
								</div>
								<div class="col2">
									<label><b>Geboorteplaats:</b></label>
									<span><?php echo $member['p_geboorteplaats']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="col1">
									<label><b>Straat:</b></label>
									<span><?php echo $member['p_straat']; ?></span>
								</div>
								<div class="col2">
									<label><b>Nr.:</b></label>
									<span><?php echo $member['p_nr']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="col1">
									<label><b>Postcode:</b></label>
									<span><?php echo $member['p_postcode']; ?></span>
								</div>
								<div class="col2">
									<label><b>Plaats:</b></label>
									<span><?php echo $member['p_plaats']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="colfull">
									<label><b>Land:</b></label>
									<span>
										<?php
											$region_location_array = get_field('region_location', 'option');
											foreach($region_location_array as $region_location){
												if($region_location['no'] == $member['p_land']){
													echo $region_location['title'];
												}
											}
										?>
									</span>
								</div>
							</div>
							<div class="reg-row">
								<div class="col1">
									<label><b>Telefoon:</b></label>
									<span><?php echo $member['p_telefoon']; ?></span>
								</div>
								<div class="col2">
									<label><b>Fax:</b></label>
									<span><?php echo $member['p_fax']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="colfull">
									<label><b>GSM:</b></label>
									<span><?php echo $member['p_gsm']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="colfull">
									<label><b>Privé emailadres:</b></label>
									<span><?php echo $member['p_email']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="colfull">
									<label><b>Linkedin Profiel pagina:</b></label>
									<span><?php echo $member['p_likedin']; ?></span>
								</div>
							</div>
						</div>
						<div class="reg-right">
							<h3>BEROEPSGEGEVENS</h3>
							<div class="reg-row">
								<div class="col1">
									<label><b>Naam van firma/organisatie:</b></label>
									<span><?php echo $member['b_naam']; ?></span>
								</div>
								<div class="col2">
									<label><b>(Hoofd) Functie:</b></label>
									<span><?php echo $member['b_hoofd']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="colfull">
									<label><b>Aard van de firma/organisatie:</b></label>
									<span>
										<?php
											$region_location_array = get_field('business_sector', 'option');
											foreach($region_location_array as $region_location){
												if($region_location['no'] == $member['b_firma']){
													echo $region_location['title'];
												}
											}
										?>
									</span>
								</div>
							</div>
							
							<div class="reg-row">
								<div class="col1">
									<label><b>Straat:</b></label>
									<span><?php echo $member['b_straat']; ?></span>
								</div>
								<div class="col2">
									<label><b>Nr.:</b></label>
									<span><?php echo $member['b_nr']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="col1">
									<label><b>Postcode:</b></label>
									<span><?php echo $member['b_postcode']; ?></span>
								</div>
								<div class="col2">
									<label><b>Plaats:</b></label>
									<span><?php echo $member['b_plaats']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="colfull">
									<label><b>Land:</b></label>
									<span>
										<?php
											$region_location_array = get_field('region_location', 'option');
											foreach($region_location_array as $region_location){
												if($region_location['no'] == $member['b_land']){
													echo $region_location['title'];
												}
											}
										?>
									</span>
								</div>
							</div>
							<div class="reg-row">
								<div class="col1">
									<label><b>Telefoon:</b></label>
									<span><?php echo $member['b_telefoon']; ?></span>
								</div>
								<div class="col2">
									<label><b>Fax:</b></label>
									<span><?php echo $member['b_fax']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="colfull">
									<label><b>GSM:</b></label>
									<span><?php echo $member['b_gsm']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="colfull">
									<label><b>Emailadres:</b></label>
									<span><?php echo $member['b_email']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="colfull">
									<label><b>Website bedrijf/organisatie:</b></label>
									<span><?php echo $member['b_organisatie']; ?></span>
								</div>
							</div>
							<div class="reg-row">
								<div class="colfull">
									<label><b>Andere functies en mandaten:</b></label>
									<span><?php echo $member['b_functies']; ?></span>
								</div>
							</div>	
						</div>
						<div class="clear"></div>
					</div>
		    	</div>
	    	</div>
		<?php	
		exit();
		}
	}
		
    function prepare_items() {
        global $wpdb; //This is used only if making any database queries
		$_SERVER['REQUEST_URI'] = remove_query_arg( '_wp_http_referer', $_SERVER['REQUEST_URI'] );
        /**
         * First, lets decide how many records per page to show
         */
        $per_page = 5;
         
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        
        $this->_column_headers = array($columns, $hidden, $sortable);
        
        $this->process_bulk_action();
        //edit compare
		  $this->process_edit_action();
		  
		  //edit compare
		  $this->process_detail_action();
        
        //$data = $this->example_data;
          global $wpdb;
		  
		  
		  $search = $_POST['s'];
		  //echo "<script>alert('$search')</script>";
		  if( $search != NULL ){
		       
		        // Trim Search Term
		        $search = trim($search);
		       
		        /* Notice how you can search multiple columns for your search term easily, and return one data set */
		        $s_query = "SELECT id, p_picture, p_naam, p_voornaam, p_email, p_land, p_telefoon, p_plaats FROM wp_members where p_plaats LIKE '%$search%'
		        	OR p_plaats LIKE '%$search%'
		        	OR p_picture LIKE '%$search%'
		        	OR p_naam LIKE '%$search%'
		        	OR p_email LIKE '%$search%'
		        	OR p_telefoon LIKE '%$search%'
		        	OR p_plaats LIKE '%$search%'
		        ";
		  		$members = $wpdb->get_results($s_query);
				$data = array();
		  		foreach ($members as $querydatum ) {
		   			array_push($data, (array)$querydatum);}
		 
		  }else{
		  	$query = 'SELECT id, p_picture, p_naam, p_voornaam, p_email, p_land, p_telefoon, p_plaats FROM wp_members';
		  	$members = $wpdb->get_results($query);
			$data = array();
		  	foreach ($members as $querydatum ) {
		   			array_push($data, (array)$querydatum);}
		  }
		        
        
        function usort_reorder($a,$b){
            $orderby = (!empty($_REQUEST['orderby'])) ? $_REQUEST['orderby'] : 'title'; //If no sort, default to title
            $order = (!empty($_REQUEST['order'])) ? $_REQUEST['order'] : 'asc'; //If no order, default to asc
            $result = strcmp($a[$orderby], $b[$orderby]); //Determine sort order
            return ($order==='asc') ? $result : -$result; //Send final sort direction to usort
        }
        usort($data, 'usort_reorder');
        
        $current_page = $this->get_pagenum();
        

        $total_items = count($data);
        $data = array_slice($data,(($current_page-1)*$per_page),$per_page);
        
        
        $this->items = $data;
        
        $this->set_pagination_args( array(
            'total_items' => $total_items,                  //WE have to calculate the total number of items
            'per_page'    => $per_page,                     //WE have to determine how many items to show on a page
            'total_pages' => ceil($total_items/$per_page)   //WE have to calculate the total number of pages
        ) );
    }


}





/** ************************ REGISTER THE TEST PAGE ****************************
 *******************************************************************************
 * Now we just need to define an admin page. For this example, we'll add a top-level
 * menu item to the bottom of the admin menus.
 */
function tt_add_member_menu_items(){
    add_menu_page('Members', 'Members', 'activate_plugins', 'tt_member', 'tt_render_member_list_page','',8);
} add_action('admin_menu', 'tt_add_member_menu_items');


/** *************************** RENDER TEST PAGE ********************************
 *******************************************************************************
 * This function renders the admin page and the example list table. Although it's
 * possible to call prepare_items() and display() from the constructor, there
 * are often times where you may need to include logic here between those steps,
 * so we've instead called those methods explicitly. It keeps things flexible, and
 * it's the way the list tables are used in the WordPress core.
 */
function tt_render_member_list_page(){
    
    //Create an instance of our package class...
    $testListTable = new TT_Member_List_Table();
    //Fetch, prepare, sort, and filter our data...
    $search = $_POST['s'];
    if( isset($search) ){
            $testListTable->prepare_items($search);
    } else {
            $testListTable->prepare_items();
    }
    //$testListTable->prepare_items();
    /*EDIT MEMBER*/
  	if(!empty($_POST) && wp_verify_nonce($_POST['act_update_member'],'update_member')){
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
        $data['p_likedin'] = $_POST['p_likedin'];
        
		if (!empty($_FILES['p_picture']['name'])) {
			$data['p_picture'] = $_FILES['p_picture']['name'];
			$root = wp_upload_dir();
			$root = $root['basedir'];
			$upload_dir = $root.'/avatar/';
			if (!file_exists($upload_dir)) {
				mkdir($upload_dir);
			}
			$fileName = time().$data['p_picture'];
			$target_file = $upload_dir.basename($fileName);
			move_uploaded_file($_FILES['p_picture']['tmp_name'], $target_file);
			$data['p_picture'] = basename($fileName);
		}
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
		if(!empty($_POST['p_email'])) {
			$wpdb->update( 
				'wp_members', 
				$data,
				array( 'Id' => $_GET['id'])
			);
			$link = admin_url().'admin.php?page=tt_member';
			echo "<script>setTimeout(function(){window.location.href = '".$link."';},10);</script>";
		}
		else {
			echo "<script>alert('can\'t update')</script>";
		}
	}
    ?>
    <div class="wrap">
        <form method="post">
		  <input type="hidden" name="page" value="tt_member" />
		  <?php $testListTable->search_box('search', 'search_id'); ?>
		</form>
        <!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
        <form id="movies-filter" method="get">
            <!-- For plugins, we also need to ensure that the form posts back to our current page -->
            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
            <!-- Now we can render the completed list table -->
            <?php $testListTable->display() ?>
        </form>
        
    </div>
    <?php
}