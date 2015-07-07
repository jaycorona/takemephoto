<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * The function hooks in displaying the theme functions and features.
 *
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */

/* =WP Head features and functions
-------------------------------------------------------------- */
if ( ! function_exists( 'core_theme_favicon' ) ) {
/**
 * Theme Favicon
 * @since framework 1.0
 */
	function core_theme_favicon(){
		$favicon_uri = core_options_get('favicon');
		if ($favicon_uri) {
			echo '<link rel="shortcut icon" href="' . $favicon_uri . '">' . "\n";
		}
	} // core_theme_favicon()
}
add_action('wp_head', 'core_theme_favicon', 5);


if ( ! function_exists( 'core_theme_seo' ) ) {
/**
 * Theme Favicon
 * @since framework 1.0
 */
	function core_theme_seo(){
		// SEO Basic Activation
		$seobasic = core_options_get('seobasic');
		if ( $seobasic ){
			core_seo_basic('meta');
		}
	} // core_theme_seo()
}
add_action('wp_head', 'core_theme_seo', 1);


if ( ! function_exists( 'core_theme_load_page_styles' ) ) {
/**
 * Load Page Styles
 * @since framework 1.0
 */
	function core_theme_load_page_styles(){
		echo "<!-- custom css -->\n";
		get_template_part('tdframework/theme-styles');
	} // core_theme_load_page_styles()
}
add_action('wp_head', 'core_theme_load_page_styles', 100);


/* =Header features and functions
-------------------------------------------------------------- */
if ( ! function_exists( 'core_theme_social_row' ) ) {
/**
 * Header first row
 */
	function core_theme_social_row(){

	?>
		<div id="social-row" class="social-row theme-row">
			<?php do_action('social_row'); ?>
		</div>

	<?php
	} // core_theme_social_row()
}
add_action('core_theme_hook_in_header', 'core_theme_social_row');


if ( ! function_exists( 'core_theme_newscroller' ) ) {
/**
 * Theme Logo
 * @since framework 1.0
 */
	function core_theme_newscroller(){

		$items = array();

		$items[0] = core_options_get('scroller_item_1');
		$items[1] = core_options_get('scroller_item_2');
		$items[2] = core_options_get('scroller_item_3');

		$scrollItems = '';

		foreach( $items as $item ) {
			$scrollItems .= '<div class="textItem">' . $item . '</div>';
		}

		if ( core_options_get('scroller_switch')  && $scrollItems != '' ) {
			printf( '<div id="scroller" class="show-desktop">%1$s</div>', $scrollItems );
		}
	} // core_theme_newscroller
}
add_action('social_row', 'core_theme_newscroller');


if ( ! function_exists( 'core_theme_social_icons' ) ) {
/**
 * Social Icons
 * @since framework 1.0
 */
	function core_theme_social_icons(){
		echo '<div class="sociables">';
		do_action('core_theme_social_icons_hook');
		echo '</div>';
	} // core_theme_social_icons()
}
add_action('social_row', 'core_theme_social_icons');


if ( ! function_exists( 'social_icon_item_search' ) ) {
/**
 * Slogan Search Item
 *
 */
	function social_icon_item_search(){
		echo '<div id="icon-search" class="social_icons"><span class="icons"><a href="#"><i class="fa fa-search"></i></a></span></div>';
	} //core_theme_social_icon_items()
}
add_action( 'core_theme_social_icons_hook', 'social_icon_item_search' );


