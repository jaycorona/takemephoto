<?php
/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage Framework
 * @since framework 1.0
 */

?>
<?php

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since framework 1.0
 */

if ( ! isset( $content_width ) ) {
	$content_width = 1080; /* pixels */
}

	/*
	 * Load theme constants and defaults
	 */
	require( get_template_directory() . '/tdframework/theme-init.php' );

	/**
	 * Options Panel
	 *
	 */
	require( THEME_PATH . '/tdframework/core/options/options-classes.php');
	require( THEME_PATH . '/tdframework/core/options/options-registry.php');
	require( THEME_PATH . '/tdframework/core/options/options-types.php');
	require( THEME_PATH . '/tdframework/core/options/options-theme.php');
	require( THEME_PATH . '/tdframework/core/options/options-metabox.php');
	require( THEME_PATH . '/tdframework/core/options/options-init.php');

	/**
	 * Layouts
	 *
	 */
	require( THEME_PATH . '/tdframework/core/layout/layout-classes.php');
	require( THEME_PATH . '/tdframework/core/layout/layout-options.php');
	require( THEME_PATH . '/tdframework/core/layout/layout-registry.php');
	require( THEME_PATH . '/tdframework/core/layout/layout-generate.php');
	require( THEME_PATH . '/tdframework/core/layout/layout-init.php');

	/**
	 * Sliders
	 *
	 */
	require( THEME_PATH . '/tdframework/core/slider/slider-registry.php');
	require( THEME_PATH . '/tdframework/core/slider/slider-options.php');
	require( THEME_PATH . '/tdframework/core/slider/slider-init.php');

	/**
	 * Register sliders
	 */
	require( THEME_PATH . '/tdframework/core/slider/slider-flexslider/flexslider.php');
	require( THEME_PATH . '/tdframework/core/slider/slider-layerslider/slider-layerslider.php');


	/**
	 * Fonts
	 *
	 */
	require( THEME_PATH . '/tdframework/core/fonts/fonts-list.php');
	require( THEME_PATH . '/tdframework/core/fonts/fonts-init.php');

	// Core functions
	require( THEME_PATH . '/tdframework/core/core-utils.php');

	// Single file modules
	require( THEME_PATH . '/tdframework/core/core-breadcrumbs.php');
	require( THEME_PATH . '/tdframework/core/core-sociables.php');
	require( THEME_PATH . '/tdframework/core/core-seo.php');

	/**
	 * Theme Options
	 */
	require( THEME_PATH . '/tdframework/theme-options.php');
	require( THEME_PATH . '/tdframework/theme-post-options.php');
	require( THEME_PATH . '/tdframework/theme-page-options.php');

	/**
	 * Theme widgets
	 */
	require( THEME_PATH . '/tdframework/core/widgets/categories.php');
	require( THEME_PATH . '/tdframework/core/widgets/adwidget.php');
	require( THEME_PATH . '/tdframework/core/widgets/postwidget.php');
	require( THEME_PATH . '/tdframework/core/widgets/tabbedwidget.php');

	/**
	 * Activate pre-packaged plugin
	 */
	require( THEME_PATH . '/tdframework/addons/plugins/activate-plugins.php');
	
	/**
	 * Preview Box
	 */
	require( THEME_PATH . '/tdframework/core/includes/previewbox/previewbox.php');

