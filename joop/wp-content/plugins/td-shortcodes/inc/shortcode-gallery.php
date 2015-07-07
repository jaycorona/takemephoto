<?php

/*
 * An Image gallery shortcode
 * Usage: [tds-gallery]
 */
class tds_gallery_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tds-gallery', array(__CLASS__, 'tds_gallery_shortcode_handle'));

		add_action('init', array(__CLASS__, 'register_script'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));
	}

	static function tds_gallery_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract( shortcode_atts(
				array(
					'columns' => 4,
				), $atts )
			);

		// SUpported column types
		$column = intval( $columns );

		if ( $columns == 2 )
			$column_class = 'grid col-six';
		else if ( $columns == 3 )
				$column_class = 'grid col-four';
			else if ( $columns == 4 )
					$column_class = 'grid col-three';
				else if ( $columns == 6 )
						$column_class = 'grid col-two';
					else
						return 'grid col-four';

		$image_list = array();
		// Extract image tags
		preg_match_all( '/<img[^>]+>/i', $content, $image_list );

		// Output gallery list
		//$id = core_get_uuid( 'gallery' );
		static $inc = 0;
		$inc++;
		$itemID = "imggallery-" . $inc;

		$id = $itemID;

		$index = 0;
		$output = '<ul class="tds-gallery">';

		foreach( $image_list[0] as $image ) {
			$imgcontent = new DOMDocument();
			@$imgcontent->loadHTML($image);
			$description = '';
			$imageTags = $imgcontent->getElementsByTagName('img');

			foreach($imageTags as $tag) {
				$description =  $tag->getAttribute('description');
			}
			$index += 1;

			if ( $index == $columns ) {
				$column_last = ' fit';
				$index = 0;
			} else {
				$column_last = '';
			}

			unset( $width );
			unset( $height );
			$alt = '';
			$title = '';

			// Extract attributes
			preg_match_all( '/(src|alt|title|width|height)=("[^"]*")/i', $image, $attribs );
			$attrs = array_combine( $attribs[1], $attribs[2] );
			foreach( $attrs as $key => $value )
				$attrs[$key] = substr( $value, 1, -1);

			extract( $attrs );

			// Default thumb size
			// base 200 x 150
			if ( ! isset( $width ) )
				if ($columns == 2){
					$width = '600';
				}else if ($columns == 3){
					$width = '450';
				}else if ($columns == 4){
					$width = '280';
				}else{
					$width = '200';
				}
			/*if ( ! isset( $height ) )
				if ($columns == 2){
					$height = '450';
				}else if ($columns == 3){
					$height = '338';
				}else if ($columns == 4){
					$height = '210';
				}else{
					$height = '150';
				}*/
			if(!empty($description)){
				$description = $description;
			}else if(!empty($alt)){
				$description = $alt;
			}else{
				$description = '';
			}
			$attachment_id = tds_get_attachment_id($src);
			$imgthumbset=array();
			$imgthumb = '';

			if($attachment_id == null){
				$imgthumb = $src;
			}else{
				if($columns >=5){
					$imgthumbset = wp_get_attachment_image_src( $attachment_id, 'thumbnail');
					$imgthumb = $imgthumbset[0];
				}else{
					$imgthumb = $src;
				}
			}

			// Output list item
			/*height removed due to column 100% width will not adjust the height*/
			//$output .= '<li class="' . $column_class . $column_last . '" style="height: '.$height.'px; max-height: 450px;"><a href="' . $src . '" data-rel="prettyPhoto[' . $id . ']" title="' . $description . '">';
			$output .= '<li class="' . $column_class . $column_last . '" ><a href="' . $src . '" data-rel="prettyPhoto[' . $id . ']" title="' . $description . '">';

			$output .= '<img src="' . $src. '" alt="' . $description . '" title="' . $title . '" />';
			//$output .= '<img src="' . tdshortcodes_generate_thumbnail( $src, $width, $height, true ) . '" alt="' . $description . '" title="' . $title . '" />';
			$output .= '</a></li>';
		}
		$output .= '</ul>';

		/*$output .= '<script type="text/javascript">
				jQuery(document).ready(function(){
					jQuery("ul.tds-gallery a[data-rel^=\'prettyPhoto\']").prettyPhoto();
				});
		</script>';*/
		return $output;
	}

	static function register_script() {
		wp_register_script('prettyPhoto', TDS_PLUGIN_URL . 'js/prettyPhoto/jquery.prettyPhoto.js', '', '', true);
	}

	static function print_script() {
		if ( ! self::$add_script )
			return;

		//wp_print_scripts('prettyPhoto');
		//wp_print_scripts('imgLiquid');
	}
}

tds_gallery_shortcode::init();

?>