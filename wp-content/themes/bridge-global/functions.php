<?php
/**
 * Bridge Global Theme Functions
 * 
 * @package BridgeGlobal
 */

// Define theme version
if ( ! defined( 'BRIDGE_GLOBAL_VERSION' ) ) {
	define( 'BRIDGE_GLOBAL_VERSION', '1.0.0' );
}

// Theme setup
function bridge_global_setup() {
	// Make theme available for translation
	load_theme_textdomain( 'bridge-global', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links
	add_theme_support( 'automatic-feed-links' );
	
	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );
	
	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	
	// Add custom image sizes
	add_image_size( 'bridge-global-hero', 1200, 600, true );
	add_image_size( 'bridge-global-service', 400, 300, true );
	add_image_size( 'bridge-global-team', 300, 300, true );
	
	// Register navigation menus
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'bridge-global' ),
			'footer'  => esc_html__( 'Footer Menu', 'bridge-global' ),
			'social'  => esc_html__( 'Social Links', 'bridge-global' ),
		)
	);
	
	// Switch default core markup to HTML5
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	
	// Add theme support for selective refresh
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// Add support for custom logo
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 100,
			'width'       => 300,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	
	// Add support for WooCommerce
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
	// Add support for block editor
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'bridge_global_setup' );

// Set content width
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

// Enqueue scripts and styles
function bridge_global_scripts() {
	// Bootstrap 5 CSS
	wp_enqueue_style(
		'bootstrap-css',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
		array(),
		'5.3.0'
	);
	
	// Bootstrap Icons
	wp_enqueue_style(
		'bootstrap-icons',
		'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css',
		array(),
		'1.10.0'
	);
	
	// Theme stylesheet
	wp_enqueue_style(
		'bridge-global-style',
		get_stylesheet_uri(),
		array( 'bootstrap-css', 'bootstrap-icons' ),
		BRIDGE_GLOBAL_VERSION
	);
	
	// Custom CSS
	wp_enqueue_style(
		'bridge-global-custom',
		get_template_directory_uri() . '/assets/css/custom.css',
		array( 'bridge-global-style' ),
		BRIDGE_GLOBAL_VERSION
	);
	
	// Bootstrap 5 JS Bundle (includes Popper)
	wp_enqueue_script(
		'bootstrap-js',
		'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
		array( 'jquery' ),
		'5.3.0',
		true
	);
	
	// Theme JavaScript
	wp_enqueue_script(
		'bridge-global-script',
		get_template_directory_uri() . '/assets/js/main.js',
		array( 'jquery', 'bootstrap-js' ),
		BRIDGE_GLOBAL_VERSION,
		true
	);
	
	// Localize script for AJAX
	wp_localize_script(
		'bridge-global-script',
		'bridgeGlobal',
		array(
			'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
			'nonce'     => wp_create_nonce( 'bridge_global_nonce' ),
			'homeUrl'   => home_url( '/' ),
		)
	);
	
	// Comment reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bridge_global_scripts' );

// Register widget areas
function bridge_global_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bridge-global' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bridge-global' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	
	// Footer widgets
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 1', 'bridge-global' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'First footer column.', 'bridge-global' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 2', 'bridge-global' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Second footer column.', 'bridge-global' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 3', 'bridge-global' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Third footer column.', 'bridge-global' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
	
	// Call to Action sidebar
	register_sidebar(
		array(
			'name'          => esc_html__( 'Call to Action', 'bridge-global' ),
			'id'            => 'cta-sidebar',
			'description'   => esc_html__( 'Call to action section.', 'bridge-global' ),
			'before_widget' => '<div id="%1$s" class="cta-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="cta-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'bridge_global_widgets_init' );

// Custom navigation walker for Bootstrap 5
class Bridge_Global_Walker_Nav_Menu extends Walker_Nav_Menu {
	
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
	
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'nav-item';
		
		if ( in_array( 'menu-item-has-children', $classes ) ) {
			$classes[] = 'dropdown';
		}
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		
		$output .= $indent . '<li' . $class_names . '>';
		
		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
		
		if ( in_array( 'menu-item-has-children', $classes ) ) {
			$atts['class'] = 'nav-link dropdown-toggle';
			$atts['data-bs-toggle'] = 'dropdown';
			$atts['aria-expanded'] = 'false';
		} else {
			$atts['class'] = 'nav-link';
		}
		
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		
		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
		
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

// Custom excerpt length
function bridge_global_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'bridge_global_excerpt_length' );

// Custom excerpt more
function bridge_global_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'bridge_global_excerpt_more' );

// Add body classes
function bridge_global_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	
	return $classes;
}
add_filter( 'body_class', 'bridge_global_body_classes );

// Add pingback header
function bridge_global_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'bridge_global_pingback_header' );

// Add theme options page
function bridge_global_theme_options() {
	add_theme_page(
		'Bridge Global Theme Options',
		'Theme Options',
		'edit_theme_options',
		'bridge-global-options',
		'bridge_global_options_page'
	);
}
add_action( 'admin_menu', 'bridge_global_theme_options' );

function bridge_global_options_page() {
	?>
	<div class="wrap">
		<h1>Bridge Global Theme Options</h1>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'bridge_global_options' );
			do_settings_sections( 'bridge_global_options' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}

// Handle AJAX requests
function bridge_global_handle_ajax() {
	// Verify nonce
	if ( ! wp_verify_nonce( $_POST['nonce'], 'bridge_global_nonce' ) ) {
		wp_die( 'Security check failed' );
	}
	
	// Handle different AJAX actions
	$action = $_POST['action'];
	
	switch ( $action ) {
		case 'bridge_global_newsletter_subscribe':
			$email = sanitize_email( $_POST['email'] );
			// Process newsletter subscription
			wp_send_json_success( array( 'message' => 'Subscription successful!' ) );
			break;
			
		case 'bridge_global_contact_form':
			// Process contact form
			wp_send_json_success( array( 'message' => 'Message sent successfully!' ) );
			break;
	}
	
	wp_die();
}
add_action( 'wp_ajax_bridge_global_newsletter_subscribe', 'bridge_global_handle_ajax' );
add_action( 'wp_ajax_nopriv_bridge_global_newsletter_subscribe', 'bridge_global_handle_ajax' );
add_action( 'wp_ajax_bridge_global_contact_form', 'bridge_global_handle_ajax' );
add_action( 'wp_ajax_nopriv_bridge_global_contact_form', 'bridge_global_handle_ajax' );

// Add WooCommerce support
function bridge_global_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'bridge_global_woocommerce_setup' );