if ( ! function_exists( 'core_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since framework 1.0
 */
function core_theme_setup() {

	/**
	 * Theme Functions
	 */
	require( THEME_PATH . '/tdframework/theme-functions.php' );

	/**
	 * Custom functions and plugin support
	 */
	require( THEME_PATH . '/tdframework/support-extras.php' );

	/**
	 * Customizer additions
	 */
	//require( THEME_PATH . '/tdframework/customization.php' );

	/**
	 * Hooks for this theme
	 */
	require( THEME_PATH . '/tdframework/theme-hooks.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Joop, use a find and replace
	 * to change THEME_SLUG to the name of your theme in all the template files
	 */
	load_theme_textdomain( THEME_SLUG, THEME_PATH . '/languages' );

	/**
	 * This theme styles the visual editor with editor-style.css to match the theme style.
	 */
	add_editor_style();

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	// Post thumbnail support

	set_post_thumbnail_size( 300, 275, false );
	add_image_size( 'post-excerpt-small', 360, 290, true);
	add_image_size( 'post-excerpt-full', 1140, 350, true);
	add_image_size( 'tdac-thumb', 90, 90, true);

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus(array(
		'theme_main'	=> __( 'Main menu', THEME_SLUG),
		'top_menu'	=> __( 'Top menu', THEME_SLUG),
		'theme_footer' 	=> __( 'Footer menu', THEME_SLUG),
	));


	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

}
endif; // core_theme_setup
add_action( 'after_setup_theme', 'core_theme_setup' );

add_action('after_setup_theme', 'theme_options_register');

/**
 * Setup the WordPress core custom header and background.
 * Hooks into the after_setup_theme action.
 */
function core_theme_register_custom_header() {
	add_theme_support( 'custom-header', array(
		'default-image' => '',
	) );
}

function core_theme_register_custom_background() {
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );
}

//add_action( 'after_setup_theme', 'core_theme_register_custom_background' );

/**
 * Enqueue scripts and styles
 */
function core_theme_scripts() {
	global $wp_styles;
	global $wp_scripts;

	wp_enqueue_script('jquery');

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	// PrettyPhoto lightbox
	wp_enqueue_style( 'prettyphoto', THEME_URI. '/js/prettyPhoto/prettyPhoto.css' );
	wp_enqueue_script( 'prettyphoto', THEME_URI. '/js/prettyPhoto/jquery.prettyPhoto.js', array('jquery'), '3.1.5', true );

	wp_enqueue_script( 'device', THEME_URI . '/js/device-min.js', array('jquery'), '0.1.58', true );

	wp_enqueue_script( 'responsive-scripts', THEME_URI . '/js/theme-scripts.js', array(), '1.0', true );
	wp_enqueue_script( 'responsive-plugins', THEME_URI . '/js/theme-plugins.js', array(), '1.0', true );

	if ( is_singular() ) {
		wp_enqueue_style( 'flexslider-style', CORE_URI . '/slider/slider-flexslider/custom-flexslider.css' );
		wp_enqueue_script( 'flexslider-js', CORE_URI . '/slider/slider-flexslider/jquery.flexslider.js', array(), '', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', THEME_URI . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202', true );
	}

	// Font Awesome
	wp_enqueue_style( 'font-awesome-styles', THEME_URI. '/tdframework/css/font-awesome.min.css' );

	if ( is_browser_ie() ) {
		wp_enqueue_script( 'ie-support', THEME_URI . '/js/theme-plugins-ie.js', array(), '1.0', true );

		wp_enqueue_script( 'html5-shiv', THEME_URI . '/js/html5shiv.js', array(), '', true );
		$wp_scripts->add_data( 'html5-shiv', 'conditional', 'lte IE 9' );

		wp_enqueue_style( 'font-awesome-ie7', THEME_URI. '/tdframework/css/font-awesome-ie7.min.css', array(), '1.0', true  );
		$wp_styles->add_data( 'font-awesome-ie7', 'conditional', 'lte IE 7' );

	}

}


if ( ! is_admin() ) {
	add_action( 'wp_enqueue_scripts', 'core_theme_scripts' );
}

function core_theme_print_jquery_in_footer( &$scripts) {
	if ( ! is_admin() ) {
		$scripts->add_data( 'jquery', 'group', 1 );
		$scripts->add_data( 'comment-reply', 'group', 1 );
	}
}
add_action( 'wp_default_scripts', 'core_theme_print_jquery_in_footer' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/tdframework/custom-header.php' );

/**
 * Load Theme defaults
 * @since framework 1.0
 */

/**
 * Register Theme Widgets
 * @since framework 1.0
 */
	function core_theme_register_widgets() {
		if ( ! is_blog_installed() ) {
			return;
		}

		register_widget('TD_Widget_Categories');
		register_widget('td_adWidget');
		register_widget('td_postWidget');
		register_widget('td_tabbedWidget');

	}
	add_action( 'widgets_init', 'core_theme_register_widgets' );

/*
 * Sets argument constants for Navigation
 */

	$theme_menus['main'] = array(
		'theme_location' => 'theme_main',
		'depth'          => 6,
		'menu_class'     => 'theme-menu-main menu',
		'menu_id'        => 'theme-menu-main',
		'container'      => false,
		'fallback_cb'    => ''
	);

	$theme_menus['topmenu'] = array(
		'theme_location' => 'top_menu',
		'depth'          => 1,
		'menu_class'     => 'theme-top-menu menu',
		'menu_id'        => 'theme-top-menu',
		'container'      => false,
		'fallback_cb'    => ''
	);

	$theme_menus['footer'] = array(
		'theme_location' => 'theme_footer',
		'depth'          => 1,
		'menu_class'     => 'grid menu',
		'menu_id'        => '',
		'container'      => false,
		'fallback_cb'    => ''
	);

/**
 * Register SEO Basic
 */
	core_seo_register_spot( 'meta', __('Meta Title, Description and Keywords', THEME_SLUG) );

/**
 * Sets default social icons
 */
	core_sociables_register( 'twitter', 'Twitter', 'http://twitter.com/', null, null );
	core_sociables_register( 'facebook', 'Facebook', 'http://facebook.com/', null, null );
	core_sociables_register( 'linkedin', 'LinkedIn', 'http://linkedin.com/', null, null );
	core_sociables_register( 'youtube', 'YouTube', 'http://youtube.com/', null, null );
	core_sociables_register( 'youtube-play', 'Vimeo', 'http://vimeo.com/', null, null );
	core_sociables_register( 'pinterest', 'Pinterest', 'http://pinterest.com/', null, null );
	core_sociables_register( 'flickr', 'Flickr', 'http://flickr.com/', null, null );
	core_sociables_register( 'instagram', 'Instagram', 'http://instagram.com/', null, null );
	core_sociables_register( 'tumblr', 'Tumblr', 'http://tumblr.com/', null, null );
	core_sociables_register( 'google-plus', 'Google+', 'http://plus.google.com/', null, null );
	core_sociables_register( 'rss', 'RSS', HOME_URL, null, null );
	core_sociables_register( 'custom1', 'Custom 1', '', '', '', true );
	core_sociables_register( 'custom2', 'Custom 2', '', '', '', true );
	core_sociables_register( 'custom3', 'Custom 3', '', '', '', true );
	core_sociables_register( 'custom4', 'Custom 4', '', '', '', true );

/**
 *
 * Shortcodes everywhere
 */
	// shortcodes in Widget areas
	add_filter( 'widget_text', 'shortcode_unautop' );
	add_filter( 'widget_text', 'do_shortcode' );

	// shortcodes in Excerpts
	add_filter( 'the_excerpt', 'shortcode_unautop' );
	add_filter( 'the_excerpt', 'do_shortcode' );

	// shortcodes in Category, Tag, and Taxonomy Descriptions
	add_filter( 'term_description', 'shortcode_unautop' );
	add_filter( 'term_description', 'do_shortcode' );

/**
 * Plugin Support and Overrides
 */

// bbPress
if ( core_theme_is_plugin_active('bbpress/bbpress.php') ) {
	require_once( THEME_PATH . '/tdframework/addons/bbpress/theme-bbpress.php' );
}

// Woocommerce
if ( core_theme_is_plugin_active('woocommerce/woocommerce.php') ) {
	require( THEME_PATH . '/tdframework/addons/woocommerce/theme-woocommerce.php' );
	require( THEME_PATH . '/tdframework/addons/woocommerce/theme-product-options.php' );
	require( THEME_PATH . '/tdframework/core/slider/slider-flexslider/flexslider-product.php');

	// Add WooCommerce Support
	add_theme_support( 'woocommerce' );
}

// SocialBox
function plugin_override_styles() {
    // check if Socialbox is active
	if ( core_theme_is_plugin_active( 'socialbox/socialbox.php' ) ) {
    	wp_dequeue_style('socialbox');
    }
}
add_action( 'wp_print_styles', 'plugin_override_styles', 11 );

?>
<?php

remove_action('wp_head', 'wp_generator');
