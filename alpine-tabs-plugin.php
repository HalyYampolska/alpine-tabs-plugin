<?php
/*
Plugin Name: Alpine Tabs Plugin
Description: Plugin for adding tabs functionality using Alpine.js. Just add [alpine-tabs] on the website in right place.
Version: 1.0
Author: Halyna Yampolska
Text Domain: alpine-tabs-plugin
*/

// Load text domain for localization
function alpine_tabs_load_textdomain() {
    load_plugin_textdomain( 'alpine-tabs-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'alpine_tabs_load_textdomain' );

function alpine_tabs_enqueue_scripts() {
    // Add style
    wp_enqueue_style( 'alpine-tabs-styles', plugins_url( 'styles.css', __FILE__ ) );

    // Add Alpine.js
    wp_enqueue_script( 'alpine-js', 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js', array(), null, true );

    // Add tabs.js
    wp_enqueue_script( 'alpine-tabs-script', plugins_url( 'tabs.js', __FILE__ ), array( 'alpine-js' ), null, true );

    // Include template file
    require_once( plugin_dir_path( __FILE__ ) . 'alpine-tabs-template.php' );
}

add_action( 'wp_enqueue_scripts', 'alpine_tabs_enqueue_scripts' );


function alpine_tabs_shortcode( $atts ) {
    // Add default width and height
    $atts = shortcode_atts( array(
        'width' => '100%',
        'height' => '200px',
    ), $atts );

    // Add plugin HTML
    ob_start();
    include( plugin_dir_path( __FILE__ ) . 'alpine-tabs-template.php' );
    $html = ob_get_clean();

    // Replacing width and height attributes HTML
    $html = str_replace( 'width: auto;', 'width: ' . esc_attr( $atts['width'] ) . ';', $html );
    $html = str_replace( 'height: auto;', 'height: ' . esc_attr( $atts['height'] ) . ';', $html );

    return $html;
}

// Shortcode registration
add_shortcode( 'alpine-tabs', 'alpine_tabs_shortcode' );
