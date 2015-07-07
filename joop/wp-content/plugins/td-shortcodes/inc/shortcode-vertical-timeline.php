<?php

/*
 * A vertical timeline panel shortcode
 * Usage: 	[tds-verticaltimeline-panel ][vertical timeline shortcode][/tds-verticaltimeline-panel]
 */

class tdf_verticaltimeline_panel_shortcode {
	static $add_script;
	static $shortcode_used = false;
	static $HAS_SHORTCODE_KEY = '_has_tds-verticaltimeline-panel_shortcode';

	static function init() {
		add_shortcode('tds-verticaltimeline-panel', array( __CLASS__, 'tdf_verticaltimeline_panel_shortcode_handle'));
	}

	static function tdf_verticaltimeline_panel_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract( shortcode_atts(
				array(
					'bgcolor1' => '#6CBFEE',
					'bgcolor2' => '#3594CB',
					'timefontsize'=>'45px',
					'titlecolor' => '#ffffff'
				), $atts)
			);

		static $inc = 0;
		$inc++;
		$qtID = "vt-" . $inc;
		$output = '';
		$output .= '<style type="text/css" scoped>
						#'.$qtID.' > li .cbp_tmlabel,
						#'.$qtID.' > li .cbp_tmicon  {
							background:'.$bgcolor2.';
						}
						#'.$qtID.' > li .cbp_tmlabel:after {
							border-right-color:'.$bgcolor2.';
						}
						#'.$qtID.' > li .cbp_tmtime span:last-child  {
							color:'.$bgcolor2.';
						}
						#'.$qtID.' > li:nth-child(2n+1) .cbp_tmtime span:last-child {
							color:'.$bgcolor1.';
						}
						#'.$qtID.' > li:nth-child(odd) .cbp_tmlabel,
						#'.$qtID.':before {
							background:'.$bgcolor1.';
						}
						#'.$qtID.' > li:nth-child(odd) .cbp_tmlabel:after {
							border-right-color:'.$bgcolor1.';
						}
						#'.$qtID.' > li .cbp_tmicon {
							box-shadow: 0 0 0 8px '.$bgcolor1.';
						}
						#'.$qtID.' > li .cbp_tmtime span:last-child {
							font-size:'.$timefontsize.';
						}
						#'.$qtID.' .cbp_tmlabel h2 {
							color:'.$titlecolor.';
						}
					</style>';
		$output .= '<ul id="'.$qtID.'" class="cbp_tmtimeline">';
		$output .= do_shortcode( $content );
		$output .= '</ul>';

		return $output;

	}
}

tdf_verticaltimeline_panel_shortcode::init();

/*
 * A vertical timeline shortcode
 * Usage: 	[tds-verticaltimeline title="Title here" date="01/01/2013" time="00:00" icon="icon-calendar"]Content here[/tds-verticaltimeline]
 */
class tdf_verticaltimeline_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tds-verticaltimeline', array(__CLASS__, 'tdf_verticaltimeline_shortcode_handle'));
		add_filter('the_posts', array( __CLASS__, 'conditionally_add_scripts_and_styles' ) ); // the_posts gets triggered before wp_head
		add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 5 );
	}

	static function tdf_verticaltimeline_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract( shortcode_atts(
				array(
					'title' => 'Title here',
					'date' => '',
					'time' => '',
					'icon' => 'icon-time',

				), $atts)
			);

		$output = 	'<li>
						<time class="cbp_tmtime"><span>'.$date.'</span> <span>'.$time.'</span></time>
							<div class="cbp_tmicon '.tds_get_fontawsomeicontag($icon,null,null,true).'"></div>
							<div class="cbp_tmlabel">
								<h2>'.$title.'</h2>
								'.do_shortcode( $content ).'
							</div>
					</li>';

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

		add_shortcode( 'tds-verticaltimeline', array( __CLASS__, 'do_shortcode' ) );

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
			if (stripos($post->post_content, '[tds-verticaltimeline') !== false) {
				$shortcode_found = true;
				break;
			}
		}

		if ($shortcode_found) {
			wp_enqueue_style( 'vertical-timeline', plugins_url('css/vertical-timeline.css', __FILE__) );
			wp_enqueue_script( 'vertical-timeline', plugins_url('js/shortcode-vertical-timeline.min.js', __FILE__), array('jquery'), '', true);
		}

		return $posts;
	}

}

tdf_verticaltimeline_shortcode::init();


?>