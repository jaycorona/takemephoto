<?php
/**
 * Plugin Name: TD Shortcodes
 * Plugin URI: http://theme-dutch.com/
 * Description: Shortcodes plugin for ThemeDutch WordPress Themes Framework
 * Version: 1.6.3.1
 * Author: Theme Dutch
 * Author URI: http://theme-dutch.com/
 * Requires at least: 3.5
 * Tested up to: 4.0
 *
 * Text Domain: tdshortcodes
 * Domain Path: /languages/
 *
 * @package TD Shortcodes
 *
 */

// Make sure we don't expose any info if called directly

if ( ! function_exists( 'add_action' ) ) {
	exit;
}

define('TDS_VERSION', '1.6.3.1');
define('TDS_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('TDS_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
define('TDS_PLUGIN_DIR', dirname( __FILE__ ) );
define('TDS_PLUGIN_NAME', 'TD Shortcodes');
define('TDS_SLUG', 'tdshortcodes');

$tds_google_fonts = array();

// Init
function tds_init(){
	load_plugin_textdomain( 'tdshortcodes', false, TDS_PLUGIN_DIR . '/languages' );
	//load_plugin_textdomain( 'tdshortcodes', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	add_action( 'admin_enqueue_scripts', 'tds_enqueue_scripts' );
	add_action( 'wp_enqueue_scripts', 'tds_enqueue_scripts' );

	// Register all shortcodes scripts
	add_action( 'wp_enqueue_scripts', 'tdf_register_scripts' );
}
add_action('init', 'tds_init');
add_action('admin_init', 'tds_init');


include_once TDS_PLUGIN_DIR . '/fonts/fontawesome.php';

if ( ! is_admin() ) {

	include_once TDS_PLUGIN_DIR . '/shortcodes.php';

	/* Load shortcodes
	================================================== */

	// Animated Icon Grid
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-icongrid.php';

	// Animated images
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-animated-image.php';

	// Boxed Content
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-box-image.php';

	// Buttons


	// Caption Hover
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-caption.php';


	// Code


	// Columns
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-splitlayout.php';
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-customheightcolumn.php';


	// Counter
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-counter.php';

	// Custom Login


	// Dividers


	// Dropcaps


	// Events

	// Headings
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-heading.php';


	// Highlight


	// Icons


	// Image Gallery
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-gallery.php';


	// Image Menu
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-eimenu.php';


	// Lists


	// Maintenance Mode

	// Notification boxes


	// Price Tables


	// Portfolio
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-portfolio.php';

	// Expanding Posts
	include TDS_PLUGIN_DIR . '/inc/shortcode-expandingposts.php';


	// Progress Bar


	// Quotes

	// Quote Rotator
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-quote-rotator.php';


	// Section
	//include_once TDS_PLUGIN_DIR . '/inc/shortcode-section.php';


	// Tabs


	// TD – latest post


	// Thumbnail slider
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-thumbnail-slider.php';


	// Timed Notification
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-timed-notification.php';


	// Toggles


	// Vertical Timeline
	include_once TDS_PLUGIN_DIR . '/inc/shortcode-vertical-timeline.php';

	// New shortcodes
	include_once TDS_PLUGIN_DIR . '/shortcodes/archive.php';
	include_once TDS_PLUGIN_DIR . '/shortcodes/counter.php';
	include_once TDS_PLUGIN_DIR . '/shortcodes/flexslider.php';
	include_once TDS_PLUGIN_DIR . '/shortcodes/flexslider-boxed.php';
	include_once TDS_PLUGIN_DIR . '/shortcodes/section.php';
}


// Enqueue scripts
//
function tds_enqueue_scripts() {
	if ( ! is_admin() ) {
		wp_enqueue_script( 'td-shortcodes', TDS_PLUGIN_URL . 'shortcodes-min.js', '', '', true );

		//wp_enqueue_script( 'animate-this', TDS_PLUGIN_URL . 'inc/js/animate-this.min.js', array('jquery'), '', true );
		wp_enqueue_style( 'animate', TDS_PLUGIN_URL . 'inc/css/animate.min.css' );

		wp_enqueue_style( 'td-shortcodes', TDS_PLUGIN_URL . 'css/shortcodes.css' );
		//wp_enqueue_style( 'prettyPhoto', TDS_PLUGIN_URL . 'js/prettyPhoto/prettyPhoto.css' );
		wp_enqueue_style( 'font-awesome', TDS_PLUGIN_URL . 'css/font-awesome.min.css' );
	} else {
		wp_enqueue_script( 'td-shortcodes-admin', TDS_PLUGIN_URL . 'shortcodes-admin.js', '', '', true );

		wp_enqueue_style( 'td-shortcode-admin', TDS_PLUGIN_URL . 'css/td-shortcodes-admin.css' );
		wp_enqueue_style( 'font-awesome', TDS_PLUGIN_URL . 'css/font-awesome.min.css' );
	}
}

function tdf_register_scripts() {
	if ( ! is_admin() ) {
		wp_register_script( 'tdf-shortcodes', plugins_url('js/shortcodes-all-min.js', __FILE__), '', '', true );
	}
}


// Adds the shortcode button, which displays the shortcode thickbox
//
function tds_output_buttons( $context ){
	$href = TDS_PLUGIN_URL . 'shortcodes-overlay.php?width=950&height=500';
	//$href = '#TB_inline?width=600&height=550';

	return $context . '<a id="' . 'tdshortcodes' . '" class="button thickbox" title="' . TDS_PLUGIN_NAME . '" href="' . $href . '" onclick="return false;" style="padding-left:0.4em;">
	<img alt="' . TDS_PLUGIN_NAME . ' shortcodes" src="' . TDS_PLUGIN_URL . 'images/icon-shortcodes.png" style="padding:0; vertical-align:middle; margin-top:-3px;"> ' . __('Add Shortcodes', 'tdshortcodes') . '</a>';
}
add_action( 'media_buttons_context', 'tds_output_buttons' );

// Allow use of shortcodes in sidebar widgets
add_filter( 'widget_text', 'do_shortcode' );

// Cleans and splits contents separated by newlines into an array
//
function tdshortcode_get_array( $content) {
	$items = strip_tags( $content );
	$items = str_replace( ',', '&#44;', $items );
	$items = str_replace( array("\r\n", "\n", "\r"), ',', $items );
	$items = explode( ',', $items );
	$items = array_splice( $items, 1, -1 );

	$new_items = array();
	foreach ( $items as $item ) {
		if ( $item )
			array_push( $new_items, $item );
	}

	return $new_items;
}

// Returns the first attribute set in an attribute list
// [column third] returns third if it is in the types array
//
function tdshortcode_validate_type( $atts, $types, $default ) {
	if ( $atts == '' )
		return $default;

	foreach( $types as $type ) {
		if ( in_array( $type, $atts ) )
			return $type;
	}

	return $default;
}

function tdshortcodes_generate_thumbnail($img_url, $width=0, $height=0, $crop=null) {

	if ($width == 0)
		$width = 250;
	if ($height == 0)
		$height = 250;
	if ($crop == null)
		$crop = false;
	$saved = '';
    //$img = substr($img_url, strpos($img_url, 'wp-content'));
	//$thumb = image_resize($img, $width, $height, $crop);
	$thumb = wp_get_image_editor($img_url);
	if ( ! is_wp_error( $thumb ) ) {
	    $thumb->resize( $width, $height, $crop );
	    $thumb->generate_filename($suffix = ''.$width.'x'.$height);
	    $saved = $thumb->save();
    	return (is_string($saved['path'])) ? site_url() . '/' .  $saved['path'] : $img_url;
	}
	return;
	//return $saved['path'];
}

function tdshortcodes_limited_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function tdshortcodes_get_warning($message) {
	return '<div class="block-warning"><i class="icon-warning-sign"></i> WARNING: ' .$message. '</div>';
}


// Fixed shortcodes and empty p, br tags next to shortcodes
if ( ! function_exists('tds_cleanup_shortcode_fix') ) {
	function tds_cleanup_shortcode_fix($content) {
	  $array = array (
	    '<p>[' => '[',
	    ']</p>' => ']',
	    ']<br />' => ']',
	    ']<br>' => ']'
	  );
  		$content = strtr($content, $array);
    	return $content;
	}
	add_filter('the_content', 'tds_cleanup_shortcode_fix');
}

function tds_get_fontawsomeicontag($name, $addtlclass=null,$id=null,$hidetag=null ){
	global $fontawesomeiconsupdates;
	if(substr($name,0,6) == 'fa fa-'){
		$fonticon = str_replace('fa fa-','',$name);
	}else if(substr($name,0,3) == 'fa-'){
		$fonticon = str_replace('fa-','',$name);
	}else if(substr($name,0,5) == 'icon-'){
		$fonticon = str_replace('icon-','',$name);
	}else{
		$fonticon = $name;
	}

	foreach ($fontawesomeiconsupdates as $iconname => $iconnew) {
		if ($fonticon == $iconname)
		{
			$fonticon = $iconnew;
		}
	}

	$output = '';
	if($hidetag!=null){
		$output .= 'fa-'.$fonticon;
	}else{
		$output .= 	'<i class="fa fa-'.$fonticon.' ';
		if($addtlclass!=null)
			$output .= 	$addtlclass;
		if($id!=null)
			$output .= 	' id="'.$id.'" ';
		$output .=	'"></i>';
	}
	return $output;
}

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

function tds_hex2rgb($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}

function tds_color2rgba($colors) {
	if ( isset($colors['red']) && isset($colors['green']) && isset($colors['blue']) ) {
		return 'rgba(' .$colors['red']. ', ' .$colors['green']. ', ' .$colors['blue']. ', ' .$colors['alpha']. ')';
	}
}

function tds_get_attachment_id($attachment_url=null) {
	global $wpdb;
	$attachment_id = false;
	if ( '' == $attachment_url )
		return;
	$upload_dir_paths = wp_upload_dir();
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
	}
	return $attachment_id;
}

function tds_get_post_format(){
	$icon = "fa fa-copy";
	switch(get_post_format()) {
		case "aside":  	$icon = "fa fa-list-alt";
						break;
		case "audio":  	$icon = "fa fa-music";
						break;
		case "chat":  	$icon = "fa fa-comments-o";
						break;
		case "gallery": $icon = "fa fa-th-large";
						break;
		case "image":  	$icon = "fa fa-picture-o";
						break;
		case "link":  	$icon = "fa fa-link";
						break;
		case "quote":  	$icon = "fa fa-quote-right";
						break;
		case "status":  $icon = "fa fa-lightbulb-o";
						break;
		case "video":  	$icon = "fa fa-video-camera";
						break;
	}
	return $icon;
}

?>