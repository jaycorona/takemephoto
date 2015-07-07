<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Theme Option: Layouts
 *
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */


// Enqueue scripts
//
function core_layout_enqueue_scripts() {
	wp_enqueue_style('core-layout', CORE_URI. '/layout/layout.css');
	wp_enqueue_script('core-layout', CORE_URI. '/layout/layout.js', '', '', true);

	wp_enqueue_script('json2', '', '', '', '', true);
}
add_action('admin_enqueue_scripts', 'core_layout_enqueue_scripts');

// Register sidebars
//
function core_layout_sidebars_register() {
	global $core_sidebars;

	$core_sidebars = core_options_get('sidebars');

	foreach ($core_sidebars as $sidebar_slug => $sidebar_title ) {
		register_sidebar(array(	'name' => THEME_NAME. ': ' .$sidebar_title,
								'id' => $sidebar_slug,
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget' => '</aside>',
								'before_title' => '<h3 class="widget-title">',
								'after_title' => '<i class="icon- "></i></h3>'));
	}
}
add_action('widgets_init', 'core_layout_sidebars_register');

// Layout types
//
$layout = new CoreLayout('full', THEME_URI. '/images/layouts/layout-full.png');
$layout->element_add(new CoreLayoutElement('template', '<div class="grid box-twelve full"><div class="theme-content">', '</div></div>'));
core_layout_type_register($layout);

$layout = new CoreLayout('left-single', THEME_URI. '/images/layouts/layout-left-single.png');
$layout->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two left"><div class="theme-sidebar">', '</div></div>'));
$layout->element_add(new CoreLayoutElement('template', '<div class="grid box-ten fit left-single"><div class="theme-content">', '</div></div>'));
core_layout_type_register($layout);

$layout = new CoreLayout('left-dual', THEME_URI. '/images/layouts/layout-left-dual.png');
$layout->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two left"><div class="theme-sidebar">', '</div></div>'));
$layout->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two middle-left"><div class="theme-sidebar">', '</div></div>'));
$layout->element_add(new CoreLayoutElement('template', '<div class="grid box-eight fit left-dual"><div class="theme-content">', '</div></div>'));
core_layout_type_register($layout);

$layout = new CoreLayout('right-single', THEME_URI. '/images/layouts/layout-right-single.png');
$layout->element_add(new CoreLayoutElement('template', '<div class="grid box-ten right-single"><div class="theme-content">', '</div></div>'));
$layout->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two fit right"><div class="theme-sidebar">', '</div></div>'));
core_layout_type_register($layout);

$layout = new CoreLayout('right-dual', THEME_URI. '/images/layouts/layout-right-dual.png');
$layout->element_add(new CoreLayoutElement('template', '<div class="grid box-eight right-dual"><div class="theme-content">', '</div></div>'));
$layout->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two middle-right"><div class="theme-sidebar">', '</div></div>'));
$layout->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two fit right"><div class="theme-sidebar">', '</div></div>'));
core_layout_type_register($layout);

$layout = new CoreLayout('both', THEME_URI. '/images/layouts/layout-both.png');
$layout->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two left"><div class="theme-sidebar">', '</div></div>'));
$layout->element_add(new CoreLayoutElement('template', '<div class="grid box-eight both"><div class="theme-content">', '</div></div>'));
$layout->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two fit right"><div class="theme-sidebar">', '</div></div>'));
core_layout_type_register($layout);

$layout = new CoreLayout('left-wide', THEME_URI. '/images/layouts/layout-left-wide.png');
$layout->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-three left"><div class="theme-sidebar">', '</div></div>'));
$layout->element_add(new CoreLayoutElement('template', '<div class="grid box-nine fit left-wide"><div class="theme-content">', '</div></div>'));
core_layout_type_register($layout);

$layout = new CoreLayout('right-wide', THEME_URI. '/images/layouts/layout-right-wide.png');
$layout->element_add(new CoreLayoutElement('template', '<div class="grid box-nine right-wide"><div class="theme-content">', '</div></div>'));
$layout->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-three fit right"><div class="theme-sidebar">', '</div></div>'));
core_layout_type_register($layout);

//$layout = new CoreLayout('wide-dual', THEME_URI. '/images/layouts/layout-wide-dual.png');
//$layout->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-three left"><div class="theme-sidebar">', '</div></div>'));
//$layout->element_add(new CoreLayoutElement('template', '<div class="grid box-six wide-dual"><div class="theme-content">', '</div></div>'));
//$layout->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-three fit right"><div class="theme-sidebar">', '</div></div>'));
//core_layout_type_register($layout);

// Footer types
//
$footer = new CoreLayout('none', THEME_URI. '/images/layouts/footer-none.png');
core_layout_footer_type_register($footer);

$footer = new CoreLayout('one', THEME_URI. '/images/layouts/footer-one.png');
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-twelve fit"><div class="footer-sidebar">', '</div></div>'));
core_layout_footer_type_register($footer);

$footer = new CoreLayout('two', THEME_URI. '/images/layouts/footer-two.png');
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-six"><div class="footer-sidebar">', '</div></div>'));
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-six fit"><div class="footer-sidebar">', '</div></div>'));
core_layout_footer_type_register($footer);

$footer = new CoreLayout('three', THEME_URI. '/images/layouts/footer-three.png');
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-four"><div class="footer-sidebar">', '</div></div>'));
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-four"><div class="footer-sidebar">', '</div></div>'));
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-four fit"><div class="footer-sidebar">', '</div></div>'));
core_layout_footer_type_register($footer);

$footer = new CoreLayout('four', THEME_URI. '/images/layouts/footer-four.png');
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-three"><div class="footer-sidebar">', '</div></div>'));
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-three"><div class="footer-sidebar">', '</div></div>'));
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-three"><div class="footer-sidebar">', '</div></div>'));
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-three fit"><div class="footer-sidebar">', '</div></div>'));
core_layout_footer_type_register($footer);

$footer = new CoreLayout('six', THEME_URI. '/images/layouts/footer-six.png');
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two"><div class="footer-sidebar">', '</div></div>'));
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two"><div class="footer-sidebar">', '</div></div>'));
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two"><div class="footer-sidebar">', '</div></div>'));
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two"><div class="footer-sidebar">', '</div></div>'));
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two"><div class="footer-sidebar">', '</div></div>'));
$footer->element_add(new CoreLayoutElement('sidebar', '<div class="grid box-two fit"><div class="footer-sidebar">', '</div></div>'));
core_layout_footer_type_register($footer);

// Default sidebar configuration
//
core_layout_set_default_sidebars(array(
	//'none' => __('None', THEME_SLUG),
	'default-left' => __('Default Left', THEME_SLUG),
	'default-right' => __('Default Right', THEME_SLUG),
	'footer-1' => __('Widget 1', THEME_SLUG),
	'footer-2' => __('Widget 2', THEME_SLUG),
	'footer-3' => __('Widget 3', THEME_SLUG),
	'footer-4' => __('Widget 4', THEME_SLUG),
	'footer-5' => __('Widget 5', THEME_SLUG),
	'footer-6' => __('Widget 6', THEME_SLUG)
));

// Default layout configuration
//
core_layout_set_default(array(
	'layout' => 'full',
	'layout-sidebars' => array('default-left', 'default-right'),
	'footer' => 'none',
	'footer-sidebars' => array('footer-1', 'footer-2', 'footer-3', 'footer-4')
));


?>