<?php

/*
 * An expanding posts
 * Usage: [tds-expanding-posts limit="6"]
 */
class tds_expandingposts_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tds-expanding-posts', array(__CLASS__, 'tds_expandingposts_shortcode_handle'));

		add_filter( 'the_posts', array( __CLASS__, 'conditionally_add_scripts_and_styles' ) ); // the_posts gets triggered before wp_head
		//add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 5 );
	}

	static function tds_expandingposts_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract(shortcode_atts(array(
			'category' 	=> '',
			'limit' 	=> '6',
			'lines'		=> 5,
			'orderby' 	=> 'date',
			'showmeta' 	=> 'yes',
			'imagesize' => 'large',
			'height'	=> null,
			'separator' => ' ',

			'background' => '#FFFFFF',
			'color' => '#000000',
			'titlecolor' => '#FFFFFF',
			'linkcolor' => '#079BEB',
			'linkhover' => '#666666',
			'buttoncolor' => '#e5e5e5',
			'buttonhovercolor' => '#e5e5e5',
			'buttontextcolor' => '#000000',
			'buttontexthovercolor' => '#666666',
			'hoveroverlay' => '#000000',
			'opacity' => '85'
		), $atts));

		$limit = intval($limit);

		static $ID = 0;
		$ID++;
		$iemenuID = "expanding-posts-" . $ID;

		$textcolor = $color;
		$color = tds_hex2rgb($hoveroverlay);
		$color['alpha'] = 0;
		$hOverlay = tds_color2rgba($color);
		$color['alpha'] = $opacity/100;
		$HOverlay = tds_color2rgba($color);

		$style = '<style type="text/css" scoped>
					#'.$iemenuID.', #'.$iemenuID.' .slider-info {
						background: '.$background.';
						color: '.$textcolor.';
					}
					#'.$iemenuID.' .slide-closed .slider-bg {
						background: '.$hoveroverlay.';
						background-color: '.$hOverlay.';
					}
					#'.$iemenuID.' .slide-closed:hover .slider-bg {
						background-color: '.$hoveroverlay.';
						background-color: '.$HOverlay.';
					}
					#'.$iemenuID.' .slide .ep-item-eye, #'.$iemenuID.' .slide.slide-open .ep-item-eye, #'.$iemenuID.' .slide.slide-open:hover .ep-item-eye {
						color: '.$titlecolor.';
					}
					#'.$iemenuID.' .ep-item-title {
						color: '.$titlecolor.';
					}
					#'.$iemenuID.' a {
						color: '.$linkcolor.';
					}
					#'.$iemenuID.' a:hover {
						color: '.$linkhover.';
					}
					#'.$iemenuID.' .button {
						background: '.$buttoncolor.';
						color: '.$buttontextcolor.';
						border-color: '.$buttoncolor.';
						-moz-box-shadow: none;
						-webkit-box-shadow: none;
						box-shadow: none;
					}
					#'.$iemenuID.' .button:hover {
						background: '.$buttonhovercolor.';
						color: '.$buttontexthovercolor.';
						border-color: '.$buttonhovercolor.';
						-moz-box-shadow: none;
						-webkit-box-shadow: none;
						box-shadow: none;
					}
				</style>';

		$output = '';
		$index = 0;

		$args = $category === '' || $category === 'all' ? array('category_name' => '') : array('category_name' => $category);

		if ( $orderby == 'random' ) {
			$orderby = 'rand';
		} elseif ( $orderby == 'popular' ) {
			$orderby = 'comment_count';
		} else {
			$orderby = 'date';
		}

		$imagesize = $imagesize === 'small' ? 'thumbnail' : $imagesize;

		$imgclass =  $imagesize === 'thumbnail' || $imagesize === 'medium' ? $imagesize . ' left-align' : '';

		$queryargs = array(
			'posts_per_page'   		=> $limit,
			'no_found_rows'   		=> true,
			'post_status'    		=> 'publish',
			'ignore_sticky_posts'  	=> true,
			'order'     			=> 'desc',
			'orderby'     			=> $orderby
		);

		$queryargs = array_merge( $queryargs, $args );


		$r = new WP_Query( apply_filters( 'tds_expandingposts_args', $queryargs, $atts ) );

		if ( $r->have_posts() ) {

			$output .= '<ul class="ep-items">' . "\n";

			while ( $r->have_posts() ) {
				$r->the_post();
				$index++;

				$output .= '<li class="ep-item">';
				if( has_post_thumbnail() ) {
					$output .=	'<span class="ep-item-preview">' . get_the_post_thumbnail( null, $imagesize, array( 'class' => $imagesize . ' preview-thumb left-align' ) ) . '</span>' . "\n";
					$output .= is_null($height) ? get_the_post_thumbnail( null, $imagesize, array( 'class' => $imagesize . ' item-img left-align' ) ) : get_the_post_thumbnail( null, 'full', array( 'class' => 'full item-img left-align', 'style' => 'height:' . $height . 'px;' ) );
				} else {
					$output .=	'<span class="ep-item-nopreview">' . get_the_post_thumbnail( null, $imagesize, array( 'class' => $imagesize . ' preview-thumb left-align' ) ) . '</span>' . "\n";
				}

				$output .= '<span class="item-index"> 0' . $index . '</span>' . "\n";

				// =Post Meta - the category
				$output .= '<div class="slider-meta">' . "\n";

				if ( $showmeta == 'yes' ) {
					$categories = get_the_category();
					$thecats = '';
					if($categories){
						foreach($categories as $category) {
							$thecats .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
						}
						$output .= '<small class="ep-meta-category">' . trim($thecats, $separator) . "</small>\n";
					}

				}

				// =Post Title
				$output .= '<h6 class="ep-item-title">' . get_the_title() . '</h6>' . "\n";

				// =Post Meta - the Author
				if ( $showmeta == 'yes' ) {
					$output .= '<span class="ep-meta-author">' . get_the_author() . '</span>';
				}

				// =Post Meta - the Date
				if ( $showmeta == 'yes' ) {
					$output .= '<small class="ep-meta-date"><em><i class="fa fa-clock-o"></i> ' . get_the_date() . '</em></small>';
				}

				$output .= '</div>' . "\n";

				$output .= '<div class="slider-bg"><span class="ep-item-eye"><i class="fa fa-eye fa-2x"></i></span></div>' . "\n";

				// =Post Content
				$output .= '<div class="slider-info">' . "\n";

				//
				// =Above Post Content Meta
				$output .= '<div class="ep-item-entry-meta">' . "\n";

				// =Post Meta - the Author
				if ( $showmeta == 'yes' ) {
					$output .= '<div><span>' . get_the_author() . '</span><span>' . __('AUTHOR', 'tdshortcodes') . "</span></div>";
				}

				// =Post Meta - the Date
				if ( $showmeta == 'yes' ) {
					$output .= '<div><span>' . get_the_date() . '</span><span>' . __('DATE', 'tdshortcodes') . "</span></div>";
				}

				// The categories
				if ( $showmeta == 'yes' ) {
					$categories = get_the_category();
					$thecats = '';
					if($categories){
						foreach($categories as $category) {
							$thecats .= $category->cat_name . $separator;
						}
						$output .= '<div><span>' . trim($thecats, $separator) . '</span><span>' . __('CATEGORY', 'tdshortcodes') . "</span></div>\n";
					}

				}

				$output .= '</div>' . "\n";

				$output .= '<div class="ep-item-entry">' . "\n";
				// =Post entry title
				$output .= '<h4 class="ep-item-title"><a  class="post-title" href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h4>' . "\n";

				// =Post content entry
				$output .= '<div class="ep-item-content"><p>'. get_the_excerpt() . '</p><p class="ep-item-readmore"><a title="'. esc_attr( sprintf( __( 'Permalink to %s', 'tdshortcodes' ), the_title_attribute( 'echo=0' ) ) ) . '" href="'.get_permalink().'" class="button" rel="bookmark">' . __('Read More', 'tdshortcodes')  . '</a></p></div>' . "\n" . '</div>'. "\n" . '</div>'. "\n";
				$output .= '</li>' . "\n";
			}

			$output .= '</ul>' . "\n";

		} else {
			$output .= '<p class="no-posts">' . __( 'No posts found.', 'tdshortcodes' ) . '</p>';
		}

		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		$output  = '<div id="'.$iemenuID.'" class="expanding-posts" data-lines="' . $lines . '">' . "\n" . $output . "\n" . $style . "\n" . '</div>';

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

		add_shortcode('tds-expanding-posts', array(__CLASS__, 'tds_expandingposts_shortcode_handle'));

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
			if (stripos($post->post_content, '[tds-expanding-posts') !== false) {
				$shortcode_found = true;
				break;
			}
		}

		if ($shortcode_found) {
			wp_enqueue_style( 'expandingposts', plugins_url( 'css/expandingposts.css', __FILE__ ) );
			wp_enqueue_script( 'jquery-easing', TDS_PLUGIN_URL . 'js/jquery.easing.1.3.js', '', '', true );
			wp_enqueue_script( 'expandingposts', plugins_url('js/shortcode-expandingposts-min.js', __FILE__), '', '', true );
		}

		return $posts;
	}
}

tds_expandingposts_shortcode::init();

?>