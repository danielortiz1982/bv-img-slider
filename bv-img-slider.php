<?php

/*
Plugin Name: BV Image Slider
Plugin URI:  http://www.brandingverticals.com/
Description: BV image slider is a dynamic Bootstrap image slider ~ Add shortcode - [bv-img-slider gallery_query="category-slug"]
Version:     1.8
Author:      dortiz ~ BV Engineering
Author URI:  http://www.brandingverticals.com/
*/

class BV_Img_Slider{

    function __construct(){
        add_action('init', array($this, 'custom_post_types'));
        add_action('init', array($this, 'custom_taxonomy'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
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

    public function enqueue_scripts(){
        include(plugin_dir_path(__FILE__) . 'includes/enqueue_scripts.php');
    }
    // end of enqueue_scripts

    public function short_code_template($atts){

       extract(shortcode_atts(array('gallery_query' => 'bv-img-slider',), $atts));
       $args = array('posts_per_page' => '-1', 'post_type' => 'bv_img_slider', 'tax_query' => array(array('taxonomy' => 'bv_img_slider_taxonomy', 'field'    => 'slug', 'terms' => $gallery_query)));
       $the_query = new WP_Query( $args );

       $return_string = '<div id="'.$gallery_query.'" class="carousel slide" data-bs-ride="carousel">';
       $return_string .= '<ol class="carousel-indicators">';
       while ( $the_query->have_posts() ) : $the_query->the_post();
        $return_string .= '<li data-bs-target="#'.$gallery_query.'" data-bs-slide-to="0" class="slide';
        if ($the_query->current_post == 0) $return_string .= ' active';
        $return_string .= '"></li>';
     endwhile;
     $return_string .= '</ol>';
     wp_reset_query();

       $return_string .= '<div class="carousel-inner">';
       while ( $the_query->have_posts() ) : $the_query->the_post();
        $return_string .= '<div class="carousel-item';
        if ($the_query->current_post == 0) $return_string .= ' active';
        $return_string .= '">';
        $return_string .= '<img class="img-fluid" src="' . get_the_post_thumbnail_url() . '" /></div>';
    endwhile;
       $return_string .= '<a class="carousel-control-next" href="#'.$gallery_query.'" role="button" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></a>';
       $return_string .= '  <a class="carousel-control-prev" href="#'.$gallery_query.'" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></a>';
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