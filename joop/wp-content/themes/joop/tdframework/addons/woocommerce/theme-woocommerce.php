<?php

/**
 * Hook in on activation
 */
global $pagenow;

if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
	add_action( 'init', 'theme_woocommerce_image_dimensions', 1 );
}

/**
 * Define image sizes
 */
function theme_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '550',	// px
		'height'	=> '450',	// px
		'crop'		=> 1 		// true
	);

	$single = array(
		'width' 	=> '9999',	// px
		'height'	=> '550',	// px
		'crop'		=> 1 		// true
	);

	$thumbnail = array(
		'width' 	=> '90',	// px
		'height'	=> '60',	// px
		'crop'		=> 1 		// false
	);

	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

// WooCommerce CSS
//
function theme_woocommerce_enqueue_scripts() {

	// Remove Woocommerce Styling
	wp_dequeue_style('woocommerce-layout');
	wp_dequeue_style('woocommerce-smallscreen');
	wp_dequeue_style('woocommerce-general');

	wp_enqueue_style('theme-woocommerce', THEME_URI . '/tdframework/addons/woocommerce/theme-woocommerce.css');
	wp_enqueue_style('flexslider-style', THEME_URI . '/tdframework/core/slider/slider-flexslider/custom-flexslider.css');

	wp_enqueue_script(
		'woo-theme-js',
		THEME_URI . '/tdframework/addons/woocommerce/theme-woocommerce.js',
		array('jquery'),
		'',
		true
	);

	wp_enqueue_script(
		'flexslider-js',
		THEME_URI . '/tdframework/core/slider/slider-flexslider/jquery.flexslider.js',
		array('jquery'),
		'',
		true
	);

}
add_action('wp_enqueue_scripts', 'theme_woocommerce_enqueue_scripts', 999999);

// Adds WooCommerce layout option page
//
function theme_woocommerce_layoutoptions() {
	global $core_theme_options_handler;
	global $core_layout_default;

	$options = new CoreOptionGroup('woocommerce-layouts', __('Woocommerce', THEME_SLUG), __('Use this page to define the layouts of WooCommerce pages.', THEME_SLUG), THEME_URI. '/tdframework/addons/woocommerce/options-woocommerce.png');
	$core_theme_options_handler->group_add($options);

	$layouts = array(
		'layout-woocommerce-shop' => __('Shop page', THEME_SLUG),
		'layout-woocommerce-category' => __('Product category page', THEME_SLUG),
		'layout-woocommerce-tag' => __('Product tag page', THEME_SLUG),
		'layout-woocommerce-product' => __('Product page', THEME_SLUG),
		//'layout-woocommerce-cart' => __('Cart page', THEME_SLUG),
		//'layout-woocommerce-checkout' => __('Checkout page', THEME_SLUG),
		//'layout-woocommerce-account' => __('Account page', THEME_SLUG),
	);
	foreach ($layouts as $key => $value) {
		$section = new CoreOptionSection($key, $value);
		$options->section_add($section);
		$section->option_add(new CoreOption($key, null, 'layout', null, $core_layout_default));

		//Background Set-up
		$option = new CoreOption($key.'_background_setup', __('Page Background', THEME_SLUG), 'select', __('You can have a background image or a slider in the background.', THEME_SLUG), 'image','bg-options');
		$option->parameters = array('none' => 'none', 'image' => 'Image', 'slider' => 'Slider');
		$section->option_add($option);

		// Background Slider if setup is slider
		$option = new CoreOption($key.'_background_slider', __('Background Slider', THEME_SLUG), 'sliders', __('Use slider that is only applicable for background (ex. fullscreen slider).', THEME_SLUG),null,'bg-slider');
		$section->option_add($option);

		// Background image
		$section->option_add(new CoreOption($key.'_background_image', __('Background image', THEME_SLUG), 'image', __('This background image will override the one defined under theme options.', THEME_SLUG), THEME_URI . '/images/default-bg.jpg','bg-img'));

		// Custom Category Content section
		$section->option_add(new CoreOption($key.'_custom_content' , __('Subtitle', THEME_SLUG), 'text-multiline', __('Any HTML put here will be included in it\'s own block above the content.', THEME_SLUG)));
	}
}
add_action('after_setup_theme', 'theme_woocommerce_layoutoptions');

