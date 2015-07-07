<?php

/*
 * An image shortcode which literally put all the content inside the box.
 * Usage: [tds-boxed] content [tds-boxed]
 */

class tds_icongrid_shortcode {
	static $add_script;
	static $inc = 0;

	static function init() {

		add_shortcode( 'tds-icongrid-panel', array( __CLASS__, 'tdshortcode_icongridpanel' ) );
		add_shortcode( 'tds-icongrid', array( __CLASS__, 'tdshortcode_icongrid' ) );

		add_filter('the_posts', array( __CLASS__, 'conditionally_add_scripts_and_styles' ) ); // the_posts gets triggered before wp_head
		add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 5 );
	}

	static function tdshortcode_icongridpanel( $atts, $content = null ) {
		extract( shortcode_atts(
					array(
						'color' => '#47a3da',
						'columns' => '3',
						'iconsize' => '4em',
					), $atts)
				);

		$inc++;
		$igID = "icongrid-" . $inc;
		$output = '';
		$colClass = '';
		if ($columns == 4){
			$colClass = 'gridcol4';
		}elseif($columns == 5) {
			$colClass = 'gridcol5';
		}

		$output .= '<style type="text/css" scoped>
						#'.$igID.' li > a,
						#'.$igID.' li > a h3 {
							color:'.$color.';
						}
						#'.$igID.' li > a:hover{
							background-color:'.$color.';
						}
						#'.$igID.' .cbp-ig-title:before {
							background-color:'.$color.';
						}
						#'.$igID.' li > a:hover {
							color:'.$color.';
						}
						#'.$igID.' .cbp-ig-icon:before{
							font-size:'.$iconsize.' !important;
						}
					</style>';
		$output .= '<ul id="'.$igID.'" class="cbp-ig-grid '.$colClass.'">';
		$output .= do_shortcode( $content );
		$output .= '</ul>';

		return $output;
	}

	static function tdshortcode_icongrid( $atts, $content = null, $tag ) {
		extract( shortcode_atts(
					array(
						'link' => '#',
						'icon' => '',
						'title' => 'Title Here',
						'subtitle' => 'Sub Title'
					), $atts)
				);

		$output = '<li><a href="'.$link.'">'.tds_get_fontawsomeicontag($icon,'cbp-ig-icon').'<h3 class="cbp-ig-title">'.$title.'</h3><span class="cbp-ig-category">'.$subtitle.'</span></a></li>';

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

		add_shortcode( 'tds-icongrid-panel', array( __CLASS__, 'tdshortcode_icongridpanel' ) );
		add_shortcode( 'tds-icongrid', array( __CLASS__, 'tdshortcode_icongrid' ) );

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
			if (stripos($post->post_content, 'tds-icongrid') !== false) {
				$shortcode_found = true;
				break;
			}
		}

		if ($shortcode_found) {
			wp_enqueue_style( 'icongrid', plugins_url( 'css/icon-grid.css', __FILE__ ) );
		}

		return $posts;
	}

}

tds_icongrid_shortcode::init();

?>