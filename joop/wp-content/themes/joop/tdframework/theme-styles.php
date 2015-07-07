<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Styles
 *
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */
	define('BASE_FONT_SIZE', 12);

	// Fonts that need to be loaded through the Google Fonts API
	global $theme_load_fonts;
	$theme_load_fonts = array();

	// Fonts
	$fonts = array(
		'font_menu' => array('.top-navigation', '#theme-menu-main', '.menu-footer', '.footer-menu', '.desc', '.breadcrumb'),
		'font_heading' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
		'font_paragraph' => array('body'),
	);

	// Font sizes
	$fontsizes = array(
		'font_size_heading1' => array('h1'),
		'font_size_heading2' => array('h2'),
		'font_size_heading3' => array('h3'),
		'font_size_heading4' => array('h4'),
		'font_size_heading5' => array('h5'),
		'font_size_heading6' => array('h6'),

		//'font_size_top_menu'          => array('.top-navigation .menu > li a'),
		'font_size_mainmenu'          => array('#theme-menu-main > li a'),
		'font_size_mainmenu_sub'      => array('#theme-menu-main > li li a'),
		'font_size_footermenu'        => array('.footer .menu a'),

		'font_size_other_footer'      => array('.footer'),
		'font_size_other_paragraph'   => array('body'),
		'font_size_sidebar_header'    => array('.widget .widget-title'),
		'font_size_other_copyright'   => array('.footer .copyright', '.footer .powered'),
	);
	// Font sizes
	$lineheights = array(
		'line_height_paragraph' => array('p'),
		'line_height_header1' => array('h1'),
		'line_height_header2' => array('h2'),
		'line_height_header3' => array('h3'),
		'line_height_header4' => array('h4'),
		'line_height_header5' => array('h5'),
		'line_height_header6' => array('h6'),
	);
	// Text colors
	$colors = array(

		// Heading Titles
		'color_heading1' => array('.page-titles .entry-title', '.theme-content h1'),
		'color_heading2' => array('.theme-content h2'),
		'color_heading3' => array('.theme-content h3'),
		'color_heading4' => array('.theme-content h4'),
		'color_heading5' => array('.theme-content h5'),
		'color_heading6' => array('.theme-content h6'),

		// mobile menu
		'color_top_menu_text' => array(
			'.dl-menuwrapper',
			'.dl-menu li a',
			'.dl-menuwrapper li.dl-back:after',
			'.dl-menuwrapper li > a:not(:only-child):after'
		),
		'color_top_menu_text_hover' => array(
			'.dl-menu li:hover > a',
			'.dl-menu li.current-menu-item > a ',
			'.dl-menu li.current_page_item > a ',
			'.dl-menuwrapper li.dl-back:hover:after',
			'.dl-menu li.current-menu-item > a:not(:only-child):after ',
			'.dl-menu li.current_page_item > a:not(:only-child):after ',
		),

		// Breadcrumb
		'color_breadcrumb_text' => array(
			'.breadcrumb a',
		),
		'color_breadcrumb_text_hover' => array(
			'.breadcrumb',
			'.breadcrumb a:hover',
		),

		// Content
		'color_paragraphs'            => array('body'),
		'color_links'                 => array('a'),
		'color_links_hover'           => array('a:hover', '.social-menu-row a:hover'),

	);

	// Background colors
	$colors_background = array(

		// Body
		'main_background_color' => array('.theme_content_area'),

		// mobile menu


		// Breadcrumb
		'color_breadcrumb_bg' => array(
			'.breadcrumb',
		),

		// Content
		'color_content_background' => array('.wrapper .theme-content', '.wrapper .theme-sidebar'),

		// Accordion and Tabs
		'color_paragraphs'  => array('ul.shortcode-toggle > li > div.header > .icon'),
		'color_links'       => array(
			'ul.shortcode-toggle > li > div.header > .icon.active',
			'div.shortcode-notify.icon .circle',
			'div.shortcode-notify.icon .circle',
		),
	);

	// Border colors
	$colors_border = array(
		// Links
		'color_links' => array(
			'a > img',
			'a .thumbs',
			'div.shortcode-tabs > .titles > .shortcode-tab-title.active',
		),
		'color_links_hover' => array(
			'a > img:hover',
			'.thumbs:hover',
			'img:hover'
		),

	);

	// Outline colors
	$colors_outline = array(
		'color_links_hover' => array(
			'a:hover',
		),
	);

	// Path to all theme images
	$imagepath = THEME_URI . '/images/';


	// Other options
	$pattern = core_options_get('pattern');


?>
<style type="text/css">
<?php
// Typography
apply_fonts($fonts);
apply_font_sizes($fontsizes);
apply_line_height($lineheights);
// Other color settings
apply_colors('color', $colors);
apply_colors('background-color', $colors_background);
apply_colors('border-color', $colors_border);
apply_colors('outline-color', $colors_outline);
// Core custom CSS
do_action('core_custom_css');

//theme styles hook
core_theme_hook_styles();

?>

</style>
<?php
function core_theme_webfonts() {
global $theme_load_fonts;
if (!is_null($theme_load_fonts)) :
?>
<script type="text/javascript">
window.WebFont.load({
google: {
families: [<?php
$text = '';
global $core_fonts;
$prev_font = array();
foreach ($theme_load_fonts as $font) {
	if (!in_array($font,$prev_font) && in_array($font, $core_fonts["Google fonts"])) {
		array_push($prev_font, $font);
		$text .= '"' . $font . '",';
	}
}
echo substr($text, 0, -1);
?>]
}
});
</script>
<?php
endif;
}
add_action('wp_footer', 'core_theme_webfonts', 100);


?>

