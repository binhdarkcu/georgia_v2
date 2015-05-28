<?php
/*
Plugin Name: Test List Table Example
*/

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class My_Event_List_Table extends WP_List_Table {

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
		case 'p_telefoon':
        case 'status':
		case 'status_join':
		case 'datejoin':
            return $item[ $column_name ];
        default:
            return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    }
  }

function get_sortable_columns() {
  $sortable_columns = array(
    'p_naam'  => array('p_naam',false),
    'p_voornaam' => array('p_voornaam',false),
    'p_email' => array('p_email',false),
    'p_telefoon' => array('p_telefoon',false),
    'status'   => array('status',false),
    'status_join'   => array('status_join',false),
	'datejoin'   => array('datejoin',false)
  );
  return $sortable_columns;
}

function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'p_naam' => __( 'Naam', 'mylisttable' ),
            'p_voornaam'    => __( 'Voornaam', 'mylisttable' ),
            'p_email'    => __( 'Email', 'mylisttable' ),
            'p_telefoon'    => __( 'Telefoon', 'mylisttable' ),
            'status'      => __( 'Status', 'mylisttable' ),
            'status_join'      => __( 'Status Join', 'mylisttable' ),
            'datejoin'      => __( 'Date Join', 'mylisttable' )
			
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
            'edit'      => sprintf('<a href="?page=%s&action=%s&id=%s&id_event=%s">Edit</a>',$_REQUEST['page'],'edit',$item['id'], $item['id_event'])
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
		$query = 'SELECT DISTINCT m.id, m.p_naam, m.p_telefoon,m.p_email, m.p_voornaam, t.status,t.status_join, t.datejoin
				FROM wp_members m
				JOIN wp_participate t ON m.id = t.id_member
				JOIN wp_posts p on t.id_event = p.id
				where t.id_event = '.$_GET['id_event'].' AND t.id_member = '.$_GET['id'].'
				GROUP BY m.id';
		$member = $wpdb->get_row($query, ARRAY_A);
		?>
		<link href="<?php echo bloginfo('template_url')?>/event_member/css/jquery-ui-1.10.1.css" rel="stylesheet">
    	<div class="registerPage update-status-event">
    		<div class="registerBox">
				<form action="" method="post">
					<div class="informationBox">
						<div class="reg-left">
							<h3>Update event for <?php echo $member['p_voornaam']; ?></h3>
							<div class="reg-row">
								<div class="col1">
									<label>Naam<span class="red">*</span></label>
									<input disabled="disabled" type="text" name="p_naam" value="<?php echo $member['p_naam']; ?>" />
								</div>
								<div class="col2">
									<label>Voornaam<span class="red">*</span></label>
									<input disabled="disabled" type="text" name="p_voornaam" value="<?php echo $member['p_voornaam']; ?>" />
								</div>
							</div>
							<div class="reg-row">
								<div class="col1">
									<label>Email<span class="red">*</span></label>
									<input disabled="disabled" type="text" name="p_email" value="<?php echo $member['p_email']; ?>" />
								</div>
								<div class="col2">
									<label>Telefoon<span class="red">*</span></label>
									<input disabled="disabled" type="text" name="p_telefoon" value="<?php echo $member['p_telefoon']; ?>"  />
								</div>
							</div>
							<div class="reg-row">
								<div class="col1">
									<label>Status<span class="red">*</span></label>
									<select name="status">
										<option value="invoiced" <?php echo ($member['status'] == 'invoiced') ? 'selected':''; ?>>invoiced</option>
										<option value="uninvoiced" <?php echo ($member['status'] == 'uninvoiced') ? 'selected':''; ?>>uninvoiced</option>
									</select>
								</div>
								<div class="col2">
									<label>Date Join<span class="red">*</span></label>
									<input disabled="disabled" type="text" name="p_nr" value="<?php echo $member['datejoin']; ?>" />
								</div>
							</div>
							<div class="reg-row">
								<div class="col1">
									<label>Status Join<span class="red">*</span></label>
									<select name="status_join">
										<option value="yes" <?php echo ($member['status_join'] == 'yes') ? 'selected':''; ?>>yes</option>
										<option value="cancle" <?php echo ($member['status_join'] == 'cancle') ? 'selected':''; ?>>cancle</option>
									</select>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<input type="submit"  value="Update" class="btn" />
					<?php wp_nonce_field('update_event_member','act_event_update_member');?>
					<input type="hidden" value="<?php echo $_GET['id_event'];?>" name="id_event" />
					<input type="hidden" value="<?php echo $_GET['id'];?>" name="id_member" />
				</form>
			</div>
    	</div>
    <?php 
	  if(!empty($_POST) && wp_verify_nonce($_POST['act_event_update_member'],'update_event_member')){
	  	
	  	global $wpdb;	
		$data['id_event'] = $_GET['id_event'];
		$data['id_member'] = $_GET['id'];
		$event = $wpdb->get_row("SELECT * FROM wp_participate WHERE (id_event = '".$data['id_event']."' AND id_member = '".$data['id_member']."')");
		
		if(!empty($event)){
			$execute = $wpdb->update( 
				'wp_participate', 
				array( 
					'status' => $_POST['status'],
					'status_join' => $_POST['status_join']
				), 
				array(
					'id' => $event->{'id'}
				), 
				array( 
					'%s'
				),
				array( '%d' ) 
			);
			if($execute){
				$link = admin_url().'admin.php?page=view_event_member';
				echo "<script>setTimeout(function(){window.location.href = '".$link."';},10);</script>";
			}else{
				echo "<script>alert('can\'t update')</script>";
			}
			
		}
	  }else{
	  	
	  }
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
  
  
  $per_page = 10;
  $current_page = $this->get_pagenum();
  global $wpdb;
  $id_event = $_GET['id_event'];
  if(!empty($id_event)){
  	$query = 'SELECT  m.id, m.p_naam, m.p_telefoon,m.p_email, m.p_voornaam, t.id_event, t.status,t.status_join, t.datejoin
				FROM wp_members m
				JOIN wp_participate t ON m.id = t.id_member
				JOIN wp_posts p on t.id_event = p.id
				where t.id_event = '.$id_event.'
				';
  }else{
  	$query = 'SELECT  m.id, m.p_naam, m.p_telefoon,m.p_email, m.p_voornaam, t.id_event, t.status,t.status_join, t.datejoin
				FROM wp_members m, wp_participate t
				GROUP BY t.id
				';
  }
  
  $members = $wpdb->get_results($query);
  
  $data = array();
  foreach ($members as $querydatum ) {
   			array_push($data, (array)$querydatum);}
  
  
  $search = $_POST['s'];
  //echo "<script>alert('$search')</script>";
  if( $search != NULL ){
       
        // Trim Search Term
        $search = trim($search);
       
        /* Notice how you can search multiple columns for your search term easily, and return one data set */
        $s_query = "SELECT DISTINCT m.id, m.p_naam, m.p_telefoon,m.p_email, m.p_voornaam, t.id_event, t.status,t.status_join, t.datejoin
				FROM wp_members m
				JOIN wp_participate t ON m.id = t.id_member
				JOIN wp_posts p on t.id_event = p.id
				where t.id_event = '.$id_event.'
	        	OR p_naam LIKE '%$search%'
	        	OR p_email LIKE '%$search%'
	        	OR p_voornaam LIKE '%$search%'
	        	OR status LIKE '%$search%',
	        	OR status_join LIKE '%$search%'
	        	OR datejoin LIKE '%$search%'
	        	GROUP BY t.id
        ";
  		$members = $wpdb->get_results($s_query);
		$data = array();
  		foreach ($members as $querydatum ) {
   			array_push($data, (array)$querydatum);}
 
  }else{
  	if(empty($id_event)){
	  	$query = 'SELECT  m.id, m.p_naam, m.p_telefoon,m.p_email, m.p_voornaam, t.id_event, t.status,t.status_join, t.datejoin
				FROM wp_members m, wp_participate t where m.id = t.id_member
				GROUP BY t.id';
				
	  	$members = $wpdb->get_results($query);
		$data = array();
		foreach ($members as $querydatum ) {
		   	array_push($data, (array)$querydatum);}
	}
  }
  usort( $data, array( &$this, 'usort_reorder' ) );
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
  
  //edit action
  $this->process_edit_action();
}

} //class



