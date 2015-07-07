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
	'name' => __('Fullscreen Posts Slider', THEME_SLUG),
	'scripts' => array(
		'jquery' => ' ',
		'flexslider-js' => CORE_URI . '/slider/slider-flexslider/jquery.flexslider.js',
	),
	'styles' => array(
		'flexslider-style' => CORE_URI . '/slider/slider-flexslider/custom-flexslider.css',
	),
	'supportsLayers' => false,
	'supportsSlides' => false,
	'output' => 'theme_slider_flexslider_output',

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
			'default' => '10',
		),
		'word_count' => array(
			'type' => 'string',
			'title' => __('Word count', THEME_SLUG),
			'default' => '55',
		),
		// Slider settings
		'slideshow' => array(
			'type' => 'select',
			'title' => __('Slideshow', THEME_SLUG),
			'items' => array(
				'true' => __('True', THEME_SLUG),
				'false' => __('False', THEME_SLUG)
			),
			'default' => 'true',
		),
		'thumbnails' => array(
			'type' => 'select',
			'title' => __('Thumbnails', THEME_SLUG),
			'description' => __('Display featured thumbnail', THEME_SLUG),
			'items' => array(
				'none' => __('None', THEME_SLUG),
				'top' => __('Top', THEME_SLUG)
			),
			'default' => 'top',
		),
	)
);

// Register
core_slider_register($slider);

// Outputs the Layer Slider code
//
function theme_slider_flexslider_output($settings) {
	$slider_settings = $settings['settings'];

	$thumbnail = $slider_settings['thumbnails'] == 'none' ? ' ' : $slider_settings['thumbnails'] ;

	$id = core_get_uuid('theme-slider-');
	$category_names = explode(',', $slider_settings['categories']);

	// Get recent posts
	$query_args = array(
		'tax_query' => array(
	       array(
	            'taxonomy' => 'category',
	            'field' => 'slug',
	            'terms' => $category_names,
	            'operator' => 'IN'
	        )
	    ),
	    //'category_name' => $slider_settings['categories'],
		//'order' => 'DESC',
		//'orderby' => 'post_date',
		'post_status' => 'publish',
		'posts_per_page' => $slider_settings['post_count']
	);

	// Create a new query
    $r = new WP_Query($query_args);
	$i = 0;

    // If query return results
    if ( $r->have_posts() ) {

	echo '<div id="', $id, '" class="flexslider flex-bg thumbnail-', $thumbnail ,'">';

	?>
	<ul class="slides">

	<?php

	// Start the loop
        while ( $r->have_posts()) {
			$r->the_post();

			$post_id = $r->post->ID;
			$thumb_id = get_post_thumbnail_id($post_id);
			$post_image = wp_get_attachment_image_src($thumb_id, 'slider-layer');

			// Output slides
			if (has_post_thumbnail($post_id)) {
				echo '<li ',post_class(),'>';
				echo '<div class="imgLiquidFill">';
				echo '<img alt="slide image', $post_id, '" class="slider-latest-image" src="', $post_image[0], '">';
				echo '</div>';

				echo '<div class="slide-content"><div class="grid box-six pull-right">';


				if ( $thumbnail == 'top' ) {
					$post_image = wp_get_attachment_image_src($thumb_id, 'large');
					echo '<a href="' . get_permalink() . '"><img alt="slide-image', $post_id, '" class="slider-content-featured" src="', $post_image[0], '"></a>';
				}

				echo '<div class="content-wrap">';
				echo '<h2 class="slider-title">', $r->post->post_title, '</h2>';

				$post_content = $r->post->post_content;

				$excerpt = explode(' ', $post_content, $slider_settings['word_count']);

				if (count($excerpt)>=$slider_settings['word_count']) {
					array_pop($excerpt);
					$excerpt = implode(" ",$excerpt) . ' ';
				} else {
					$excerpt = implode(" ",$excerpt);
				}

				$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

				echo '<div class="slide-entry-content"><p>'.$excerpt.'&hellip;</p><p>&nbsp;</p></div>';

				?>

				<a class="add_to_cart_button view-item" href="<?php the_permalink(); ?>" title="<?php echo __('View posts', THEME_SLUG); ?>">
					<i class="fa fa-eye fa-2x"></i>
				</a>

				<ul class="flex-direction-nav"><li><a href="#" class="flex-prev"><i class="fa fa-chevron-left fa-2x"></i></a></li><li><a href="#" class="flex-next"><i class="fa fa-chevron-right fa-2x"></i></a></li></ul>

				</div></div></div>

				</li>
				<?php
			}
		}
	?>
	  </ul>
	</div>
	<?php
		echo 'ii- '. $i;
	// Output inline JavaScript
	?>
	<script type="text/javascript">
		(function($){
			$(window).load(function() {
				$('#<?php echo $id; ?>').flexslider({
					slideshow		: <?php echo $slider_settings['slideshow']; ?>,
					pauseOnAction	: true,
					pauseOnHover	: true,
					slideshowSpeed	: 7000,
					animationSpeed	: 1000,
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

	}

	wp_reset_query();

}


?>