<?php

    // Reference -> https://codex.wordpress.org/Function_Reference/register_post_type
    register_post_type( 'bv_img_slider',

        array(
            'labels' => array(
                'name' => 'Image Slider',
                'singular_name' => 'Image Slider',
                'add_new' => 'Add New Image Slider',
                'add_new_item' => 'Add New Image Slider',
                'edit' => 'Edit',
                'edit_item' => 'Edit Image Slider',
                'new_item' => 'New Image Slider',
                'view' => 'View Image Slider',
                'view_item' => 'View Image Slider',
                'search_items' => 'Search Image Slider',
                'not_found' => 'No Image Sliders found',
                'not_found_in_trash' => 'No Image Slider found in Trash',
                 'featured_image' => __( 'Gallery Image', 'textdomain' ),
                 'set_featured_image' => __( 'Set Gallery image', 'textdomain' ),
                 'remove_featured_image' => _x( 'Remove Gallery image', 'textdomain' ),
                 'use_featured_image' => _x( 'Use as Gallery image', 'textdomain' ),
            ),
            'public' => true,
            'menu_position' => 15,
            'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-images-alt2',
            'has_archive' => true
        )

    );