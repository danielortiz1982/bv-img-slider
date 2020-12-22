<?php

     wp_register_style( 'bv-style', plugin_dir_url( __FILE__ ) . '../assets/frontend/styles/css/styles.css' );
     wp_enqueue_style( 'bv-style' );

     wp_enqueue_script('bv-mainjs', plugin_dir_url(__FILE__) . '../assets/frontend/scripts/dist/bv.bundle.js', array(), false, true);


     