function event_add_menu_items(){
  $hook = add_menu_page( 'Event Members', 'Event Members', 'activate_plugins', 'view_event_member', 'my_render_event_list_page','',11 );
  add_action( "load-$hook", 'event_add_options' );
}

function event_add_options() {
  global $myListTable;
  $option = 'per_page';
  $args = array(
         'label' => 'Books',
         'default' => 10,
         'option' => 'books_per_page'
         );
  add_screen_option( $option, $args );
  $myListTable = new My_Event_List_Table();
}
add_action( 'admin_menu', 'event_add_menu_items' );



function my_render_event_list_page(){
  global $myListTable;
  echo '</pre><div class="wrap"><h2>Event Members</h2>'; 
  $id_event = $_GET['id_event'];
  global $wpdb;
  $query_count = "SELECT COUNT( * ) as TOTALMEMBER
					FROM  `wp_participate` 
					WHERE id_event = '$id_event'";
  $total_row = $wpdb->get_results($query_count);
  if($_GET['action']!='edit'){
	  if(!empty($id_event)){
	  	echo '<h3>Have '.$total_row[0]->TOTALMEMBER.' members joined "'.$_GET['event_title'].'" event.</h3>';
	  }else{
	  	echo '<h3>All member join this event.</h3>';
	  }
  }
	$search = $_POST['s'];
	if( isset($search) ){
	        $myListTable->prepare_items($search);
	} else {
	        $myListTable->prepare_items();
	}
   
  
?>
  <form method="post">
    <input type="hidden" name="page" value="ttest_list_table">
    <?php
    $myListTable->search_box( 'search', 'search_id' );

  $myListTable->display(); 
  echo '</form></div>'; 
}