// Returns the right layout for the current WooCommerce page
//
function theme_woocommerce_layout($layout) {
	if (!is_woocommerce()) {
		return $layout;
	}
 
	if (is_shop()) {
		return core_options_get('layout-woocommerce-shop');
	}

	if (is_product_category()) {
		return core_options_get('layout-woocommerce-category');
	}

	if (is_product_tag()) {
		return core_options_get('layout-woocommerce-tag');
	}

	if (is_product()) {
		return core_options_get('layout-woocommerce-product');
	}

	if (is_cart()) {
		return core_options_get('layout-woocommerce-cart');
	}

	if (is_checkout()) {
		return core_options_get('layout-woocommerce-checkout');
	}

	if (is_account_page()) {
		return core_options_get('layout-woocommerce-account');
	}

	return $layout;

}
add_filter('core_layout', 'theme_woocommerce_layout');

// Portfolio page layouts
function theme_woocommerce_background_setup($background_setup){
	if ( !is_woocommerce() ) {
		return $background_setup;
	}

	if (is_shop() ){
		return core_options_get('layout-woocommerce-shop_background_setup', 'theme');
	}

	if (is_product_category() ){
		return core_options_get('layout-woocommerce-category_background_setup', 'theme');
	}

	if (is_product_tag() ){
		return core_options_get('layout-woocommerce-tag_background_setup', 'theme');
	}

	if (is_product() ){
		if ( in_array( core_options_get('background_setup', 'product'), array('image', 'featured') ) ) {
			return core_options_get('background_setup', 'product');
		} else {
			return core_options_get('layout-woocommerce-product_background_setup', 'theme');
		}
	}

	if (is_cart() ){
		return core_options_get('layout-woocommerce-cart_background_setup', 'theme');
	}

	if (is_checkout() ){
		return core_options_get('layout-woocommerce-checkout_background_setup', 'theme');
	}

	if (is_account_page() ){
		return core_options_get('layout-woocommerce-account_background_setup', 'theme');
	}

	return $background_setup;
}
add_filter('background_setup_addon', 'theme_woocommerce_background_setup');


// Get Woocommerce Sliders
function theme_woocommerce_slider($slider){
	if ( !is_woocommerce() ) {
		return $slider;
	}

	if (is_shop() ){
		$post_type = 'theme';
		$slug = 'layout-woocommerce-shop';
	}

	if (is_product_category() ){
		$post_type = 'theme';
		$slug = 'layout-woocommerce-category';
	}

	if (is_product_tag() ){
		$post_type = 'theme';
		$slug = 'layout-woocommerce-tag';
	}

	if (is_product() ){
		$post_type = 'theme';
		$slug = 'layout-woocommerce-product';

		if ( core_options_get('background_slider', 'product') ) {
			return core_options_get('background_slider', 'product');
		}
	}

	if (is_cart() ){
		$post_type = 'theme';
		$slug = 'layout-woocommerce-cart';
	}

	if (is_checkout() ){
		$post_type = 'theme';
		$slug = 'layout-woocommerce-checkout';
	}

	if (is_account_page() ){
		$post_type = 'theme';
		$slug = 'layout-woocommerce-account';
	}

	return core_options_get($slug . '_background_slider', $post_type);
}
add_filter('bgslider_area_addon', 'theme_woocommerce_slider');

