<?php
/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage Framework
 * @since framework 1.0
 */

/* =Core Theme Produtcs features and functions
-------------------------------------------------------------- */
add_action( 'init', 'create_folio_post_type' );
function create_folio_post_type() {
	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name' => __( 'TD-Folio', THEME_SLUG ),
				'singular_name' => __( 'TD-Folio', THEME_SLUG )
			),
			'public' 		=> true,
			'has_archive' 	=> true,
			'rewrite' 		=> array('slug' => 'portfolio'),
			'taxonomies'	=> array('post_tag'),
			'menu_icon' 	=> THEME_URI . '/images/td-logo16.png',
		)
	);

	$args = array('title', 'editor', 'author', 'thumbnail', 'comments', 'revisions');
	add_post_type_support('portfolio', $args);
}

add_action( 'init', 'create_folio_tax' );
function create_folio_tax() {
	register_taxonomy(
		'folio_categories',
		'portfolio',
		array(
			'label' => __( 'TD-Folio Categories', THEME_SLUG ),
			'rewrite' => array( 'slug' => 'folio_category' ),
			'hierarchical' => true,
		)
	);
}

function create_td_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation text-right" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', THEME_SLUG ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav"><i class="icon-chevron-left fa fa-chevron-left"></i></span>', 'Previous post link', THEME_SLUG ), $in_same_cat = true ); ?>
			<?php next_post_link( '%link', _x( '<span class="meta-nav"><i class="icon-chevron-right fa fa-chevron-right"></i></span>', 'Next post link', THEME_SLUG ), $in_same_cat = true ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

function display_portfolio_details(){

	if ( is_singular( 'portfolio' ) ) :

	$producttab = core_options_get('folio_tab_size','theme');
	?>

	<div class="clear"></div>
	</div>
    <?php if($producttab == 0 && !comments_open()):


	else:?>
	<div class="theme-td-wrap">
		<div class="theme-td-details">
			<div class="detail-menu">
				<ul class="tabs">
                	<?php for($tabs=1; $tabs<=$producttab; $tabs++){
						$tabname = core_options_get('folio_tab'.$tabs.'_name','theme');
						$tabicon = core_options_get('folio_tab'.$tabs.'_icon','theme');
						if($tabs == 1 ){
							$output = '<li class="active"><span id="tab'.$tabs.'">';
						}else{
							$output = '<li><span id="tab'.$tabs.'">';
						}
						if (!empty($tabicon)){
							$output .= '<i class="icon fa '.$tabicon. '"></i>&nbsp;&nbsp;';
						}
						$output .= $tabname.'</span></li>';
						echo $output;
					} ?>
			        <?php if ( comments_open() || '0' != get_comments_number() ) : ?>
			        <li>
			          <span id="tab<?php echo $tabs ?>"><i class="icon-comments-alt fa fa-comments-alt"></i> <?php _e('Reviews', THEME_SLUG); ?></span>
			        </li>
			        <?php endif; ?>
			  </ul>
			</div>

			<div class="detail-wrap">
				<div class="tab-contents">
                	<?php
					for($tabs=1; $tabs<=$producttab; $tabs++){
						$content = core_options_get('td_folio_tab'.$tabs, 'portfolio');
						if($tabs==1){
							echo '<div class="tab-content active animated  fadein ">'.do_shortcode($content).'</div>';
						}else{
							echo '<div class="tab-content animated">'.do_shortcode($content).'</div>';
						}
					}
					?>
					<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
					<div class="tab-content animated fadein <?php if ($producttab == 0) echo 'active' ?>">
						<?php comments_template( '', true ); ?>
					</div>
					<?php endif; ?>
				</div>

			</div>



	<?php endif;
	 endif;
}

add_action( 'core_after_content', 'display_portfolio_details' );

// Adds WooCommerce layout option page
//
function theme_folio_layoutoptions() {
	global $core_theme_options_handler;
	global $core_layout_default;

	$options = new CoreOptionGroup('z-td-layouts', __('TD Folio', THEME_SLUG), __('Use this page to define the td Folio pages.', THEME_SLUG), CORE_URI. '/images/options-general.png');
	$core_theme_options_handler->group_add($options);

	$layouts = array(

		'layout-td-category' => __('Category pages', THEME_SLUG),
		//'layout-td-tag' => __('Product tag page', THEME_SLUG),
	);
	foreach ($layouts as $key => $value) {
		$section = new CoreOptionSection($key, $value);
		$options->section_add($section);
		$section->option_add(new CoreOption($key, __('Layout', THEME_SLUG), 'layout', null, $core_layout_default));

		//Background Set-up
		$option = new CoreOption('background_setup_'.$key, __('Header Background', THEME_SLUG), 'select', __('You can have a background image or a slider in the background.', THEME_SLUG), 'none','bg-options');
		$option->parameters = array('none' => 'none', 'image' => 'Image', 'slider' => 'Slider');
		$section->option_add($option);

		// Background Slider if setup is slider
		$option = new CoreOption('background_slider_'.$key, __('Header Background Slider', THEME_SLUG), 'sliders', __('Use slider that is only applicable for background (ex. fullscreen slider).', THEME_SLUG),null,'bg-slider');
		$section->option_add($option);

		// Background image options if setup is image
		$section->option_add(new CoreOption('background_image_'.$key, __('Header Background image', THEME_SLUG), 'image', __('The default, site-wide background image.', THEME_SLUG), null,'bg-img'));

		$section->option_add(new CoreOption('custom_content_' .$key , __('HTML section', THEME_SLUG), 'text-multiline', __('Any HTML put here will be included in it\'s own block above the content.', THEME_SLUG)));

	}

	$section = new CoreOptionSection('folio_tabs', __('Folio Tabs', THEME_SLUG) );
	$options->section_add($section);

	// Add an option where the user can input the names of the tabs and their respective icons
		$option = new CoreOption('folio_tab_size', __('Folio Tab Size', THEME_SLUG), 'select', '', '','folio-tab-size');
		$option->parameters = array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5');
		$section->option_add($option);

		$section->option_add(new CoreOption('folio_tab1_name' , __('Tab 1 Name:', THEME_SLUG), 'text', '','','folio-tab1'));
		$section->option_add(new CoreOption('folio_tab1_icon' , __('Tab 1 Icon:', THEME_SLUG), 'text', '','','folio-tab1'));

		$section->option_add(new CoreOption('folio_tab2_name' , __('Tab 2 Name:', THEME_SLUG), 'text', '','','folio-tab2'));
		$section->option_add(new CoreOption('folio_tab2_icon' , __('Tab 2 Icon:', THEME_SLUG), 'text', '','','folio-tab2'));

		$section->option_add(new CoreOption('folio_tab3_name' , __('Tab 3 Name:', THEME_SLUG), 'text', '','','folio-tab3'));
		$section->option_add(new CoreOption('folio_tab3_icon' , __('Tab 3 Icon:', THEME_SLUG), 'text', '','','folio-tab3'));

		$section->option_add(new CoreOption('folio_tab4_name', __('Tab 4 Name:', THEME_SLUG), 'text', '','','folio-tab4'));
		$section->option_add(new CoreOption('folio_tab4_icon', __('Tab 4 Icon:', THEME_SLUG), 'text', '','','folio-tab4'));

		$section->option_add(new CoreOption('folio_tab5_name', __('Tab 5 Name:', THEME_SLUG), 'text', '','','folio-tab5'));
		$section->option_add(new CoreOption('folio_tab5_icon', __('Tab 5 Icon:', THEME_SLUG), 'text', '','','folio-tab5'));

		$section->option_add(new CoreOption('folio_tab6_name', __('Tab 6 Name:', THEME_SLUG), 'text', '','','folio-tab6'));
		$section->option_add(new CoreOption('folio_tab6_icon', __('Tab 6 Icon:', THEME_SLUG), 'text', '','','folio-tab6'));

		$section->option_add(new CoreOption('folio_tab7_name', __('Tab 7 Name:', THEME_SLUG), 'text', '','','folio-tab7'));
		$section->option_add(new CoreOption('folio_tab7_icon', __('Tab 7 Icon:', THEME_SLUG), 'text', '','','folio-tab7'));

		$section->option_add(new CoreOption('folio_tab8_name', __('Tab 8 Name:', THEME_SLUG), 'text', '','','folio-tab8'));
		$section->option_add(new CoreOption('folio_tab8_icon', __('Tab 8 Icon:', THEME_SLUG), 'text', '','','folio-tab8'));

		$section->option_add(new CoreOption('folio_tab9_name', __('Tab 9 Name:', THEME_SLUG), 'text', '','','folio-tab9'));
		$section->option_add(new CoreOption('folio_tab9_icon', __('Tab 9 Icon:', THEME_SLUG), 'text', '','','folio-tab9'));

		$section->option_add(new CoreOption('folio_tab10_name', __('Tab 10 Name:', THEME_SLUG), 'text', '','','folio-tab10'));
		$section->option_add(new CoreOption('folio_tab10_icon', __('Tab 10 Icon:', THEME_SLUG), 'text', '','','folio-tab10'));

}
add_action('after_setup_theme', 'theme_folio_layoutoptions');

// Category Options
function theme_folio_category_add($options, $category) {
	global $core_layout_default;

	$section = new CoreOptionSection('category-' .$category->slug, $category->name);
	$options->section_add($section);

	// Slider
	//$section->option_add(new CoreOption('slider_' .$category->slug, __('Slider', THEME_SLUG), 'sliders', __('The slider will be displayed at the top of the page.', THEME_SLUG)));

	// Background Set-up
	$option = new CoreOption('background_setup_'.$category->slug, __('Header Background', THEME_SLUG), 'select', __('You can have a background image or a slider in the background.', THEME_SLUG),'','bg-options');
	$option->parameters = array('none' => 'none', 'image' => 'Image', 'slider' => 'Slider');
	$section->option_add($option);

	// Background Slider
	$option = new CoreOption('background_slider_'.$category->slug, __('Header Background Slider', THEME_SLUG), 'sliders', __('Use slider that is only applicable for background (ex. fullscreen slider).', THEME_SLUG),'', 'bg-slider');
	$section->option_add($option);

	$section->option_add(new CoreOption('category_background_' .$category->slug, __('Header Background Image', THEME_SLUG), 'image',null,null, 'bg-img ' .  $category->slug.'imgopt'));

	// Custom Category Content section
	$section->option_add(new CoreOption('custom_content_' .$category->slug , __('Category HTML section', THEME_SLUG), 'text-multiline', __('Any HTML put here will be included in it\'s own block above the content.', THEME_SLUG)));

}

// Portfolio page layouts
function theme_folio_layout($value){
	if ( is_tax('folio_categories') || is_post_type_archive('portfolio') )  {
		$value = core_options_get('layout-td-category');
	}

	return $value;
}
add_filter('core_layout', 'theme_folio_layout');

// Portfolio page layouts
function theme_folio_background_setup($background_setup){
	if ( is_tax('folio_categories') || is_post_type_archive('portfolio') )  {
		return core_options_get('background_setup_layout-td-category', 'theme');
	}

	return $background_setup;
}
add_filter('background_setup', 'theme_folio_background_setup');

// Get td product background image
function theme_folio_get_background($backgroundimage=null){
	if ( is_tax('folio_categories') && core_options_get('background_setup_layout-td-category', 'theme') == 'image' ) {
		$backgroundimage = core_options_get('background_image_layout-td-category', 'theme');
	}

	return $backgroundimage;
}
add_filter('background_image', 'theme_folio_get_background', 99);


function theme_folio_get_slider($slider_area){

	if ( is_tax('folio_categories') && core_options_get('background_setup_layout-td-category', 'theme') == 'slider' ) {
		$slider_area = core_options_get('background_slider_layout-td-category', 'theme');
	}

	return $slider_area ;
}
add_filter('bgslider_area', 'theme_folio_get_slider', 99);


// Get TD Products custom content
function theme_td_get_custom_content($content){
	if( is_tax('folio_categories') ) {
		$content = core_options_get('custom_content_layout-td-category', 'theme');
	}

	return $content;
}
add_filter('custom_content', 'theme_td_get_custom_content');

?>