<?php
add_action( 'init', 'add_custom_homeland_taxonomies');

// create two taxonomies, genres and writers for the post type "book"
function add_custom_homeland_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Home land category', 'Home land category' ),
		'singular_name'     => _x( 'Home land category', 'Home land category' ),
		'search_items'      => __( 'Search Home land category' ),
		'all_items'         => __( 'All Home land category' ),
		'parent_item'       => __( 'Parent Home land category' ),
		'parent_item_colon' => __( 'Parent Home land category' ),
		'edit_item'         => __( 'Edit Home land category' ),
		'update_item'       => __( 'Update Home land category' ),
		'add_new_item'      => __( 'Add Home land category' ),
		'new_item_name'     => __( 'Add Home land category Name' ),
		'menu_name'         => __( 'Home land category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'homelandtax' ),
	);

	register_taxonomy('homelandtax', array( 'post','homeland' ), $args );
}

add_action( 'init', 'add_custom_homeland_taxonomies');