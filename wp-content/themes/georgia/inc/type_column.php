<?php

// GET FEATURED IMAGE
function ST4_get_featured_post($post_ID) {
    //$post_thumbnail_id = get_post_thumbnail_id($post_ID);
    $post_featured_id = get_post_meta($post_ID,'custom_featured_post_class_meta_box',true);
    if ($post_featured_id) {
        $post_featured_id = get_post_meta($post_ID,'custom_featured_post_class_meta_box',true);
        return $post_featured_id;
    }
}

// ADD NEW COLUMN
function ST4_columns_head($defaults) {
    $defaults['types_post'] = 'Type design';
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
    $type_post_id = get_post_meta($post_ID,'tt_types',true);
    if ($type_post_id) {
        $type_post_id = get_post_meta($post_ID,'tt_types',true);
        return $type_post_id;
    }
}

// ADD NEW COLUMN
function ST4_columns_type_head($defaults) {
    $defaults['types_post'] = 'Type';
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