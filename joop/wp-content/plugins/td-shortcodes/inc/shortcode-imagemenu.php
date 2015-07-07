<?php

/*
 * A section shortcode
 * Usage: [tds-section ]
 */
class tds_imagemenu_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tds-imagemenupanel', array(__CLASS__, 'tds_imagemenupanel_shortcode_handle'));
		add_shortcode('tds-imagemenu', array(__CLASS__, 'tds_imagemenu_shortcode_handle'));

		add_filter('the_posts', array( __CLASS__, 'conditionally_add_scripts_and_styles' ) ); // the_posts gets triggered before wp_head
		add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 5 );
	}

	static function tds_imagemenupanel_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		static $inc = 0;
		$inc++;
		$imID = "iemenu" . $inc;

		$output = 	'<div id="'.$imID.'" class="ei_menu"><ul>'.do_shortcode( $content ).'</ul></div>';
		$output .= '<script type="text/javascript">
					jQuery(document).ready(function() {
						imageMenu("#'.$imID.'");
						});
					</script>';
		return $output;
	}
	static function tds_imagemenu_shortcode_handle($atts, $content = null, $tag) {

		extract( shortcode_atts(
				array(
					'title' => '',
					'subtitle' => '',
					'imageurl' => '',
					'imageurl' => '',
					'imagepreviewurl' => '',
				), $atts)
			);
		$output  = 	'<li><a href="#">';
		$output .=	'<span class="ei_preview" style="background-image:url('.$imagepreviewurl.')"></span>';
		$output .=	'<span class="ei_image" style="background-image:url('.$imageurl.')"></span>';
		$output .=	'</a>';
		$output .=	'<div class="ei_descr"><h2>'.$title.'</h2><h3>'.$subtitle.'</h3>'.do_shortcode( $content ).'</div>';
		$output .=	'</li>';

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

		add_shortcode('tds-imagemenupanel', array(__CLASS__, 'tds_imagemenupanel_shortcode_handle'));
		add_shortcode('tds-imagemenu', array(__CLASS__, 'tds_imagemenu_shortcode_handle'));

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
			if (stripos($post->post_content, '[tds-imagemenu') !== false) {
				$shortcode_found = true;
				break;
			}
		}

		if ($shortcode_found) {
			wp_enqueue_style( 'image-menu', plugins_url( 'css/image-menu.css', __FILE__ ) );
			wp_enqueue_script( 'imagemenu-easing', TDS_PLUGIN_URL . 'js/jquery.easing.1.3.js', '', '', true );
		}

		return $posts;
	}
}

tds_imagemenu_shortcode::init();

?>