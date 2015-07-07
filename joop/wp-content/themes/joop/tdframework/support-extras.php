<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since framework 1.0
 */
function core_theme_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'core_theme_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since framework 1.0
 */
function core_theme_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'core_theme_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 *
 * @since framework 1.0
 */
function core_theme_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id ) {
		$url .= '#main';
	}

	return $url;
}
add_filter( 'attachment_link', 'core_theme_enhanced_image_navigation', 10, 2 );


/**
 * Add a shortcode support to the widget title and widget area
 *
 * @since Joop 1.0
 */
add_filter('widget_title', 'do_shortcode');
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');


/**
 * Checks the browser if it's IE
 *
 * @since Joop 1.0
 */
function is_browser_ie() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/MSIE/i',$u_agent)) {
        return true;
    }

    return false;
}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @since Framework 1.1
 */
function core_theme_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() ) {
		return $title;
	}

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', THEME_SLUG ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'core_theme_wp_title', 10, 2 );

/**
 * Will not be installed is WP version is lower than 3.5
 *
 * @since framework 1.0
 */

function core_theme_switch_theme( $theme_name = THEME_NAME, $theme = THEME_SLUG ) {
	global $wp_version;
	if ( version_compare( $wp_version, '3.5', '<=' ) ) {
		switch_theme( WP_DEFAULT_THEME );
		unset( $_GET['activated'] );
		add_action( 'admin_notices', 'core_theme_upgrade_notice' );
	}

}
add_action( 'after_switch_theme', 'core_theme_switch_theme', 10, 2 );

function core_theme_upgrade_notice() {
	$message = sprintf( __( '<strong>%s</strong> requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', THEME_SLUG ), THEME_NAME,  $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}


function check_shortcode($shortcode = '') {

	$post_to_check = get_post(get_the_ID());

    // false because we have to search through the post content first
    $found = false;

    // if no short code was provided, return false
    if (!$shortcode) {
        return $found;
    }
    // check the post content for the short code
    if ( stripos($post_to_check->post_content, '[' . $shortcode) !== false ) {
        // we have found the short code
        $found = true;
    }

    // return our final results
    return $found;

}



/**
 * Core Theme Hooks and Actions
 *
 * @since framework 1.0
 */

function core_theme_get_column($column_count = 3){
	$column = 'grid box-three';
	switch ($column_count) {
	    case 1:
	        $column = 'grid box-twelve';
	        break;
	    case 2:
	        $column = 'grid box-six';
	        break;
	    case 3:
	        $column = 'grid box-four';
	        break;
	    case 4:
	        $column = 'grid box-three';
	        break;
	    case 6:
	        $column = 'grid box-two';
	        break;
	    case 12:
	        $column = 'grid box-one';
	        break;
	    default:
	    	$column = '';
	}
	return $column;
}


function core_theme_get_post_format(){
	$icon = "fa fa-copy";
	switch(get_post_format()) {
		case "aside":  	$icon = "fa fa-reorder";
						break;
		case "audio":  	$icon = "fa fa-music";
						break;
		case "chat":  	$icon = "fa fa-comments-alt";
						break;
		case "gallery": $icon = "fa fa-th-large";
						break;
		case "image":  	$icon = "fa fa-picture";
						break;
		case "link":  	$icon = "fa fa-link";
						break;
		case "quote":  	$icon = "fa fa-quote-right";
						break;
		case "status":  $icon = "fa fa-lightbulb";
						break;
		case "video":  	$icon = "fa fa-facetime-video";
						break;
	}
	return $icon;
}



/**
 * Retina images
 *
 * This function is attached to the 'wp_generate_attachment_metadata' filter hook.
 */
//add_filter( 'wp_generate_attachment_metadata', 'retina_support_attachment_meta', 10, 2 );

function retina_support_attachment_meta( $metadata, $attachment_id ) {
    foreach ( $metadata as $key => $value ) {
        if ( is_array( $value ) ) {
            foreach ( $value as $image => $attr ) {
                if ( is_array( $attr ) )
                    retina_support_create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
            }
        }
    }
    return $metadata;
}

/**
 * Create retina-ready images
 *
 * Referenced via retina_support_attachment_meta().
 */
function retina_support_create_images( $file, $width, $height, $crop = false ) {
    if ( $width || $height ) {
        $resized_file = wp_get_image_editor( $file );
        if ( ! is_wp_error( $resized_file ) ) {
            $filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );

            $resized_file->resize( $width * 2, $height * 2, $crop );
            $resized_file->save( $filename );

            $info = $resized_file->get_size();

            return array(
                'file' => wp_basename( $filename ),
                'width' => $info['width'],
                'height' => $info['height'],
            );
        }
    }
    return false;
}

//add_filter( 'delete_attachment', 'delete_retina_support_images' );
/**
 * Delete retina-ready images
 *
 * This function is attached to the 'delete_attachment' filter hook.
 */
function delete_retina_support_images( $attachment_id ) {
    $meta = wp_get_attachment_metadata( $attachment_id );
    $upload_dir = wp_upload_dir();
    $path = pathinfo( $meta['file'] );
    foreach ( $meta as $key => $value ) {
        if ( 'sizes' === $key ) {
            foreach ( $value as $sizes => $size ) {
                $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
                $retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
                if ( file_exists( $retina_filename ) )
                    unlink( $retina_filename );
            }
        }
    }
}


/********************************************************************
 * Plugin Support
 *******************************************************************/

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function core_theme_infinite_scroll_setup() {
	add_theme_support( 'infinite-scroll', array(
		'type'      => 'click',
		'container' => 'content',
		//'render'    => 'core_theme_infinite_scroll_render',
		'footer'    => 'wrapper',
	) );
}
add_action( 'init', 'core_theme_infinite_scroll_setup' );

/**
 * Set the code to be rendered on for calling posts,
 * hooked to template parts when possible.
 *
 * Note: must define a loop.
 */
function core_theme_infinite_scroll_render() {
	get_template_part( 'loop' );
}


/**
 * Woocommerce
 *
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}