<?php

/*
 * ThemeDutch Carousel - Accordion-like Thumbnail Slider
 * Usage: [thumbnailslider category=all number=15]
 */

class tdf_thumbnail_slider_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tds-thumbnailslider', array(__CLASS__, 'tdf_thumbnail_slider_shortcode_handle'));

		add_action('init', array(__CLASS__, 'register_script'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));
	}

	static function tdf_thumbnail_slider_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract( shortcode_atts(
					array(
						'category'  => '',
						'number'  => '15',
						'words'      => '15',
						'background' => '#FFF',
						'textcolor'  => '#000',
						'orderby'  => 'date',
						'bordersize' => '',
						'bordercolor' => '',
						'post_type' => '',
					), $atts)
				);

		$number = intval( $number );
		$count = intval( $words ) + 1;
		static $inc = 0;
		$inc++;
		$itemID = "tabsPnl" . $inc;

		$output = '';

		if ( $category == '' || $category == 'all' ){
			$args = array('category_name' => '');
		}else{
			if($post_type == 'product'){
				$args = array('product_cat' => $category);
			}else{
				$args = array('category_name' => $category);
			}
		}
		$queryargs = array(
			'posts_per_page'   		=> $number,
			'no_found_rows'   		=> true,
			'post_status'    		=> 'publish',
			'ignore_sticky_posts'  	=> true,
			'order'     			=> 'desc',
			'orderby'     			=> 'date',
			'post_type' 			=> $post_type,
		);
		$queryargs = array_merge( $queryargs, $args );


		$r = new WP_Query( apply_filters( 'tdshortcode_thumbnail_slider_args', $queryargs, $atts ) );
		$i = 1;

		if ( $r->have_posts()) {

			$output .= '<div class="tds-thumbslider" id="'.$itemID.'" style="border-width: '.$bordersize.'; border-color: '.$bordercolor.';"><div style="color:'.$textcolor.';" class="buttons prev">'.tds_get_fontawsomeicontag('chevron-left').'</div><div class="viewport" style="background:' . $background . '; "><ul class="overview">';
			while ( $r->have_posts() ) {

				$r->the_post();
				if( has_post_thumbnail() ) {

						if( $i<=1 ) {
							$output .= '<li class="lastblock">';
							$i++;
						} else {
							$output .= '<li>';
						}

					$output .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '" >';
					$output .= get_the_post_thumbnail( null, 'thumbnail', array( 'class' => 'tds-thumbs thumbs alignnone' ) );
					$output .= '</a>';

					$output .= '<div class="item-wrap"><h6 style="color:' . $textcolor . ';" class="item-title">' . get_the_title() . '</h6>';


					$output .= '<p style="color:'.$textcolor.';">' . tdshortcodes_limited_excerpt( $count ).' <a href="' . get_permalink() . '">' . __('read more', 'tdshortcodes' ) . ' &rarr;</a></p>';

					$output .= '</div></li>';
				}
			}
			$output .= '</ul></div><div style="color:'.$textcolor.';" class="buttons next">'.tds_get_fontawsomeicontag('chevron-right').'</div></div>';

			/*$output .= '<div class="tds-styleblk"><style type="text/css">
							#'.$itemID.'.tds-thumbslider {
								border-width: '.$bordersize.';
								border-color: '.$bordercolor.';
							}
						</style></div>';*/
		} else {
			$output .= '<p>' . __('No posts found.', 'tdshortcodes') . '</p>';
		}

		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		return $output;

	}

	static function register_script() {
		//wp_register_script('tinycarousel', plugins_url('js/tinycarousel.min.js', __FILE__), array('jquery'), '', true);
		wp_register_script('thumbnail-slider', plugins_url('js/shortcode-thumbnail-slider.min.js', __FILE__), array('jquery'), '', true);
	}

	static function print_script() {
		if ( ! self::$add_script )
			return;

		wp_print_scripts('thumbnail-slider');
		//wp_print_scripts('tinycarousel');
	}
}

tdf_thumbnail_slider_shortcode::init();

?>