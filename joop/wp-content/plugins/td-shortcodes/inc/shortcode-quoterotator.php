<?php

/*
 * A section shortcode
 * Usage: [tds-section ]
 */
class tds_quoterotator_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tds-quotesrotator-panel', array(__CLASS__, 'tds_quoterotatorpanel_shortcode_handle'));
		add_shortcode('tds-quotesrotator', array(__CLASS__, 'tds_quoterotator_shortcode_handle'));

		add_action('init', array(__CLASS__, 'register_script'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));
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
		$output .= do_shortcode( $content );
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
		if(!empty($imageurl))
		$output .= 	'<img src="'.$imageurl.'" alt="'.$author.'" />';
		$output .= 	'<blockquote>';
		$output .= 	'<p>'.do_shortcode( $content ).'</p>';
		if(!empty($author))
		$output .= 	'<footer>'.$author.'</footer>';
		$output .= 	'</blockquote>';
		$output .= 	'</div>';
	
		return $output;
	}


	static function register_script() {
		//wp_register_script( 'modernizr', TDS_PLUGIN_URL . 'js/modernizr.custom.js', '', '', true );
		wp_register_script( 'quotes-rotator', TDS_PLUGIN_URL . 'js/jquery.cbpQTRotator.min.js', '', '', true );
		//wp_enqueue_script( 'isotope', TDS_PLUGIN_URL . 'js/isotope.js', '', '', true );
	}

	static function print_script() {
		if ( ! self::$add_script )
			return;

		//wp_print_scripts('modernizr');
		wp_print_scripts('quotes-rotator');
		//wp_print_scripts('isotope');
	}
}

tds_quoterotator_shortcode::init();

?>