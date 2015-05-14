<?php
/*
Plugin Name: Test List Table Example
*/

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class My_Example_List_Table extends WP_List_Table {

    var $example_data = array(
            array( 'ID' => 1,'booktitle' => 'Quarter Share', 'author' => 'Nathan Lowell', 
                   'isbn' => '978-0982514542' ),
            array( 'ID' => 2, 'booktitle' => '7th Son: Descent','author' => 'J. C. Hutchins',
                   'isbn' => '0312384378' ),
            array( 'ID' => 3, 'booktitle' => 'Shadowmagic', 'author' => 'John Lenahan',
                   'isbn' => '978-1905548927' ),
            array( 'ID' => 4, 'booktitle' => 'The Crown Conspiracy', 'author' => 'Michael J. Sullivan',
                   'isbn' => '978-0979621130' ),
            array( 'ID' => 5, 'booktitle'     => 'Max Quick: The Pocket and the Pendant', 'author'    => 'Mark Jeffrey',
                   'isbn' => '978-0061988929' ),
            array('ID' => 6, 'booktitle' => 'Jack Wakes Up: A Novel', 'author' => 'Seth Harwood',
                  'isbn' => '978-0307454355' )
        );
    function __construct(){
    global $status, $page;

        parent::__construct( array(
            'singular'  => __( 'book', 'mylisttable' ),     //singular name of the listed records
            'plural'    => __( 'books', 'mylisttable' ),   //plural name of the listed records
            'ajax'      => false        //does this table support ajax?

    ) );

    add_action( 'admin_head', array( &$this, 'admin_header' ) );            

    }

  function admin_header() {
    $page = ( isset($_GET['page'] ) ) ? esc_attr( $_GET['page'] ) : false;
    if( 'my_list_test' != $page )
    return;
    echo '<style type="text/css">';
    echo '.wp-list-table .column-id { width: 5%; }';
    echo '.wp-list-table .column-naam { width: 40%; }';
    echo '.wp-list-table .column-vornaam { width: 35%; }';
	echo '.wp-list-table .column-email { width: 35%; }';
    echo '.wp-list-table .column-land { width: 20%;}';
    echo '</style>';
  }

  function no_items() {
    _e( 'No books found, dude.' );
  }

  function column_default( $item, $column_name ) {
    switch( $column_name ) { 
        case 'p_naam':
        case 'p_voornaam':
		case 'p_email':
        case 'p_land':
            return $item[ $column_name ];
        default:
            return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    }
  }

function get_sortable_columns() {
  $sortable_columns = array(
    'p_naam'  => array('Naam',false),
    'p_voornaam' => array('Voornaam',false),
    'p_email' => array('Email',false),
    'p_land'   => array('Land',false)
  );
  return $sortable_columns;
}

function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'p_naam' => __( 'Naam', 'mylisttable' ),
            'p_voornaam'    => __( 'Voornaam', 'mylisttable' ),
            'p_email'    => __( 'Email', 'mylisttable' ),
            'p_land'      => __( 'Land', 'mylisttable' )
        );
         return $columns;
    }

function usort_reorder( $a, $b ) {
  // If no sort, default to title
  $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'p_naam';
  // If no order, default to asc
  $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
  // Determine sort order
  $result = strcmp( $a[$orderby], $b[$orderby] );
  // Send final sort direction to usort
  return ( $order === 'asc' ) ? $result : -$result;
}

function column_p_naam($item){
  $actions = array(
            'edit'      => sprintf('<a href="?page=%s&action=%s&id=%s">Edit</a>',$_REQUEST['page'],'edit',$item['id']),
            'delete'    => sprintf('<a href="?page=%s&action=%s&id=%s">Delete</a>',$_REQUEST['page'],'delete',$item['id']),
        );

  return sprintf('%1$s %2$s', $item['p_naam'], $this->row_actions($actions) );
}

function get_bulk_actions() {
  $actions = array(
    'delete'    => 'Delete'
  );
  return $actions;
}
function process_bulk_action() {
        global $wpdb;
        //Detect when a bulk action is being triggered...
        if( 'delete'===$this->current_action() ) {
        	$delete = $wpdb->delete('wp_members', array('id' => $_GET['id']));
            //wp_die('Items deleted (or they would be if we had items to delete)!');
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
	    			<div class="informationBox">
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
					</div>
					<input type="submit"  value="Update!" />
					<?php wp_nonce_field('update_member','act_update_member');?>
	    		</form>
	    	</div>
    	</div>
    <?php 
		exit();
	}
}
    

function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="book[]" value="%s" />', $item['ID']
        );    
    }

function prepare_items() {
  $columns  = $this->get_columns();
  $hidden   = array();
  $sortable = $this->get_sortable_columns();
  $this->_column_headers = array( $columns, $hidden, $sortable );
  usort( $this->example_data, array( &$this, 'usort_reorder' ) );
  
  $per_page = 5;
  $current_page = $this->get_pagenum();
  global $wpdb;
  $query = 'SELECT id, p_naam, p_voornaam, p_email, p_land FROM wp_members';
  $members = $wpdb->get_results($query);
  $data = array();
  foreach ($members as $querydatum ) {
   			array_push($data, (array)$querydatum);}
  
  $total_items = count( $data );

  // only ncessary because we have sample data
  
  $this->found_data = array_slice( $data,( ( $current_page-1 )* $per_page ), $per_page );

  $this->set_pagination_args( array(
    'total_items' => $total_items,                  //WE have to calculate the total number of items
    'per_page'    => $per_page                     //WE have to determine how many items to show on a page
  ) );
  $this->items = $this->found_data;
  
  //delete compare
  $this->process_bulk_action();
  
  //edit compare
  $this->process_edit_action();
}

}
function my_add_menu_items(){
  $hook = add_menu_page( 'Members', 'Members', 'activate_plugins', 'view_member', 'my_render_list_page','',8 );
  add_action( "load-$hook", 'add_options' );
}

function add_options() {
  global $myListTable;
  $option = 'per_page';
  $args = array(
         'label' => 'Books',
         'default' => 10,
         'option' => 'books_per_page'
         );
  add_screen_option( $option, $args );
  $myListTable = new My_Example_List_Table();
}
add_action( 'admin_menu', 'my_add_menu_items' );



function my_render_list_page(){
  global $myListTable;
  echo '</pre><div class="wrap"><h2>Members</h2>'; 
  $myListTable->prepare_items(); 
  
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
			$link = admin_url().'admin.php?page=view_member';
			echo "<script>setTimeout(function(){window.location.href = '".$link."';},10);</script>";
		}
		else {
			echo "<script>alert('a')</script>";
		}
	}
?>
  <form method="post">
    <input type="hidden" name="page" value="ttest_list_table">
    <?php
    $myListTable->search_box( 'search', 'search_id' );

  $myListTable->display(); 
  echo '</form></div>'; 
}
