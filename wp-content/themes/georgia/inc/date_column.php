<?php

// GET FEATURED IMAGE
function ST4_get_event_post($post_ID) {
    //$post_thumbnail_id = get_post_thumbnail_id($post_ID);
    $post_featured_id = get_field('custom_event_post_class_meta_box',$post_ID);
    if ($post_featured_id) {
        $post_featured_id = get_field('custom_event_post_class_meta_box',$post_ID);
        return $post_featured_id;
    }
}

// ADD NEW COLUMN
function ST4_event_columns_head($defaults) {
    $defaults['event_date'] = 'Event date';
    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function ST4_event_columns_content($column_name, $post_ID) {
    if ($column_name == 'event_date') {
        $post_featured_post = ST4_get_event_post($post_ID);
        if ($post_featured_post) {
            echo $post_featured_post;
        }
    }
}

add_filter('manage_posts_columns', 'ST4_columns_head');
add_action('manage_posts_custom_column', 'ST4_columns_content', 10, 2);


// GET FEATURED IMAGE
function ST4_get_event_type_post($post_ID) {
    //$post_thumbnail_id = get_post_thumbnail_id($post_ID);
   
    $type_post_id = get_field('datetime',$post_ID);
    if ($type_post_id) {
        $type_post_id = get_field('datetime',$post_ID);
		$day = substr($type_post_id, -2); // 13052015
        $year = substr($type_post_id, 0, 4);
        $month = substr($type_post_id, 5, 2);
    	//$month = convertMonths_String((int)$month,true);
        return $day.'/'.$month.'/'.$year;
    }
}

// ADD NEW COLUMN
function ST4_event_columns_type_head($defaults) {
    $defaults['event_date'] = 'Event date';
    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function ST4_event_columns_type_content($column_name, $post_ID) {
    if ($column_name == 'event_date') {
        $type_post_id = ST4_get_event_type_post($post_ID);
        if ($type_post_id) {
            echo $type_post_id;
        }
    }
}

add_filter('manage_posts_columns', 'ST4_event_columns_type_head');
add_action('manage_posts_custom_column', 'ST4_event_columns_type_content', 10, 2);