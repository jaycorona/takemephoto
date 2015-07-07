<?php

/*
 * A heading title shortcode
 * Usage: [tds-heading] content [tds-heading]
 */

class tds_heading_shortcode {
	static $add_script;

	static $shortcode_used = 'no';
	static $HAS_SHORTCODE_KEY = '_has_trigger-tds_heading_shortcode';

	static function init() {
		add_shortcode( 'tds-heading', array( __CLASS__, 'tds_heading_shortcode_handle' ) );
		add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 7 );

		add_filter( 'the_content', array( __CLASS__, 'the_content' ), 12 ); // AFTER WordPress' do_shortcode()
	    add_action( 'save_post', array( __CLASS__, 'save_post' ) );
	    //add_action( 'wp_print_styles', array( __CLASS__, 'wp_print_styles' ) );
	}

	static function tds_heading_shortcode_handle( $atts, $content = null, $tag ) {
		self::$add_script = true;
		self::$shortcode_used = 'yes';

		$headings = array('1', '2', '3', '4', '5', '6');
		$alignment = array('left', 'center', 'right');

		extract( shortcode_atts(
				array(
					'id' 		=> null,
					'color' 	=> null,
					'font' 		=> null,
					'size' 		=> null,
					'weight' 	=> null,
					'align' 	=> null,
				), $atts )
			);

		$class = array();

		$styles = '';

		$heading = tdshortcode_validate_type($atts, $headings, 'p');
		$align = tdshortcode_validate_type($atts, $alignment, null);

		$id 		= isset($id) 	? ' id="' 			. $id . '" ' 		: '';
		$color		= isset($color) ? ' color: '		. $color .'; ' 		: '';
		$font		= isset($font) 	? ' font-family: '	. $font .'; ' 	: '';
		$size		= isset($size) 	? ' font-size: '	. intval($size) .'px; ' 	: '';
		$weight		= isset($weight)? ' font-weight: '	. $weight .'; ' 	: '';
		$weight		= isset($align) ? ' text-align: '	. $align .'; ' 	: '';

		$styles = $color . $font . $size . $weight;

		if ( '' != $styles ) {
			$styles = ' style="' . $styles . '"';
		}

		if ( 'p' === $heading ) {
			return '<p' . $id . $styles . '>' . do_shortcode( $content ) . '</p>' . "\n";
		} else  {
			return '<h' . $heading . $id . $styles . '>' . do_shortcode( $content ) . '</h' . $heading . '>' . "\n";
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

		add_shortcode( 'tds-heading', array( __CLASS__, 'tds_heading_shortcode_handle' ) );

		// Do the shortcode (only the one above is registered)
		$content = do_shortcode( $content );

		// Put the original shortcodes back
		$shortcode_tags = $orig_shortcode_tags;

		return $content;
	}

	/**
	 * Save the post and delete the post meta
	 */
	static function save_post( $post_id ) {
		delete_post_meta( $post_id, self::$HAS_SHORTCODE_KEY );
		/**
		 * Now load the post asynchronously via HTTP to pre-set the meta value for $this->HAS_SHORTCODE_KEY.
		 */
		wp_remote_request( get_permalink( $post_id ), array( 'blocking' => false ) );
	}

	static function wp_print_styles( $args ) {
		global $post;
		if ( 'no' != get_post_meta( $post->ID, self::$HAS_SHORTCODE_KEY, true ) ) {
		  /**
		   * Only bypass if set to 'no' as '' is unknown.
		   */
		  //wp_enqueue_style( 'css-on-shortcode', plugins_url( 'css/style.css', __FILE__ ) );
		}
	}

	static function the_content( $content ) {
		global $post;
		if ( '' === get_post_meta( $post->ID, self::$HAS_SHORTCODE_KEY, true ) ) {
		  /**
		   * This is the first time the shortcode has ever been seen for this post.
		   * Save a post_meta key so that next time we'll know this post uses this shortcode
		   */
		  update_post_meta( $post->ID, self::$HAS_SHORTCODE_KEY, self::$shortcode_used );
		}

		remove_filter( 'the_content', array( __CLASS__, 'the_content' ), 12 );
		return $content;
	}

}

tds_heading_shortcode::init();

?>