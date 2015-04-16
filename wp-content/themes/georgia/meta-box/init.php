<?php

$prefix = 'tt_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box - Home Designs
$meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
    'id' => 'homedesign',

    // Meta box title - Will appear at the drag and drop handle bar. Required.
    'title' => 'Home Design',

    // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    'pages' => array( 'post','homeland'),

    // Where the meta box appear: normal (default), advanced, side. Optional.
    'context' => 'normal',

    // Order of meta box: high (default), low. Optional.
    'priority' => 'high',

    // List of meta fields
    'fields' => array(

        array(
            'name' => 'Size (SQM)',
            'id'   =>  "{$prefix}size",
            'type' => 'text',
        ),
        array(
            'name' => 'Width (Metres)',
            'id'   => "{$prefix}width",
            'type' => 'text'
        ),
        array(
            'name' => 'Picture',
            'id'   => "{$prefix}picture",
            'type' => 'thickbox_image'
        ),
        array(
            'name' => 'Bedrooms',
            'id'   => "{$prefix}bedrooms",
            'type'    => 'select',
            'options' => array(
                '0' => 'None',
                '1' => '1',
                '2'   => '2',
                '3'     => '3',
                '4'     => '4',
                '5'     => '5',
            )
        ),
        array(
            'name' => 'Bathrooms',
            'id'   => "{$prefix}bathrooms",
            'type'    => 'select',
            'options' => array(
                '0' => 'None',
                '1' => '1',
                '2'   => '2',
                '3'     => '3',
                '4'     => '4'
            )
        ),
        array(
            'name' => 'Garages',
            'id'   => "{$prefix}garages",
            'type'    => 'select',
            'options' => array(
                '0' => 'None',
                '1' => '1',
                '2'   => '2',
                '3'     => '3'
            )
        ),
        array(
            'name' => 'Storeys',
            'id'   =>  "{$prefix}storeys",
            'type' => 'text',
        ),
        array(
            'name' => 'Display Centres',
            'id'   =>  "{$prefix}display_centres",
            'type' => 'text',
        ),
        array(
            'name' => 'Facades',
            'id'   =>  "{$prefix}facades",
            'type' => 'text',
        ),
        array(
            'name' => 'Address',
            'id'   =>  "{$prefix}address",
            'type' => 'text',
        )

    )
);
// 2nd meta box - Homeland
$meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
    'id' => 'homelands',

    // Meta box title - Will appear at the drag and drop handle bar. Required.
    'title' => 'Options',

    // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    'pages' => array( 'homeland'),

    // Where the meta box appear: normal (default), advanced, side. Optional.
    'context' => 'normal',

    // Order of meta box: high (default), low. Optional.
    'priority' => 'high',

    // List of meta fields
    'fields' => array(
        // TEXT
        
        array(
            'name'  => 'Price',
            'id'    => "{$prefix}price",
            'type'  => 'slider',
        // Text labels displayed before and after value
			'prefix'     => __( '$', 'meta-box' ),
			'suffix'     => __( ' USD', 'meta-box' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'  => 0,
				'max'  => 1000000,
				'step' => 100,
			),
        ),

    )
);

// 2nd meta box - testimonials
$meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
    'id' => 'testimonials',

    // Meta box title - Will appear at the drag and drop handle bar. Required.
    'title' => 'Testimonials',

    // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    'pages' => array( 'testimonials'),

    // Where the meta box appear: normal (default), advanced, side. Optional.
    'context' => 'normal',

    // Order of meta box: high (default), low. Optional.
    'priority' => 'high',

    // List of meta fields
    'fields' => array(
        // TEXT
        array(
            'name'  => 'Youtube\'s URL ',
            'id'    => "{$prefix}type",
            'type'  => 'url'
        ),

    )
);

// 3rd meta box - promotion
$meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
    'id' => 'promotion',

    // Meta box title - Will appear at the drag and drop handle bar. Required.
    'title' => 'Description',

    // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    'pages' => array( 'promotion'),

    // Where the meta box appear: normal (default), advanced, side. Optional.
    'context' => 'normal',

    // Order of meta box: high (default), low. Optional.
    'priority' => 'high',

    // List of meta fields
    'fields' => array(
        // TEXT
        array(
            'name'  => '',
            'id'    => "{$prefix}description",
            'type' => 'textarea',
            'cols' => 20,
            'rows' => 3,
        )
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