// Get Woocommerce background image
function theme_woocommerce_get_background($backgroundimage){
	if ( !is_woocommerce() ) {
		return $backgroundimage;
	}

	if (is_shop() ){
		$backgroundimage = core_options_get('layout-woocommerce-shop_background_image', 'theme');
	}

	if (is_product_category() ){
		$backgroundimage = core_options_get('layout-woocommerce-category_background_image', 'theme');
	}

	if (is_product_tag() ){
		$backgroundimage = core_options_get('layout-woocommerce-tag_background_image', 'theme');
	}

	if (is_product() ){
		global $post, $product, $woocommerce;
		$featured = core_options_get('background_setup', 'product');

		if ( has_post_thumbnail() && 'featured' === $featured ) {
		   //echo get_the_post_thumbnail($post->ID, 'thumbnail');
		   $thumb_id = get_post_thumbnail_id($post->ID);
		   $post_image = wp_get_attachment_image_src($thumb_id, 'full');
		   $backgroundimage = $post_image[0];
		 } elseif ( 'image' === $featured ) {
		 	$backgroundimage = core_options_get('background_image', 'product');
		 } else {
			$backgroundimage = core_options_get('layout-woocommerce-product_background_image', 'theme');
		 }
	}

	if (is_cart() ){
		$backgroundimage = core_options_get('layout-woocommerce-cart_background_image', 'theme');
	}

	if (is_checkout() ){
		$backgroundimage = core_options_get('layout-woocommerce-checkout_background_image', 'theme');
	}

	if (is_account_page() ){
		$backgroundimage = core_options_get('layout-woocommerce-account_background_image', 'theme');
	}

	return $backgroundimage;
}
add_filter('background_image_addon', 'theme_woocommerce_get_background');

// Get Woocommerce custom content
function theme_woocommerce_custom_content($content){
	if( !is_woocommerce()) {
		return $content;
	}

	if (is_shop()){
		$content = core_options_get('layout-woocommerce-shop_custom_content', 'theme');
	}

	if (is_product_category()){
		$content = core_options_get('layout-woocommerce-category_custom_content', 'theme');
	}

	if (is_product_tag()){
		$content = core_options_get('layout-woocommerce-tag_custom_content', 'theme');
	}

	if (is_product()){
		$content = core_options_get('layout-woocommerce-product_custom_content', 'theme');

		if ( core_options_get('custom_content', 'product') ) {
			$content = core_options_get('custom_content', 'product');
		}
	}

	if (is_cart()){
		$content = core_options_get('layout-woocommerce-cart_custom_content', 'theme');
	}

	if (is_checkout()){
		$content = core_options_get('layout-woocommerce-checkout_custom_content', 'theme');
	}

	if (is_account_page()){
		$content = core_options_get('layout-woocommerce-account_custom_content', 'theme');
	}
	return $content;
}
add_filter('custom_content', 'theme_woocommerce_custom_content');

// Removed the default Woocommerce page title
function override_page_title() {
	return false;
}
add_filter('woocommerce_show_page_title', 'override_page_title');

// Page Title filter
function theme_woocommerce_page_title($title) {

	if( !is_woocommerce()) {
		return $title;
	}

	if ( is_search() ) {
		$page_title = sprintf( __( 'Search Results: &ldquo;%s&rdquo;', THEME_SLUG ), get_search_query() );

		if ( get_query_var( 'paged' ) )
			$page_title .= sprintf( __( '&nbsp;&ndash; Page %s', THEME_SLUG ), get_query_var( 'paged' ) );

	} elseif ( is_tax() ) {

		$page_title = single_term_title( "", false );

	} else {

		$shop_page_id = woocommerce_get_page_id( 'shop' );
		$page_title   = get_the_title( $shop_page_id );

	}

	$title = apply_filters( 'woocommerce_page_title', $page_title );

    return '<h1 class="entry-title">' . $title . '</h1>';
}
add_filter('theme_page_title', 'theme_woocommerce_page_title');


// Breadcrumb filter
function theme_woocommerce_breadcrumb_filter($breadcrumbs){

	if( !is_woocommerce()) {
		return $breadcrumbs;
	}

	if (is_shop()){
		$breadcrumbs = __('Shop', THEME_SLUG);
	}

	return $breadcrumbs;
}
add_filter( 'breadcrumb_filter', 'theme_woocommerce_breadcrumb_filter' );



