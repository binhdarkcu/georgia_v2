<?php
//Promotion
//add_action( 'init', 'register_custom_slider' );
function register_custom_slider() {
    $slider_label = array(
        'name' => _x('Slider', 'Slider'),
        'singular_name' => _x('promotion', 'promotion'),
        'add_new' => _x('Add New', 'Slider'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit '),
        'new_item' => __('Add New'),
        'all_items' => __('View All'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' =>  __('Not Find'),
        'not_found_in_trash' => __('Not Find in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Slider'
    );
    $slider = array(
        'labels' => $slider_label,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus'=>true,
        'query_var' => true,
        'rewrite' =>  array('slug'=>'slider'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon'	=> get_bloginfo('template_url').'/post-type/images/facities.png',
        //'taxonomies'		=> array('category'),
        'supports' => array('title','editor','thumbnail'),
    );
    register_post_type('slider',$slider);
}

add_action( 'init', 'register_custom_organize' );
function register_custom_organize() {
    $slider_label = array(
        'name' => _x('Organisaties', 'Organisaties'),
        'singular_name' => _x('organisaties', 'organisaties'),
        'add_new' => _x('Add New', 'Organisaties'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit '),
        'new_item' => __('Add New'),
        'all_items' => __('View All'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' =>  __('Not Find'),
        'not_found_in_trash' => __('Not Find in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Organisaties'
    );
    $slider = array(
        'labels' => $slider_label,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus'=>true,
        'query_var' => true,
        'rewrite' =>  array('slug'=>'organisaties'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon'	=> get_bloginfo('template_url').'/post-type/images/facities.png',
        //'taxonomies'		=> array('category'),
        'supports' => array('title','thumbnail'),
    );
    register_post_type('organisaties',$slider);
}


add_action( 'init', 'register_custom_contacts' );
function register_custom_contacts() {
    $slider_label = array(
        'name' => _x('Contacts', 'Contacts'),
        'singular_name' => _x('Contacts', 'Contacts'),
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
    $slider = array(
        'labels' => $slider_label,
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
        'menu_icon'	=> get_bloginfo('template_url').'/post-type/images/facities.png',
        'supports' => array('title','thumbnail'),
    );
    register_post_type('contacts',$slider);
}