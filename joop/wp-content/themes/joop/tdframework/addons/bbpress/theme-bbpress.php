<?php
/**
 * bbPress Theme Options
 *
 * @since tdframework 1.0
 */

// Adds bbPress layout option page
//
function theme_bpp_layoutoptions() {
	global $core_theme_options_handler;
	global $core_layout_default;

	$options = new CoreOptionGroup('z-bbp-layouts', __('bbPress', THEME_SLUG), __('Use this page to define the layout of bbPress pages.', THEME_SLUG), THEME_URI. '/tdframework/addons/bbpress/options-bbpress.png');
	$core_theme_options_handler->group_add($options);

	$layouts = array(
		'layout-bbp' => __('bbPress page', THEME_SLUG)
	);
	foreach ($layouts as $key => $value) {
		$section = new CoreOptionSection($key, $value);
		$options->section_add($section);
		$section->option_add(new CoreOption($key, null, 'layout', null, $core_layout_default));

		//Background Set-up
		$option = new CoreOption('background_setup_'.$key, __('Header Background', THEME_SLUG), 'select', __('You can have a background image or a slider in the background.', THEME_SLUG), 'none','bg-options');
		$option->parameters = array('none' => 'none', 'image' => 'Image', 'slider' => 'Slider');
		$section->option_add($option);

		// Background Slider if setup is slider
		$option = new CoreOption('background_slider_'.$key, __('Header Background Slider', THEME_SLUG), 'sliders', __('Use slider that is only applicable for background (ex. fullscreen slider).', THEME_SLUG),null,'bg-slider');
		$section->option_add($option);

		// Background image options if setup is image
		$section->option_add(new CoreOption('background_image_'.$key, __('Header Background image', THEME_SLUG), 'image', __('The default, site-wide background image.', THEME_SLUG), null,'bg-img'));

		$section->option_add(new CoreOption('custom_content_' .$key , __('Subtitle', THEME_SLUG), 'text-multiline', __('Any HTML put here will be included in it\'s own block above the content.', THEME_SLUG)));

	}
}
add_action('after_setup_theme', 'theme_bpp_layoutoptions');

// Outputs bbPress layout
function theme_bpp_layout($layout) {
	if (!is_bbpress())
		return $layout;
	else
		return core_options_get('layout-bbp');
}
add_filter('core_layout', 'theme_bpp_layout');

// Portfolio page layouts
function theme_bbp_background_setup($background_setup){
	if ( !is_bbpress() )
		return $background_setup;

	return core_options_get('background_setup_layout-bbp', 'theme');
}
add_filter('background_setup_addon', 'theme_bbp_background_setup');

// Get bbPress Sliders
function theme_bbp_slider($slider){
	if ( !is_bbpress() )
		return $slider;

	if ( core_options_get('background_setup_layout-bbp', 'theme') == 'slider' )
		return core_options_get('background_slider_layout-bbp', 'theme');
	else
		return $slider;
}
add_filter('bgslider_area_addon', 'theme_bbp_slider');

// Get bbPress background image
function theme_bbp_get_background($backgroundimage){
	if ( !is_bbpress() )
		return $backgroundimage;

	if ( core_options_get('background_setup_layout-bbp', 'theme') == 'image' )
		return core_options_get('background_image_layout-bbp', 'theme');
	else
		return $backgroundimage;
}
add_filter('background_image_addon', 'theme_bbp_get_background');



// Get bbPress custom content
function theme_bbp_custom_content($content){
	if( !is_bbpress())
		return $content;
	else
		return core_options_get('custom_content_layout-bbp', 'theme');
}
add_filter('custom_content', 'theme_bbp_custom_content');

function theme_bbp_no_breadcrumb ($param) {
	return true;
}
//add_filter('bbp_no_breadcrumb', 'theme_bbp_no_breadcrumb');

function theme_bbp_breadcrumb(){
	if ( core_options_get('breadcrumbs') && is_bbpress() ) {
		echo '<div class="grid box-twelve theme-breadcrumbs text-right"><div class="breadcrumb-list">';
		bbp_breadcrumb( array('sep' => '&nbsp;&nbsp;/&nbsp;&nbsp; ') );
		echo '</div></div></div>';
	}
}
add_action('page_title_hook', 'theme_bbp_breadcrumb', 101);


function theme_bbpress_enqueue_scripts() {
	wp_enqueue_style('theme-bbpress', THEME_URI . '/tdframework/addons/bbpress/theme-bbpress.css');


}
add_action('wp_enqueue_scripts', 'theme_bbpress_enqueue_scripts', 999999);
?>