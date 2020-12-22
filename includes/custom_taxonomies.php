<?php 


    $taxonomy    = 'bv_img_slider_taxonomy';
    $object_type = 'bv_img_slider';
    
    $labels = array(
        'name'               => 'Gallery Categories',
        'singular_name'      => 'Gallery Category',
        'search_items'       => 'Search Gallery Categories',
        'all_items'          => 'All Gallery Categories',
        'parent_item'        => 'Parent Gallery Category',
        'parent_item_colon'  => 'Parent Gallery Category:',
        'update_item'        => 'Update Gallery Category',
        'edit_item'          => 'Edit Gallery Categories',
        'add_new_item'       => 'Add New Gallery Category', 
        'new_item_name'      => 'New Gallery Categories',
        'menu_name'          => 'Gallery Categories'
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
