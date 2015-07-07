<?php

/*
 * You can split the area up to 5 columns with fullheight or even fullwidth
 * Usage: 	[tds-splitlayout divider]
 *				[tds-splitcolumn one half] your content [/tds-splitcolumn]
 *				[tds-splitcolumn one half] your content [/tds-splitcolumn]
 * 			[/tds-splitlayout]
 */

class tds_splitlayout_shortcode {
	static $add_script;

	static function init() {
		add_shortcode( 'tds-splitlayout', array( __CLASS__, 'tds_splitlayout_shortcode_handle' ) );
		add_shortcode( 'tds-splitcolumn', array( __CLASS__, 'tds_splitcolumn_shortcode_handle' ) );

		add_filter( 'the_posts', array( __CLASS__, 'conditionally_add_scripts_and_styles' ) ); // the_posts gets triggered before wp_head
		add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 5 );
	}

	static function tds_splitlayout_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		$class = '';

		if ( is_array( $atts ) && in_array( 'fullwidth', $atts ) ) {
			$class .= ' fullwidth';
		}

		if ( is_array( $atts ) && in_array( 'divider', $atts ) ) {
			$class .= ' divider';
		}

		if ( is_array( $atts ) && in_array( 'last', $atts ) ) {
			$class .= ' last';
		}

		return '<div class="tds-splitlayout' . $class . '">' . do_shortcode( $content ) . '</div>';
	}

	static function tds_splitcolumn_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract( shortcode_atts(
				array(
					'image' => null,
					'backgroundcolor' => null,
					'textcolor' => null,
					'width' => null,
					'backgroundopacity' => 80,
				), $atts )
			);

		global $tdshortcode_animation_effect;

		$cwidths = array('full', 'half', 'third', 'fourth', 'fifth');
		$ncolumns = array('one', 'two', 'three', 'four');

		$columnWidth = tdshortcode_validate_type( $atts, $cwidths, 'full' );
		$numberColumns = tdshortcode_validate_type( $atts, $ncolumns, '' );
		$animation = tdshortcode_validate_type( $atts, $tdshortcode_animation_effect, '' );

		$class = '';
		$style = '';

		if ( is_array( $atts ) && in_array( 'last', $atts ) ) {
			$class .= ' last';
		}

		if( !is_null($image) || !is_null($backgroundcolor) || !is_null($backgroundcolor) || !is_null($textcolor) || !is_null($width) ) {
			$style .= 'style="';
		}

		if ( !is_null($image) && 'imageurl' != $image ) {
			$style .= 'background-image: url(' . $image . '); ';
		}

		if ( !is_null($backgroundcolor) ) {
			$style .= 'background-color: ' . $backgroundcolor . '; ';

			if ( !is_null($backgroundopacity) ) {
				$color = tds_hex2rgb($backgroundcolor);
				$color['alpha'] = $backgroundopacity/100;
				$style .= 'background-color: ' . tds_color2rgba($color) . '; ';
			}
		}

		if ( !is_null($textcolor) ) {
			$style .= 'color: ' . $textcolor . '; ';
		}

		if ( !is_null($width) ) {
			//$style .= 'width: ' . $width . '; ';
			$width = (int)$width;
		}

		if( !is_null($image) || !is_null($backgroundcolor) || !is_null($backgroundcolor) || !is_null($textcolor) || !is_null($width) ) {
			$style .= '"';
		}

		if ( ! $columnWidth &&  is_null( $width ) ) {
			return '<div class="tds-splitcolumn"><div class="tds-box"><div class="tds-cell">' . tdshortcodes_get_warning( __('No "column" width defined.', 'tdshortcodes' ) ) . '</div></div></div>';
		}

		if ( is_null( $width ) ) {
			$numerator = 1;
			$denominator = 1;

			switch($numberColumns) {
				case 'one' : $numerator = 1; break;
				case 'two' : $numerator = 2; break;
				case 'three' : $numerator = 3; break;
				case 'four' : $numerator = 4; break;
				//case 'five' : $numerator = 5; break;
			}

			switch($columnWidth) {
				case 'full' : $denominator = 1; break;
				case 'half' : $denominator = 2; break;
				case 'third' : $denominator = 3; break;
				case 'fourth' : $denominator = 4; break;
				case 'fifth' : $denominator = 5; break;
			}

			if( $animation === '' ) {
				return '<div class="tds-splitcolumn ' . $numberColumns . ' ' . $columnWidth . ' ' . $class . '" ' . $style . ' data-width="' . ( ( $numerator * 100 ) / $denominator ) / 100 . '"><div class="tds-box"><div class="tds-cell">' . do_shortcode( $content ) . '</div></div></div>';
			} else {
				return '<div class="tds-splitcolumn ' . $numberColumns . ' ' . $columnWidth . ' ' . $class . ' animated" data-animation="' . $animation . '" ' . $style . ' data-width="' . ( ( $numerator * 100 ) / $denominator ) / 100 . '"><div class="tds-box"><div class="tds-cell">' . do_shortcode( $content ) . '</div></div></div>';
			}
		} else {
			if( $animation === '' ) {
				return '<div class="tds-splitcolumn '.$class.'" ' . $style . ' data-width="' . $width / 100 . '"><div class="tds-box"><div class="tds-cell">' . do_shortcode( $content ) . '</div></div></div>';
			} else {
				return '<div class="tds-splitcolumn '.$class.' animated" ' . $style . ' data-animation="' . $animation . '" data-width="' . $width / 100 . '"><div class="tds-box"><div class="tds-cell">' . do_shortcode( $content ) . '</div></div></div>';
			}
		}
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

		add_shortcode('tds-splitlayout', array(__CLASS__, 'tds_splitlayout_shortcode_handle'));
		add_shortcode('tds-splitcolumn', array(__CLASS__, 'tds_splitcolumn_shortcode_handle'));

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
			if (stripos($post->post_content, '[tds-splitlayout') !== false) {
				$shortcode_found = true;
				break;
			}
		}

		if ($shortcode_found) {
			wp_enqueue_style( 'splitlayout', plugins_url( 'css/shortcode-splitlayout.css', __FILE__ ) );
			wp_enqueue_script( 'splitlayout', plugins_url('js/shortcode-splitlayout-min.js', __FILE__), array('jquery'), '', true);
		}

		return $posts;
	}
}

tds_splitlayout_shortcode::init();

?>