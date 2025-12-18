<?php
/**
 * Bridge Global - Simple Functions
 */

// Add theme support
function bridge_global_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    
    // Register menus
    register_nav_menus(array(
        'primary' => __('Main Menu', 'bridge-global'),
        'footer' => __('Footer Menu', 'bridge-global'),
    ));
}
add_action('after_setup_theme', 'bridge_global_setup');

// Add Bootstrap 5
function bridge_global_scripts() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    
    // Theme CSS
    wp_enqueue_style('bridge-global-style', get_stylesheet_uri());
    
    // Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'bridge_global_scripts');