<?php

/*
 * A Quotes Rotator shortcode
 * Usage: [tds-quotesrotator-panel][tds-quotesrotator]Quote here...[/tds-quotesrotator][tds-quotesrotator]Quote here...[/tds-quotesrotator][/tds-quotesrotator-panel]
 */
class tds_quoterotator_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tds-quotesrotator-panel', array(__CLASS__, 'tds_quoterotatorpanel_shortcode_handle'));
		add_shortcode('tds-quotesrotator', array(__CLASS__, 'tds_quoterotator_shortcode_handle'));

		add_filter('the_posts', array( __CLASS__, 'conditionally_add_scripts_and_styles' ) ); // the_posts gets triggered before wp_head
		add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 5 );
	}

	static function tds_quoterotatorpanel_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract( shortcode_atts(
				array(
					'fontsize' => '',
					'progressbarcolor' => '#47A3DA'
				), $atts)
			);

		static $inc = 0;
		$inc++;
		$qtID = "quotesrotator-" . $inc;
		$output = '';

		$output .= '<div id="'.$qtID.'" class="cbp-qtrotator">';
		$output .= '<style type="text/css" scoped>
						#'.$qtID.' blockquote p,
						#'.$qtID.' blockquote footer {
							font-size:'.$fontsize.';
						}
						#'.$qtID.' .cbp-qtprogress {
							background-color:'.$progressbarcolor.';
						}
					</style>';
		$output .= do_shortcode( shortcode_unautop( $content ) );
		$output .= '</div>';
		$output .= '<div class="tds-scriptblk"><script type="text/javascript">jQuery( function() {jQuery( "#'.$qtID.'" ).cbpQTRotator();} );</script></div>';

		return $output;
	}
	static function tds_quoterotator_shortcode_handle($atts, $content = null, $tag) {

		extract( shortcode_atts(
				array(
					'author' => '',
					'imageurl' => '',
				), $atts)
			);


		$output = 	'<div class="cbp-qtcontent">';
		if(!empty($imageurl)){
			$output .= 	'<img src="'.$imageurl.'" alt="'.$author.'" />';
		}
		$output .= 	'<blockquote>';
		$output .= 	do_shortcode( shortcode_unautop( $content ) );
		if(!empty($author)){
			$output .= 	'<footer>'.$author.'</footer>';
		}
		$output .= 	'</blockquote>';
		$output .= 	'</div>';

		return $output;
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

		add_shortcode('tds-quotesrotator-panel', array(__CLASS__, 'tds_quoterotatorpanel_shortcode_handle'));
		add_shortcode('tds-quotesrotator', array(__CLASS__, 'tds_quoterotator_shortcode_handle'));

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
			if (stripos($post->post_content, '[tds-quotesrotator') !== false) {
				$shortcode_found = true;
				break;
			}
		}

		if ($shortcode_found) {
			wp_enqueue_style( 'quote-rotator', plugins_url( 'css/quote-rotator.css', __FILE__ ) );
			//wp_enqueue_script( 'modernizr', TDS_PLUGIN_URL . 'js/modernizr.custom.js', '', '', true );
			wp_enqueue_script( 'quotes-rotator', TDS_PLUGIN_URL . 'js/jquery.cbpQTRotator.min.js', '', '', true );
		}

		return $posts;
	}
}

tds_quoterotator_shortcode::init();

?>