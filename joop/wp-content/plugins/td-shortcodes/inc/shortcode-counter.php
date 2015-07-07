<?php

/*
 * A counter shortcode
 * Usage: [tds-counter ]
 */
class tds_counter_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tds-counter', array(__CLASS__, 'tds_counter_shortcode_handle'));

		//add_action('init', array(__CLASS__, 'register_script'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));
		//add_action('wp_footer', array(__CLASS__, 'counter_script'));
	}

	static function tds_counter_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract( shortcode_atts(
				array(
					'number' => '100',
					'title' => 'Title Here',
					'countercolor' => '#000000',
					'titlecolor' => '#7c7c7c',
					'countersize' => '60px',
					'titlesize' => '16px',
					'display' => 'inline', //inline // block
				), $atts)
			);
		$addtlclass = '';
		if( $display == 'block' ) {
			$addtlclass = 'tds-block100';
		}
		$output = '<div class="tds-counter ' . $addtlclass . '" data-perc="' . $number . '"><p style="font-size:' . $countersize . '; line-height:' . $countersize . '; color:' . $countercolor . ';" class="tds-count">&nbsp;</p><h6 style="font-size:' . $titlesize . '; color:' . $titlecolor . ';" class="tds-counter-details">' . $title . '</h6></div>';
		return $output;
	}

	static function register_script() {
		wp_register_script( 'countTo', plugins_url('js/jquery.countTo.js', __FILE__), '', '', true );
		wp_register_script( 'appear', plugins_url('js/jquery.appear.js', __FILE__), '', '', true );
	}

	static function counter_script() {
		if ( ! self::$add_script )
			return;

		echo '<script type="text/javascript">' . "\n";
		echo '	/* <![CDATA[ */' . "\n";
		echo '	// TDS Counter'. "\n";
		echo '		jQuery(".tds-counter").appear(function() {'. "\n";
		echo '			jQuery(".tds-counter").each(function(){'. "\n";
		echo '				var dataperc = jQuery(this).data("perc");'. "\n";
		echo '				jQuery(this).find(".tds-count").delay(10000).countTo({'. "\n";
		echo '					from: 0,'. "\n";
		echo '					to: dataperc,'. "\n";
		echo '					speed: 2000,'. "\n";
		echo '					refreshInterval: 100'. "\n";
		echo '	        	});'. "\n";
		echo '	     	});'. "\n";
		echo '	   	});'. "\n";
		echo 	'/* ]]> */' . "\n";;
		echo '</script>' . "\n";
	}

	static function print_script() {
		if ( ! self::$add_script )
			return;
		//wp_print_scripts('countTo');
		//wp_print_scripts('appear');
		wp_print_scripts('tdf-shortcodes');

	}
}

tds_counter_shortcode::init();

?>