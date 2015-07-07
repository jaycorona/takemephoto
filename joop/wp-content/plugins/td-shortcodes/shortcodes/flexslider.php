<?php

/*
 * A flexslider shortcode
 * Usage: [tds-flexslider] your images [/tds-flexslider]
 */
class tds_flexslider_shortcode {

	static function init() {
		add_shortcode( 'tds-flexslider', array( __CLASS__, 'tds_flexslider_shortcode_handle' ) );
		add_filter( 'the_posts', array( __CLASS__, 'conditionally_add_scripts_and_styles' ) );
		add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 5 );
	}

	static function tds_flexslider_shortcode_handle( $atts, $content = null, $tag ) {

		extract( shortcode_atts(
				array(
					'src'	=> plugins_url('images/td-framework.png', __FILE__),
					'title' => null,
					'width' => null,
					'height' => null,
					'animation' => '',
					'alt' => 'tds flexslider'
				), $atts )
			);

		$slider_data = "{ 'directionNav': false, 'controlNav': false }";

		$image_list = array();

		// Extract image tags
		preg_match_all( '/<img[^>]+>/i', $content, $image_list );

		$image_list = array_filter($image_list);

		$output = "<div class='flexslider tds-flexslider' >";
		//$output = '<div class="flexslider tds-flexslider" data-flexslider="' . $slider_data . '">';

		if ( empty( $image_list ) ) {
			$output .= '<p class="info warning"> No set of images for the slider! </p>';
		}

		$output .= '<ul class="slides tds-slides">';

		foreach ( $image_list[0] as $image ) {
			$output .= '<li class="tds-slide">' . $image . '</li>';
		}

		$output .= '</ul>';

		return $output . '</div>';

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

		add_shortcode( 'tds-flexslider', array( __CLASS__, 'tds_flexslider_shortcode_handle' ) );

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
			if (stripos($post->post_content, '[tds-flexslider') !== false) {
				$shortcode_found = true;
				break;
			}
		}

		if ($shortcode_found) {
			//wp_enqueue_style( 'tdfs-shortcodes', TDS_PLUGIN_URL . '/css/shortcodes.css' );
			//wp_enqueue_script( 'animate-this', plugins_url('js/animate-this.min.js', __FILE__), array('jquery'), '', true);
		}

		return $posts;
	}

}
tds_flexslider_shortcode::init();