<?php

/*
 * Google font loader
 */
class tds_google_font {
	static $add_script;

	static $google_font_used = 'no';

	static $HAS_GOOGLE_FONT_KEY = '_has-google_fonts';

	static function init() {
		add_shortcode( 'trigger-css', array( __CLASS__, 'do_shortcode' ) );

	    add_filter( 'the_content', array( __CLASS__, 'the_content' ), 12 ); // AFTER WordPress' do_shortcode()
	    add_action( 'save_post', array( __CLASS__, 'save_post' ) );
	    add_action( 'wp_enqueue_scripts', array( __CLASS__, 'wp_enqueue_scripts' ) );
	}

	static function do_shortcode( $arguments, $content ) {
		//self::$google_font_used = 'Pontano Sans';

		global $post;

		$fonts = explode( ',', preg_replace( '/\s+/', '+', preg_replace( '/,\s+/', ',', get_post_meta( $post->ID, self::$HAS_GOOGLE_FONT_KEY, true ) ) ) );
		array_unique( $fonts );

		$fonts = join( ',', $fonts );

		if ( 'no' != $fonts ) {
			self::$google_font_used = $fonts ;
			update_post_meta( $post->ID, self::$HAS_GOOGLE_FONT_KEY, self::$google_font_used );
		}

		return '<h2>THIS POST WILL ADD CSS TO MAKE H2 TAGS WHITE ON RED</h2>';
	}

	static function save_font( $font = '' ) {
		global $post;

		$fonts = get_post_meta( $post->ID, self::$HAS_GOOGLE_FONT_KEY, true );

		if ( 'no' != $fonts ) {
			//$fonts .= $font;
		}

		self::$google_font_used = $fonts;
	}

	static function save_post( $post_id ) {
		delete_post_meta( $post_id, self::$HAS_GOOGLE_FONT_KEY );
		wp_remote_request( get_permalink( $post_id ), array( 'blocking' => false ) );
	}


	static function wp_enqueue_scripts( $args ) {
		global $post;

		global $theme_load_fonts, $tds_core_fonts;

		$theme_load_fonts = array();
		$font_url = '';
		$family = '';
		$subset = array( 'latin' );
		$fonts = explode( ',', preg_replace( '/\s+/', '+', preg_replace( '/,\s+/', ',', get_post_meta( $post->ID, self::$HAS_GOOGLE_FONT_KEY, true ) ) ) );
		$subsets = explode( ',', preg_replace( '/\s+/', '+', 'latin, cyrillic-ext,greek-ext, greek, vietnamese, latin-ext, cyrillic' ) );

		foreach( $fonts as $font ) {
			array_push( $theme_load_fonts, $font);
		}

		$theme_load_fonts = array_unique( $theme_load_fonts );

		$family = join( "|", $theme_load_fonts );

		foreach ($subsets as $set) {
			if ( in_array($set, array('latin','cyrillic-ext','greek-ext','greek','vietnamese','latin-ext','cyrillic') ) ) {
				array_push($subset, $set);
			}
		}

		if ( ! empty( $subset ) ) {
			$args = array( 'family' => $family, 'subset' => join(',', $subset) );
		} else {
			$args = array( 'family' => urlencode( 'the sun' ) );
		}

		$font_url = add_query_arg( $args, "//fonts.googleapis.com/css" );

		$fonts = get_post_meta( $post->ID, self::$HAS_GOOGLE_FONT_KEY, true );

		if ( 'no' != $fonts ) {
		  wp_enqueue_style( 'tds-google-fonts', $font_url, array(), null );
		  //wp_enqueue_script( 'eimenu-1', plugins_url('js/shortcode-eimenu.js', __FILE__), '', '', true );
		}
		$GLOBAL['tds_google_fonts'] = array('Pontano Sans');
	}

	static function the_content( $content ) {
		global $post;

		if ( '' === get_post_meta( $post->ID, self::$HAS_GOOGLE_FONT_KEY, true ) ) {
		  update_post_meta( $post->ID, self::$HAS_GOOGLE_FONT_KEY, self::$google_font_used );
		}

		remove_filter( 'the_content', array( __CLASS__, 'the_content' ), 12 );

		return $content;
	}
}

tds_google_font::init();

?>