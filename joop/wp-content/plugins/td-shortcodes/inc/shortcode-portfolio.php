<?php

/*
 * A portfolio shortcode
 * Usage: [portfolio ]
 */

class tdf_portfolio_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tds-portfolio', array(__CLASS__, 'tdf_portfolio_shortcode_handle'));

		add_filter( 'the_posts', array( __CLASS__, 'conditionally_add_scripts_and_styles' ) ); // the_posts gets triggered before wp_head
		add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 5 );
	}

	static function tdf_portfolio_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract(shortcode_atts(array(
		'category' => '',
		'number' => '15',
	), $atts));
	$number = intval($number);

	$output = '';
	$raw_category = $category != '' ? trim($category) : '';

	if ( $category == '' || $category == 'all') :
		$args = array('category_name' => '');
	else :
		$args = array('category_name' => $category);
	endif;

	$queryargs = array(
			'posts_per_page' 		=> $number,
			'no_found_rows' 		=> true,
			'post_status' 			=> 'publish',
			'ignore_sticky_posts' 	=> true,
			'order'					=> 'desc',
			'orderby' 				=> 'date'
		 );
	$queryargs = array_merge($queryargs, $args );

	$r = new WP_Query( apply_filters( 'core_shortcode_portfolio_layout_args', $queryargs, $atts ) );
	$html_thumbnails ="";
	
	if ($r->have_posts()) {

		$index = 0;
		
		$categories = array();
		if ( $r->have_posts() ) {

			while ($r->have_posts()) {
				$r->the_post();
				global $post;
				$file_data = array();
				$permalink = get_permalink();
				$category = get_the_category();
				$attachment_id = get_post_thumbnail_id();
				$file_data = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large') ;
				$height =  $file_data[2];
				//if( !get_the_post_thumbnail())  continue;
					//if(!in_array($cat->name,$categories)) $categories[$cat->slug] = $cat->name;
					$class_categories = array();
					foreach($category as $thecategory){
						$class_categories[] = $thecategory->slug;
					}

					$html_thumbnails .= '<div class="portfolio-item animate fadeIn ';
					$html_thumbnails .= ! get_the_post_thumbnail() ? ' no-image ' : ' imgLiquidFill imgLiquid ';
					$html_thumbnails .= implode(" ",$class_categories) . '">' . "\n" . '<a class="item-link" href="' . $permalink . '" data-post-id="' . get_the_ID() . '">';

					$html_thumbnails .= ! get_the_post_thumbnail() ? '' : '<div class="item-image"><img src="' . $file_data[0] . '" alt=""></div>' . "\n";

					$html_thumbnails .='
		                <div class="item-desc">
		                   <p>'.get_the_title().'</p>
		                   <p><small>' . implode(" &bull; ",$class_categories) . '</small></p>
		                </div>
		                </a>
					</div>
					';
			}

		}

	}

	// Reset the global $the_post as this query will have stomped on it
	wp_reset_postdata();

	$output = '<div class="tds-portfolio portfolio-block">' . "\n" . '<div class="navi">' . "\n" . '<div class="previous nav"><i class="fa fa-chevron-circle-left"></i></div>' . "\n" . ' <div class="close nav"><i class="fa fa-times-circle"></i></div> ' . "\n" . ' <div class="next nav"><i class="fa fa-chevron-circle-right"></i></div>' . "\n" . '</div>' . "\n" . '<div id="portfolio-content-ajaxified"  class="portfolio-content-ajaxified"></div>';

	$category_label = explode(",",$raw_category);
	$raw_category = "";
	if(count($category_label) > 1 || $raw_category == "all"){

		$output .= '<div id="categories" class="portfolio-cat">' . "\n" . '<ul class="portfolio-filter"  data-option-key="filter">' . "\n" . '<li><a href="#" data-option-value="*">All</a></li>' . "\n" ;
		foreach($category_label as $index=>$name) {
			if(strtolower($name) == "all"  || $name == "" ) continue;
			$output .= '<li><a href="#" data-option-value="'.strtolower(str_replace(" ","-",$name)).'"> '.ucwords(str_replace("-"," ",$name)).'</a></li>';
		}

		$output .= '</ul>' . "\n" . '</div>';

	}
	$output .=	'
						<div class="portfolio-grid-container">
								<div id="grids" class="portfolio-grid">'. $html_thumbnails . '</div>
							</div>
						</div>		';

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

		add_shortcode('tds-portfolio', array(__CLASS__, 'tdf_portfolio_shortcode_handle'));

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
			if (stripos($post->post_content, '[tds-portfolio') !== false) {
				$shortcode_found = true;
				break;
			}
		}

		if ($shortcode_found) {
			wp_enqueue_style( 'expandingposts', plugins_url( 'css/expandingposts.css', __FILE__ ) );
			//wp_enqueue_script('mason', plugins_url('js/mason.min.js', __FILE__), array('jquery'), '1.5', true);
			//wp_enqueue_script('imgLiquid', plugins_url('js/imgLiquid-min.js', __FILE__), array('jquery'), '0.9.944', true);
			//wp_enqueue_script('scrollTo', plugins_url('js/jquery.scrollTo.min.js', __FILE__), array('jquery'), '1.4.7', true);
			wp_enqueue_script('tdf-portfolio', plugins_url('js/shortcode-portfolio.min.js', __FILE__), array('jquery'), '', true);
		}

		return $posts;
	}
}

tdf_portfolio_shortcode::init();

?>