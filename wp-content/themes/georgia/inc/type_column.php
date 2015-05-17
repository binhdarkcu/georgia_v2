<?php

// GET FEATURED IMAGE
function ST4_get_featured_post($post_ID) {
    //$post_thumbnail_id = get_post_thumbnail_id($post_ID);
    $post_featured_id = get_field('custom_featured_post_class_meta_box',$post_ID);
    if ($post_featured_id) {
        $post_featured_id = get_field('custom_featured_post_class_meta_box',$post_ID);
        return $post_featured_id;
    }
}

// ADD NEW COLUMN
function ST4_columns_head($defaults) {
    $defaults['types_post'] = 'Members joined';
    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function ST4_columns_content($column_name, $post_ID) {
    if ($column_name == 'types_post') {
        $post_featured_post = ST4_get_featured_post($post_ID);
        if ($post_featured_post) {
            echo $post_featured_post;
        }
    }
}

add_filter('manage_posts_columns', 'ST4_columns_head');
add_action('manage_posts_custom_column', 'ST4_columns_content', 10, 2);


// GET FEATURED IMAGE
function ST4_get_type_post($post_ID) {
    //$post_thumbnail_id = get_post_thumbnail_id($post_ID);
    /*
    $type_post_id = get_field('datetime',$post_ID);
    if ($type_post_id) {
        $type_post_id = get_field('datetime',$post_ID);
        return $type_post_id;
    }*/
    global $wpdb;
	$query_count = "SELECT COUNT( * ) as TOTALMEMBER
					FROM  `wp_participate` 
					WHERE id_event = '$post_ID'";
	$total_row = $wpdb->get_results($query_count);
    $admin_url = admin_url();
    echo '<a href="'.$admin_url.'admin.php?page=view_event_member&event_title='.get_the_title($post_ID).'&id_event='.$post_ID.'">View members ('.$total_row[0]->TOTALMEMBER.')</a>';
}

// ADD NEW COLUMN
function ST4_columns_type_head($defaults) {
    $defaults['types_post'] = 'Members joined';
    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function ST4_columns_type_content($column_name, $post_ID) {
    if ($column_name == 'types_post') {
        $type_post_id = ST4_get_type_post($post_ID);
        if ($type_post_id) {
            echo $type_post_id;
        }
    }
}

add_filter('manage_posts_columns', 'ST4_columns_type_head');
add_action('manage_posts_custom_column', 'ST4_columns_type_content', 10, 2);