// Displays the WooCommerce cart, also updates the cart fragment on AJAX callbacks
//
function theme_woocommerce_cart($fragments=null) {
	global $woocommerce;

	if (is_array($fragments))
		ob_start();

	// Output dropdown cart
	//echo '<table class="tbl-wcminicart" cellpadding="0" cellspacing="0"><tr><td>';
	echo '<div id="theme-woocommerce-cart-container">';
	echo '<div id="theme-woocommerce-cart-dropdown">';

	// Products added to cart
	if (sizeof($woocommerce->cart->cart_contents) > 0) {
		echo '<ul class="cart_list">';

		$i = 0;
		foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) {

			$i++;
			if ($i == 1) {
				$rowclass = ' class="cart_oddrow"';
			} else {
				$rowclass = ' class="cart_evenrow"';
				$i = 0;
			}

			$_product = $cart_item['data'];
			if ($_product->exists() && $cart_item['quantity'] > 0) {
				echo '<li' . $rowclass . '>';

				// Thumbnail
				echo '<div class="dropdowncartimage">';
				echo '<a href="' . get_permalink($cart_item['product_id']) . '">';

				if (has_post_thumbnail($cart_item['product_id'])) {
					echo get_the_post_thumbnail($cart_item['product_id'], 'shop_thumbnail');
				} else {
					echo '<img src="' . $woocommerce->plugin_url() . '/assets/images/placeholder.png" alt="Placeholder" width="' . $woocommerce->get_image_size('shop_thumbnail_image_width') . '" height="' . $woocommerce->get_image_size('shop_thumbnail_image_height') . '">';
				}

				echo '</a>';
				echo '</div>';

				// Product title
				//echo '<div class="dropdowncartproduct">';
				//echo '<a href="' . get_permalink($cart_item['product_id']) . '">';
				//echo apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product);

				//if ($_product instanceof woocommerce_product_variation && is_array($cart_item['variation'])) {
				//	echo woocommerce_get_formatted_variation($cart_item['variation']);
				//}

				//echo '</a>';
				//echo '</div>';

				// Product quantity
				//echo '<div class="dropdowncartquantity">';
				//echo '<span class="quantity">' . $cart_item['quantity'] . ' &times; ' . woocommerce_price($_product->get_price()) . '</span>';
				//echo '</div>';
				//echo '<div class="clear"></div>';

				echo '</li>';
			}
		}

		echo '</ul>';

		// No products in the cart
	} else {
		echo '<ul class="cart_list empty_list">';
		echo '<li class="empty"><p>' . __('No products in the cart.', THEME_SLUG) . '</p></li>';
		echo '</ul>';
	}

	echo '</div>';
	//echo '</td><td valign="middle">';

	// Cart display
	echo '<div id="cart-contents">';

	// Totals
	if (sizeof($woocommerce->cart->cart_contents) > 0) {

		echo '<div class="price-wrap">';
		echo '<p class="info">';
	echo sprintf(_n('YOUR CART: %d products', 'YOUR CART: %d products', $woocommerce->cart->cart_contents_count, THEME_SLUG), $woocommerce->cart->cart_contents_count);
	echo '</p>';

		echo '<p class="total">';

		//if (get_option('js_prices_include_tax') == 'yes')
		//	_e('Total', THEME_SLUG);
		//else
		//	_e('Subtotal', THEME_SLUG);

		echo $woocommerce->cart->get_cart_total();

		echo '</p>';
		echo '</div>';

		// Buttons
		do_action('woocommerce_widget_shopping_cart_before_buttons');
		echo '<div class="buttons checkout-minicart">
			  <a href="' . $woocommerce->cart->get_checkout_url() . '" class="button"><i class="icon-shopping-cart"></i>  ' . __('Proceed to Checkout &rarr;', THEME_SLUG).'</a>
			  <a href="' . $woocommerce->cart->get_cart_url() . '" class="button"><i class="icon-eye-open"></i>  ' . __('View Cart &rarr;', THEME_SLUG).'</a>
			  </div>';
	} else {
		echo '<p class="info">';
		echo sprintf(_n('YOUR CART: %d products', 'YOUR CART: %d products', $woocommerce->cart->cart_contents_count, THEME_SLUG), $woocommerce->cart->cart_contents_count);
		echo '</p>';
	}

	echo '</div>';
	//echo '</td></tr></table>';
	echo '<div class="clear"></div>';
	echo '</div>';


	// Return fragment with updated cart
	if (is_array($fragments)) {
		$fragments['div#theme-woocommerce-cart-container'] = ob_get_clean();
		return $fragments;
	}
}
add_filter('add_to_cart_fragments', 'theme_woocommerce_cart');

