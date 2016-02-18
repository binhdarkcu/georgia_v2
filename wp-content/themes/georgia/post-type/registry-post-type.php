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

//
add_action( 'init', 'register_custom_news' );
function register_custom_news() {
    $slider_label = array(
        'name' => _x('News', 'News'),
        'singular_name' => _x('News', 'news'),
        'add_new' => _x('Add New', 'News'),
        'add_new_item' => __('Add New'),
        'edit_item' => __('Edit '),
        'new_item' => __('Add New'),
        'all_items' => __('View All'),
        'view_item' => __('View'),
        'search_items' => __('Search'),
        'not_found' =>  __('Not Find'),
        'not_found_in_trash' => __('Not Find in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'News'
    );
    $slider = array(
        'labels' => $slider_label,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus'=>true,
        'query_var' => true,
        'rewrite' =>  array('slug'=>'news'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => get_bloginfo('template_url').'/post-type/images/facities.png',
        //'taxonomies'      => array('category'),
        'supports' => array('title','thumbnail', 'editor'), //https://codex.wordpress.org/Function_Reference/register_post_type
    );
    register_post_type('news',$slider);
}
function news_added_by_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Added By', 'Added By', 'georgia' ),
        'singular_name'              => _x( 'Added By', 'Added By', 'georgia' ),
        'menu_name'                  => __( 'Added By', 'georgia' ),
        'all_items'                  => __( 'All Items', 'georgia' ),
        'parent_item'                => __( 'Parent Item', 'georgia' ),
        'parent_item_colon'          => __( 'Parent Item:', 'georgia' ),
        'new_item_name'              => __( 'New Item Name', 'georgia' ),
        'add_new_item'               => __( 'Add New Item', 'georgia' ),
        'edit_item'                  => __( 'Edit Item', 'georgia' ),
        'update_item'                => __( 'Update Item', 'georgia' ),
        'view_item'                  => __( 'View Item', 'georgia' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'georgia' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'georgia' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'georgia' ),
        'popular_items'              => __( 'Popular Items', 'georgia' ),
        'search_items'               => __( 'Search Items', 'georgia' ),
        'not_found'                  => __( 'Not Found', 'georgia' ),
        'no_terms'                   => __( 'No items', 'georgia' ),
        'items_list'                 => __( 'Items list', 'georgia' ),
        'items_list_navigation'      => __( 'Items list navigation', 'georgia' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => false,
        'query_var'         => true,
    );
    register_taxonomy( 'added_by', array( 'news' ), $args );

}
add_action( 'init', 'news_added_by_taxonomy', 0 );
//

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