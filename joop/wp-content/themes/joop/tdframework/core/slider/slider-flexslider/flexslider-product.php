<?php

// Supported jQuery UI easing effects
$flex_ease_effects = array(
	'linear' => 'Linear',
	'swing' => 'Swing',
	'easeInQuad' => 'In quadratic',
	'easeOutQuad' => 'Out quadratic',
	'easeInOutQuad' => 'In-out quadratic',
	'easeInCubic' => 'In cubic',
	'easeOutCubic' => 'Out cubic',
	'easeInOutCubic' => 'In-out cubic',
	'easeInQuart' => 'In quarter',
	'easeOutQuart' => 'Out quarter',
	'easeInOutQuart' => 'In-out quarter',
	'easeInQuint' => 'In quintuple',
	'easeOutQuint' => 'Out quintuple',
	'easeInOutQuint' => 'In-out quintuple',
	'easeInSine' => 'In sine',
	'easeOutSine' => 'Out sine',
	'easeInOutSine' => 'In-out sine',
	'easeInExpo' => 'In exponential',
	'easeOutExpo' => 'Out exponential',
	'easeInOutExpo' => 'In-out exponential',
	'easeInCirc' => 'In circular',
	'easeOutCirc' => 'Out circular',
	'easeInOutCirc' => 'In-out circular',
	'easeInElastic' => 'In elastic',
	'easeOutElastic' => 'Out elastic',
	'easeInOutElastic' => 'In-out elastic',
	'easeInBack' => 'In back',
	'easeOutBack' => 'Out back',
	'easeInOutBack' => 'In-out back',
	'easeInBounce' => 'Bounce in',
	'easeOutBounce' => 'Bounce out',
	'easeInOutBounce' => 'Bounce in-out',
);

// Slider definition
$slider = array(
	'name' => __('Fullscreen Products Slider', THEME_SLUG),
	'scripts' => array(
		'jquery' => ' ',
		'flexslider-js' => CORE_URI . '/slider/slider-flexslider/jquery.flexslider.js',
	),
	'styles' => array(
		'flexslider-style' => CORE_URI . '/slider/slider-flexslider/custom-flexslider.css',
	),
	'supportsLayers' => false,
	'supportsSlides' => false,
	'output' => 'theme_slider_flexslider_product_output',

	// General settings
	'options' => array(
		'categories' => array(
			'type' => 'multiline',
			'title' => __('Categories', THEME_SLUG),
			'description' => __('Enter the slug names of categories you want the slider to display, separated by commas.', THEME_SLUG),
			'default' => '',
		),
		'post_count' => array(
			'type' => 'string',
			'title' => __('Post count', THEME_SLUG),
			'default' => '5',
		),
		'word_count' => array(
			'type' => 'string',
			'title' => __('Word count', THEME_SLUG),
			'default' => '35',
		),
		// Slider settings
		'slideshow' => array(
			'type' => 'select',
			'title' => __('Slideshow', THEME_SLUG),
			'items' => array(
				'true' => __('True', THEME_SLUG),
				'false' => __('False', THEME_SLUG),
			),
			'default' => 'true',
		),

		'thumbnails' => array(
			'type' => 'select',
			'title' => __('Thumbnails', THEME_SLUG),
			'items' => array(
				'none' => __('None', THEME_SLUG),
				'top' => __('Top', THEME_SLUG),
			),
			'default' => 'top',
		)
	)
);

// Register
core_slider_register($slider);

