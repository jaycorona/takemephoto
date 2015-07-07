<?php

/*
 * An archive shortcode
 * Usage: [tds-archive category|tag|date|author category="all" number="10" orderby="latest" showmeta="yes"]
 */
class tds_archive_shortcode {

	static function init() {
		add_shortcode( 'tds-archive', array( __CLASS__, 'tds_archive_shortcode_handle' ) );
		add_filter( 'the_posts', array( __CLASS__, 'conditionally_add_scripts_and_styles' ) );
		//add_filter( 'the_content', array( __CLASS__, 'tds_prerun'), 5 );
	}

	static function tds_archive_shortcode_handle( $atts, $content = null ) {

		$is_archive = array( 'category', 'tag', 'author', 'date' );

		$type = tdshortcode_validate_type( $atts, $is_archive, 'category' );

		extract( shortcode_atts(
				array(
					'category' => '',
					'number' => '10',
					'orderby' => 'date',
					'showmeta'  => 'yes',
				), $atts )
			);

		$post_size = 'small';
		$post_size_thumbs = 'post-excerpt-grid';
		$post_image_gallery = '';

		$output = '<div class="tds-archive theme-excerpts grid-archive">';

		if ( $category == '' || $category == 'all' ) {
			$args = array( 'category_name' => '');
		} else {
			$args = array( 'category_name' => $category );
		}

		if ( $orderby == 'random' ) {
			$orderby = 'rand';
		} elseif ( $orderby == 'popular' ) {
			$orderby = 'comment_count';
		} else {
			$orderby = 'date';
		}

		$queryargs = array(
			'posts_per_page'   		=> $number,
			'no_found_rows'   		=> true,
			'post_status'    		=> 'publish',
			'ignore_sticky_posts'  	=> true,
			'order'     			=> 'desc',
			'orderby'     			=> $orderby
		);

		$queryargs = array_merge( $queryargs, $args );

		$r = new WP_Query( apply_filters( 'tds_archive_args', $queryargs, $atts ) );

		if ( $r->have_posts() ) {

			while ( $r->have_posts() ) {
				$r->the_post();

				$odd_even = ( ($r->current_post + 1) % 4 == 0) ? 'grid box-three fit' : 'grid box-three';
				$class = get_post_class( array( 'item', $odd_even ) );

				$output .= '<article id="post-' . get_the_ID() . '" class="' . implode( ' ', $class ) . '">';
				$output .= '<div class="item-wrap">';

				$output .= '<div class="preview-image">';

				if ( has_post_thumbnail() ) {

					$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');

					$output .= '<div class="item-image">';
					$output .= '<a data-rel="prettyPhoto" href="' . $large_image_url[0] . '" title="' . get_the_title() . '">';
					$output .= get_the_post_thumbnail( null, $post_size_thumbs, array( 'class' => $imagesize . ' ' ) );
					$output .= '</a>';

					$icon = tds_get_post_format();
					$post_format = false === get_post_format() ? 'Standard' : ucfirst(get_post_format());

					$output .= '
						<div class="item-image-hover">
							<div class="item-image-wrap">
								<div>
								<a class="' . $icon . '"  href="#" title="' . get_the_title() . '" rel="bookmark" target="_blank"></a>
								<a data-rel="prettyPhoto" class="fa fa-arrows-alt" href="' . $large_image_url[0] . '" title="View larger image"></a>
								<a class="fa fa-share"  href="' . esc_url(get_permalink()) . '" title="Open in new tab" rel="bookmark" target="_blank"></a>
								</div>
							</div>
						</div>
					';
					$output .= '</div>';

				} else {

					$output .= '<div class="item-image no-thumbnail"><img width="450" height="300" src="' . TDS_PLUGIN_URL . '/images/blank-thumb-grid.png" alt="no thumbnail" title="' . get_the_title() . '"></div>';

				}

				$output .= '</div>'; //<!-- .preview-image -->

				$output .= '<div class="item-content">';
				$output .= '<header class="entry-header">';
				$output .= '<h5 class="entry-title"><a href="' . esc_url(get_permalink()) . '" title="' . esc_attr(get_the_title()) . '" rel="bookmark">' . esc_attr(get_the_title()) . '</a></h5>';

				if ( 'yes' === $showmeta || 'YES' === $showmeta || 'true' === $showmeta || 'TRUE' === $showmeta ) {
					$output .= '<div class="entry-meta">';
					$output .= '<span class="date"><a href="' . esc_url(get_permalink()) . '" title="' . __('Permalink to ', 'tdshortcodes') . esc_attr(get_the_title()) . '" rel="bookmark"><time class="entry-date" datetime="' . get_the_date( 'c' ) . '">' . get_the_date() . '</time></a></span>';
					$output .= ' &bull; <span class="author vcard">' . __( 'by', 'tdshortcodes' ) . ' <a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . __('View all posts by ', 'tdshortcodes') . get_the_author() . '" rel="author">' . get_the_author() . '</a></span>';
					$output .= '</div>';
				}

				$output .= '</header>'; //<!-- .entry-header -->
				$output .= '<div class="entry-summary"><p>' . get_the_excerpt() . '</p><p><a href="' . esc_url(get_permalink()) . '" title="' . esc_attr(get_the_title()) . '"  rel="bookmark"><span>' . __('Read more', 'tdshortcodes' ) . ' <i class="fa fa-angle-double-right"></i></span></a></p></div>';
				$output .= '</div>'; //<!-- .item-content -->

				$output .= '</div>'; //<!-- .item-wrap -->
				$output .= '<div class="clear"></div>';
				$output .= '</article>'; //<!-- #post-' . get_the_ID() . ' -->
			}

			wp_reset_postdata();

		} else {
			$output .= '<p> ' . __( 'No entries yet for the category', 'tdshortcodes' ) . ' <strong>"' . $category . '"</strong>.</p>';
		}

		$output .= '</div>';

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

		add_shortcode( 'tds-archive', array( __CLASS__, 'tds_archive_shortcode_handle' ) );

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
			if (stripos($post->post_content, '[tds-archive') !== false) {
				$shortcode_found = true;
				break;
			}
		}

		if ($shortcode_found) {
			wp_enqueue_style( 'grid-custom', TDS_PLUGIN_URL . '/inc/css/grid-custom.css' );
			//wp_enqueue_script( 'animate-this', plugins_url('js/animate-this.min.js', __FILE__), array('jquery'), '', true);
		}

		return $posts;
	}

}
tds_archive_shortcode::init();