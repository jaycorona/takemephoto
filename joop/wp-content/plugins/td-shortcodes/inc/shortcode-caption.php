<?php

/*
 * A Caption with Hover effect shortcode
 * Usage: [tds-caption]
 */

class tdf_caption_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tds-caption', array(__CLASS__, 'tdf_caption_shortcode_handle'));
		add_shortcode('tds-author', array(__CLASS__, 'tdf_author_shortcode_handle'));
		add_shortcode('tds-info', array(__CLASS__, 'tdf_figcaption_shortcode_handle'));

		add_filter('the_posts', array( __CLASS__, 'conditionally_add_scripts_and_styles' ) ); // the_posts gets triggered before wp_head
		//add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 5 );
	}

	static function tdf_caption_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract( shortcode_atts(
				array(
					'backgroundcolor' => '',
					'bordercolor'=>'',
					'bordersize'=>'0px'
				), $atts)
			);

		$backgroundcolor = isset( $atts['backgroundcolor'] ) ? 'style="background-color: ' . $atts['backgroundcolor'] . ';"' : '';

		$borderstyle='';
		if($bordercolor != '' && $bordersize != '0px'){
			$borderstyle='style="border:solid '.$bordercolor.' '.$bordersize.'"';
		}

		$tdshortcode_caption_effects = array( 'moveDown', 'moveUp', 'slideUp', 'flip', 'zoomIn', 'zoomOut', 'expand');
		$effect = tdshortcode_validate_type( $atts, $tdshortcode_caption_effects, 'slideUp' );
		$output = '<div class="tds-caption ' . $effect . '" '.$borderstyle.'><div ' . $backgroundcolor . '><figure>' . do_shortcode( $content ) . '</figure></div></div>';
		return $output;
	}

	static function tdf_figcaption_shortcode_handle($atts, $content = null, $tag) {
		extract( shortcode_atts(
				array(
					'backgroundcolor' => '#2C3F52'
				), $atts)
			);
		return '<figcaption><div style=" background-color: ' . $backgroundcolor . ';">' . do_shortcode( $content ) . '</div></figcaption>';;
	}

	static function tdf_author_shortcode_handle($atts, $content = null, $tag) {
		extract( shortcode_atts(
				array(
					'textcolor' => '#ED4E6E'
				), $atts)
			);
		return '<span style=" color: ' . $textcolor . ';">' . do_shortcode( $content ) . '</span>';;
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

		add_shortcode('tds-caption', array(__CLASS__, 'tdf_caption_shortcode_handle'));
		add_shortcode('tds-author', array(__CLASS__, 'tdf_author_shortcode_handle'));
		add_shortcode('tds-info', array(__CLASS__, 'tdf_figcaption_shortcode_handle'));

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
			if (stripos($post->post_content, '[tds-caption') !== false) {
				$shortcode_found = true;
				break;
			}
		}

		if ($shortcode_found) {
			wp_enqueue_style( 'caption-hover', plugins_url( 'css/caption.hover.css', __FILE__ ) );
			wp_enqueue_script('modernizr-custom', plugins_url('js/modernizr.custom.js', __FILE__), array('jquery'), '', false);
			wp_enqueue_script('toucheffect', plugins_url('js/toucheffects.js', __FILE__), array('jquery'), '', true);
		}

		return $posts;
	}
}

tdf_caption_shortcode::init();

?>