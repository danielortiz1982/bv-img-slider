<?php

/*
Plugin Name: BV Image Slider
Plugin URI:  http://www.brandingverticals.com/
Description: BV image slider is a dynamic Bootstrap image slider ~ Add shortcode - [bv-img-slider]
Version:     1.0
Author:      dortiz ~ BV Engineering
Author URI:  http://www.brandingverticals.com/
*/

class BV_Img_Slider{

    function __construct(){
        add_action('init', array($this, 'custom_post_types'));
        add_action('init', array($this, 'custom_taxonomy'));
        add_filter('single_template', 'template_single_post');
        add_shortcode('bv-img-slider', array($this, 'short_code_template'));
        register_activation_hook(__FILE__, array($this, 'activate'));
    }
    // end of __construct

    public function custom_post_types(){
        include(plugin_dir_path(__FILE__) . 'includes/custom_post_type.php');
    }
    // end of custom_post_types

    public function custom_taxonomy(){
        include(plugin_dir_path(__FILE__) . 'includes/custom_taxonomies.php');
    }
    // end of custom_taxonomy
 

    public function short_code_template($atts){
       extract(shortcode_atts(array('posts' => 1,), $atts));
       $return_string = '<div id="bv-img-slider" class="carousel slide" data-bs-ride="carousel">';
       $return_string .= '<div class="carousel-inner">';
       $args = array('post_type' => 'bv_img_slider', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC');
       $the_query = new WP_Query( $args );
       while ( $the_query->have_posts() ) : $the_query->the_post();
        $return_string .= '<div class="carousel-item';
        if ($the_query->current_post == 0) $return_string .= ' active';
        $return_string .= '">';
        $return_string .= '<img src="' . get_the_post_thumbnail_url() . '" /></div>';
    endwhile;
       $return_string .= '</div>';
       $return_string .= '</div>';
       wp_reset_query();
       return $return_string;
    }
    // end of short_code_template

    public function activate(){
        flush_rewrite_rules();
    }
    // end of activate
}

global $bv_img_slider_plugin;
$bv_img_slider_plugin = new BV_Img_Slider;