function theme_woocommerce_cart_colors(){
	$colors = array(
		// theme-woocommerce-cart color
		'color_top_menu_text' => array(
			'.theme-woocommerce-cart',
			'.theme-woocommerce-cart a.button',
			//'.cart_list a',
			'.dropdowncartproduct a'
		),

		'color_top_menu_text_hover' => array(
			//'.cart_list a:hover',
			'.dropdowncartproduct a:hover'
		),

		// woocommerce buttons
		'color_button_text'           => array('input.button'),
		'color_button_text_hover'     => array('input.button:hover'),

		'color_button_g1' => array(
			'span.onsale', '#product-details .product_header .product_meta a', '#product-details p.price ins'
		)
	);

	$bgcolors = array(
		'color_menu_background' => array(
			'.theme-woocommerce-cart-dropdown'
		),


		'color_button' => array(
			'input.button',
		),

		'color_button_hover' => array(
			'input.button:hover',
		),

		'color_button_g1' => array(
			'.product .woocommerce-tabs ul.tabs li.active', '#content-woocommerce .product .woocommerce-tabs ul.tabs li.active'
		),
		
		'color_content_background' => array(
			'span.onsale','.product-nav .prev', '.product-nav a[rel="prev"]', '.product-nav .next', '.product-nav a[rel="next"]'
		),
		
	);

	$border_colors = array(
		'color_button_g1' => array(
			'span.onsale',
			'.product .woocommerce-tabs ul.tabs:before', '#content-woocommerce .product .woocommerce-tabs ul.tabs:before',
			'.product .woocommerce-tabs', '#content-woocommerce .product .woocommerce-tabs',
			'.product-nav .prev', '.product-nav a[rel="prev"]', '.product-nav .next', '.product-nav a[rel="next"]'
		)
	);

	apply_colors('color', $colors);
	apply_colors('background-color', $bgcolors);
	apply_colors('border-color', $border_colors);
}
add_action('core_custom_css', 'theme_woocommerce_cart_colors');

