<?php
    /*update_option('siteurl','http://georgia-bc.be');
    update_option('home','http://georgia-bc.be');*/

    function ses_init() {
      if (!session_id())
	      session_start();
	}
	add_action('init','ses_init');
    //add theme support
    add_theme_support('post-thumbnails',array('post','page','slider','organisaties','promotion','homeland'));
	set_post_thumbnail_size( 360, 182, true ); 
    //register post type
    include TEMPLATEPATH.'/post-type/registry-post-type.php';
	
	//register post type
    //include TEMPLATEPATH.'/taxonomy-custom/taxonomy-custom.php';
	//register meta box
	require_once( 'meta-box/init.php' );

    //change label post
    include 'inc/change_label_post.php';
	
	//change label post
    include 'inc/page_nav.php';


    // AJAX
    include 'inc/ajax_events_sidebar.php';
	include 'inc/profile.php';
	include 'inc/participate_event.php';
	include 'inc/add_guest.php';
	
	//
	include 'members/page_member.php';
	include 'event_member/page_event_member.php';
	//count total item when distinct
	function distinctPost($meta_value){
		global $wpdb;
		$wp_query = "SELECT count(DISTINCT pm.post_id)
		FROM $wpdb->postmeta pm
		JOIN $wpdb->posts p ON (p.ID = pm.post_id)
		WHERE pm.meta_key = 'datetime'
		AND pm.meta_value = $meta_value
		AND p.post_type = 'post'
		AND p.post_status = 'publish'
		";
		$count = $wpdb->get_var($wp_query);
		return $count;
	}
	
	//compare between 2 days
	function dateDiff($dateStart, $dateEnd) 
	{
	    $start = strtotime($dateStart);
	    $end = strtotime($dateEnd);
	    $days = $end - $start;
	    $days = ceil($days/86400);
	    return $days;
	}

	//style login page
	function custom_login_css() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/admin/login-style.css" />';
	}
	add_action('login_head', 'custom_login_css');
	
	//add type columns
    include 'inc/type_column.php';
	include 'inc/date_column.php';
	//add countries
    include 'inc/countries.php';
	//filter home
    //include 'inc/filter_home.php';
	
	//contact form
	include TEMPLATEPATH . '/email/smtp.php';
	include TEMPLATEPATH . '/email/xtemplate.contact.php';
	include TEMPLATEPATH . '/email/xtemplate.forgotpassword.php';
	
	include TEMPLATEPATH . '/email/xtemplate.actived.php';
	include TEMPLATEPATH . '/email/xtemplate.sendtoadmin.php';
	//contact form
	//include TEMPLATEPATH . '/email/xtemplate.jimform.php';
	// Setup Admin Thumbnail Size
	if ( function_exists( 'add_theme_support' ) ) {
		add_image_size( 'admin-thumb', 100, 999999 ); // 100 pixels wide (and unlimited height)
	}
	
	// Thumbnails to Admin Post View
	add_filter('manage_posts_columns', 'posts_columns', 10);
	add_action('manage_posts_custom_column', 'posts_custom_columns', 10, 2);
	
	function posts_columns($defaults){
		$defaults['my_post_thumbs'] = __('Picture event');
		return $defaults;
	}
	
	function posts_custom_columns($column_name, $id){
		if($column_name === 'my_post_thumbs'){
			the_post_thumbnail( 'admin-thumb' );
		}
	}
	//register menu
	function register_menu() {
	  register_nav_menu('menu_top',__( 'menu_top' ));
	  
		register_nav_menus( array(
			'menu_top' => 'Header - Menu'
		) );
	}
	add_action( 'init', 'register_menu' );
	
	
	//add style admin
	add_action( 'admin_enqueue_scripts', 'load_admin_style' );
      function load_admin_style() {
        wp_register_style( 'admin_css', get_template_directory_uri() . '/admin/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/admin/admin-style.css', false, '1.0.0' );
       }
	
	add_action('do_meta_boxes', 'replace_featured_image_box');  
	function replace_featured_image_box()  
	{  
	    remove_meta_box( 'postimagediv', 'post', 'side' );  
	    add_meta_box('postimagediv', __('Thumbnail (360 width x 182 height pixels)'), 'post_thumbnail_meta_box', 'post', 'side', 'low');  
	}  
	//rewrite view all category
	function change_viewall_url_rewrite() {
		if ( is_category()) {
			wp_redirect( home_url( "/category/view-all" ));
			exit();
		}	
	}
	//add_action( 'template_redirect', 'change_viewall_url_rewrite' );
	if( !function_exists('wp_remove_wp_columns') ):
	function wp_remove_wp_columns( $columns ) {
	  unset($columns['tags']);
	  unset($columns['comments']);
	  unset($columns['date']);
	  return $columns;
	}
	function wp_remove_wp_columns_init() {
	add_filter( 'manage_posts_columns' , 'wp_remove_wp_columns' );
	}
	add_action( 'admin_init' , 'wp_remove_wp_columns_init' );
	endif;
	function closest($array, $number) {

	    sort($array);
	    foreach ($array as $a) {
	        if ($a >= $number) return $a;
	    }
	    return end($array); // or return NULL;
	}
	
	function get_page_id_by_slug($slug){
	    global $wpdb;
	    $id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."'AND post_type = 'page'");
	    return $id;
	}
	
	function get_post_id_by_slug($slug){
	    global $wpdb;
	    $id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."'AND post_type = 'post'");
	    return $id;
	}
	
	function get_post_id( $slug, $post_type ) {
		if(!empty($slug)){
		    $query = new WP_Query(
		        array(
		            'name' => $slug,
		            'post_type' => $post_type
		        )
		    );
		
		    $query->the_post();
		
		    return get_the_ID();
		}
	}

    function convertMonths_String($month, $flag){
        $arrayMonths_Long = array('','januari','februari','maart','april','mei','juni','juli','augustus','september','oktober','november','december');
        $arrayMonths_short = array('','jan','feb','maa','apr','mei','jun','jul','aug','sep','okt','nov','dec');
		
        return $flag ? $arrayMonths_Long[$month] : $arrayMonths_short[$month];
    }
	
	

