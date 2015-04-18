<?php

	function revcon_change_post_label() {
	    global $menu;
	    global $submenu;
	    $menu[5][0] = 'Events';
	    $submenu['edit.php'][5][0] = 'View All';
	    $submenu['edit.php'][10][0] = 'Add New';
	    $submenu['edit.php'][16][0] = 'Tags';
	    echo '';
	}
	function revcon_change_post_object() {
	    global $wp_post_types;
	    $labels = &$wp_post_types['post']->labels;
	    $labels->name = 'Events';
	    $labels->singular_name = 'Events';
	    $labels->add_new = 'Add Event';
	    $labels->add_new_item = 'Add Event';
	    $labels->edit_item = 'Edit Event';
	    $labels->new_item = 'Events';
	    $labels->view_item = 'View Event';
	    $labels->search_items = 'Search Event';
	    $labels->not_found = 'No News found';
	    $labels->not_found_in_trash = 'No News found in Trash';
	    $labels->all_items = 'All Event';
	    $labels->menu_name = 'Events';
	    $labels->name_admin_bar = 'Events';
	}
	 
	add_action( 'admin_menu', 'revcon_change_post_label' );
	add_action( 'init', 'revcon_change_post_object' );