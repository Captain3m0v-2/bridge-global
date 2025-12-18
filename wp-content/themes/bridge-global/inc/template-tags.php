<?php
/**
 * Custom template tags for Bridge Global
 *
 * @package BridgeGlobal
 */

if ( ! function_exists( 'bridge_global_posted_on' ) ) :
    function bridge_global_posted_on() {
        \ = '<time class=\"entry-date published updated\" datetime=\"%1\\">%2\</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            \ = '<time class=\"entry-date published\" datetime=\"%1\\">%2\</time><time class=\"updated\" datetime=\"%3\\">%4\</time>';
        }

        \ = sprintf(
            \,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        echo '<span class=\"posted-on\">' . \ . '</span>';
    }
endif;

if ( ! function_exists( 'bridge_global_posted_by' ) ) :
    function bridge_global_posted_by() {
        echo '<span class=\"byline\"> by ' . esc_html( get_the_author() ) . '</span>';
    }
endif;
