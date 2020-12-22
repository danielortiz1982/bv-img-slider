<?php 


    $taxonomy    = 'bv_img_slider_taxonomy';
    $object_type = 'bv_img_slider';
    
    $labels = array(
        'name'               => 'Image Categories',
        'singular_name'      => 'Image Category',
        'search_items'       => 'Search Image Categories',
        'all_items'          => 'All Image Categories',
        'parent_item'        => 'Parent Image Category',
        'parent_item_colon'  => 'Parent Image Category:',
        'update_item'        => 'Update Image Category',
        'edit_item'          => 'Edit Image Categories',
        'add_new_item'       => 'Add New Image Category', 
        'new_item_name'      => 'New Image Categories',
        'menu_name'          => 'Image Categories'
    );
     
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_ui'           => true,
        'how_in_nav_menus'  => true,
        'public'            => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'bv-img-slider-taxonomies')
    );

    register_taxonomy($taxonomy, $object_type, $args); 