// Additional WooCommerce settings
//
function theme_woocommerce_page_settings($options) {
	$options[] = array(
		'name' => __('Column and Product Count', THEME_SLUG),
		'type' => 'title',
		'desc' => __('These settings control the number of columns and products in product listings.', THEME_SLUG),
		'id'   => 'column_options'
	);

	$options[] = array(
		'name' => __('Column Count', THEME_SLUG),
		'desc' => __('The amount of product columns on an overview page.', THEME_SLUG),
		'id' => 'core_woocommerce_column_count',
		'css' => 'min-width: 100px;',
		'std' => '3',
		'type' => 'select',
		'options' => array
		(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	);

	$itemcount = array('-1' => 'All');
	for($i = 3; $i < 101; $i++)
		$itemcount[$i] = $i;

	$options[] = array(
		'name' => __('Product Count', THEME_SLUG),
		'desc' => __('The amount of products on an overview page.', THEME_SLUG),
		'id' => 'core_woocommerce_product_count',
		'css' => 'min-width: 100px;',
		'std' => '24',
		'type' => 'select',
		'options' => $itemcount,
	);

	$options[] = array(
		'name' => __('Related Items', THEME_SLUG),
		'desc' => __('The number of related items.', THEME_SLUG),
		'id' => 'core_woocommerce_related_item_count',
		'css' => 'min-width: 100px;',
		'std' => '4',
		'type' => 'select',
		'options' => array
		(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	);

	$options[] = array(
		'type' => 'sectionend',
		'id' => 'column_options'
	);

	return $options;
}
//add_filter('woocommerce_page_settings', 'theme_woocommerce_page_settings');
add_filter('woocommerce_product_settings', 'theme_woocommerce_page_settings');

// Text replacements
function theme_woocommerce_empty_button_text() {
	return '&nbsp;';
}
add_filter('added_to_cart_text', 'theme_woocommerce_addcart_button_text');


// Disable WooCommerce Add to Cart buttons in the product loop
function woocommerce_template_loop_add_to_cart() {
}

// Move sorting form to top
remove_action('woocommerce_pagination', 'woocommerce_catalog_ordering', 20);

// Disable WooCommerce breadcrumbs
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

// Move sorting form to top
//remove_action('woocommerce_pagination', 'woocommerce_catalog_ordering', 20);
//add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 20);

// Number of columns on a product page
function theme_woocommerce_column_count() {
	return get_option('core_woocommerce_column_count', 2);
}
add_filter('loop_shop_columns', 'theme_woocommerce_column_count');

// Number of items to loop through on a product page
function theme_woocommerce_loop_count() {
	return get_option('core_woocommerce_product_count', 2);
}
add_filter('loop_shop_per_page', 'theme_woocommerce_loop_count');

// Redefine woocommerce_output_related_products()
function woocommerce_output_related_products() {
	$columns = get_option('core_woocommerce_related_item_count', 2);
	$args = array(
		'posts_per_page' => $columns,
		'columns' => $columns,
		'orderby' => 'rand'
	);

	woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
	//woocommerce_related_products($columns,$columns); // Display related products columns
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );

// Redefine woocommerce_output_upsells()
function woocommerce_output_upsells() {
	$columns = get_option('core_woocommerce_related_item_count', 2);
	woocommerce_upsell_display($columns,$columns); // Display up sell products columns
}

// Redefine woocommerce_output_cross_sells()
function woocommerce_output_cross_sells() {
	$columns = get_option('core_woocommerce_related_item_count', 2);
	woocommerce_cross_sell_display($columns,4); // Display up sell products columns
}

// Add previous and next links to products under the product details
add_action( 'woocommerce_product_thumbnails', 'woo_next_prev_products_links', 60 );
function woo_next_prev_products_links() {
	echo '<div class="product-nav">';
	woocommerce_show_product_sale_flash();
    previous_post_link( '%link', '<i class="fa fa-angle-left "></i>' );
	next_post_link( '%link', '<i class="fa fa-angle-right "></i>' );
	echo '</div>';
}

// Add custom post class to product items
function theme_woocommerce_post_class($classes){
	global $woocommerce_loop, $post;
	if ( isset($woocommerce_loop['columns']) ) {
		$columns = $woocommerce_loop['columns'];
		$classes[] = core_theme_get_column($columns);
	}

	return $classes;
}
add_filter('post_class', 'theme_woocommerce_post_class');

//Shop Page
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

function woo_pagination_args( $args ){
    $args['prev_text'] = '<i class="fa fa-angle-double-left fa-large"></i>';
    $args['next_text'] = '<i class="fa fa-angle-double-right fa-large"></i>';
    $args['end_size'] = 3;
    $args['mid_size'] = 3;
    return $args;
}
add_filter( 'woocommerce_pagination_args', 'woo_pagination_args' );

function woo_single_product_cat(){
    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
    if ( $product_cats && ! is_wp_error ( $product_cats ) ){
        $single_cat = array_shift( $product_cats ); ?>
        <small class="product-cat"><?php echo $single_cat->name; ?></small>
<?php }
}

function woo_shop_item_image(){
	echo '<div class="item-image">';
		woocommerce_template_loop_product_thumbnail();
	echo '</div>';
}
add_action( 'woocommerce_before_shop_loop_item', 'woo_shop_item_image' );

function woo_custom_add_to_cart_text(){
	return '<i class="icon-check"></i>';
}
add_filter( 'added_to_cart_text', 'woo_custom_add_to_cart_text' );

// Single Product Page changes
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );


function woo_container_productDetails_start(){
	echo '<div id="product-details">';
}
function woo_container_productDetails_end(){
	echo '</div>';
}

function woo_container_productDetails(){
	printf( '<div id="product-details">' );
	printf( '<div class="product_header">' );
	do_action( 'product_header' );
	printf( '</div>' );

	if ( ! core_theme_is_plugin_active( 'woocommerce-gravityforms-product-addons/gravityforms-product-addons.php' ) ) {

		printf( '<div class="product_price">' );
		do_action( 'product_price' );
		printf( '</div>' );

		printf( '<div class="product_button">' );
		do_action( 'product_button' );
		printf( '</div>' );

	}
	printf( '</div>' );
}

function woo_stock_badge(){
	global $product;
	// Availability
	$availability = $product->get_availability();

	echo '<div class="stock">';
	if ($availability['availability']) {

		if ( $availability['class'] == 'out-of-stock' )
			$custom_stock = 'Out of stock';
		else
			$custom_stock = 'Available';

		echo apply_filters( 'woocommerce_stock_html', '<span class="stock ' . esc_attr( $availability['class'] ) . '">' . $custom_stock . '</span>', $availability['availability'] );
	}
	echo '</div>';
}

function woo_star_rating(){
	global $post, $product, $woocommerce;

	$attachment_ids = $product->get_gallery_attachment_ids();

	if ( $attachment_ids ) {
		$moveup = 'moveup';
	}

	if ( get_option('woocommerce_enable_review_rating') == 'yes' ) {

		$count = $product->get_rating_count();

		if ( $count > 0 ) {

			$average = $product->get_average_rating();

			echo '<div class="woo_star_rating '.$moveup.'"><div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', THEME_SLUG ), $average ).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', THEME_SLUG ).'</span></div></div>';
		}
	}
}

