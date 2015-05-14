<?php
    function ses_init() {
      if (!session_id())
	      session_start();
	}
	add_action('init','ses_init');
    //add theme support
    add_theme_support('post-thumbnails',array('post','page','slider','organisaties','promotion','homeland'));

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
	
	//add type columns
    include 'inc/type_column.php';
	
	//filter home
    //include 'inc/filter_home.php';
	
	//contact form
	include TEMPLATEPATH . '/email/smtp.php';
	include TEMPLATEPATH . '/email/xtemplate.contact.php';
	
	//contact form
	//include TEMPLATEPATH . '/email/xtemplate.jimform.php';
	
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
	
	
	//rewrite view all category
	function change_viewall_url_rewrite() {
		if ( is_category()) {
			wp_redirect( home_url( "/category/view-all" ));
			exit();
		}	
	}
	//add_action( 'template_redirect', 'change_viewall_url_rewrite' );
	
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

