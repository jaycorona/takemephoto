<?php

/*
 * An animated image shortcode
 * Usage: [tds-image ]
 */
class tds_animate_image_Shortcode {

	static function init() {

		add_shortcode( 'tds-image', array( __CLASS__, 'tds_animate_image_shortcode_handle' ) );

		add_filter( 'the_posts', array( __CLASS__, 'conditionally_add_scripts_and_styles' ) ); // the_posts gets triggered before wp_head
		//add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 5 );
	}

	static function tds_animate_image_shortcode_handle( $atts, $content = null, $tag ) {

		//Animation effects
		$tdshortcode_animation_effect = array(
			//Attention seekers:
			'flash', 'bounce', 'shake', 'tada', 'swing', 'wobble', 'wiggle', 'pulse',

			//Flippers (currently Webkit, Firefox, & IE10 only):
			'flip', 'flipInX', 'flipOutX', 'flipInY', 'flipOutY',

			//Fading entrances:
			'fadeIn', 'fadeInUp', 'fadeInDown', 'fadeInLeft', 'fadeInRight', 'fadeInUpBig', 'fadeInDownBig', 'fadeInLeftBig', 'fadeInRightBig',

			//Fading exits:
			'fadeOut', 'fadeOutUp', 'fadeOutDown', 'fadeOutLeft', 'fadeOutRight', 'fadeOutUpBig', 'fadeOutDownBig', 'fadeOutLeftBig', 'fadeOutRightBig',

			//Bouncing entrances:
			'bounceIn', 'bounceInDown', 'bounceInUp', 'bounceInLeft', 'bounceInRight',

			//Bouncing exits:
			'bounceOut', 'bounceOutDown', 'bounceOutUp', 'vbounceOutLeft', 'bounceOutRight',

			//Rotating entrances:
			'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight',

			//Rotating exits:
			'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight',

			//Lightspeed:
			'lightSpeedIn', 'lightSpeedOut',

			//Specials:
			'hinge', 'rollIn', 'rollOut'
		);

		global $tdshortcode_animation_effect;
		extract( shortcode_atts(
					array(
						'src'	=> plugins_url('images/td-framework.png', __FILE__),
						'title' => null,
						'width' => null,
						'height' => null,
						'animation' => '',
						'alt' => 'tds image'
					), $atts )
				);


		$animation  = tdshortcode_validate_type( $atts, $tdshortcode_animation_effect, '' );
		if ( !$src ) {
			return;
		} else  {
			$output = '<img src="'. strip_tags($src) .'"';

			if ( $alt )
				$output .= ' alt="'. strip_tags($alt) .'"';

			if ( $title )
				$output .= ' title="'. strip_tags($title) .'"';

			if ( $width )
				$output .= ' width="'. $width .'"';

			if ( $height )
				$output .= ' height="'. $height .'"';

			if(!empty($animation)){
				$output .= ' class="tds-image aligncenter animation" data-animation="'. $animation .'">';
			}else{
				$output .= ' class="tds-image aligncenter">';
			}
		}

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

		add_shortcode( 'tds-image', array( __CLASS__, 'tds_animate_image_shortcode_handle' ) );

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
			if (stripos($post->post_content, '[tds-image') !== false) {
				$shortcode_found = true;
				break;
			}
		}

		if ($shortcode_found) {
			wp_enqueue_style( 'animate', plugins_url( 'css/animate.min.css', __FILE__ ) );
			//wp_enqueue_script( 'animate-this', plugins_url('js/animate-this.min.js', __FILE__), array('jquery'), '', true);
		}

		return $posts;
	}

}
tds_animate_image_Shortcode::init();