<?php

/*
 * A boxed flexslider shortcode
 * Usage: [tds-boxed-slider] content [tds-boxed-slider]
 */

class tds_boxed_slider_shortcode {
	static $add_script;

	static function init() {
		add_shortcode( 'tds-boxed-slider', array( __CLASS__, 'tds_boxed_slider_shortcode_handle' ) );
		add_filter('the_posts', array( __CLASS__, 'conditionally_add_scripts_and_styles' ) ); // the_posts gets triggered before wp_head
		//add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 5 );
	}

	static function tds_boxed_slider_shortcode_handle( $atts, $content = null, $tag ) {
		self::$add_script = true;

		extract( shortcode_atts(
				array(
					'textcolor'			=> null,
					'bordercolor'		=> null,
					'borderopacity'		=> 50,
					'shadowcolor'		=> null,
					'shadowopacity'		=> 50,
					'link'				=> null,
					'duration'			=> 7000,
					'transition'		=> 600,
					'delay'				=> 3000,
					'newwindow'			=> "false",
				), $atts )
			);

		$class = array( 'tds-boxed boxed-slider' );
		$class = 'class="' . implode(" ", $class) . '" ';

		$styles = 'styles="';

		$styles = 'styles="' != $styles ? $styles . '" ' : '';

		$content = do_shortcode( $content );

		$image_list = array();

		// Extract image tags
		preg_match_all( '/<img[^>]+>/i', $content, $image_list );

		$image_list = array_filter($image_list);

		// remove img and a tag from content
		$content = preg_replace('/<img[^>]+\>/i', '', $content);
		$content = preg_replace('/<a[^>]+\>/i', '', $content);

		$output = '<div class="flexslider tds-flexslider" data-delay="' . intval($delay) . '" data-slideshow-speed="' . intval($duration) . '" data-animation-speed="' . intval($transition) . '">';

		if ( empty( $image_list ) ) {
			$output .= '<p class="info warning"> No set of images for the slider! </p>';
		}

		$output .= '<ul class="slides tds-slides">';

		foreach ( $image_list[0] as $image ) {
			$output .= '<li class="tds-slide">' . $image . '</li>';
		}

		$output .= '</ul></div>';

		$data = '';

		if ( $textcolor ) {
			$data .= 'data-textcolor="' . $textcolor . '" ';
		}

		if ( $bordercolor ) {
			$data .= 'data-bordercolor="' . $bordercolor . '" ';
		}

		$borderopacity = intval($borderopacity) > 1 && intval($borderopacity) <= 100 ? intval($borderopacity)/100 : 1;
		if ( $borderopacity ) {
			$data .= 'data-borderopacity="' . $borderopacity . '" ';
		}

		if ( $shadowcolor ) {
			$data .= 'data-shadowcolor="' . $shadowcolor . '" ';
		}

		$shadowopacity = intval($shadowopacity) > 1 && intval($shadowopacity) <= 100 ? intval($shadowopacity)/100 : 1;
		if ( $shadowopacity ) {
			$data .= 'data-shadowopacity="' . $shadowopacity . '" ';
		}

		if ( $link ) {
			$newwindow = $newwindow === "true" || $newwindow === "TRUE" ? '_blank' : '_self';
			$link = '<a class="tds-boxed-link" href="' . $link . '" target="' . $newwindow . '"> </a>';
		}

		return '<div ' . $class . $styles . $data . '>' . $link . $output . '<div class="tds-boxed-content">' . $content . '</div>' . '</div>';
	}

	/**
	 * Pre run shortcode to avoid wpautop()
	 */
	static function tds_prerun( $content ) {
		global $shortcode_tags;

		// Backup current registered shortcodes and clear them all out
		$orig_shortcode_tags = $shortcode_tags;
		$shortcode_tags = array();
		remove_all_shortcodes();

		add_shortcode( 'tds-boxed-slider', array( __CLASS__, 'tds_boxed_slider_shortcode_handle' ) );

		// Do the shortcode (only the one above is registered)
		$content = do_shortcode( $content );

		// Put the original shortcodes back
		$shortcode_tags = $orig_shortcode_tags;

		return $content;
	}

	/*
	 * Load css and js only when the shortcode is used
	 */
	static function conditionally_add_scripts_and_styles($posts){
		if (empty($posts)) return $posts;

		$shortcode_found = false;

		foreach ($posts as $post) {
			if (stripos($post->post_content, '[tds-boxed-slider') !== false) {
				$shortcode_found = true;
				break;
			}
		}

		if ($shortcode_found) {
			wp_enqueue_style( 'boxed-content', plugins_url( 'css/boxed-content.css', __FILE__ ) );
			wp_enqueue_script( 'boxed-content', plugins_url('js/shortcode-boxed-content.min.js', __FILE__), '', '', true );
		}

		return $posts;
	}

}

tds_boxed_slider_shortcode::init();

?>