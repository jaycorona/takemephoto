<?php

/*
 * A counter shortcode
 * Usage: [tdf-counter number="100" delay="2000" color="#000" size="20px" ]
 */
class tdf_counter_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tdf-counter', array(__CLASS__, 'tdf_counter_shortcode_handle'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));
	}

	static function tdf_counter_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract( shortcode_atts(
				array(
					'number' 	=> '100',
					'color' 	=> '#000000',
					'size' 		=> '60px',
					'delay' 	=> '2000',
				), $atts)
			);
		$addtlclass = '';

		$type = tdshortcode_validate_type( $atts, array('block', 'inline'), 'block' );

		if ( $display == 'block' ) {
			$addtlclass = 'tdf-block';
		}

		if ( $display == 'inline' ) {
			$addtlclass = 'tdf-inline';
		}

		$output = '<div class="tdf-counter ' . $addtlclass . '" data-perc="' . $number . '" data-delay="' . intval($delay) . '"><div style="font-size:' . $size . '; line-height:' . $size . '; color:' . $color . ';" class="tdf-count"> &nbsp; </div>' . do_shortcode($content) .'</div>';
		return $output;
	}

	static function print_script() {
		if ( ! self::$add_script )
			return;
		wp_print_scripts('tdf-shortcodes');

	}
}

tdf_counter_shortcode::init();

?>