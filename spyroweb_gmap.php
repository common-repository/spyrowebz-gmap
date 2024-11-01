<?php

/*
Plugin Name: SWS Gmap
Plugin URI: #
Description: A plugin which Create a Google map, where you can set your Marker by using shortcode [spyrowebz_gmap address="your location address"].
Version: 1.2
Author: Sultan Web Soultion
Author URI: https://web.facebook.com/sultan.semmai
License: GPLv2
*/

register_activation_hook(__FILE__, 'spyro_gmap_activate');

function spyro_gmap_activate() {
    flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, 'spyro_gmap_deactivate');

function spyro_gmap_deactivate() {
    flush_rewrite_rules();
}

add_action('wp_footer', 'spyrowebs_gmap_enqueue_scripts');
function spyrowebs_gmap_enqueue_scripts() {
    wp_register_script('gmapapi',  'http://maps.googleapis.com/maps/api/js?sensor=false', __FILE__ );
    wp_register_script('gmap', plugins_url('js/gmap3.min.js', __FILE__ ));
    wp_register_script('script', plugins_url('js/custom.js', __FILE__ ));  
    wp_enqueue_script('jquery');
    wp_enqueue_script('gmapapi');
    wp_enqueue_script('gmap');
    wp_enqueue_script('script');
  
}
add_shortcode('spyrowebz_gmap' ,'spyrowebs_gmap');
function spyrowebs_gmap( $atts = array(), $content = '' ) {
    $defaults = array(
        'address' =>'',
        
    );
    $atts = shortcode_atts( $defaults, $atts );
    extract( $atts );
    $address=$address;
    return ' <div class="gmap" id="gmap"><div id="address" style="display:none">'.$address.'</div></div>';
}
add_action('init', 'spyrowebs_gmap_enqueue_styles');
function spyrowebs_gmap_enqueue_styles() {
    wp_enqueue_style('spyrogmap', plugins_url('styles.css', __FILE__ ));
}