<?php

$prefix = 'tt_';

global $meta_boxes;

$meta_boxes = array();
// 4nd meta box - testimonials
$meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
    'id' => 'photogallery',

    // Meta box title - Will appear at the drag and drop handle bar. Required.
    'title' => 'PHOTOGALLERY IMAGES',

    // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    'pages' => array( 'post'),

    // Where the meta box appear: normal (default), advanced, side. Optional.
    'context' => 'normal',

    // Order of meta box: high (default), low. Optional.
    'priority' => 'high',

    // List of meta fields
    'fields' => array(
        // TEXT
        array(
            'name'  => 'Images library',
            'id'    => "{$prefix}image_gallery",
            'type'  => 'plupload_image',
            'desc' =>'Landscape 600pxx800px /portrait 800pxx600px pixels'
        ),

    )
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function register_meta_boxes()
{
    // Make sure there's no errors when the plugin is deactivated or during upgrade
    if ( !class_exists( 'RW_Meta_Box' ) )
        return;

    global $meta_boxes;
    foreach ( $meta_boxes as $meta_box )
    {
        new RW_Meta_Box( $meta_box );
    }
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'register_meta_boxes' );