//add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash');
add_action( 'woocommerce_product_thumbnails', 'woo_star_rating', 99);
add_action( 'woocommerce_product_thumbnails', 'woo_stock_badge');
add_action( 'woocommerce_product_thumbnails', 'woo_container_productDetails', 5 );
add_action( 'product_header', 'woocommerce_template_single_title' );
add_action( 'product_header', 'woocommerce_template_single_meta' );
add_action( 'product_price', 'woocommerce_template_single_price' );


add_action( 'product_button', 'woocommerce_template_single_add_to_cart' );
add_action( 'product_button', 'woocommerce_template_single_sharing' );


function woo_custom_styles(){
	if( !is_woocommerce()) {
		return;
	}

	$colors = array(
		'color_links' => array(
			'div.product div.images .icon-resize-full',
			'#content-woocommerce div.product div.images .icon-resize-full',
		),
		'color_button' => array(
			'#product-details .product_header .product_meta a',
			'#product-details p.price ins'
		),
		'color_button_text' => array(
			'div.product .woocommerce-tabs ul.tabs li a',
			'#content-woocommerce div.product .woocommerce-tabs ul.tabs li a'
		),
		'color_menu_background' => array(
			'ul.products .item-details a.product_hover:hover',
			'span.onsale'
		)
	);
	$bg_colors = array(
		'color_button' => array(
			'div.product .woocommerce-tabs ul.tabs li.active',
			'#content-woocommerce div.product .woocommerce-tabs ul.tabs li.active',
			'div.product div.images div.stock'
		),
		'color_button_hover' => array(
			'div.product .woocommerce-tabs ul.tabs li', '#content-woocommerce div.product .woocommerce-tabs ul.tabs li'
		),
	);
	$border_colors = array(
		'color_button' => array(
			'div.product div.images div.thumbnails .slides',
			'#content-woocommerce div.product div.images div.thumbnails .slides',
			'div.product .woocommerce-tabs',
			'#content-woocommerce div.product .woocommerce-tabs',
			'div.product .woocommerce-tabs ul.tabs:before',
			'#content-woocommerce div.product .woocommerce-tabs ul.tabs:before'
		),
		'color_menu_background' => array(
			'ul.products .item-details a.product_hover:hover',
			'span.onsale'

		)
	);

	apply_colors('color', $colors);
	apply_colors('background-color', $bg_colors);
	apply_colors('border-color', $border_colors);

} // woo_custom_styles()
add_action( 'core_theme_hook_styles', 'woo_custom_styles');



?>