// Outputs the Layer Slider code
//
function theme_slider_flexslider_product_output($settings) {
	global $woocommerce;
	$slider_settings = $settings['settings'];
	$thumbnail = $slider_settings['thumbnails'];
	$id = core_get_uuid('theme-slider-');
	$category_names = explode(',', $slider_settings['categories']);
	// Get recent products
	$query_args = array(
		'post_count' => intval($slider_settings['post_count']),
		'post_type' => 'product',
		'tax_query' => array(
	        array(
	            'taxonomy' => 'product_cat',
	            'field' => 'slug',
	            'terms' => $category_names,
	            'operator' => 'IN'
	        )
	    ),
		//'order' => 'DESC',
		//'orderby' => 'post_date',
		'post_status' => 'publish',
		'posts_per_page' => $slider_settings['post_count']
	);

	// Add meta_query to query args
    $query_args['meta_query'] = array();

    // Check products stock status
    $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();

	// Create a new query
    $r = new WP_Query($query_args);

	// If query return results
    if ( $r->have_posts() ) {

	echo '<div id="', $id, '" class="flexslider flex-bg thumbnail-', $thumbnail ,'">';

	?>
	<ul class="slides">

	<?php

		// Start the loop
        while ( $r->have_posts()) {
			$r->the_post();

            global $product;

			$post_id = $r->post->ID;
			$thumb_id = get_post_thumbnail_id($post_id);
			$post_image = wp_get_attachment_image_src($thumb_id, 'slider-layer');

			if ( has_post_thumbnail($post_id) ) {
				echo '<li ',post_class(),'>'."\n";
				echo '<div class="imgLiquidFill">';
				echo '<img alt="slide image', $post_id, '" class="slider-latest-image" src="', $post_image[0], '">';
				echo '</div>';

				echo '<div class="slide-content"><div class="grid box-six pull-right">';

				if ( $thumbnail == 'top' ) {
					$thumb_id = get_post_thumbnail_id($post_id);
					$post_image = wp_get_attachment_image_src($thumb_id, 'large');
					echo '<a href="' . get_permalink() . '"><img alt="slide-image', $post_id, '" class="slider-content-featured" src="', $post_image[0], '"></a>';
					//do_action( 'woocommerce_before_shop_loop_item' );
				}

				echo '<div class="content-wrap">';
				echo '<h2 class="slider-title">', $r->post->post_title, '</h2>';
				$post_content = $r->post->post_content;

				$excerpt = explode(' ', $post_content, $slider_settings['word_count']);

				if (count($excerpt)>=$slider_settings['word_count']) {
					array_pop($excerpt);
					$excerpt = implode(" ",$excerpt).' ';
				} else {
					$excerpt = implode(" ",$excerpt);
				}

				$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

				echo '<div class="slide-entry-content"><p>'.$excerpt.'&hellip;</p>';
				//echo '<div class="slide-entry-content"><p>'.$excerpt.'&hellip; <a href="', get_permalink($post_id), '">'.__('read more', THEME_SLUG). ' <i class="fa fa-arrow-circle-o-right"></i></a></p>';

				woocommerce_template_single_price();
				echo '</div>';
				 ?>

				<a class="add_to_cart_button view-item" href="<?php the_permalink(); ?>" rel="nofollow" title="<?php echo __('View product', THEME_SLUG); ?>">
					<i class="fa fa-eye fa-2x"></i>
				</a>

				<?php if ($product->has_attributes()) : ?>
					<a class="product_hover" href="<?php the_permalink(); ?>" title="<?php echo __('Select options', THEME_SLUG); ?>">
						<i class="fa fa-signal fa-2x"></i>
					</a>
				<?php else : ?>
					<a class="add_to_cart_button single_add_to_cart_button product_type_<?php echo $product->product_type; ?>" href="<?php the_permalink(); ?>" rel="nofollow" data-product_id="<?php echo $product->id; ?>" title="<?php echo __('Add to cart', THEME_SLUG); ?>">
						<i class="fa fa-shopping-cart  fa-2x"></i>
					</a>
				<?php endif; ?>

					<ul class="flex-direction-nav"><li><a href="#" class="flex-prev"><i class="fa fa-chevron-left fa-2x"></i></a></li><li><a href="#" class="flex-next"><i class="fa fa-chevron-right fa-2x"></i></a></li></ul>


					<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>

					<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>

					<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>


					</div></div></div>
				</li>
				<?php
			}

		}

	?>

	  </ul>

	</div>

	<?php

	echo '<div class="clear"></div>';

	// Output inline JavaScript
	//$slideshow 		= intval($slider_settings['slideshow']) == '1' ? 'true': 'false';
	?>

	<script type="text/javascript">
		(function($){
			$(window).load(function() {
				$('#<?php echo $id; ?>').flexslider({
					slideshow		: <?php echo $slider_settings['slideshow']; ?>,
					pauseOnAction	: true,
					pauseOnHover	: true,
					slideshowSpeed	: 7000,
					animationSpeed	: 2000,
					animation 		: 'fade',
					prevText		: "<i class='fa fa-chevron-left'></i>",
					nextText		: "<i class='fa fa-chevron-right'></i>",
					start: function() {
			            var height = $("#background-area").height();
			            $(".slides .slider-latest-image").each(function(index, element) {
							var element = $(element);
							element.css({'height':height });
						});
					},
					before: function() {
			            var height = $("#background-area").height();
			            $(".slides .slider-latest-image").each(function(index, element) {
							var element = $(element);
							element.css({'height':height });
						});
			        }
				});

			});
		})(jQuery);
	</script>
	<?php

	} else {
		_e('Oops! No products added yet.', THEME_SLUG);
	}

	wp_reset_query();
}

//Custom styles for the product slider
function add_flexslider_product_styles(){
	$bg_colors = array(
		'color_links' 		=> array(
			'.flex-bg .slide-content .onsale',
			'.flex-bg .slide-content span.onsale'
		)
	);

	$colors = array(
		'color_heading2' => array('.flex-bg .slide-content .grid.box-six .slider-title'),
		'color_paragraphs' => array(
			'.flex-bg .slide-content .grid.box-six',
			//'.flex-bg .slide-content .grid.box-six .slider-title',
			'.flex-bg .slide-content .grid.box-six .slide-entry-content',
			'.flex-bg .slide-entry-content del .amount',
			'.flex-bg .slide-entry-content del'
		),
		'color_links' => array(
			'.flex-bg .flex-direction-nav a',
		),
		'color_links_hover' => array(
			'.flex-bg .flex-direction-nav a:hover'
		)
	);

	$border_colors = array(
		'color_links' => array(
			'.flex-bg .slide-content .grid.box-six.pull-right'
		),
		'color_top_menu_text_hover' => array(
			'.flex-bg .slide-entry-content .price',
			'.slide-content .slider-title'
		),

	);

	apply_colors('background-color', $bg_colors);
	apply_colors('color', $colors);
	apply_colors('border-color', $border_colors);
}
add_action('core_theme_hook_styles', 'add_flexslider_product_styles');

?>