// Remove WooCommerce styles and add custom ones
function bridge_global_manage_woocommerce_styles() {
	// Remove default WooCommerce styles
	// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
	
	// Add custom WooCommerce styles
	wp_enqueue_style(
		'bridge-global-woocommerce',
		get_template_directory_uri() . '/assets/css/woocommerce.css',
		array( 'bridge-global-style' ),
		BRIDGE_GLOBAL_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'bridge_global_manage_woocommerce_styles' );

// Security: Disable XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );

// Security: Remove WordPress version
function bridge_global_remove_version() {
	return '';
}
add_filter( 'the_generator', 'bridge_global_remove_version' );

// Include additional files
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/woocommerce.php';

// Theme activation hook
function bridge_global_theme_activation() {
	// Set default options
	update_option( 'thumbnail_size_w', 300 );
	update_option( 'thumbnail_size_h', 300 );
	update_option( 'medium_size_w', 600 );
	update_option( 'medium_size_h', 400 );
	update_option( 'large_size_w', 1200 );
	update_option( 'large_size_h', 800 );
	
	// Create default pages
	$pages = array(
		'Home' => array(
			'content' => '',
			'template' => 'front-page.php'
		),
		'Services' => array(
			'content' => '[services_grid]',
		),
		'Contact' => array(
			'content' => '[contact_form]',
		),
		'Blog' => array(
			'content' => '',
		),
	);
	
	foreach ( $pages as $page_title => $page_data ) {
		if ( ! get_page_by_title( $page_title ) ) {
			$page_id = wp_insert_post( array(
				'post_title'   => $page_title,
				'post_content' => $page_data['content'],
				'post_status'  => 'publish',
				'post_type'    => 'page',
			) );
			
			if ( isset( $page_data['template'] ) ) {
				update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
			}
		}
	}
	
	// Set front page
	$home = get_page_by_title( 'Home' );
	if ( $home ) {
		update_option( 'page_on_front', $home->ID );
		update_option( 'show_on_front', 'page' );
	}
}
add_action( 'after_switch_theme', 'bridge_global_theme_activation' );