if( function_exists('acf_add_options_sub_page') ) {

    acf_add_options_sub_page(array(
        'title' => 'Events Setting',
        'menu' => 'Events Setting',
        'slug' => 'events-setting',
        'parent' => 'edit.php',
        'capability' => 'edit_posts'

    ));
}
add_action( 'current_screen', 'thisScreen' );

function thisScreen() {
    $currentScreen = get_current_screen();
	if($currentScreen->post_type == 'organisaties'){?>
		<style>
			.types_post.column-types_post, #types_post{
				display: none;
			}
			
		</style>
	<?php }
}


function my_title_count(){
 $screen = get_current_screen();
 if($screen->post_type == 'post'){	
?>
<script>jQuery(document).ready(function(){
	jQuery("#titlediv .inside").after("<div style=\"position:absolute;top:-25px;right:-5px;\"><span>Max 30 characters:</span> <input type=\"text\" value=\"0\" maxlength=\"30\" size=\"3\" id=\"title_counter\" readonly=\"\" style=\"background:none;border:none;box-shadow:none;font-weight:bold; text-align:right;\"></div>");
		jQuery("#title_counter").val(jQuery("#title").val().length);
		jQuery("#title").on('keypress change input' ,function(e) {
			jQuery("#title_counter").val(jQuery("#title").val().length);
			if(jQuery(this).val().length > 29){
				e.preventDefault();
			}
		}).on('keydown', function(e) {
		   if (e.keyCode==8)
		     jQuery("#title_counter").val(jQuery("#title").val().length);
		 });
	});
</script>
<?php } }
add_action( 'admin_head-post.php', 'my_title_count');
add_action( 'admin_head-post-new.php', 'my_title_count');
?>
