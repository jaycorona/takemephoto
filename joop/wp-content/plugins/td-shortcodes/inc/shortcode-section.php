<?php

/*
 * A section shortcode
 * Usage: [tds-section ]
 */

class tdf_section_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tds-section', array(__CLASS__, 'tdf_section_shortcode_handle'));
		add_shortcode('tds-sequence', array(__CLASS__, 'tdf_sequence_shortcode_handle'));
		add_shortcode('tds-section-separator', array(__CLASS__, 'tdf_section_separator_shortcode_handle'));

		add_filter( 'the_posts', array( __CLASS__, 'conditionally_add_scripts_and_styles' ) ); // the_posts gets triggered before wp_head
		//add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 5 );
	}

	static function tdf_section_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract( shortcode_atts(
				array(
					'background' => '',
					'textcolor' => '',
					'opacity' => '1',
					'backgroundimageurl' => '',
					'overlay' => '',
					'id' => '',
					'separator' => false,
					'parallax' => 'true'
				), $atts )
			);

		$type = tdshortcode_validate_type( $atts, array('fullscreen'), null );
		$overlay = tdshortcode_validate_type( $atts, array('yes', 'no'), 'yes' );
		$opacity = (int)$opacity > 1 && (int)$opacity <= 100 ? (int)$opacity/100 : (int)$opacity;
		$color = tds_hex2rgb($background);
		$color['alpha'] = $opacity;
		$imageurl = $backgroundimageurl;
		$parallax = $parallax === 'true' ? true : false;

		$idClass = '';
		if(!empty($id)){
			$idClass = 'id="'.$id.'"';
		}

		$background = $background !== '' ? 'background-color: ' . $background .'; background-color: ' . tds_color2rgba($color) . ';': '';

		$textcolor = $textcolor !== '' ? 'color:' . $textcolor . ';': '';

		if ($background != '' ||  $textcolor != '') {
			$output = $type ? "\n" . '<div '.$idClass.' class="tds-section hero-fullscreen" style="' . $background . $textcolor . '">' . "\n" : "\n" . '<div '.$idClass.'  class="tds-section" style="' . $background . $textcolor . '">' . "\n";
		} else {
			$output = $type ? "\n" . '<div '.$idClass.' class="tds-section hero-fullscreen" >' . "\n" : "\n" . '<div '.$idClass.'  class="tds-section">' . "\n";
		}

		if ( $imageurl != '' ) {
			if ( $parallax ) {
				$output .=  "\n" . '<div class="tds-parallax normal-background" style="background-image: url(' . $imageurl . ');">' . "\n";
			} else {
				$output .=  "\n" . '<div class="normal-background" style="background-image: url(' . $imageurl . ');">' . "\n";
			}
			//$output .=  "\n" . '<div class="tds-parallax normal-background" style="background-image: url(' . $imageurl . ');">' . "\n";
			//$output .= $overlay == 'yes' ? "\n" . '<div class="pattern-overlay"></div>' . "\n" : '';
		} else {
			$output .= $type ? "\n" . '<div class="normal-background hero-fullscreen-holder">' . "\n" : "\n" . '<div class="normal-background">' . "\n";
		}

		$output .= $type ? '<div class="tds-section-content hero-fullscreen-inner">' . "\n" . '<div class="hero-fullscreen-block">' . "\n" : '<div class="tds-section-content">' . "\n";

		$output .= do_shortcode( $content );
		$output .= $type ? "\n" . '</div>' . "\n" . '</div><!-- /.tds-section-content -->' : "\n" . '</div><!-- /.tds-section-content -->';
		$output .= "\n" . '</div><!-- /.normal-background --></div><!-- /.tds-section -->';

		return $output;

	}

	static function tdf_sequence_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		return '<div class="tds-sequence sequence-frame">' . $content . "\n</div><!-- /.tds-sequence -->";
	}

	static function tdf_section_separator_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract( shortcode_atts(
				array(
					'background' 	=> '#ffffff',
					'opacity' 		=> '1',
					'direction'		=> 'up'
				), $atts )
			);

		$direction = tdshortcode_validate_type( $atts, array('up', 'down'), 'up' );
		$opacity = (int)$opacity > 1 && (int)$opacity <= 100 ? (int)$opacity/100 : (int)$opacity;
		$color = tds_hex2rgb($background);
		$color['alpha'] = $opacity;
		if ( 'down' === $direction ) {
			$border = 'border-top-color:' . $background . '; border-top-color:' . tds_color2rgba($color) . ';';
		} else {
			$border = 'border-bottom-color:' . $background . '; border-bottom-color:' . tds_color2rgba($color) . ';';
		}
		return '<div class="tds-section-separator ' . $direction . '"><div class="separator-arrow" style="' . $border . '"></div></div>';
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

		add_shortcode('tds-section', array(__CLASS__, 'tdf_section_shortcode_handle'));
		add_shortcode('tds-sequence', array(__CLASS__, 'tdf_sequence_shortcode_handle'));
		add_shortcode('tds-section-separator', array(__CLASS__, 'tdf_section_separator_shortcode_handle'));

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
			if (stripos($post->post_content, '[tds-section') !== false) {
				$shortcode_found = true;
				break;
			}
		}

		if ($shortcode_found) {
			//wp_enqueue_style( 'boxed-content', plugins_url( 'css/shortcode-boxed-content.css', __FILE__ ) );
			//wp_enqueue_script('device', plugins_url('js/device-min.js', __FILE__), array('jquery'), '0.1.58', true);
			//wp_enqueue_script('parallax', plugins_url('js/jquery.parallax-min.js', __FILE__), array('jquery'), '1.1.3', true);
			wp_enqueue_script('tds-section', plugins_url('js/shortcode-section-min.js', __FILE__), array('jquery'), '', true);
		}

		return $posts;
	}
}

tdf_section_shortcode::init();

?>