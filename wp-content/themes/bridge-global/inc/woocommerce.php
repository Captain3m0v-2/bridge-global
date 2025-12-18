<?php
/**
 * WooCommerce compatibility for Bridge Global
 *
 * @package BridgeGlobal
 */

// Remove WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Add theme wrappers
add_action( 'woocommerce_before_main_content', 'bridge_global_woocommerce_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'bridge_global_woocommerce_wrapper_end', 10 );

function bridge_global_woocommerce_wrapper_start() {
    echo '<div class=\"container\"><div class=\"row\"><div class=\"col-lg-12\">';
}

function bridge_global_woocommerce_wrapper_end() {
    echo '</div></div></div>';
}
