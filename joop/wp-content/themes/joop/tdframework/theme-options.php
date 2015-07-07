<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 *
 * Theme Options
 *
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */

// Adds some option values to javascript
//
function theme_options_javascript() {
	// Colors
	$theme_colors = array(
		'color_button',
		'color_button_hover',
		'color_button_text',
		'color_button_text_hover',
		//'color_search_field',
	);

	echo "<script type='text/javascript'>\n";

	echo "var theme_colors = {\n";

	// Build list of colors as javascript dictionary strings
	$colorlist = '';
	foreach ($theme_colors as $color) {
		$colorlist .= $color . ': "' . core_options_get($color) . '",';
	}

	// Remove last comma (IE)
	echo substr($colorlist, 0, -1);

	echo "};\n";
	echo '</script>';
}
add_action('wp_footer', 'theme_options_javascript', 99);


// Adds all theme options
//
function theme_options_register() {
	global $core_theme_options_handler;

	// General options
	//
	$options_general = new CoreOptionGroup('general', __('General', THEME_SLUG), __('General theme options.', THEME_SLUG), CORE_URI. '/images/options-general.png');
	$core_theme_options_handler->default_group = 'general';
	$core_theme_options_handler->group_add($options_general);

	// General
	$section = new CoreOptionSection('options', __('Settings', THEME_SLUG));
	$options_general->section_add($section);

	$section->option_add(new CoreOption('meta', __('Display blog meta', THEME_SLUG), 'checkbox', __('This setting toggles the display of meta-information in blog posts.', THEME_SLUG), true));
	$section->option_add(new CoreOption('breadcrumbs', __('Display breadcrumbs', THEME_SLUG), 'checkbox', __('This setting toggles the display of the breadcrumbs navigation aid.', THEME_SLUG), true));
	$section->option_add(new CoreOption('titles', __('Display page titles', THEME_SLUG), 'checkbox', __('This setting toggles the display of the titles at the top of every page.', THEME_SLUG), true));
	$section->option_add(new CoreOption('featured_img', __('Display featured image', THEME_SLUG), 'checkbox', __('This setting toggles the display of the featured image on top of every post.', THEME_SLUG), true));
	$section->option_add(new CoreOption('core_loader', __('Enable Page Loader', THEME_SLUG), 'checkbox', __('This allows you to add a page loader to the site.', THEME_SLUG), false));
	$section->option_add(new CoreOption('show_preview_box', __('Show Preview Box', THEME_SLUG), 'checkbox',  __('This setting will show the preview box.', THEME_SLUG), false));

	$section = new CoreOptionSection('images', __('Images', THEME_SLUG));
	$options_general->section_add($section);

	$section->option_add(new CoreOption('favicon', __('Favicon', THEME_SLUG), 'image', __('This image is displayed in the browser window\'s title and in browser favourites.', THEME_SLUG), THEME_URI. '/images/print_logo.png'));
	$section->option_add(new CoreOption('login_logo', __('Login logo', THEME_SLUG), 'image', __('The logo displayed in the the user login page.', THEME_SLUG), THEME_URI. '/images/print_logo.png'));

	//Background Set-up
	$option = new CoreOption('background_setup', __('Page Background', THEME_SLUG), 'select', __('You can have a background image or a slider in the background.', THEME_SLUG), 'image','bg-options');
	$option->parameters = array('none' => 'none', 'image' => 'Image', 'slider' => 'Slider');
	$section->option_add($option);

	$section->option_add(new CoreOption('background_sitewide', __('Default background on all pages/posts', THEME_SLUG), 'checkbox', __('The default header image but can be overridden in the respective page/post header section option.', THEME_SLUG), false));

	// Background Slider if setup is slider
	$option = new CoreOption('background_slider', __('Background Slider', THEME_SLUG), 'sliders', __('Use slider that is only applicable for background (ex. fullscreen slider).', THEME_SLUG),null,'bg-slider');
	$section->option_add($option);

	// Background image options if setup is image
	$section->option_add(new CoreOption('background_image', __('Background Image', THEME_SLUG), 'image', __('The default, site-wide background image.', THEME_SLUG), THEME_URI . '/images/default-bg.jpg', 'bg-img'));


	$section = new CoreOptionSection('miscellaneous', __('Miscellaneous', THEME_SLUG));
	$options_general->section_add($section);
	//$section->option_add(new CoreOption('customize', __('Enable Customize Preview', THEME_SLUG), 'checkbox', __('See your site how it looks with the selection of different fonts and patterns.', THEME_SLUG), false));
	$section->option_add(new CoreOption('seobasic', __('Enable SEO Basic', THEME_SLUG), 'checkbox', __('WARNING! Only enable this if you do not have any WP SEO installed.', THEME_SLUG), false));
	$section->option_add(new CoreOption('google_analytics', __('Google analytics code', THEME_SLUG), 'text-multiline', __('Place your Google Analytics code snippet here and it will be included in every page.', THEME_SLUG), null));

	$section->option_add(new CoreOption('custom_css', __('Custom CSS', THEME_SLUG), 'text-multiline', __('Place your custom css styles here', THEME_SLUG), ''));
	$section->option_add(new CoreOption('custom_js', __('Custom Javascript', THEME_SLUG), 'text-multiline', __('Place your custom javascripts here', THEME_SLUG), ''));

	// Import/Export Settings
	//$section = new CoreOptionSection('ie_settings', __('Import/Export', THEME_SLUG));
	//$options_general->section_add($section);
	//$section->option_add(new CoreOption('ei_export', __('Export Settings', THEME_SLUG), 'text-settings', __('Copy and paste this export settings into the import box of your new site and click "Click to import now!".', THEME_SLUG), null));
	//$section->option_add(new CoreOption('ei_import', __('Import Settings', THEME_SLUG), 'text-settings', __('Place the exported settings here and hit "Click to import now!".', THEME_SLUG), null));
	//$section->option_add(new CoreOption('ei_import_now', ' ', 'button', null, 'Click to import now!'));
	//$section->option_add(new CoreOption('ei_reset_now', __('Reset to default settings', THEME_SLUG), 'button', null, 'Reset'));



	// Fonts
	//
	$options_typography = new CoreOptionGroup('typography', __('Typography', THEME_SLUG), __('Adjust the theme\'s typography. You can choose one of the predefined fonts, or enter a custom font name from the <a href="http://www.google.com/webfonts" target="_blank">Google Web Fonts</a> service.', THEME_SLUG), CORE_URI. '/images/options-typography.png');
	$core_theme_options_handler->group_add($options_typography);

	// Fonts
	$section = new CoreOptionSection('fonts', __('Fonts', THEME_SLUG));
	$options_typography->section_add($section);

	$section->option_add(new CoreOption('font_menu', __('Menu font', THEME_SLUG), 'font', null, 'Archivo Narrow'));
	$section->option_add(new CoreOption('font_heading', __('Heading font', THEME_SLUG), 'font', null, 'Archivo Narrow'));
	$section->option_add(new CoreOption('font_paragraph', __('Paragraph font', THEME_SLUG), 'font', null, 'Archivo Narrow'));

	// Heading sizes
	$section = new CoreOptionSection('font-size-headings', __('Heading sizes', THEME_SLUG));
	$options_typography->section_add($section);

	$option = new CoreOption('font_size_heading1', __('Heading 1', THEME_SLUG), 'number', null, '24');
	$option->step = 2;
	$option->min = 10;
	$option->max = 72;
	$section->option_add($option);

	$option = new CoreOption('font_size_heading2', __('Heading 2', THEME_SLUG), 'number', null, '22');
	$option->step = 2;
	$option->min = 10;
	$option->max = 72;
	$section->option_add($option);

	$option = new CoreOption('font_size_heading3', __('Heading 3', THEME_SLUG), 'number', null, '20');
	$option->step = 2;
	$option->min = 10;
	$option->max = 72;
	$section->option_add($option);

	$option = new CoreOption('font_size_heading4', __('Heading 4', THEME_SLUG), 'number', null, '18');
	$option->step = 2;
	$option->min = 10;
	$option->max = 72;
	$section->option_add($option);

	$option = new CoreOption('font_size_heading5', __('Heading 5', THEME_SLUG), 'number', null, '16');
	$option->step = 2;
	$option->min = 10;
	$option->max = 72;
	$section->option_add($option);

	$option = new CoreOption('font_size_heading6', __('Heading 6', THEME_SLUG), 'number', null, '14');
	$option->step = 2;
	$option->min = 10;
	$option->max = 72;
	$section->option_add($option);

	// Menu sizes
	$section = new CoreOptionSection('font-size-menu', __('Menu sizes', THEME_SLUG));
	$options_typography->section_add($section);

	$option = new CoreOption('font_size_mainmenu', __('Main menu', THEME_SLUG), 'number', null, '12');
	$option->step = 1;
	$option->min = 8;
	$option->max = 28;
	$section->option_add($option);

	$option = new CoreOption('font_size_mainmenu_sub', __('Main menu submenu', THEME_SLUG), 'number', null, '11');
	$option->step = 1;
	$option->min = 8;
	$option->max = 28;
	$section->option_add($option);

	$option = new CoreOption('font_size_footermenu', __('Footer menu', THEME_SLUG), 'number', null, '11');
	$option->step = 1;
	$option->min = 8;
	$option->max = 28;
	$section->option_add($option);

	// Other sizes
	$section = new CoreOptionSection('font-size-other', __('Other sizes', THEME_SLUG));
	$options_typography->section_add($section);

	$option = new CoreOption('font_size_other_paragraph', __('Paragraph', THEME_SLUG), 'number', null, '13');
	$option->step = 1;
	$option->min = 8;
	$option->max = 28;
	$section->option_add($option);

	$option = new CoreOption('font_size_sidebar_header', __('Widget Titles', THEME_SLUG), 'number', null, '14');
	$option->step = 2;
	$option->min = 8;
	$option->max = 36;
	$section->option_add($option);

	$option = new CoreOption('font_size_other_copyright', __('Copyright', THEME_SLUG), 'number', null, '11');
	$option->step = 1;
	$option->min = 8;
	$option->max = 28;
	$section->option_add($option);

	$option = new CoreOption('font_size_other_footer', __('Footer', THEME_SLUG), 'number', null, '11');
	$option->step = 1;
	$option->min = 8;
	$option->max = 28;
	$section->option_add($option);

	// Line Height
	$section = new CoreOptionSection('line-height', __('Line Height', THEME_SLUG));
	$options_typography->section_add($section);

	$option = new CoreOption('line_height_paragraph', __('Paragraph', THEME_SLUG), 'number', null, '17');
	$option->step = 1;
	$option->min = 8;
	$option->max = 100;
	$section->option_add($option);

	$option = new CoreOption('line_height_header1', __('Heading 1', THEME_SLUG), 'number', null, '18');
	$option->step = 2;
	$option->min = 8;
	$option->max = 100;
	$section->option_add($option);

	$option = new CoreOption('line_height_header2', __('Heading 2', THEME_SLUG), 'number', null, '17');
	$option->step = 3;
	$option->min = 8;
	$option->max = 100;
	$section->option_add($option);

	$option = new CoreOption('line_height_header3', __('Heading 3', THEME_SLUG), 'number', null, '16');
	$option->step = 4;
	$option->min = 8;
	$option->max = 100;
	$section->option_add($option);

	$option = new CoreOption('line_height_header4', __('Heading 4', THEME_SLUG), 'number', null, '18');
	$option->step = 5;
	$option->min = 8;
	$option->max = 100;
	$section->option_add($option);

	$option = new CoreOption('line_height_header5', __('Heading 5', THEME_SLUG), 'number', null, '17');
	$option->step = 6;
	$option->min = 8;
	$option->max = 100;
	$section->option_add($option);

	$option = new CoreOption('line_height_header6', __('Heading 6', THEME_SLUG), 'number', null, '16');
	$option->step = 7;
	$option->min = 8;
	$option->max = 100;
	$section->option_add($option);

	// Colors
	//
	$options_colors = new CoreOptionGroup('colors', __('Colors', THEME_SLUG), __('Customize the theme\'s colors.', THEME_SLUG), CORE_URI. '/images/options-colors.png');
	$core_theme_options_handler->group_add($options_colors);

	// Headings
	$section = new CoreOptionSection('colors-headings', __('Headings', THEME_SLUG));
	$options_colors->section_add($section);
	$section->option_add(new CoreOption('color_heading1', __('Heading 1', THEME_SLUG), 'color', null, '#353d4a'));
	$section->option_add(new CoreOption('color_heading2', __('Heading 2', THEME_SLUG), 'color', null, '#353d4a'));
	$section->option_add(new CoreOption('color_heading3', __('Heading 3', THEME_SLUG), 'color', null, '#353d4a'));
	$section->option_add(new CoreOption('color_heading4', __('Heading 4', THEME_SLUG), 'color', null, '#353d4a'));
	$section->option_add(new CoreOption('color_heading5', __('Heading 5', THEME_SLUG), 'color', null, '#353d4a'));
	$section->option_add(new CoreOption('color_heading6', __('Heading 6', THEME_SLUG), 'color', null, '#353d4a'));

	// Breadcrumb
	$section = new CoreOptionSection('colors-breadcrumb', __('Breadcrumb', THEME_SLUG));
	$options_colors->section_add($section);
	$section->option_add(new CoreOption('color_breadcrumb_bg', __('Breadcrumb background', THEME_SLUG), 'color', null, '#fafafa'));
	$section->option_add(new CoreOption('color_breadcrumb_text', __('Breadcrumb text', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_breadcrumb_text_hover', __('Breadcrumb text hover', THEME_SLUG), 'color', null, '#000000'));

	// Content
	$section = new CoreOptionSection('colors-other', __('Content', THEME_SLUG));
	$options_colors->section_add($section);
	$section->option_add(new CoreOption('color_content_background', __('Content background', THEME_SLUG), 'color', null, '#ffffff'));
	$section->option_add(new CoreOption('color_paragraphs', __('Paragraphs', THEME_SLUG), 'color', null, '#999999'));
	$section->option_add(new CoreOption('color_links', __('Links', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_links_hover', __('Links hover', THEME_SLUG), 'color', null, '#079beb'));

	// Content
	$section = new CoreOptionSection('colors-button', __('Button', THEME_SLUG));
	$options_colors->section_add($section);
	$section->option_add(new CoreOption('color_button_text', __('Button text', THEME_SLUG), 'color', null, '#ffffff'));
	$section->option_add(new CoreOption('color_button_text_hover', __('Button text hover', THEME_SLUG), 'color', null, '#079beb'));
	$section->option_add(new CoreOption('color_button_g1', __('BG gradient color 1', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_button_g2', __('BG gradient color 2', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_button_text_shadow', __('Text Shadow', THEME_SLUG), 'color', null, '#2e2e2e'));
	$section->option_add(new CoreOption('color_button_border', __('Border Color', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_button_shadow', __('Box shadow', THEME_SLUG), 'color', null, '#000000'));

	// Header Icons
	$section = new CoreOptionSection('header_social', __('Header Icons', THEME_SLUG));
	$options_colors->section_add($section);
	$section->option_add(new CoreOption('social_icons_text', __('Header icons color', THEME_SLUG), 'color', null, '#ffffff'));
	$section->option_add(new CoreOption('social_icons_text_hover', __('Header icons hover color', THEME_SLUG), 'color', null, '#adadad'));

	// Header Area
	//
	$options_headers = new CoreOptionGroup('header', __('Header', THEME_SLUG), __('Customize the theme\'s Header area.', THEME_SLUG), CORE_URI. '/images/options-colors.png');
	$core_theme_options_handler->group_add($options_headers);

	// Header Colors
	$section = new CoreOptionSection('header_a', __('Logo', THEME_SLUG));
	$options_headers->section_add($section);

	$section->option_add(new CoreOption('logo', __('Logo', THEME_SLUG), 'image', __('The logo is displayed in the site\'s header.', THEME_SLUG), THEME_URI. '/images/joop-logo.jpg'));
	$section->option_add(new CoreOption('logo_resize', __('Resize logo', THEME_SLUG), 'checkbox', __('This setting allows you to turn on/off the resize of the logo height when you scroll up and down.', THEME_SLUG), false));
	$section->option_add(new CoreOption('hide_header_login', __('Hide Lock icon', THEME_SLUG), 'checkbox', __('This will allows you to hide lock icon at header.', THEME_SLUG), false));

	// Top Navigation
	$section = new CoreOptionSection('header_menu', __('Menu', THEME_SLUG));
	$options_headers->section_add($section);

	$section->option_add(new CoreOption('color_top_main_bg', __('Main background color', THEME_SLUG), 'color', null, '#000000'));

	$option = new CoreOption('color_top_nav_opacity', __('Main background opacity', THEME_SLUG), 'number', null, '80');
	$option->step = 1;
	$option->min = 0;
	$option->max = 100;
	$section->option_add($option);

	$section->option_add(new CoreOption('color_top_menu_text', __('Menu', THEME_SLUG), 'color', null, '#ffffff'));
	$section->option_add(new CoreOption('color_top_menu_text_hover', __('Menu hover', THEME_SLUG), 'color', null, '#9c9c9c'));
	$section->option_add(new CoreOption('color_top_menu_background_hover', __('Menu hover background', THEME_SLUG), 'color', null, null));
	$section->option_add(new CoreOption('color_top_submenu_text', __('Submenu text', THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('color_top_submenu_text_hover', __('Submenu text hover', THEME_SLUG), 'color', null, '#079beb'));
	$section->option_add(new CoreOption('color_top_submenu_background', __('Submenu background', THEME_SLUG), 'color', null, null));
	$section->option_add(new CoreOption('color_top_submenu_background_hover', __('Submenu hover background', THEME_SLUG), 'color', null, null));


	//News Scroller
	$section = new CoreOptionSection('scroller', __('News Scroller', THEME_SLUG));
	$options_headers->section_add($section);

	$section->option_add(new CoreOption('scroller_switch', __('Activate News Scroller', THEME_SLUG), 'checkbox', __('News scroller will be displayed at the header right beside the theme logo.', THEME_SLUG), true));
	$section->option_add(new CoreOption('scroller_bg', __('Background color', THEME_SLUG), 'color', null, '#0f0f0f'));
	$section->option_add(new CoreOption('scroller_text', __('Text color', THEME_SLUG), 'color', null, '#FFFFFF'));
	$section->option_add(new CoreOption('scroller_item_1', __('News Item 1', THEME_SLUG), 'text', null, "Joop features and transmissions give you unprecedented opportunities."));
	$section->option_add(new CoreOption('scroller_item_2', __('News Item 2', THEME_SLUG), 'text', null, "And, you are way ahead of the pack using Joop full screen Woocommerce."));
	$section->option_add(new CoreOption('scroller_item_3', __('News Item 3', THEME_SLUG), 'text', null, "This WP theme will help you sell your products or images like hot cakes! "));

	// Footer Area
	//
	$options_copyright = new CoreOptionGroup('layouts-footer_tabs', __('Footer', THEME_SLUG), __('Customize the Footer area.', THEME_SLUG), CORE_URI. '/images/options-copyright.png');
	$core_theme_options_handler->group_add($options_copyright);

	// Footer Widget Area
	$section = new CoreOptionSection('footer_section_a', __('Widget Area', THEME_SLUG));
	$options_copyright->section_add($section);

	$section->option_add(new CoreOption('footer_section_color',  __('Content Color',THEME_SLUG), 'color', null, '#ffffff'));
	$section->option_add(new CoreOption('footer_section_link',  __('Link Color',THEME_SLUG), 'color', null, '#e6e6e6'));
	$section->option_add(new CoreOption('footer_section_link_hover',  __('Link Hover Color',THEME_SLUG), 'color', null, '#079beb'));
	$section->option_add(new CoreOption('footer_section_bg',  __('Background Color',THEME_SLUG), 'color', null, '#000000'));

	//Background Set-up
	$option = new CoreOption('footer_section_setup', __('Footer Background', THEME_SLUG), 'select', __('You can select here a background image for the footer area.', THEME_SLUG), 'none','bg-options');
	$option->parameters = array('none' => 'none', 'image' => 'Image');
	$section->option_add($option);

	$section->option_add(new CoreOption('footer_section_image',  __('Footer Image',THEME_SLUG), 'image', __('The Footer background image.', THEME_SLUG), null,'bg-img'));

	// Footer Menu Area
	$section = new CoreOptionSection('footer_section_b', __('Menu Area', THEME_SLUG));
	$options_copyright->section_add($section);

	$section->option_add(new CoreOption('footer_menu_bg',  __('Background Color',THEME_SLUG), 'color', null, '#000000'));
	$section->option_add(new CoreOption('footer_menu_color',  __('Content Color',THEME_SLUG), 'color', null, '#7a7a7a'));
	$section->option_add(new CoreOption('footer_menu_link',  __('Link Color',THEME_SLUG), 'color', null, '#FFFFFF'));
	$section->option_add(new CoreOption('footer_menu_link_hover',  __('Link Hover Color',THEME_SLUG), 'color', null, '#079beb'));
	$section->option_add(new CoreOption('footer_copyright', __('Copyright', THEME_SLUG), 'color', null, '#ffffff'));

	// Header Icons
	$section = new CoreOptionSection('footer_social', __('Social Icons', THEME_SLUG));
	$options_copyright->section_add($section);
	$section->option_add(new CoreOption('footer_icons_text', __('Social icons color', THEME_SLUG), 'color', null, '#ffffff'));
	$section->option_add(new CoreOption('footer_icons_text_hover', __('Social icons hover color', THEME_SLUG), 'color', null, '#079beb'));

	// Copyright
	$section = new CoreOptionSection('copyright', __('Copyright', THEME_SLUG));
	$options_copyright->section_add($section);

	$section->option_add(new CoreOption('copyright_name', __('Copyright name', THEME_SLUG), 'text', __('The name which will be displayed in the footers\'s copyright.', THEME_SLUG), 'Theme Dutch'));
	$section->option_add(new CoreOption('copyright_link', __('Copyright link', THEME_SLUG), 'text', __('The full link to the copyright holder\'s website.', THEME_SLUG), 'http://www.theme-dutch.com/'));
	$section->option_add(new CoreOption('copyright_html', __('Copyright', THEME_SLUG), 'text-multiline', __('This will appear at the footer and the above options will be overwritten if you enter your html formatted copyright here', THEME_SLUG), '&copy; 2013 All Rights Reserved. <a href="http://www.theme-dutch.com/">Theme Dutch</a>'));

	// Category options
	$options = new CoreOptionGroup('categories', __('Categories', THEME_SLUG), __('Use this page to define options for individual categories.', THEME_SLUG), CORE_URI. '/images/options-categories.png');
	$core_theme_options_handler->group_add($options);

	// Post categories
	$categories = get_categories(array(
									'type'      => 'post',
									'orderby'      => 'name',
									'order'        => 'ASC',
									'hide_empty'   => 0,
									'hierarchical' => 0,
									'pad_counts'   => false
								));
	foreach ($categories as $category) {
		theme_category_add($options, $category);
	}

	// WooCommerce product categories
	$categories = get_categories(array(
									'type'         => 'product',
									'orderby'      => 'name',
									'order'        => 'ASC',
									'hide_empty'   => 0,
									'hierarchical' => 0,
									'pad_counts'   => false
								));
	foreach ($categories as $category) {
		theme_category_add($options, $category);
	}
}

// Category Options
function theme_category_add($options, $category) {
	global $core_layout_default;

	$section = new CoreOptionSection('category-' .$category->slug, $category->name);
	$options->section_add($section);

	// Layouts have a special name (layout-*) so that the layout module can recognize them
	$section->option_add(new CoreOption('layout-category-' .$category->slug, __('Layout', THEME_SLUG), 'layout', null, $core_layout_default));

	// Category Thumbnail Image
	//$section->option_add(new CoreOption('category_thumbnail_' .$category->slug, __('Thumbnail Image', THEME_SLUG), 'image',null,null));

	// Background Set-up
	$option = new CoreOption('background_setup_'.$category->slug, __('Page Background', THEME_SLUG), 'select', __('You can have a background image or a slider in the background.', THEME_SLUG),'','bg-options');
	$option->parameters = array('none' => 'none', 'image' => 'Image', 'slider' => 'Slider');
	$section->option_add($option);

	// Background Slider
	$option = new CoreOption('background_slider_'.$category->slug, __('Background Slider', THEME_SLUG), 'sliders', __('Use slider that is only applicable for background (ex. fullscreen slider).', THEME_SLUG),'', 'bg-slider');
	$section->option_add($option);

	$section->option_add(new CoreOption('category_background_' .$category->slug, __('Background Image', THEME_SLUG), 'image',null,null, 'bg-img ' .  $category->slug.'imgopt'));

	// Custom Category Content section
	$section->option_add(new CoreOption('custom_content_' .$category->slug , __('Subtitle', THEME_SLUG), 'text-multiline', __('Any HTML put here will be included in it\'s own block above the content.', THEME_SLUG)));

	// Basic SEO Category Content section
	$section->option_add(new CoreOption('seo_desc-' .$category->slug , __('Meta Description', THEME_SLUG), 'text-multiline', __('Enter the meta description for this category page.', THEME_SLUG)));
	$section->option_add(new CoreOption('seo_keywords-' .$category->slug , __('Meta Keywords', THEME_SLUG), 'text', __('Enter the meta keywords separated by commas', THEME_SLUG)));

}

// Register Layout options
//
function core_layout_options_register() {
	global $core_layout_default_sidebars;
	global $core_layout_default;
	global $core_layout_footer_default;
	global $core_theme_options_handler;

	// Theme layout options
	$options = new CoreOptionGroup('layouts', __('Layouts', THEME_SLUG), __('Use this page to define the layouts of special pages.', THEME_SLUG), CORE_URI. '/layout/images/icon-layouts.png');
	$core_theme_options_handler->group_add($options);

	/**
	 * added a default layout
	 * @since framework 1.1
	 */
	$section = new CoreOptionSection('layout-default', __('Default page', THEME_SLUG) );
	$options->section_add($section);
	$section->option_add(new CoreOption('layout-default', null, 'layout', null, $core_layout_default));

	// Slider
	//$section->option_add(new CoreOption('slider_layout-default', __('Slider', THEME_SLUG), 'sliders', __('The slider will be displayed at the top of this page.', THEME_SLUG)));

	//Background Set-up
	$option = new CoreOption('layout-default_background_setup', __('Page Background', THEME_SLUG), 'select', __('You can have a background image or a slider in the background.', THEME_SLUG), 'image','bg-options');
	$option->parameters = array('none' => 'none', 'image' => 'Image', 'slider' => 'Slider');
	$section->option_add($option);

	// Background Slider if setup is slider
	$option = new CoreOption('background_slider_layout-default', __('Background Slider', THEME_SLUG), 'sliders', __('Use slider that is only applicable for background (ex. fullscreen slider).', THEME_SLUG),null,'bg-slider');
	$section->option_add($option);

	// Background image options if setup is image
	$section->option_add(new CoreOption('layout-default_background', __('Background Image', THEME_SLUG), 'image', null, THEME_URI . '/images/default-bg.jpg','bg-img'));

	// Custom Category Content section
	$section->option_add(new CoreOption('custom_content_layout-default' , __('Subtitle', THEME_SLUG), 'text-multiline', __('Any HTML put here will be included in it\'s own block above the content.', THEME_SLUG)));

	$layouts = array(

		//'layout-single' => __('Single page', THEME_SLUG),
		'layout-home' => __('Home page', THEME_SLUG),
		'layout-search' => __('Search page', THEME_SLUG),
		'layout-archive' => __('Archive page', THEME_SLUG),
		'layout-404' => __('404 page', THEME_SLUG),
		'layout-author' => __('Author page', THEME_SLUG),
		'layout-tag' => __('Tag page', THEME_SLUG),
	);
	foreach ($layouts as $key => $value) {
		$section = new CoreOptionSection($key, $value);
		$options->section_add($section);
		$section->option_add(new CoreOption($key, null, 'layout', null, $core_layout_default));

		/**
		 * added sliders, backkground, custom content,
		 * @since Framework 2.0
		 */

		//Background Set-up
		$option = new CoreOption($key.'_background_setup', __('Page Background', THEME_SLUG), 'select', __('You can have a background image or a slider in the background.', THEME_SLUG), 'none','bg-options');
		$option->parameters = array('none' => 'none', 'image' => 'Image', 'slider' => 'Slider');
		$section->option_add($option);

		// Background Slider if setup is slider
		$option = new CoreOption('background_slider_'.$key, __('Background Slider', THEME_SLUG), 'sliders', __('Use slider that is only applicable for background (ex. fullscreen slider).', THEME_SLUG),null,'bg-slider');
		$section->option_add($option);

		// Background image options if setup is image
		$section->option_add(new CoreOption($key.'_background', __('Background Image', THEME_SLUG), 'image', null, THEME_URI . '/images/default-bg.jpg','bg-img'));

		// Custom Category Content section
		$section->option_add(new CoreOption('custom_content_' .$key , __('Subtitle', THEME_SLUG), 'text-multiline', __('Any HTML put here will be included in it\'s own block above the content.', THEME_SLUG)));

	}

	// Post layout options
	$layout_options = new CoreOptionHandler(THEME_SLUG . '-layout', THEME_NAME . ' layout', array('post', 'page'));
	core_options_handler_register($layout_options);

	$options = new CoreOptionGroup('layout', __('Layout', THEME_SLUG));
	$layout_options->group_add($options);

	$section = new CoreOptionSection('layout');
	$options->section_add($section);
	$section->option_add(new CoreOption('layout', '', 'layout', __('Use this option to change the layout of the current page. Sidebars are ordered from left to right.', THEME_SLUG), null));

	// Sidebar options
	$options = new CoreOptionGroup('sidebars', __('Widgets', THEME_SLUG), __('By adding widgets here, you can assign and use them in your page layouts.', THEME_SLUG), CORE_URI. '/layout/images/icon-sidebars.png');
	$core_theme_options_handler->group_add($options);

	$section = new CoreOptionSection('sidebars');
	$options->section_add($section);
	$section->option_add(new CoreOption('sidebars', '', 'sidebars', null, $core_layout_default_sidebars));
}
add_action('after_setup_theme', 'core_layout_options_register');

?>