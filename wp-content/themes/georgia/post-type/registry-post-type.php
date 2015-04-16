<?php
//Promotion
add_action( 'init', 'register_custom_promotion' );
function register_custom_promotion() {
    $promotion_label = array(
        'name' => _x('Promotions', 'Promotions'),
        'singular_name' => _x('promotion', 'promotion'),
        'add_new' => _x('Add New', 'Promotions'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit '),
        'new_item' => __('Add New'),
        'all_items' => __('View All'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' =>  __('Not Find'),
        'not_found_in_trash' => __('Not Find in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Promotions'
    );
    $promotion= array(
        'labels' => $promotion_label,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus'=>true,
        'query_var' => true,
        'rewrite' =>  array('slug'=>'promotion'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon'	=> get_bloginfo('template_url').'/post-type/images/facities.png',
        //'taxonomies'		=> array('category'),
        'supports' => array('title','editor','thumbnail'),
    );
    register_post_type('promotion',$promotion);
}

//Testimonials
add_action( 'init', 'register_custom_testimonials' );
function register_custom_testimonials() {
    $testimonials_label = array(
        'name' => _x('Testimonials', 'Testimonials'),
        'singular_name' => _x('testimonials', 'testimonials'),
        'add_new' => _x('Add New', 'Testimonials'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit '),
        'new_item' => __('Add New'),
        'all_items' => __('View All'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' =>  __('Not Find'),
        'not_found_in_trash' => __('Not Find in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Testimonials'
    );
    $testimonials= array(
        'labels' => $testimonials_label,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus'=>true,
        'query_var' => true,
        'rewrite' =>  array('slug'=>'testimonials'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon'	=> get_bloginfo('template_url').'/post-type/images/facities.png',
        //'taxonomies'		=> array('category'),
        'supports' => array('title','editor','thumbnail'),
    );
    register_post_type('testimonials',$testimonials);
}

//Contact Us
add_action( 'init', 'register_custom_contacts' );
function register_custom_contacts() {
    $contacts_label = array(
        'name' => _x('Contacts', 'Contacts'),
        'singular_name' => _x('contacts', 'contacts'),
        'add_new' => _x('Add New', 'Contacts'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit '),
        'new_item' => __('Add New'),
        'all_items' => __('View All'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' =>  __('Not Find'),
        'not_found_in_trash' => __('Not Find in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Contacts'
    );
    $contacts= array(
        'labels' => $contacts_label,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus'=>true,
        'query_var' => true,
        'rewrite' =>  array('slug'=>'contacts'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon'	=> get_bloginfo('template_url').'/post-type/images/facities.png',
        //'taxonomies'		=> array('category'),
        'supports' => array('title','editor','thumbnail'),
    );
    register_post_type('contacts',$contacts);
}

//Custom Sliders
add_action( 'init', 'register_custom_sliders' );
function register_custom_sliders() {
    $sliders_label = array(
        'name' => 'Sliders',
        'singular_name' => 'sliders',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New',
        'edit_item' => 'Edit',
        'new_item' => 'Add New',
        'all_items' => 'View All',
        'view_item' => 'View',
        'search_items' => 'Search',
        'not_found' =>  __('Not Find'),
        'not_found_in_trash' => __('Not Find in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Sliders'
    );
    $sliders= array(
        'labels' => $sliders_label,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus'=>true,
        'query_var' => true,
        'rewrite' =>  array('slug'=>'sliders'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon'	=> get_bloginfo('template_url').'/post-type/images/facities.png',
        //'taxonomies'		=> array('category'),
        'supports' => array('title','editor','thumbnail'),
    );
    register_post_type('sliders',$sliders);
}

add_action( 'init', 'register_custom_homeland' );
function register_custom_homeland() {
    $promotion_label = array(
        'name' => _x('Home land', 'Home land'),
        'singular_name' => _x('homeland', 'homeland'),
        'add_new' => _x('Add New', 'Homeland'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit '),
        'new_item' => __('Add New'),
        'all_items' => __('View All'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' =>  __('Not Find'),
        'not_found_in_trash' => __('Not Find in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Home land'
    );
    $promotion= array(
        'labels' => $promotion_label,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus'=>true,
        'query_var' => true,
        'rewrite' =>  array('slug'=>'homeland'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon'	=> get_bloginfo('template_url').'/post-type/images/facities.png',
        //'taxonomies'		=> array('category'),
        'supports' => array('title','editor','thumbnail'),
    );
    register_post_type('homeland',$promotion);
}