if ( ! function_exists( 'social_icon_search_box' ) ) {
/**
 * Slogan Search pulldown box
 *
 */
 	function social_icon_search_box(){
		printf('<div id="theme-search" class="theme-row pull-down">
					<div class="theme-wrap theme-search"><div class="grid-right box-twelve">');
		get_template_part('searchform');
		printf('</div>
					</div>
				</div>');
	} //social_icon_search_box()
}
add_action('core_theme_hook_in_header', 'social_icon_search_box');


if ( ! function_exists( 'social_icon_item_cart' ) ) {
/**
 * Slogan Cart Item
 *
 */
	function social_icon_item_cart(){
		echo '<div id="icon-cart" class="social_icons"><span class="icons"><a href="#"><i class="fa fa-shopping-cart"></i></a></span> </div>';
	} //social_icon_item_cart()
}



if ( ! function_exists( 'social_icon_cart_box' ) ) {
/**
 * Slogan Cart pulldown box
 *
 */
 	function social_icon_cart_box(){

 		// WooCommerce cart
		if (is_woocommerce_activated()) {
			global $woocommerce;

			printf('<div id="theme-cart" class="theme-row pull-down">
						<div class="theme-wrap theme-cart"><div class="grid-right box-twelve">');
			theme_woocommerce_cart();
			printf('</div>
						</div>
					</div>');
		}
	} //social_icon_cart_box()
}


if ( core_theme_is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	add_action( 'core_theme_social_icons_hook', 'social_icon_item_cart' );
	add_action('core_theme_hook_in_header', 'social_icon_cart_box');
}


if ( ! function_exists( 'social_icon_item_user' ) ) {
/**
 * Slogan User Item
 *
 */
	function social_icon_item_user(){
		$core_hide_header_login = core_options_get('hide_header_login');
		if ( $core_hide_header_login == false ){
			if ( is_user_logged_in() ) {
				echo '<div id="icon-user" class="social_icons"><span class="icons"><a href="#"><i class="fa fa-unlock"></i></a></span></div>';
			} else {
				echo '<div id="icon-user" class="social_icons"><span class="icons"><a href="#"><i class="fa fa-lock"></i></a></span></div>';
			}
		}
	} //social_icon_item_user()
}
add_action( 'core_theme_social_icons_hook', 'social_icon_item_user' );


if ( ! function_exists( 'social_icon_user_box' ) ) {
/**
 * Slogan User pulldown box
 *
 */
 	function social_icon_user_box(){
 		global $current_user;

		echo '<div id="theme-my-account" class="theme-row pull-down"><div class="theme-wrap theme-my-account"><div class="grid-right box-twelve">';

		if ( ! is_user_logged_in() ) {
			wp_login_form();
		} else {
			echo '<p class="text-right">Howdy ' . $current_user->user_login . '! <a href=" ' . wp_logout_url( get_permalink() ) . ' " title="Logout">Logout</a>';
		}

		echo '</div>
					</div>
				</div>';
	} //social_icon_user_box()
}
add_action('core_theme_hook_in_header', 'social_icon_user_box');


if ( ! function_exists( 'social_icon_item_wpml' ) ) {
/**
 * Slogan WPML Item
 *
 */
	function social_icon_item_wpml(){
		echo '<div id="icon-language" class="social_icons"><span class="icons"><a href="#"><i class="fa fa-globe"></i></a></span> </div>';
	} //social_icon_item_wpml()
}


if ( ! function_exists( 'social_icon_wpml_box' ) ) {
/**
 * Slogan WPML pulldown box
 *
 */
 	function social_icon_wpml_box(){
		printf('<div id="theme-language" class="theme-row pull-down">
					<div class="theme-wrap theme-language"><div class="grid-right box-twelve">');
		do_action('icl_language_selector');
		printf('</div>
				</div></div>');
	} //social_icon_wpml_box()
}

if ( function_exists( 'icl_get_home_url' ) ) {
	add_action( 'core_theme_social_icons_hook', 'social_icon_item_wpml' );
	add_action('core_theme_hook_in_header', 'social_icon_wpml_box');
}


if ( ! function_exists( 'core_theme_social_icon_styles' ) ) {
/**
 * Social icons Styles
 */
	function core_theme_social_icon_styles(){

		$bg_colors = array();

		$colors = array(
			'social_icons_text' 		=> array('.social-row .social_icons a', '.social-row .social_icons .icons', '.theme-top-menu a'),
			'social_icons_text_hover' 	=> array('.social-row .social_icons a:hover', '.social-row .social_icons .icons:hover', '.theme-top-menu a:hover'),

			'footer_icons_text' 		=> array('.footer .social_icons a', '.footer .social_icons .icons'),
			'footer_icons_text_hover' 	=> array('.footer .social_icons a:hover', '.footer .social_icons .icons:hover')
		);

		$border_colors = array();

		apply_colors('background-color', $bg_colors);
		apply_colors('color', $colors);
		apply_colors('border-color', $border_colors);

	} // core_theme_social_icon_styles()
}
add_action('core_theme_hook_styles', 'core_theme_social_icon_styles');


if ( ! function_exists( 'core_theme_logo' ) ) {
/**
 * Theme Logo
 * @since framework 1.0
 */
	function core_theme_logo(){
		$class = core_options_get('logo_resize') ? ' resize' : 'no-resize';
	?>
		<div id="theme-logo" class="theme-logo grid <?php echo $class; ?>">

		<?php if(core_options_get('logo') == '') : ?>
			<hgroup>
				<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>
		<?php else : ?>
			<a href="<?php echo home_url(); ?>">
				<img src="<?php echo core_options_get('logo'); ?>" alt="<?php echo bloginfo('name'); ?>">
			</a>
		<?php endif; ?>

		</div><!-- ends here #theme-logo -->
	<?php
	} // core_theme_logo()
}


/* =Navigation features and functions
-------------------------------------------------------------- */
if ( ! function_exists( 'core_theme_main_menu' ) ) {
/**
 * Main Navigation Menu
 *
 * @since framework 1.0
 */
	function core_theme_main_menu(){
		echo '<nav id="site-navigation" class="site-navigation theme-row">';
		core_theme_logo();
		echo '<div class="main-navigation grid">';
		core_layout_menu('main');
		echo '</div>';
	    echo '</nav><!-- ends here #site-navigation -->';
	} // core_theme_main_menu()
}
add_action('core_theme_hook_in_header', 'core_theme_main_menu');


/* =Navigation features and functions
-------------------------------------------------------------- */
if ( ! function_exists( 'core_theme_top_menu' ) ) {
/**
 * Main Navigation Menu
 *
 * @since framework 1.0
 */
	function core_theme_top_menu(){
		if ( has_nav_menu('top_menu') ) {
			echo '<nav id="top-navigation" class="top-navigation">';
			core_layout_menu('topmenu');
		    echo '</nav><!-- ends here #top-navigation -->';	
		}	
	} // core_theme_top_menu()
}
add_action('core_theme_hook_in_header', 'core_theme_top_menu');


if ( ! function_exists( 'core_theme_main_menu_styles' ) ) {
/**
 * Main Menu Styles
 */
	function core_theme_main_menu_styles(){

		$bg_colors = array(
			'color_top_main_bg' 		=> array('#site-navigation', '#dl-menu .dl-menu'),
			'color_top_menu_background_hover' => array(
				'.theme-menu-main > li:hover > a'
			),
			'color_top_submenu_background' => array(
				'.theme-menu-main .sub-menu li a',
			),
			'color_top_submenu_background_hover'=> array(
				'.theme-menu-main .sub-menu li:hover a',
				'.theme-menu-main .sub-menu li.current-menu-ancestor a',
				'.theme-menu-main .sub-menu li.current-menu-item a',
				'.theme-menu-main .sub-menu li.current_page_ancestor a',
				'.theme-menu-main .sub-menu li.current-page-item a'
			),
			'scroller_bg' => array('.social-row', '.theme-top-menu')
		);

		$colors = array(
			'color_top_menu_text' 			=> array(
				'.theme-menu-main > li > a',
				'.theme-menu-main > li.current-menu-ancestor > a',
				'.theme-menu-main > li.current-menu-item > a',
				'.theme-menu-main > li.current_page_ancestor > a',
				'.theme-menu-main > li.current-page-item > a',
				'.sb-holder',
				'.sb-toggle'
			),
			'color_top_menu_text_hover' 	=> array(
				'.theme-menu-main > li:hover > a',
				'.theme-menu-main > li.current-menu-ancestor > a',
				'.theme-menu-main > li.current-menu-item > a',
				'.theme-menu-main > li.current_page_ancestor > a',
				'.theme-menu-main > li.current-page-item > a',
				'.sb-holder',
				'.sb-toggle:hover',
				'.theme-menu-main > li.current-menu-parent > a',
				'.theme-menu-main > li.current-menu-ancestor > a',
				'.theme-menu-main > li.current-page-item > a',
				'.theme-menu-main > li.current-menu-item > a'

			),
			'color_top_submenu_text' 		=> array(
				'.theme-menu-main .sub-menu li > a',
				'.theme-menu-main .sub-menu li.current-menu-ancestor > a',
				'.theme-menu-main .sub-menu li.current-menu-item > a',
				'.theme-menu-main .sub-menu li.current_page_ancestor > a',
				'.theme-menu-main .sub-menu li.current-page-item > a',
			),
			'color_top_submenu_text_hover' 	=> array(
				'.theme-menu-main .sub-menu li:hover > a',
				'.theme-menu-main .sub-menu li.current-menu-ancestor > a',
				'.theme-menu-main .sub-menu li.current-menu-item > a',
				'.theme-menu-main .sub-menu li.current_page_ancestor > a',
				'.theme-menu-main .sub-menu li.current-page-item > a',

			),
			'scroller_text' => array('.social-row', '.theme-top-menu a'),
			'social_icons_text' 		=> array('.theme-top-menu a'),
			'social_icons_text_hover' 	=> array('.theme-top-menu a:hover'),
		);

		$border_colors = array(
			'color_top_menu_text' => array(
				'.theme-menu-main > li.current-menu-ancestor > a',
				'.theme-menu-main > li.current-menu-item > a',
				'.theme-menu-main > li.current_page_ancestor > a',
				'.theme-menu-main > li.current-page-item > a',
				'.sb-holder',
				'.theme-menu-main > li.current-menu-parent > a',
				'.theme-menu-main > li.current-menu-ancestor > a',
				'.theme-menu-main > li.current-page-item > a',
				'.theme-menu-main > li.current-menu-item > a'
			),
			'color_top_menu_text_hover' => array(
				'.theme-menu-main > li:hover > a',
				'.theme-menu-main > li.current-menu-ancestor > a',
				'.theme-menu-main > li.current-menu-item > a',
				'.theme-menu-main > li.current_page_ancestor > a',
				'.theme-menu-main > li.current-page-item > a',
				'.sb-holder:hover',
				'.theme-menu-main > li.current-menu-parent > a',
				'.theme-menu-main > li.current-menu-ancestor > a',
				'.theme-menu-main > li.current-page-item > a',
				'.theme-menu-main > li.current-menu-item > a'
			),
		);

		apply_colors('background-color', $bg_colors);
		apply_colors('color', $colors);
		apply_colors('border-color', $border_colors);

		// Menu color
		$color = core_hex2rgb(core_options_get('color_top_main_bg'));
		$color['alpha'] = core_options_get('color_top_nav_opacity')/100;
		echo '#site-navigation, #dl-menu .dl-menu { background-color: '.core_options_get('color_top_main_bg').'; background-color: ', core_color2rgba($color), '; }';
		echo '.theme-menu-main li li .fa-stop { border-color: transparent transparent ',core_options_get('color_top_menu_text_hover'),' transparent; }';
		echo '.top-navigation:before { border-color: transparent ',core_options_get('scroller_bg'),' transparent transparent; }';
		echo '.top-navigation:after { border-color: ',core_options_get('scroller_bg'),' transparent transparent transparent; }';
		//$color['alpha'] = 0.45;
		//echo '#theme-menu-main .sub-menu li a { border-color: '.core_options_get('color_top_main_bg').'; border-color: ', core_color2rgba($color), '; }';

	} // core_theme_social_icon_styles()
}
add_action('core_theme_hook_styles', 'core_theme_main_menu_styles');


/* =The background Image features and functions
-------------------------------------------------------------- */
if ( ! function_exists( 'core_theme_background_setup' ) ) {
/**
 * Background Setup filter
 * returns the Background setup of the current page
 */
 	function core_theme_background_setup( $background_setup = null, $slug = null, $post_type = "theme" ){

 		if ( core_options_get('background_sitewide', 'theme') ) {
			$slug = 'background_setup';
		}

		if ( ! core_options_get('background_sitewide', 'theme') ) {
			$slug = 'layout-default_background_setup';
		}

	 	if ( is_front_page() ) {
			$slug = 'background_setup';
			$post_type = get_post_type();
		}

	 	if ( is_home() ) {
			$slug = 'layout-home_background_setup';
		}

		if ( is_singular() ) {
			$slug = 'background_setup';
			$post_type = get_post_type();
		}

		if ( is_archive() ){
			$obj = get_queried_object();

			if ( is_category() ) {
				$slug = 'background_setup_' . $obj->slug;
			} elseif ( is_author() ) {
				$slug = 'layout-author_background_setup';
			} elseif ( is_tag() ) {
				$slug = 'layout-tag_background_setup';
			} else {
				$slug = 'layout-archive_background_setup';
			}
		}

		if ( is_404() ) {
			$slug = 'layout-404_background_setup';
		}

		if ( is_search() ) {
			$slug = 'layout-search_background_setup';
		}

		$background_setup = apply_filters( 'background_setup_addon', core_options_get($slug, $post_type) );

		/*if ( $background_setup === '' || $background_setup === 'none' ) {
		//if ( $background_setup != 'none'  ) {
			$post_type = 'theme';

			if ( core_options_get('background_sitewide', 'theme') ) {
				$slug = 'background_setup';
			}

			if ( ! core_options_get('background_sitewide', 'theme') ) {
				$slug = 'layout-default_background_setup';
			}

			$background_setup = core_options_get($slug, $post_type);
		}*/

		if ( $background_setup === '' || $background_setup === null ) {
			return;
		} else {
			return $background_setup;
		}
 	}
}
add_filter('background_setup', 'core_theme_background_setup');


if ( ! function_exists( 'core_theme_background_image' ) ) {
/**
 * Background Image filter
 * returns the path of the Background image
 */
 	function core_theme_background_image($backgroundimage = null, $slug = null, $post_type = "theme" ) {

	 	if ( is_front_page() && core_options_get('background_setup', get_post_type()) == 'image' ) {
			 $slug = 'background_image';
			 $post_type = get_post_type();
		}

		if ( is_home() && core_options_get('layout-home_background_setup', 'theme') == 'image' ) {
			 $slug = 'layout-home_background';
		}

		if ( is_singular() && core_options_get('background_setup', get_post_type()) == 'image' ) {
			 $slug = 'background_image';
			 $post_type = get_post_type();
		}

		if ( is_archive() ){
			$obj = get_queried_object();

			if ( is_category() && core_options_get('background_setup_' .$obj->slug) == 'image' ) {
				 $slug = 'category_background_' . $obj->slug ;
			}

			if ( is_author() && core_options_get('layout-author_background_setup', 'theme') == 'image' ) {
				 $slug = 'layout-author_background';
			}

			if ( is_tag() && core_options_get('layout-tag_background_setup', 'theme') == 'image' ) {
				 $slug = 'layout-tag_background';
			}

			//if ( is_post_type_archive() || is_tax() ) {
			//	return null;
			//}

			if ( core_options_get('layout-archive_background_setup', 'theme') == 'image' ) {
				 $slug = 'layout-archive_background';
			}
		}

		if ( is_404() && core_options_get('layout-404_background_setup', 'theme') == 'image' ) {
			 $slug = 'layout-404_background';
		}

		if ( is_search() && core_options_get('layout-search_background_setup', 'theme') == 'image' ) {
			 $slug = 'layout-search_background';
		}

		$backgroundimage = apply_filters( 'background_image_addon', core_options_get($slug, $post_type) );

		if ( $backgroundimage === '' && in_array( apply_filters( 'background_setup', core_options_get($slug, $post_type)), array('image', 'featured' ) ) ) {

			$post_type = 'theme';

			if ( core_options_get('background_setup', 'theme') === 'image' && ( core_options_get('background_sitewide', 'theme') || is_home() ) ) {
				 $slug = 'background_image';
			}

			if ( core_options_get('layout-default_background_setup', 'theme') === 'image' ) {
				$slug = 'layout-default_background';
			}

			$backgroundimage = core_options_get($slug, $post_type);
		}

		return $backgroundimage;
 	} // core_theme_background_image()
}
add_filter('background_image', 'core_theme_background_image', 1);


if ( ! function_exists( 'core_theme_the_background_image_style' ) ) {
/**
 * Background Image
 * returns the path of the Background image
 */
 	function core_theme_the_background_image() {

 		if( in_array(apply_filters( 'background_setup', null ), array('image', 'featured') ) ) {
		 	$bgimage = apply_filters('background_image', null);
		 	$bgclass = $bgimage == '' ? 'no-image' : 'bg-image';
		 	if( $bgclass !== 'no-image' ) {

				echo '<div id="header-image" class="header-image imgLiquidFill" data-imgLiquid-fill="true" data-imgLiquid-horizontalAlign="center" data-imgLiquid-verticalAlign="50%"><img src="', $bgimage ,'" alt="background image"></div>';

		 	}
	 	}
 	} // core_theme_the_background_image()
}
add_action( 'core_theme_background_feature_hook', 'core_theme_the_background_image');


if ( ! function_exists( 'core_theme_slider_filter' ) ) {
/**
 * Slider Area filter
 *
 * @since framework 1.0
 */
	function core_theme_slider_filter($bgslider=null){
		$post_type = 'theme'; //get_post_type();
		$category = get_query_var('cat');
		$current_category = get_category ($category);
		$slug = null;

		if ( is_front_page() && core_options_get('background_setup', get_post_type()) == 'slider' ) {
			$post_type = get_post_type();
			$slug = 'background_slider';
		}

		if ( is_home() && core_options_get('layout-home_background_setup', 'theme') == 'slider' ) {
			$slug = 'background_slider_layout-home';
		}

		if ( is_singular() && core_options_get('background_setup', get_post_type()) == 'slider' ) {
			$post_type = get_post_type();
			$slug = 'background_slider';
		}

		if ( is_archive() ){
			$obj = get_queried_object();

			if ( is_category() && core_options_get('background_setup_' .$obj->slug) == 'slider' ) {
				$slug = 'background_slider_'.$current_category->slug;
			}

			if ( is_author() && core_options_get('layout-author_background_setup', 'theme') == 'slider' ) {
				$slug = 'background_slider_layout-author';
			}

			if ( is_tag() && core_options_get('layout-tag_background_setup', 'theme') == 'slider' ) {
				$slug = 'background_slider_layout-tag';
			}

			//if ( is_post_type_archive() || is_tax() ) {
			//	return null;
			//}

			if ( core_options_get('layout-archive_background_setup', 'theme') == 'slider' ) {
				$slug = 'background_slider_layout-archive';
			}
		}

		if ( is_404() && core_options_get('layout-404_background_setup', 'theme') == 'slider' ) {
			$post_type = 'theme';
			$slug = 'background_slider_layout-404';
		}

		if ( is_search() && core_options_get('layout-search_background_setup', 'theme') == 'slider' ) {
			$post_type = 'theme';
			$slug = 'background_slider_layout-search';
		}

		$bgslider = apply_filters( 'bgslider_area_addon', core_options_get($slug, $post_type) );

		if ( $bgslider === '' || $bgslider === 'none' ) {

			$post_type = 'theme';

			if ( core_options_get('layout-default_background_setup', 'theme') == 'slider' && ! core_options_get('background_sitewide', 'theme') ) {
				$slug = 'background_slider_layout-default';
			}

			if ( core_options_get('background_setup', 'theme') == 'slider' && core_options_get('background_sitewide', 'theme') ) {
				$slug = 'background_slider';
			}

			$bgslider = core_options_get($slug, $post_type);
		}

		return $bgslider;

	} // core_theme_slider_filter()
}
add_filter('bgslider_area', 'core_theme_slider_filter', 1);


if ( ! function_exists( 'core_theme_background_feature' ) ) {
/**
 * Slider Area
 */
 	function core_theme_background_feature($bgimage = '', $bgslider ='none' ) {
 		$bgimage = apply_filters('background_image', $bgimage);
 		$bgslider = apply_filters('bgslider_area', $bgslider);

 		if( in_array(apply_filters( 'background_setup', null ), array('image', 'featured') ) ) {
 			$bgclass = $bgimage == '' ? 'no-image' : 'bg-image';
 			echo '<div id="background-area" class="background-area theme-row ' . $bgclass . ' no-slider">';
 		} elseif( 'slider' === apply_filters( 'background_setup', null ) ) {
 			$bgsliderclass = !$bgslider || $bgslider === 'none'  ? 'no-slider' : 'bg-slider';
 			echo '<div id="background-area" class="background-area theme-row no-image '. $bgsliderclass .'">';
 		} else {
			echo '<div id="background-area" class="background-area theme-row no-image no-slider">';
 		}

	 	do_action('core_theme_background_feature_hook');
	 	echo '</div>';

 	} // core_theme_background_feature()
}
add_action( 'core_theme_hook_before_wrapper', 'core_theme_background_feature' );


if ( ! function_exists( 'core_theme_slider_area' ) ) {
/**
 * Slider Area
 *
 * @since framework 1.0
 */
	function core_theme_slider_area($bgslider='none'){

		if( 'slider' === apply_filters( 'background_setup', null ) ) {
			$bgslider = apply_filters('bgslider_area', $bgslider);

			if (!$bgslider || $bgslider == 'none') {
				return;
			}

			echo '<div id="theme-slider-area" class="theme-slider-area">';
			//echo '	<div id="theme-slider" class="theme-slider">';
			core_slider($bgslider);
			//echo '	</div>';
			echo '	<div class="clearfix"></div>';
		    echo '</div><!-- ends here #theme-slider-area -->';
	    }
	} // core_theme_slider_area()
}
add_action( 'core_theme_background_feature_hook', 'core_theme_slider_area' );


/* =Content features and functions
-------------------------------------------------------------- */
if ( ! function_exists( 'core_theme_hook_before_content_wrap_start' ) ) {
/**
 * Content theme-wrap start
 */
 	function core_theme_hook_before_content_wrap_start() {
	 	echo '<div class="theme-wrap">';
 	} // core_theme_hook_before_content_wrap_start()
}
//add_action( 'core_theme_hook_before_content', 'core_theme_hook_before_content_wrap_start' );


if ( ! function_exists( 'core_theme_hook_before_content_wrap_end' ) ) {
/**
 * Content theme-wrap end
 */
 	function core_theme_hook_before_content_wrap_end() {
	 	echo '</div>';
 	} // core_theme_hook_before_content_wrap_end()
}
//add_action( 'core_theme_hook_after_content', 'core_theme_hook_before_content_wrap_end' );


if ( ! function_exists( 'core_theme_custom_content' ) ) {
/**
 * Custom Content Area
 *
 * @since framework 1.0
 */
	function core_theme_custom_content(){
		$content = theme_custom_content();

		if ($content) {
			echo '<div id="theme-custom-content">';
			echo do_shortcode($content);
			echo '</div><!-- ends here #theme-custom-content -->';
		}

	} // core_theme_custom_content()
}
//add_action('page_title_hook', 'core_theme_custom_content', 100);


if ( ! function_exists( 'core_theme_breadcrumb' ) ) {
/**
 * Breadcrumb
 *bbp_breadcrumb();
 * @since framework 1.0
 */
	function core_theme_breadcrumb(){

		if ( !is_home() && !is_front_page() && ( core_options_get('titles') || core_options_get('breadcrumbs') ) ) {
			echo '<section id="breadcrumb" class="breadcrumb theme-row">';

			if ( core_options_get('titles') ) {
				if ( function_exists('is_bbpress')  ) {
					if ( ! is_bbpress() ){
						echo '<div id="page-titles" class="page-titles grid box-eight">';
							core_theme_page_title();
						echo '</div>';
					} else {
						echo '<div id="page-titles" class="page-titles grid box-twelve">';
							core_theme_page_title();
						echo '</div>';
					}
				} else {
					echo '<div id="page-titles" class="page-titles grid box-eight">';
						core_theme_page_title();
					echo '</div>';
				}
			}

			if ( core_options_get('breadcrumbs') ) {
				if ( function_exists('is_bbpress') ) {
					if ( ! is_bbpress() ) {
						echo '<div class="grid box-four theme-breadcrumbs text-right"><div class="breadcrumb-list">';
						echo core_breadcrumbs('/', '');
						echo '</div></div>';
					}
				} else {
					echo '<div class="grid box-four theme-breadcrumbs text-right"><div class="breadcrumb-list">';
					echo core_breadcrumbs('/', '');
					echo '</div></div>';
				}
			}

			core_theme_custom_content();

			echo '</section>';
		}
	} // core_theme_breadcrumb()
}

//Reposition the 404 Page title
if ( ! is_404() ) {
	add_action('core_theme_hook_before_wrapper', 'core_theme_breadcrumb');
}


if ( ! function_exists( 'core_theme_date' ) ) {
/**
 * Breadcrumb
 *
 * @since framework 1.0
 */
 	function core_theme_date(){
		$today = array();
		$today['day'] = date("l");
		$today['month'] = date("F");
		$today['year'] = date("Y");
		$today['date'] = date("j");
		printf('<span class="date alignright"><span class="date day">%1s</span> <span class="date month">%2s</span> <span class="date">%3s</span> <span class="date year">%4s</span></span>', $today['day'], $today['month'], $today['date'], $today['year']);
 	} //core_theme_date()
}


/* =Footer features and functions
-------------------------------------------------------------- */
if ( ! function_exists( 'core_theme_footer_widget_container' ) ) {
/**
 * Footer Widget Area
 *
 * @since framework 1.0
 */
 	function core_theme_footer_widget_container(){
 		$layout = core_layout_current();

 		if( $layout['footer']->slug != 'none' ){

	 		echo '<section id="footer-widget-area" class="footer-widget-area theme-wrap">';

	 		echo '<div id="footer-background" class="footer-background"></div>';
		 	echo '<div class="widget_container">';
			do_action('core_footer');
			echo '<div class="clear"></div>';
			echo '</div>';
			echo '</section>';
 		}


 	} // core_theme_footer_widget_container()
}
add_action('core_theme_hook_after_content', 'core_theme_footer_widget_container');


if ( ! function_exists( 'core_theme_footer_social_icons' ) ) {
/**
 * Footer Social Icons
 * @since framework 1.0
 */
	function core_theme_footer_social_icons(){
		echo '<div class="sociables grid">';
		core_sociables('social_icons');
		echo '</div>';
	} // core_theme_social_icons()
}
add_action('core_theme_hook_footer_content', 'core_theme_footer_social_icons');


if ( ! function_exists( 'core_theme_copyright' ) ) {
/**
 * Copyright
 *
 * @since framework 1.0
 */
	function core_theme_copyright(){
		echo '<div id="theme-copyright" class="theme-copyright grid-right">';
		echo '<div class="copyright">';
		$copyright_link = core_options_get('copyright_link');
		$copyright_name = core_options_get('copyright_name');
		$copyright_html = core_options_get('copyright_html');
		$copyright_year = date('Y');

		if (!$copyright_html) {
			if (!$copyright_link) {
				$copyright_link = site_url();
			}

			echo '&copy; ', $copyright_year, ' <a href="', esc_url($copyright_link), '">',$copyright_name, '</a>';
		} else {
			echo $copyright_html;
		}

		echo '</div>';
	    echo '</div><!-- ends here .copyright -->';
	} // core_theme_copyright()
}
add_action('core_theme_hook_footer_content', 'core_theme_copyright');


if ( ! function_exists( 'core_theme_footer_menu' ) ) {
/**
 * Footer Menu
 *
 * @since framework 1.0
 */
	function core_theme_footer_menu(){
		//if( core_layout_menu('footer') ){
			echo '<nav id="footer-menu" class="footer-menu grid-right">';
			core_layout_menu('footer');
		    echo '</nav><!-- ends here .footer_menu -->';
		//}
	} // core_theme_footer_menu()
}
add_action('core_theme_hook_footer_content', 'core_theme_footer_menu');


if ( ! function_exists( 'core_theme_powered' ) ) {
/**
 * Powered by
 *
 * @since framework 1.0
 */
	function core_theme_powered(){
		echo '<div class="grid col-six fit powered">';
	    echo '        <a href="#" title="', get_bloginfo('name'),'">';
	    echo '                ', get_bloginfo('name'),'</a>';
	    echo '        ', __('powered by', THEME_SLUG),' <a href="http://wordpress.org/" title="WordPress">';
	    echo '                WordPress</a>';
	    echo '</div><!-- ends here .powered -->';
	} // core_theme_powered()
}
//add_action('core_theme_hook_footer_content', 'core_theme_powered');


if ( ! function_exists( 'core_theme_to_top' ) ) {
/**
 * Back to top link
 *
 * @since framework 1.0
 */
	function core_theme_to_top(){
		echo '<div class="scroll-top"><a href="#scroll-top" title="scroll to top"><i class="fa fa-chevron-up"></i></a></div>';
	} // core_theme_to_top()
}
add_action('core_theme_hook_footer_after', 'core_theme_to_top');


if ( ! function_exists( 'core_theme_google_analytics' ) ) {
/**
 * Google Analytics
 *
 * @since framework 1.0
 */
	function core_theme_google_analytics(){
		$google_analytics= '';

		// add google analytics settings
		$google_analytics = core_options_get('google_analytics');
		if ($google_analytics){
			//echo '<script type="text/javascript">' . "\n";
			echo $google_analytics;
			//echo '</script>' ."\n";
		}
	} // core_theme_google_analytics()
}
add_action('wp_head', 'core_theme_google_analytics', 101);


if ( ! function_exists( 'core_theme_custom_js' ) ) {
/**
 * Custom Js
 *
 * @since framework 1.0
 */
	function core_theme_custom_js(){
		$custom_js = '';

		// add custom javascripts
		$custom_js = core_options_get('custom_js');
		if ($custom_js){
			echo '<script type="text/javascript">' . "\n";
			echo $custom_js . "\n";
			echo '</script>' ."\n";
		}
	} // core_theme_custom_js()
}
add_action('wp_footer', 'core_theme_custom_js', 10);


if ( ! function_exists( 'core_theme_custom_css' ) ) {
/**
 * Custom Css
 *
 * @since framework 1.0
 */
	function core_theme_custom_css(){
		$custom_css ='';

		// add custom javascripts
		$custom_css = core_options_get('custom_css');
		if ($custom_css) {
			echo strip_tags($custom_css);
		}
	} // core_theme_custom_css()
}
add_action('core_theme_hook_styles', 'core_theme_custom_css');


if ( ! function_exists( 'core_theme_footer_custom_styles' ) ) {
/**
 * Footer Css Styles
 */
	function core_theme_footer_custom_styles(){

		$bg_colors = array(
			'footer_section_bg' => array(
				'.footer-widget-area'
			),
			'footer_menu_bg' => array(
				'.footer'
			)
		);

		$colors = array(
			'footer_section_color' 		=> array(
				'.footer-widget-area'
			),
			'footer_section_link' 		=> array(
				'.footer-widget-area a'
			),
			'footer_section_link_hover' => array(
				'.footer-widget-area a:hover'
			),

			'footer_menu_color' 		=> array(
				'.footer-menu',
			),
			'footer_menu_link' 			=> array(
				'.footer-menu .menu li a',
			),
			'footer_menu_link_hover' 	=> array(
				'.footer-menu .menu li a:hover',
				'.theme-copyright a:hover'
			),
			'footer_copyright' 		=> array(
				'.theme-copyright',
				'.theme-copyright a'
			),
		);

		$border_colors = array(
			'footer_menu_link' => array('#footer-menu .menu li a')
		);

		apply_colors('background-color', $bg_colors);
		apply_colors('color', $colors);
		apply_colors('border-color', $border_colors);

		// add footer background image
		$footer_section_image = core_options_get('footer_section_image');
		if ($footer_section_image)
			echo '#footer-widget-area { background-image: url(' . $footer_section_image . '); background-position: bottom center; background-size: 100%; background-repeat: no-repeat;  }';

	} // core_theme_footer_custom_styles()
}
add_action('core_theme_hook_styles', 'core_theme_footer_custom_styles');



/* =Theme Addon features and functions
-------------------------------------------------------------- */
if ( ! function_exists( 'core_theme_customize' ) ) {
/**
 * Customize Demo Pane
 *
 * @since framework 1.0
 */
	function core_theme_customize(){
		// add demo settings
		$customize = core_options_get('customize');
		if($customize) {
			core_demo_settings_enable(true);
		}
	} // core_theme_customize()
}
add_action('core_theme_hook_after_container', 'core_theme_customize');



if ( ! function_exists( 'core_theme_loader' ) ) {
/**
 * Container Class
 *
 * @since Framework 2.0
 */
	function core_theme_loader() {
		$core_loader = core_options_get('core_loader');
		if ( $core_loader ) {
			echo '<div class="core-loader">';
			echo '<div class="content">';

			echo '<div class="logo">';
			$logo = core_options_get('logo');
			if($logo)
				echo '<a href="', home_url(), '"><img src="', $logo, '" alt="', get_bloginfo('title'), '" /></a>';
			else
				echo '<a href="', home_url(), '">', get_bloginfo('name'), '</a>';

			echo '</div>';

			echo '<div class="indicator">';
			echo '<img src="', CORE_URI, '/images/core-loader.gif" alt="loading" title="loading">';
			echo '</div>';

			echo '</div>';
			echo '</div>';
		}
	}
}
add_action('core_theme_hook_before_container', 'core_theme_loader');


// Theme Content Ads before
function core_theme_content_ad_before() {
	if ( core_ads_get('content_before') ) {
		echo core_ads_get('content_before');
	}
}
//add_action('core_theme_hook_before_entry_content', 'core_theme_content_ad_before');

// Theme Content Ads after
function core_theme_content_ad_after() {
	if ( core_ads_get('content_after') ){
		echo core_ads_get('content_after');
	}
}
//add_action('core_theme_hook_after_entry_content', 'core_theme_content_ad_after');


if ( ! function_exists( 'core_theme_container_class' ) ) {
/**
 * Container Class
 *
 * @since framework 1.0
 */
	function core_theme_container_class(){
		global $post;
		$container = 'container';

		if( is_single() || is_page() ) {
			if ( ! $post->post_content ) {
				$container = 'container no-content';
			}
		}
		// add custom container class in the template
		$layout_style = core_options_get('layout_style');
		if($layout_style) {
			echo $container . ' hfeed' . $layout_style;
		} else {
			echo $container . ' hfeed';
		}
	} // core_theme_container_class()
}
add_action('container_class', 'core_theme_container_class');


if ( ! function_exists( 'core_theme_button_styles' ) ) {
/**
 * Button Styles
 */
	function core_theme_button_styles(){
		// add custom button colors annd gradient

		$button_text = core_options_get('color_button_text');
		$button_text_hover = core_options_get('color_button_text_hover');
		$button_gradient_1 = core_options_get('color_button_g1');
		$button_gradient_2 = core_options_get('color_button_g2');
		$button_text_shadow = core_options_get('color_button_text_shadow');
		$button_border = core_options_get('color_button_border');
		$button_shadow = core_options_get('color_button_shadow');
		echo '.button, button, a.button, input[type="reset"], input[type="button"], input[type="submit"], #bbp_search_submit, #infinite-handle span { -moz-box-shadow:inset 0px 1px 0px 0px ', $button_shadow, '; -webkit-box-shadow:inset 0px 1px 0px 0px ', $button_shadow, '; box-shadow:inset 0px 1px 0px 0px ', $button_shadow, '; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, ', $button_gradient_2, '), color-stop(1, ', $button_gradient_1, ') ); background:-moz-linear-gradient( center top, ', $button_gradient_2, ' 5%, ', $button_gradient_1, ' 100% ); filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="', $button_gradient_2, '", endColorstr="', $button_gradient_1, '"); background-color:', $button_gradient_1, '; border:1px solid ', $button_border, '; color:', $button_text, '; text-shadow:1px 1px 23px ', $button_text_shadow, '; }';
		echo '.button:hover, button:hover, a.button:hover, input[type="reset"]:hover, input[type="button"]:hover, input[type="submit"]:hover, #bbp_search_submit:hover,  #infinite-handle span:hover { background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, ', $button_gradient_1, '), color-stop(1, ', $button_gradient_2, ') ); background:-moz-linear-gradient( center top, ', $button_gradient_1, ' 5%, ', $button_gradient_2, ' 100% ); filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="', $button_gradient_1, '", endColorstr="', $button_gradient_2, '"); background-color:', $button_gradient_1, '; color:', $button_text_hover, '; border:1px solid ', $button_border, ';}';

	} // core_theme_button_styles()
}
add_action('core_theme_hook_styles', 'core_theme_button_styles');


// Custom CSS for content color schemes
// TODO: Move CSS rules into customizable array, or something similar
//
function core_colorschemes_css() {
	$scheme = null;

	if ( is_home() ) {
		$scheme = core_options_get('layout-home_colorscheme', 'theme');
	} else {
		$scheme = core_options_get('layout-default_colorscheme', 'theme');
	}

	// Get scheme from post\page or category
	if ( is_singular() ) {
		$scheme = core_options_get('colorscheme', get_post_type());
	}

	if (is_archive()){

		if (is_category()) {
			$obj = get_queried_object();
			$scheme = core_options_get('category_colorscheme_' .$obj->slug);
		} elseif (is_author()) {
			$scheme = core_options_get('layout-author_colorscheme', 'theme');
		} elseif (is_tag()) {
			$scheme = core_options_get('layout-tag_colorscheme', 'theme');
		} else {
			$scheme = core_options_get('layout-archive_colorscheme', 'theme');
		}
	}

	if (is_404()) {
		$scheme = core_options_get('layout-404_colorscheme', 'theme');
	}

	if (is_search()) {
		$scheme = core_options_get('layout-search_colorscheme', 'theme');
	}

	$scheme = apply_filters('color_scheme', $scheme);

	if (!$scheme) {
	}	return;

	$schemes = core_options_get('colorschemes');
	if (!isset($schemes[$scheme])) {
		return;
	}

	$scheme = $schemes[$scheme];

	// Calculate rgba() strings
	$backgroundcolor = core_hex2rgb($scheme['color-background']);
	$backgroundcolor['alpha'] = intval($scheme['opacity-background']) / 100;

	// Outline is 60% alpha of original
	$outline = core_hex2rgb($scheme['color-background']);
	$outline['alpha'] = intval($scheme['opacity-background']) / 100 * 0.6;

	// Content block CSS
	echo '.theme-content {';
	echo 'background-color: ', core_color2rgba($backgroundcolor), ';';
	//echo 'outline-color: ', core_color2rgba($outline), ';';
	echo 'color: #', $scheme['color-paragraph'], ';';
	echo '}';

	// Heading shortcodes
	echo 'div.theme-content h1,';
	echo 'div.theme-content h2,';
	echo 'div.theme-content h3,';
	echo 'div.theme-content h4,';
	echo 'div.theme-content h5,';
	echo 'div.theme-content h6,';
	echo 'div.theme-content h1 a,';
	echo 'div.theme-content h2 a,';
	echo 'div.theme-content h3 a,';
	echo 'div.theme-content h4 a,';
	echo 'div.theme-content h5 a,';
	echo 'div.theme-content h6 a {';
	echo 'color: #', $scheme['color-headings'], ';';
	echo '}';

	// Content Css
	echo '.theme-content .entry-content, .theme-content a {';
	echo 'color: #', $scheme['color-paragraph'], ';';
	echo '}';

}
add_action('core_custom_css', 'core_colorschemes_css');


if ( ! function_exists( 'core_theme_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since framework 1.0
 */
function core_theme_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
		return;
	}

	$nav_class = ( is_single() ) ? 'navigation single' : 'navigation paging';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', THEME_SLUG ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<div class="grid box-six text-center">
			<div class="previous">
				<?php previous_post_link( '%link', '<small class="meta-nav">' . __( 'Previous article', THEME_SLUG ) . '</small><br> %title <i class="fa fa-chevron-left pull-left blue"></i> ', TRUE ); ?>
			</div>
		</div>

		<div class="grid box-six text-center">
			<div class="next">
				<?php next_post_link( '%link', '<small class="meta-nav">' . __( 'Next article', THEME_SLUG ) . '</small><br> %title <i class="fa fa-chevron-right pull-right blue"></i>', TRUE ); ?>
			</div>
		</div>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php //if ( get_next_posts_link() ) : ?>
		<div class="grid box-six previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', THEME_SLUG ) ); ?></div>
		<?php //endif; ?>

		<?php //if ( get_previous_posts_link() ) : ?>
		<div class="grid box-six next text-right"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', THEME_SLUG ) ); ?></div>
		<?php //endif; ?>

	<?php endif; ?>
		<div class="clear"></div>
	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php

} // core_theme_content_nav
endif;


if ( ! function_exists( 'core_theme_the_titles' ) ) {
/**
 * Displays the Post/Page Titles
 *
 * @since framework 1.0
 */
 	function core_theme_the_titles($title=null){
	 	if ( core_options_get('titles') ) {

	 		if ( is_singular() ) {
	 			echo '<h1 class="title entry-title">', get_the_title(), '</h1>';

		 	} elseif ( is_category() ) {
				echo '<h1 class="entry-title">',single_cat_title( '', false ), '</h1>';

			} elseif ( is_archive() && is_day() ) {
				printf( '<h1 class="entry-title">' . __( 'Daily Archives: %s', THEME_SLUG ), get_the_date() . '</h1>' );

			} elseif ( is_archive() && is_month() ) {
				printf( '<h1 class="entry-title">' .  __( 'Monthly Archives: %s', THEME_SLUG ), get_the_date( _x( 'F Y', 'monthly archives date format', THEME_SLUG ) ) . '</h1>' );

			} elseif ( is_archive() && is_year() ) {
				printf( '<h1 class="entry-title">' .  __( 'Yearly Archives: %s', THEME_SLUG ), get_the_date( _x( 'Y', 'yearly archives date format', THEME_SLUG ) ) . '</h1>' );

			} elseif ( is_post_type_archive('portfolio') ) {
				printf( '<h1 class="entry-title">' .  __( 'Portfolio', THEME_SLUG ) . '</h1>' );

			} elseif ( is_tax() ) {
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				printf( '<h1 class="entry-title">' . $term->name . '</h1>' );

			} elseif ( is_tag() ) {
				printf( '<h1 class="entry-title">' .  __( 'Showing posts with tag: %s', THEME_SLUG ), single_term_title("", false) . '</h1>' );

			} elseif ( is_search() ) {
				printf( '<h1 class="entry-title">' .  __( 'Search Results: %s', THEME_SLUG ) , '"<span>' . get_search_query() . '</span>"' . '</h1>' );

			} elseif ( is_author() ) {
				$author = get_user_by('slug', get_query_var('author_name'));
				printf(  '<h1 class="entry-title">' . __( 'Author Archive for: %s', THEME_SLUG ) , '<span>' . $author->display_name . '</span>' . '</h1>' );

			} elseif ( is_404() ) {
				echo '<h1 class="entry-title"> ' . __( 'Error404 ', THEME_SLUG ) . '</a></h1> ';

			} else {
				$title = '<h1 class="title entry-title">' . get_the_title() . '</h1>';
				echo apply_filters('theme_page_title', $title);
			}
	 	}

 	} //core_theme_the_titles()
}
add_action('page_title_hook', 'core_theme_the_titles');



if ( ! function_exists( 'core_theme_comment' ) ) {
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since framework 1.0
 */
	function core_theme_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p><?php _e( 'Pingback:', THEME_SLUG ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', THEME_SLUG ), '<span class="edit-link">', '<span>' ); ?></p>
		<?php
				break;
			default :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="comment-body">
				<footer>
					<div class="comment-author vcard">
						<?php echo get_avatar( $comment, 40 ); ?>
						<?php printf( __( '%s <span class="says">says:</span>', THEME_SLUG ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
					</div><!-- .comment-author .vcard -->
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php _e( 'Your comment is awaiting moderation.', THEME_SLUG ); ?></em>
						<br />
					<?php endif; ?>

					<div class="comment-meta commentmetadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
						<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', THEME_SLUG ), get_comment_date(), get_comment_time() ); ?>
						</time></a>
						<?php edit_comment_link( __( 'Edit', THEME_SLUG ), ' <span class="edit-link">', '<span>' ); ?>
					</div><!-- .comment-meta .commentmetadata -->
				</footer>

				<div class="comment-content"><?php comment_text(); ?></div>

				<div class="reply">
					<i class="fa fa-reply"></i>
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
			</article><!-- #comment-## -->

		<?php
				break;
		endswitch;
	} // core_theme_comment()
} // ends check for core_theme_comment()


if ( ! function_exists( 'core_theme_posted_on' ) ) {
/**
 * Prints HTML with meta information for the current post-date/time.
 */
	function core_theme_posted_on( $echo = true ) {
		if ( has_post_format( array( 'chat', 'status', 'link', 'aside' ) ) ) {
			$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' );
		} else {
			$format_prefix = '%2$s';
		}

		$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span> ',
			esc_url( get_permalink() ),
			esc_attr( sprintf( __( 'Permalink to %s', THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
		);

		if ( $echo ) {
			echo $date;
		}

		return $date;
	} // core_theme_posted_on()
}


if ( ! function_exists( 'core_theme_posted_in' ) ) {
/**
 * Prints HTML with meta information for the current categories.
 */
 	function core_theme_posted_in() {
 		// Translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( __( ', ', THEME_SLUG ) );
		if ( $categories_list ) {
			echo ' / ' . __('in', THEME_SLUG) . ' <span class="categories-links">' . $categories_list . '</span> ';
		}
	} // core_theme_posted_in()
}


if ( ! function_exists( 'core_theme_tagged_with' ) ) {
/**
 * Prints HTML with meta information for the current tags.
 */
 	function core_theme_tagged_with() {
 		if ( 'post' == get_post_type() && core_options_get('meta') ) {
	 		// Translators: used between list items, there is a space after the comma.
			$tag_list = get_the_tag_list( '', __( ', ', THEME_SLUG ) );
			if ( $tag_list ) {
				echo ' / ' . __('tags:', THEME_SLUG) . ' <span class="tags-links">' . $tag_list . '</span> ';
			}
		}
	} // core_theme_tagged_with()
}



if ( ! function_exists( 'core_theme_header_meta' ) ) {
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */

	function core_theme_header_meta(){
		if ( core_options_get('meta') || is_null( core_options_get('meta') ) ) {
			echo '<div class="entry-meta">';

			if ( ! has_post_format( array( 'chat', 'status', 'link' ) ) ) {

				core_theme_posted_on();

				// Post author
				if ( 'post' == get_post_type() ) {
					printf( ' / <span class="author vcard">%1$s <a class="url fn n" href="%2$s" title="%3$s" rel="author">%4$s</a></span> ',
						__('by', THEME_SLUG),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_attr( sprintf( __( 'View all posts by %s', THEME_SLUG ), get_the_author() ) ),
						get_the_author()
					);
				}

				if ( is_sticky() && is_home() && ! is_paged() ) {
					echo ' / <span class="featured-post">' . __( 'Sticky', THEME_SLUG ) . '</span> ';
				}

				core_theme_posted_in();

				core_theme_tagged_with();

				if ( comments_open() ) {
					echo ' / <span class="leave-reply">';
					comments_popup_link( __( '0 comment', THEME_SLUG ), __( '1 comment', THEME_SLUG ), __( '% comments', THEME_SLUG ) );
					echo '</span>';
				} // comments_open()

			} else {
				core_theme_posted_on();
			}

			edit_post_link( __( 'Edit', THEME_SLUG ), ' / <span class="edit-link">', '</span>' );

			echo '</div>';
		}
	} // core_theme_entry_meta()
}
add_action( 'core_theme_hook_entry_footer', 'core_theme_header_meta');


/**
 * Returns true if a blog has more than 1 category
 */
function core_theme_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so core_theme_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so core_theme_categorized_blog should return false
		return false;
	}
} // core_theme_categorized_blog()

/**
 * Flush out the transients used in core_theme_categorized_blog
 *
 * @since framework 1.0
 */
function core_theme_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
} // core_theme_category_transient_flusher()
add_action( 'edit_category', 'core_theme_category_transient_flusher' );
add_action( 'save_post', 'core_theme_category_transient_flusher' );


/* =Post Format Support features and functions
-------------------------------------------------------------- */


/**
 * Returns the URL from the post.
 *
 * @uses get_the_link() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Twenty Thirteen 1.0
 * @return string URL
 */
function core_theme_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

if ( ! function_exists( 'core_theme_featured_gallery' ) ) :
/**
 * Displays first gallery from post content. Changes image size from thumbnail
 * to large, to display a larger first image.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function core_theme_featured_gallery($post) {
	$pattern = get_shortcode_regex();

	if ( preg_match( "/$pattern/s", get_the_content(), $match ) && 'gallery' == $match[2] ) {
		add_filter( 'shortcode_atts_gallery', 'large' );
		echo do_shortcode_tag( $match );
	}
} // core_theme_featured_gallery()
endif;

if ( ! function_exists( 'core_theme_featured_image' ) ) {
/*
 * Displays the Featured Image on each post
 */
	function core_theme_featured_image($post) {
		if ( has_post_thumbnail() && (core_options_get('featured_img') == true) ) {
			echo '<div class="featured-image">';
				the_post_thumbnail('post-excerpt-full');
			echo '</div>';
		}
	} // core_theme_featured_image()
}
//add_action('core_theme_hook_before_entry_content', 'core_theme_featured_image');


function add_flexslider_js(){
	wp_enqueue_script( 'flexslider', CORE_URI . '/slider/slider-flexslider/jquery.flexslider-min.js', array(), '2.1', true );
} // add_flexslider_js()


// Outputs the page title and breadcrumbs before a template page
//
function core_theme_page_title() {
	if ( !is_home() && !is_front_page() ) {
		global $post;

		echo '<header class="entry-header">';
		do_action( 'page_title_hook' );
		echo '</header><!-- .entry-header -->';
	}
}
//add_action('core_before_template', 'core_theme_page_title');

// Outputs the featured image just before page wrapper
//
function core_theme_featured_image(){
	if ( function_exists('is_product') ) {
		if ( ! is_product() ) {
			if ( is_singular() && has_post_thumbnail() && core_options_get('featured_img') ) {
				echo '<div class="theme-row featured-img entry-media">';
				the_post_thumbnail('post-excerpt-full');
				echo '</div><!-- .featured-img .entry-media -->';
			} else {
				// display nothing
			}
		}
	}
}
add_action( 'core_theme_hook_before_wrapper', 'core_theme_featured_image' );



?>