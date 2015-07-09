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
    	case 'id_event':
			echo '<a href="'.admin_url().'post.php?post='.$item[$column_name].'&action=edit">'.get_the_title($item[ $column_name ]).'</a>';break;
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
	'datejoin'   => array('datejoin',false),
	'id_event' => array('id_event',false)
  );
  return $sortable_columns;
}

function get_columns(){
        $columns = array(
            'p_naam' => __( 'Naam', 'mylisttable' ),
            'p_voornaam'    => __( 'Voornaam', 'mylisttable' ),
            'p_email'    => __( 'Email', 'mylisttable' ),
            'p_telefoon'    => __( 'Telefoon', 'mylisttable' ),
            'status'      => __( 'Status', 'mylisttable' ),
            'status_join'      => __( 'Status Join', 'mylisttable' ),
            'datejoin'      => __( 'Date Join', 'mylisttable' ),
            'id_event' =>  __( 'Event', 'mylisttable')
			
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
            'edit'      => sprintf('<a href="?page=%s&action=%s&id=%s&id_event=%s">Edit</a>',$_REQUEST['page'],'edit',$item['id'], $item['id_event']),
            'delete'    => sprintf('<a href="?page=%s&action=%s&id=%s&id_event=%s">Delete</a>',$_REQUEST['page'],'delete',$item['id'], $item['id_event'])
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
		  // If the delete bulk action is triggered
		  if ( ( isset( $_GET['action'] ) && $_GET['action'] == 'delete' )) {
		    $ids = isset($_GET['id']) ? $_GET['id'] : array();
			$evs = isset($_GET['id_event']) ? $_GET['id_event'] : array();
			$i = -1;
		    $query_delete = $wpdb->query("DELETE FROM wp_participate WHERE id_event = '".$evs."' and id_member='".$ids."'");
			$wpdb->delete('wp_members', array('id' => $_GET['id']));
			$link = admin_url().'admin.php?page=view_event_member&event_title='.get_the_title($evs).'&id_event='.$evs;
			echo "<script>setTimeout(function(){window.location.href = '".$link."';},10);</script>";
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
				$link = admin_url().'admin.php?page=view_event_member&action=edit&id='.$data['id_member'].'&id_event='.$data['id_event'];
				echo "<script>setTimeout(function(){window.location.href = '".$link."';},10);</script>";
				exit();
			}else{
				echo "<script>alert('can\'t update')</script>";
			}
			
		}
	  }else{
	  	
	  }
		exit();
	}
    
	//Detect when a bulk action is being triggered...
    if( 'add_new'===$this->current_action() ) {
		global $wpdb;
		
		$id_event = $_GET['event_id'];
		if(!empty($id_event)){
			$query_ev = "SELECT id,p_naam,p_voornaam, p_telefoon, p_email FROM wp_members WHERE id NOT IN (select id_member from wp_participate where id_event ='".$id_event."') ORDER BY p_voornaam ASC";
			$members_arr = $wpdb->get_results($query_ev, ARRAY_A);
		}
		?>
		<script src="<?php echo bloginfo('template_url')?>/js/jquery.js?ver=1.11.1"></script>
		<script type='text/javascript' src='<?php echo bloginfo('template_url')?>/js/jquery.validate.js'></script>
		<script src="<?php echo bloginfo('template_url')?>/js/bootstrap.min.js"></script>
  		<script src="<?php echo bloginfo('template_url')?>/js/bootstrap-select.js"></script>
		<link href="<?php echo bloginfo('template_url')?>/event_member/css/jquery-ui-1.10.1.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo bloginfo('template_url')?>/css/bootstrap.min.css">
  		<link rel="stylesheet" href="<?php echo bloginfo('template_url')?>/css/bootstrap-select.css">
		<style>
		.notice, div.error, div.updated{
			box-shadow: none;
			border-bottom: none;
		}
		</style>
		<script>
			$(document).ready(function(){
				//validate
				jQuery.validator.addMethod('selectcheck', function (value) {
					return (value != '0');
				}, "");
				jQuery("#add_member_to_event").validate({
					rules: {
						'id_member': { 
							selectcheck: true
						},
						'id_event': { 
							selectcheck: true
						}
					},
					errorPlacement: function(error, element){},
					highlight: function(element) {
						var name = jQuery(element).attr('name');
						jQuery('select[name='+name+']').parent().addClass('error');
					},
					unhighlight: function(element, errorClass, validClass) {
						jQuery(element).removeClass(errorClass).addClass(validClass); // remove error class from elements/add valid class
						var name = jQuery(element).attr('name');
						jQuery('select[name='+name+']').parent().removeClass('error');
					},
					submitHandler: function(form) {
						form.submit();
					},
				});
				$(".choose_id_event").on('change',(function(e){
					$id_ev = $(this).val();
					$(this).parent().removeClass('error');
					$('input[name="id_event"]').val($id_ev);
					$('select[name=id_member]').empty().append('<option value="0">Select member</option>');
					$.ajax({
						type : "post",
						url : $('.ajaxurl').val(),
						data : {action: "user_select_event", id_event : $id_ev},
						//data: new FormData(this),
						success: function(response) {
							$('select[name=id_member]').append(response);
							$('.selectpicker').selectpicker('refresh');
						}            
					});
				}));
				
				$(".choose_id_member").on('change',(function(e){
					$id_ev = $(this).val();
					$(this).parent().removeClass('error');
					$('input[name="id_member"]').val($id_ev);
					console.log();
					$('input[name="p_voornaam_member"]').val($('.choose_id_member option[value="'+$id_ev+'"]').attr('data-voornaam'));
					$('input[name="p_naam_member"]').val($('.choose_id_member option[value="'+$id_ev+'"]').attr('data-naam'));
				}));
			});
		</script>
		<script>
			//$('.selectpicker').selectpicker();
		</script>
    	<div class="registerPage update-status-event">
    		<div class="registerBox">
				<form action="" method="post" id="add_member_to_event">
					<div class="informationBox">
						<div class="reg-left">
							<div class="reg-row">
								<input name="ajaxurl" type="hidden" class="ajaxurl" value="<?php echo bloginfo('home').'/wp-admin/admin-ajax.php'; ?>"/>
								<?php if(empty($id_event)){?>
								<div class="col1">
									<label>Event<span class="red">*</span></label>
									
									<input name="action" type="hidden" class="action" value="user_select_event"/>
									<select name="id_event" class="choose_id_event selectpicker" data-live-search="true">
										<option value="0">Select event</option>
										<?php
										$args_event = array(
								            'post_type' 	 => 'post',
								            'posts_per_page' => -1
								        );
										$queryevent = get_posts($args_event);
										foreach ($queryevent as $ev) {
										?>
										<option value="<?php echo $ev->ID;?>"><?php echo $ev->post_title;?></option>
										<?php }?>
									</select>
								</div>
								<?php }?>
								
								
							</div>
							<div class="reg-row">
								<div class="col1">
									<label>Member<span class="red">*</span></label>
									<input name="action" type="hidden" class="action" value="user_select_member"/>
									<select name="id_member" class="choose_id_member selectpicker" data-live-search="true">
										<option value="0">Select member</option>
										<?php if(!empty($members_arr)){
										foreach ($members_arr as $ev) {
											?>
											<option value="<?php echo $ev['id']?>" data-voornaam="<?php echo $ev['p_voornaam'];?>" data-naam="<?php echo $ev['p_naam']?>"><?php echo $ev['p_voornaam'].' '.$ev['p_naam'];?></option>
											<?php
											}	
										?>
											
										<?php }?>
									</select>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<input type="submit"  value="Update" class="btn" />
					<?php wp_nonce_field('add_event_member','act_event_add_member');?>
					<input type="hidden" value="<?php echo $_GET['event_title'];?>" name="event_title" />
					<input type="hidden" value="<?php echo $_GET['id_event'];?>" name="id_event" />
					<input type="hidden" value="<?php echo $_GET['id'];?>" name="id_member" />
					<input type="hidden" value="" name="p_naam_member" />
					<input type="hidden" value="" name="p_voornaam_member" />
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
  
  
  $per_page = 10;
  $current_page = $this->get_pagenum();
  global $wpdb;
  $id_event = $_GET['id_event'];
  if(!empty($id_event)){
  	$query = 'SELECT  m.id, m.p_naam, m.p_telefoon,m.p_email, m.p_voornaam, t.id_event, t.status,t.status_join, t.datejoin
				FROM wp_members m
				JOIN wp_participate t ON m.id = t.id_member
				JOIN wp_posts p on t.id_event = p.id
				where t.id_event = '.$id_event.' and m.id = t.id_member
				';
  }else{
  	$query = 'SELECT  m.id, m.p_naam, m.p_telefoon,m.p_email, m.p_voornaam, t.id_event, t.status,t.status_join, t.datejoin
				FROM wp_members m, wp_participate t where m.id = t.id_member
				
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
				';
				
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
  $id_event = $_GET['id_event'];
  echo '
  	</pre><div class="wrap"><h2>Event Members
  	<a href="?page=view_event_member&action=add_new&event_id='.$id_event.'" class="add-new-h2">Add Member To Event</a></h2>
  '; 
  
  global $wpdb;
  $query_count = "SELECT COUNT( * ) as TOTALMEMBER
					FROM  `wp_participate` 
					WHERE id_event = '$id_event'";
  $total_row = $wpdb->get_results($query_count);
  if($_GET['action']!='edit'){
	  if(!empty($id_event)){
	  	echo '<h3>The members joined "'.get_the_title($id_event).'" event.</h3>';
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
   
  if(!empty($_POST) && wp_verify_nonce($_POST['act_event_add_member'],'add_event_member')){
	  	
	  	global $wpdb;
		$event_title = !empty($_GET['event_title'])? $_GET['event_title']: $_POST['event_title'];
		$id_event = !empty($_GET['event_id'])? $_GET['event_id']: $_POST['id_event'];
		$p_naam = $_POST['p_naam_member'];
		$p_voornaam = $_POST['p_voornaam_member'];
		$id_member = $_POST['id_member'];
		$insert_member = $wpdb->insert('wp_members',
			array(
			  'p_naam'		=> $p_naam,
			  'p_voornaam'          => $p_voornaam,
			  'created' => $created,
			  'modified' => $modified
			),
			array(
			  '%s',
			  '%s',
			  '%s',
			  '%s'
			) 
		);
		$id_member = $wpdb->insert_id;
		if($insert_member){
			$execute = $wpdb->insert('wp_participate',
				array(
				  'id_event'		=> $id_event,
				  'id_member'          => $id_member,
				  'status' => 'uninvoiced',
				  'datejoin' => date('Y-m-d'),
				  'status_join' => 'yes'
				),
				array(
				  '%s',
				  '%s',
				  '%s',
				  '%s',
				  '%s'
				) 
			);
		}
		if($execute){
			if(empty($id_event)){
				$link = admin_url().'admin.php?page=view_event_member';
			}else{
				$link = admin_url().'admin.php?page=view_event_member&event_title='.$event_title.'&id_event='.$id_event;
			}
			echo "<script>setTimeout(function(){window.location.href = '".$link."';},10);</script>";
			exit();
		}else{
			echo "<script>alert('can\'t update')</script>";
		}
		exit();
	  }
?>
<a href="#"></a>
  <form method="post">
    <input type="hidden" name="page" value="ttest_list_table">
    <?php
    $myListTable->search_box( 'search', 'search_id' );

  $myListTable->display(); 
  echo '</form></div>'; 
}
