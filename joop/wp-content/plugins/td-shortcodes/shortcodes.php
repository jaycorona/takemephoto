<?php

if ( ! defined( 'TDS_VERSION' ) )
	die();


// Disable wpautop
// remove_filter('the_content', 'wpautop');
// Pre run the shorcodes first before wp_autop() and wp_textuarize()
function tdshortcode_prerun( $content ) {
	global $shortcode_tags;

	// Backup current registered shortcodes and clear them all out
	$orig_shortcode_tags = $shortcode_tags;
	$shortcode_tags = array();
	remove_all_shortcodes();

	add_shortcode( 'tds-columns', 'tdshortcode_columns' );
	add_shortcode( 'tds-column', 'tdshortcode_column' );
	add_shortcode( 'tds-customcolumns', 'tdshortcode_custom_columns' );
	add_shortcode( 'tds-toggle', 'tdshortcode_toggle' );
	add_shortcode( 'tds-togglecontent', 'tdshortcode_toggle_content' );
	add_shortcode( 'tds-tabs', 'tdshortcode_tabs' );
	add_shortcode( 'tds-tab', 'tdshortcode_tab' );
	add_shortcode( 'tds-notify', 'tdshortcode_notify' );
	add_shortcode( 'tds-header', 'tdshortcode_heading' );
	add_shortcode( 'tds-divider', 'tdshortcode_divider' );
	add_shortcode( 'tds-separator', 'tdshortcode_separator' );
	add_shortcode( 'tds-button', 'tdshortcode_button' );

	add_shortcode( 'tds-pricetable', 'tdshortcode_tdpricetable' );
	add_shortcode( 'tds-pricetable_column', 'tdshortcode_tdpricetable_column' );
	add_shortcode( 'tds-pricetable_content', 'tdshortcode_tbpricetable_content' );
	add_shortcode( 'tds-pricetable_button', 'tdshortcode_tdpricetable_button' );
	//add_shortcode( 'tds-icongrid-panel', 'tdshortcode_icongridpanel' );
	//add_shortcode( 'tds-icongrid', 'tdshortcode_icongrid' );
	add_shortcode( 'tds-code', 'tdshortcode_code' );


	// Do the shortcode (only the one above is registered)
	$content = do_shortcode( $content );

	// Put the original shortcodes back
	$shortcode_tags = $orig_shortcode_tags;

	return $content;
}
add_filter( 'the_content', 'tdshortcode_prerun', 5 );


/* Animation effects
================================================== */
$tdshortcode_animation_effect  = array(
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

/* All other shortcodes
================================================== */

/* Animated Icon Grid - separate file
 -------------------------------------------------------------- */

/* Animated images - separate file
 -------------------------------------------------------------- */

/* Buttons
 -------------------------------------------------------------- */
add_shortcode( 'tds-button', 'tdshortcode_button' );
add_shortcode( 'tds-buttonslidedown', 'tdshortcode_buttonslidedown' );
add_shortcode( 'tds-buttontransparent', 'tdshortcode_buttontransparent' );

// Button
// [button small|medium|large link="" icon=""]
//
$tdshortcode_button_sizes  = array('small', 'medium', 'large', 'xlarge');
$tdshortcode_button_colors = array('blue', 'red', 'orange', 'yellow', 'green', 'olive', 'purple', 'pink', 'brick', 'gold', 'brown', 'silver', 'gray', 'black');
$tdshortcode_button_effects  = array('none', 'glidedown', 'slidedown');
function tdshortcode_button( $atts, $content=null, $tag ) {
	global $tdshortcode_button_sizes, $tdshortcode_button_colors, $tdshortcode_button_effects;
		extract( shortcode_atts(
				array(
					'scrollto' => '',
				), $atts)
			);
	$size  = tdshortcode_validate_type( $atts, $tdshortcode_button_sizes, 'medium' );
	$color = tdshortcode_validate_type( $atts, $tdshortcode_button_colors, 'default' );
	$effects = tdshortcode_validate_type( $atts, $tdshortcode_button_effects, 'slidedown' );
	$icon  = '';

	if ( isset( $atts['link'] ) ) {
		$link = $atts['link'];
		if(!empty($link)){
			$linkvar = parse_url($link);
			if($link == '#' && !empty($scrollto)) {
				$link = '#'.$scrollto;
			}elseif(isset($linkvar['fragment'])) {
				$link = $link;
			}
		}elseif(empty($link) && !empty($scrollto)){
			$link ='#'.$scrollto;
		}
	} else {
		$link = '/';
	}

	if ( isset( $atts['newwindow'] ) ) {
		$newwindow = $atts['newwindow'];
	} else {
		$newwindow = 'false';
	}

	if ( in_array( 'window', $atts ) || $newwindow =='true' || $newwindow =='yes') {
		$target = '_blank';
	} else {
		$target = '_self';
	}

	if ( isset( $atts['icon'] ) ) {
		$icon = tds_get_fontawsomeicontag($atts['icon']);
	}
	if ( isset( $atts['link'] ) ) {
		$link = $atts['link'];
		if(!empty($link)){
			$linkvar = parse_url($link);
			if($link == '#' && !empty($scrollto)) {
				$link = '#'.$scrollto;
			}elseif(isset($linkvar['fragment'])) {
				$link = $link;
			}
		}elseif(empty($link) && !empty($scrollto)){
			$link ='#'.$scrollto;
		}
	} elseif ( !isset( $atts['link'] ) && !empty($scrollto)  ) {
		$link ='#'.$scrollto;
	}else {
		$link = '/';
	}
	
	if ( 'none' == $effects  ) {
		return '<a href="' . $link . '"  target="' . $target . '" class="tds-button ' . $size . ' ' . $color . ' button">' . $icon . ' ' . do_shortcode( $content ) . '</a>';
	} else {
		return '<a href="' . $link . '"  target="' . $target . '" class="tds-button ' . $size . ' ' . $color . ' glidebutton button"><span>' . $icon . ' ' . do_shortcode( $content ) . '</span><span>' . $icon . ' ' . do_shortcode( $content ) . '</span></a>';
	}
}

// Button with SLide Down effect
function tdshortcode_buttonslidedown( $atts, $content=null, $tag ) {
	extract( shortcode_atts(
				array(
					'link' => '',
					'color' => '',
					'textcolor' => '',
					'colorhover' => '',
					'textcolorhover' => '',
					'bordercolor' => '#F9F9F9',
					'icon' => '',
					'scrollto' => '',
				), $atts )
			);
	global $tdshortcode_button_sizes;

	if ( isset( $atts['newwindow'] ) ) {
		$newwindow = $atts['newwindow'];
	} else {
		$newwindow = 'false';
	}

	if ( isset( $atts['link'] ) ) {
		$link = $atts['link'];
		if(!empty($link)){
			$linkvar = parse_url($link);
			if($link == '#' && !empty($scrollto)) {
				$link = '#'.$scrollto;
			}elseif(isset($linkvar['fragment'])) {
				$link = $link;
			}
		}elseif(empty($link) && !empty($scrollto)){
			$link ='#'.$scrollto;
		}
	} elseif ( !isset( $atts['link'] ) && !empty($scrollto)  ) {
		$link ='#'.$scrollto;
	} else {
		$link = '/';
	}

	$size  = tdshortcode_validate_type( $atts, $tdshortcode_button_sizes, 'medium' );
	$target = '';
	if ( in_array( 'window', $atts ) || $newwindow =='true' || $newwindow =='yes') {
		$target = '_blank';
	}else{
		$target = '_self';
	}
	static $inc = 0;
	$inc++;
	$itemID = "btnSlideDown-" . $inc;

	if (!empty($icon))
		$icon = tds_get_fontawsomeicontag($icon);

	;

	$output .= '<style type="text/css" scoped>
					a#'.$itemID.':hover {
						color: '.$textcolorhover.' !important;
					}
					a#'.$itemID.':after {
						background: '.$colorhover.' !important;
					}
				</style>';

	$output .= '<span class="slidedown-blk" style="background:'.$color.'"><a id="'.$itemID.'" class="btn-slidedown ' . $size . '" href="'.$link.'" target="'.$target.'" style="color:'.$textcolor.'; border-color:'.$bordercolor.';">'. $icon .' ' . do_shortcode( $content ) .'</a></span>';

	return $output;
}

// Button with transparency
function tdshortcode_buttontransparent( $atts, $content=null, $tag ) {
	extract( shortcode_atts(
				array(
					'link' => '',
					'textcolor' => '',
					'textcolorhover' => '',
					'buttoncolor' => '',
					'buttoncolorhover' => '',
					'bgcolortransparency' => '50',
					'bgcolorhovertransparency' => '50',
					'bordercolor' => '#F9F9F9',
					'bordersize' => '3px',
					'newwindow' => 'no',
					'icon' => '',
					'scrollto' => '',
				), $atts )
			);
	global $tdshortcode_button_sizes;
	$size  = tdshortcode_validate_type( $atts, $tdshortcode_button_sizes, 'medium' );

	static $inc = 0;
	$inc++;
	$itemID = "btnTrans" . $inc;

	$transp = abs($bgcolortransparency)/100;

	$transph = abs($bgcolorhovertransparency)/100;

    $bgc = hex2rgb($buttoncolor);
	$bgcolor = 'rgba('.$bgc[0].','.$bgc[1].','.$bgc[2].','.$transp.')';

    $bgch = hex2rgb($buttoncolorhover);
	$bgcolorh = 'rgba('.$bgch[0].','.$bgch[1].','.$bgch[2].','.$transph.')';

	$target = '';

	if ( 'yes' === $newwindow || 'true' === $newwindow )
		$target = '_blank';
	else
		$target = '_self';

	if (!empty($icon))
		$icon = tds_get_fontawsomeicontag($icon) . ' ';

	if ( isset( $atts['link'] ) ) {
		$link = $atts['link'];
		if(!empty($link)){
			$linkvar = parse_url($link);
			if($link == '#' && !empty($scrollto)) {
				$link = '#'.$scrollto;
			}elseif(isset($linkvar['fragment'])) {
				$link = $link;
			}
		}elseif(empty($link) && !empty($scrollto)){
			$link ='#'.$scrollto;
		}
	} elseif ( !isset( $atts['link'] ) && !empty($scrollto)  ) {
		$link ='#'.$scrollto;
	} else {
		$link = '/';
	}

	$output = '<style type="text/css" scoped>
					a#'.$itemID.' {
						border:solid '.$bordersize.' '.$bordercolor.' !important;
						background:' . $buttoncolor . ';
						background:'.$bgcolor.' !important;
						color:'.$textcolor.' !important;
						-webkit-box-shadow: none;
						-moz-box-shadow: none;
						box-shadow: none;
					}
					a#'.$itemID.':hover{
						background:' . $buttoncolorhover . ';
						background:'.$bgcolorh.' !important;
						color:'.$textcolorhover.' !important;
						-webkit-box-shadow: none;
						-moz-box-shadow: none;
						box-shadow: none;
					}
				</style>';
	$output .= '<a id="'.$itemID.'" href="'.$link.'" class="button button-transparent ' . $size . ' " target="' . $target . '">'. $icon . do_shortcode( $content ).'</a>';

	return $output;
}


/* Caption Hover
 -------------------------------------------------------------- */
add_shortcode( 'tds-captionhoverpanel', 'tdshortcode_captionhoverpanel');
add_shortcode( 'tds-captionhoverblock', 'tdshortcode_captionhoverblock');

function tdshortcode_captionhoverpanel( $atts, $content = null, $tag ) {
	extract( shortcode_atts(
				array(
					'columns' => '1',
					'infobgcolor' => '#373737',
					'titlecolor' => '#ffffff',
					'subtitlecolor' => '#a3a3a3',
					'buttontextcolor' => '#ffffff',
					'buttoncolor' => '#ab0000',
					'iconsize' => '140px',
				), $atts)
			);
	static $inc = 0;
	$inc++;
	$iD = "chID" . $inc;

	$colclass = '';
	if($columns==6){
		$colclass = 'column-six';
	}elseif($columns==5){
		$colclass = 'column-five';
	}elseif($columns==4){
		$colclass = 'column-four';
	}elseif($columns==3){
		$colclass = 'column-three';
	}elseif($columns==2){
		$colclass = 'column-two';
	}else{
		$colclass = 'column-one';
	}

	$output .= '<style type="text/css" scoped>
					#'.$iD.' .figcaption {
						background-color:'.$infobgcolor.';
					}
					#'.$iD.' .figcaption h3{
						color:'.$titlecolor.';
					}
					#'.$iD.' .figure div.icon-blk {
						font-size:'.$iconsize.';
					}
					#'.$iD.' .figcaption{
						color:'.$subtitlecolor.';
					}
					#'.$iD.' .figcaption a{
						color:'.$buttontextcolor.';
						background-color:'.$buttoncolor.';
					}
				</style>';
	$output = '<ul id="'.$iD.'" class="tds-captionhover cs-style-3 '.$colclass.'">'.do_shortcode( $content ).'</ul>';

	$output .= '<div class="clear"></div>';
	return $output;
}

function tdshortcode_captionhoverblock( $atts, $content = null, $tag ) {
	extract( shortcode_atts(
				array(
					'buttontext' => 'Take a look',
					'link' => '#',
					'newwindow' => 'no',
					'icon' => 'fa-camera-retro',
					'title' => 'Title here',
					'subtitle' => 'Sub Title here', 
					'bgcolor' => '#e0e0e0', 
					'iconcolor' => '#3e3e3e', 
				), $atts)
			);
	$attrnew = '';
	if($newwindow=='yes') {
		$attrnew = 'target="_blank"';
	}
	$output = '<li><figure><div class="icon-blk" style="background-color:'.$bgcolor.'; color:'.$iconcolor.';">'.tds_get_fontawsomeicontag($icon).'</div><figcaption><h3>'.$title.'</h3><div class="button-blk"><a href="'.$link.'" '.$attrnew.'>'.$buttontext.'</a></div></figcaption></figure></li>';
	return $output;
}


/*
 * Code
 -------------------------------------------------------------- */
add_shortcode( 'tds-code', 'tdshortcode_code' );

function tdshortcode_code( $atts, $content = null, $tag ) {
	$content = str_replace('[','&#91;',wpautop($content));
	$content = str_replace(']','&#93;',$content);
	return $content;
}



/*
 * Columns
 -------------------------------------------------------------- */
add_shortcode( 'tds-columns', 'tdshortcode_columns' );
add_shortcode( 'tds-column', 'tdshortcode_column' );
add_shortcode( 'tds-customcolumns', 'tdshortcode_custom_columns' );

// Columns
// [columns divider][column half|third|twothird|twofourth|threefourth|fifth|twofifth|threefifth|fourfifth]content[/column][/columns]
//
// Column container
function tdshortcode_columns( $atts, $content = null, $tag ) {
	if ( is_array( $atts ) && in_array( 'divider', $atts ) )
		$class = ' divider';
	else
		$class = '';

	if ( is_array( $atts ) && in_array( 'last', $atts ) )
		$class = ' last';

	return '<div class="tds-columns' . $class . '">' . do_shortcode( $content ) . '</div>';
}

// Single column
$tdshortcode_column_types = array('full', 'half', 'third', 'twothird', 'fourth', 'twofourth', 'threefourth', 'fifth', 'twofifth', 'threefifth', 'fourfifth', 'custom');

function tdshortcode_column( $atts, $content = null, $tag ) {

	global $tdshortcode_column_types, $tdshortcode_animation_effect;

	$type = tdshortcode_validate_type( $atts, $tdshortcode_column_types, null );
	$animation = tdshortcode_validate_type( $atts, $tdshortcode_animation_effect, '' );

	$class = '';

	if ( is_array( $atts ) && in_array( 'last', $atts ) )
		$class = ' last';

	if ( ! $type )
		return tdshortcodes_get_warning( __('Invalid or no "column" shortcode attribute.', 'tdshortcodes' ) );
	if($animation ==''){
		return '<div class="tds-column ' . $type . ' '.$class.'">' . do_shortcode( $content ) . '</div>';
	}else{
		return '<div class="tds-column ' . $type . ' '.$class.' animation" data-animation="' . $animation . '">' . do_shortcode( $content ) . '</div>';
	}
}

$tdshortcode_background_repeat = array('no-repeat', 'repeat', 'repeat-x', 'repeat-y');
// Column with a background
function tdshortcode_custom_columns( $atts, $content = null ){
	extract( shortcode_atts(
				array(
					'image' => '',
					'textcolor' => '#FFFFFF',
					'width' => 100,
					'height' => 200,
					'backgroundcolor' => '#FFFFFF',
					'repeat' => 'no-repeat'
				), $atts )
			);
	global $tdshortcode_background_repeat;
	$bg = '';
	$width = !is_null( $width ) ? 'width:' . intval( $width ) . '%; ' : '';;
	$height = !is_null( $height ) ? 'min-height:' . intval( $height ) . 'px; ' : '';
	$type = tdshortcode_validate_type( $atts, $tdshortcode_background_repeat, 'no-repeat' );

 	$imgstyle = 'background-image:url(' . $image . ');';

	if( $image || $image != '')
		$bg = 'style="background-color: '.$backgroundcolor. '; '.$imgstyle.' background-repeat:' . $repeat . '; color: ' . $textcolor . ';' . $width . $height;
	return '<div class="tds-columns custom" ' . $bg . '">' . do_shortcode( $content ) . '</div>';

}



/*
 * Counter - separate file
 -------------------------------------------------------------- */


/*
 * Custom Login
 -------------------------------------------------------------- */
add_shortcode( 'tds-loginform', 'tdshortcode_login_form' );

// Login Form shortcode
// [loginform redirect="http://www.home-url.com"]
function tdshortcode_login_form( $atts, $content = null ) {
	extract( shortcode_atts(
				array(
					'redirect' => esc_url( home_url( "/" ) )
				), $atts )
			);

	$form = '<div id="login">';

	//if( core_options_get( 'logo' ) == '' )
	//	$form .= '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) .'" rel="home">' .  esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a></h1>';
	//else
	//	$form .= '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) .'"><img src="' . core_options_get( 'logo' ) . '" /></a></h1>';

	if ( !is_user_logged_in() ) {
		if($redirect)
			$redirect_url = $redirect;
		else
			$redirect_url = get_permalink();

		$form .= wp_login_form( array( 'echo' => false, 'redirect' => $redirect_url ) );
	}

	$form .= '</div>';

	return $form;
}



/*
 * Dividers
 -------------------------------------------------------------- */
add_shortcode( 'tds-divider', 'tdshortcode_divider' );
add_shortcode( 'tds-separator', 'tdshortcode_separator' );

// Divider
// [divider solid|dotted|invisible|totop]
//
$tdshortcode_divider_styles = array('solid', 'dotted', 'invisible', 'slashed', 'totop');

function tdshortcode_divider( $atts, $content = null, $tag ) {
	global $tdshortcode_divider_styles;

	$style = tdshortcode_validate_type( $atts, $tdshortcode_divider_styles, 'solid' );
	$totop = tdshortcode_validate_type( $atts, $tdshortcode_divider_styles, 'totop' );

	$thickness = isset( $atts['thickness'] ) ? $atts['thickness'] : 10;
	$color = isset( $atts['color'] ) ? $atts['color'] : '#e5e5e5';
	$bgcolor = isset( $atts['bgcolor'] ) ? $atts['bgcolor'] : '#ffffff';
	$width = isset( $atts['width'] ) ? ' width: ' . $atts['width'] . ';' : '';
	$align = isset( $atts['align'] ) ? $atts['align'] : '';

	$extra = isset( $atts['extra'] ) ? $atts['extra'] : '';

	if( $align === 'left' ) {
		$align = 'margin-left: 0;';
	} elseif ( $align === 'right' ) {
		$align = 'margin-right: 0;';
	} else {
		$align = '';
	}

	if ( $totop === 'totop' && $color ) {
		$extra = '<a href="#" class="totop" style="color:' . $color . '; ' . $width . '">'.tds_get_fontawsomeicontag("double-angle-up").'</a>';
	} elseif ( $totop === 'totop' ) {
		$extra = '<a href="#" class="totop" style="' . $width . '">'.tds_get_fontawsomeicontag("angle-double-up").'</a>';
	}

	if ( $color && !$align ) {
		return '<div class="tds-divider ' . $style . '" style="padding-top:' . ($thickness/2) . 'px; padding-bottom:' . ($thickness/2) . 'px;border-color: ' . $color .';' . $width . '">' . $extra . '</div>';
	} elseif ( $color && $align ) {
		return '<div class="tds-divider ' . $style . '" style="' . $align . ' padding-top:' . ($thickness/2) . 'px; padding-bottom:' . ($thickness/2) . 'px;border-color: ' . $color .';' . $width . '">' . $extra . '</div>';
	} else {
		return '<div class="tds-divider ' . $style . '" style="padding-top:' . ($thickness/2) . 'px; padding-bottom:' . ($thickness/2) . 'px;' . $width . '">' . $extra . '</div>';
	}
}

// Separator
// [tds-separator solid|dotted|invisible|totop]
//
function tdshortcode_separator( $atts, $content = null, $tag ) {
	global $tdshortcode_divider_styles;

	$thickness = isset( $atts['thickness'] ) ? $atts['thickness'] : 1;
	$color = isset( $atts['color'] ) ? $atts['color'] : '#e5e5e5';
	$width = isset( $atts['width'] ) ? ' width: ' . $atts['width'] . ';' : '';

	$width = isset( $atts['width'] ) ? ' width: ' . (intval($atts['width']) - 15) / 2 . '%;' : ' width: auto;';
	return '<div class="tds-separator"><div class="extra"><div style="border-width:' . $thickness . 'px; border-color:' . $color . '; ' . $width . '" class="separator-left"></div><div class="separator" style="color:' . $color . ';">&nbsp;' . do_shortcode( $content ) . '</div><div style="border-width:' . $thickness . 'px; border-color:' . $color . '; ' . $width . '"  class="separator-right"></div></div></div>';
}


/*
 * Dropcaps
 -------------------------------------------------------------- */
add_shortcode( 'tds-dropcap', 'tdshortcode_dropcap' );

// Drop caps
//
$tdshortcode_dropcap_types = array('red', 'green', 'blue', 'black', 'white', 'grey', 'custom');

function tdshortcode_dropcap( $atts, $content = null, $tag ) {
	global $tdshortcode_dropcap_types;

	$type = tdshortcode_validate_type( $atts, $tdshortcode_dropcap_types, 'black' );

	if ( $type == 'custom' ) {
		return '<span class="tds-dropcap" style="color:' . $color . '">' . do_shortcode( $content ) . '</span>';
	} else {
		return '<span class="tds-dropcap ' . $type . '">' . do_shortcode( $content ) . '</span>';
	}
}


/*
 * Headings
 -------------------------------------------------------------- */
add_shortcode( 'tds-header', 'tdshortcode_heading' );

// Padded headings
// [header 1|2|3|4|5|6]content[/header]
//
$tdshortcode_headings = array('1', '2', '3', '4', '5', '6');

function tdshortcode_heading( $atts, $content = null, $tag ) {
	extract(shortcode_atts(
				array(
					'color' => '',
				), $atts)
			);	global $tdshortcode_headings;

	$style = tdshortcode_validate_type( $atts, $tdshortcode_headings, '1' );
	if(!empty($color)){
		return '<div class="tds-header"><h' . $style . ' style="color:'.$color.'">' . $content . '</h' . $style . '></div>';
	}else{
		return '<div class="tds-header"><h' . $style . '>' . $content . '</h' . $style . '></div>';
	}
}


/*
 * Highlight
 -------------------------------------------------------------- */
add_shortcode( 'tds-highlight', 'tdshortcode_highlight' );

// A highlighted text shortcode
//[highlight bg="#000000" color="#FFFFFF"]some content[/highlight]
//
function tdshortcode_highlight( $atts, $content = null, $tag ){
	extract(shortcode_atts(
				array(
					'bg' 		=> '#FF6600',
					'color' 	=> '#FFFFFF',
					'padding' 	=>	null,
				), $atts)
			);

	$padding = !is_null($padding) ? 'padding:' . intval($padding) . 'px;' : '';

	return '<span style="background-color: ' . $bg . '; color: ' . $color . '; ' . $padding . '">&nbsp;' . $content . '&nbsp;</span>';
}


/*
 * Icons
 -------------------------------------------------------------- */
add_shortcode( 'tds-icon', 'tdshortcode_icon' );

// Font Awesome Shortcode
// [icon name=icon-chevron-left size=large, 2x, 3x, 4x ]
function tdshortcode_icon( $atts, $content = null, $tag ) {
	global $tdshortcode_animation_effect;
	extract( shortcode_atts(
				array(
					'name'  => 'icon-wrench',
					'size'  => ' ',
					'animation' => 'fadeIn'
				), $atts )
			);
	$tdshortcode_icon_sizes = array('large', '2x', '3x', '4x', '5x');

	$size = tdshortcode_validate_type( $atts, $tdshortcode_icon_sizes, '' );
	$animation  = tdshortcode_validate_type( $atts, $tdshortcode_animation_effect, '' );
	$addtlclass='';
	switch ($size) {
    case 'large':
		$addtlclass = 'fa-lg';
        break;
    case '2x':
		$addtlclass = 'fa-2x';
        break;
    case '3x':
		$addtlclass = 'fa-3x';
        break;
    case '4x':
		$addtlclass = 'fa-4x';
        break;
    case '5x':
		$addtlclass = 'fa-5x';
        break;
	}
	
	
	if(!empty($size)){
	}
	return '<span class="animation" data-animation="' . $animation . '">'.tds_get_fontawsomeicontag($atts['name'],$addtlclass).'</span>';
}


/*
 * Image Gallery - separate file
 -------------------------------------------------------------- */


/*
 * Image Menu - separate file
 -------------------------------------------------------------- */


/*
 * Lists
 -------------------------------------------------------------- */
add_shortcode( 'tds-list', 'tdshortcode_list' );

// Lists
//
$tdshortcode_list_types = array( 'circle', 'square', 'dots', 'phone', 'mail', 'file', 'plus', 'minus', 'balloon', 'support', 'creditcard', 'info', 'question', 'v', 'x', 'warning', 'none');

function tdshortcode_list( $atts, $content = null, $tag ) {
	global $tdshortcode_list_types;

	$list_items = tdshortcode_get_array( $content );
	$type = tdshortcode_validate_type( $atts, $tdshortcode_list_types, null );

	if ( ! $type )
		return tdshortcodes_get_warning( __('Invalid or no "list" shortcode attribute.', 'tdshortcodes' ) );

	if ( $type == 'none')
		$type = '';

	$output = '';
	$output .= '<ul class="tds-list ' . $type . '">';

	foreach( $list_items as $item )
		$output .= '<li>' . do_shortcode( trim( $item ) ) . '</li>';

	$output .= '</ul>';

	return $output;
}



/*
 * Maintenance Mode
 -------------------------------------------------------------- */

/*
 * Notification boxes
 -------------------------------------------------------------- */
add_shortcode( 'tds-notify', 'tdshortcode_notify' );

// Notifications
// [notify textbox-white|textbox-black|textbox-grey|warn|info|ok|question|error]content[/notify]
//
$tdshortcode_notify_types = array('textbox-white','textbox-black','textbox-grey','warn', 'info', 'ok', 'question', 'error', 'custom');

function tdshortcode_notify( $atts, $content = null, $tag ) {
	global $tdshortcode_notify_types;
	extract( shortcode_atts(
				array(
					'bg' => '',
					'color' => '',
					'icon' => '',
					'iconcolor' => '',
					'iconbgcolor' => '',
					'align' => 'left',
					'bordersize' => '0px',
					'bordercolor' => '#999999',
					'transparency' => '100',
					'width' => ''
				), $atts )
			);
	$type = tdshortcode_validate_type( $atts, $tdshortcode_notify_types, null );
	$boxtype = '';
	$iconclass = '';
	if($icon != ''){
		$iconclass = 'icon';
	}
	$borderstyle = '';
	if($bordersize != '' || $bordersize != '0px') {
		$borderstyle = 'border:solid '.$bordersize.' '.$bordercolor.';';
	}
	$widthstyle = '';
	if($width != '' || $width != '0') {
		$widthstyle = 'width:'.$width.';';
	}
	
	
	$bgc = '';
	$bgcolor = '';
	
	if($transparency < 100){
		$transparency = $transparency/100;
		$bgc = hex2rgb($bg);
		$bgcolor = 'rgba('.$bgc[0].','.$bgc[1].','.$bgc[2].','.$transparency.')';
	}else {
		$bgcolor = $bg;
	}
	
	if ( ! $type )
		return tdshortcodes_get_warning( __( 'Invalid or no "notify" shortcode attribute.', 'tdshortcodes' ) );

	switch ( $type ) {
		case 'ok' :  $boxtype = 'thumbs-up';
					break;
		case 'question' :  $boxtype = 'question';
					break;
		case 'error' :  $boxtype = 'exclamation-triangle';
					break;
		case 'info' :  $boxtype = 'flag';
					break;
		case 'warn' :  $boxtype = 'info-circle';
					break;
		case 'custom' :  $boxtype = $icon;
					break;
	}
	

	return '<div class="tds-notify ' . $type . ' '.$iconclass.'" style="background-color: ' . $bgcolor . '; color: ' . $color . '; text-align:'.$align.';'.$borderstyle.$widthstyle.' " ><div class="circle" style="color:'.$iconcolor.'; background-color:'.$iconbgcolor.';">'.tds_get_fontawsomeicontag($boxtype, 'notify').'</div>' . do_shortcode( shortcode_unautop( $content ) ) . '</div>';
}



/*
 * Price Tables
 -------------------------------------------------------------- */
add_shortcode( 'tds-pricetable', 'tdshortcode_tdpricetable' );
add_shortcode( 'tds-pricetable_column', 'tdshortcode_tdpricetable_column' );
add_shortcode( 'tds-pricetable_content', 'tdshortcode_tbpricetable_content' );
add_shortcode( 'tds-pricetable_button', 'tdshortcode_tdpricetable_button' );

// Price Tables
// [tdpricetable columns="[1][2][3][4][5][6]"]
// [tdpricetable  title="title" subtitle="subtitle" toplisttitle="toplisttitle" toplistsubtitle="toplistsubtitle" backgroundcolor="backgroundcolor"  fontcolor="fontolor" buttoncolor="buttoncolor" buttonfontcolor="buttonfontcolor" buttonlink="bottonlink" buttontext="bottontext"]
// [/tdpricetable]
// [/tdpricetable]
//

function tdshortcode_tdpricetable( $atts, $content = null, $tag ) {
	extract( shortcode_atts(
				array(
					'columns' => '1'
				), $atts)
			);
	$colscss = 'tds-pricing-' . $columns;

	$output ='<div class="tds-pricingtable">';
	$output .= '<div class="tds-pricing-row ' . $colscss . '">';
	$output .= do_shortcode( $content );
	$output .= '</div>';
	$output .= '</div>';
	$output .= '<div class="clear"></div>';

	return $output;
}

function tdshortcode_tdpricetable_column( $atts, $content = null, $tag ) {
	extract( shortcode_atts(
				array(
					'title' => '',
					'subtitle' => '',
					'titlefontcolor' => '#efefef',
					'titlebgcolor' => '#000000',
					'titlefontsize' => '20px',
					'toplisttitle' => '',
					'toplistsubtitle' => '',
					'toplistfontcolor' => '#ffffff',
					'toplistbgcolor' => '#a2a2a2',
					'toplistfontsize' => '30px',
					'backgroundcolor' => '',
					'fontcolor' => '#7D7D7D'
				), $atts)
			);
	$output = '';
	$output .= '<div class="tds-pricing-col" style="background-color:' . $backgroundcolor . ';color:' . $fontcolor . '">';
	$output .= '<div class="tds-pricing-blk">';
	$output .= '<div>';
	$output .= '<div class="tds-pricing-title" style="background-color:'.$titlebgcolor.'">';
	$output .= '<h1 style="color:' . $titlefontcolor . '; font-size:'.$titlefontsize.'">' . $title . '</h1>';
	$output .= '<p  style="color:' . $titlefontcolor . '">' . $subtitle . '</p>';
	$output .= '</div>';
	$output .= '<div class="tds-pricing-top" style="background-color:'.$toplistbgcolor.'">';
	$output .= '<p  style="color:' . $toplistfontcolor . '; font-size:'.$toplistfontsize.'">' . $toplisttitle . '</p>';
	$output .= '<div  style="color:' . $toplistfontcolor . '">' . $toplistsubtitle . '</div></div></div>';
	$output .= do_shortcode( $content );
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}

function tdshortcode_tbpricetable_content( $atts, $content = null, $tag ) {
	$output = '';
	$output .= '<div class="tds-pricing-content">';
	$output .= do_shortcode( $content );
	$output .= '</div>';

	return $output;
}
function tdshortcode_tdpricetable_button( $atts, $content = null, $tag ) {
	extract( shortcode_atts(
				array(
					'buttoncolor' => '',
					'buttonfontcolor' => '',
					'buttonlink' => '#',
					'buttontitle' => 'Button Title'
				), $atts)
			);

	$buttoncolorstyle = '';
	$buttonfontcolorstyle = '';

	if( $buttoncolor != '')
		$buttoncolorstyle = 'background-color:' . $buttoncolor . ';';

	if($buttonfontcolor != '')
		$buttonfontcolorstyle = 'color:' . $buttonfontcolor . ';';
	$output = '';
	$output .= '<div class="tds-pricing-btn"><a class="btn-pricing" title="' . $buttontitle . '" style="' . $buttoncolorstyle . ' ' . $buttonfontcolorstyle . '" href="' . $buttonlink . '">';
	$output .= do_shortcode( $content );
	$output .= '</a></div>';

	return $output;
}


/*
 * Portfolio - separate file
 -------------------------------------------------------------- */

/*
 * Progress Bar
 -------------------------------------------------------------- */
add_shortcode( 'tds-progressbar', 'tdshortcode_progressbar' );

function tdshortcode_progressbar( $atts, $content = null, $tag ) {
	extract( shortcode_atts(
				array(
					'title' => 'Progress Bar',
					'percent' => 100,
					'color' => 'gray',
					'hidetitle' => 'no'
				), $atts)
			);
	static $inc = 0;
	$inc++;
	$pBarID = "mainBar-" . $inc;
	$hideshowclass = '';

	if( $percent > 100 )
		$percent = 100;
	if ( $hidetitle == 'yes' )
		$hideshowclass = 'hide-pblk';
	else
		$hideshowclass = '';

	$titlestrip = preg_replace( '/\s+/', '', $title );
	$output = '<div class="progress-barblk"><div class="title-pblk ' . $hideshowclass . '">' . do_shortcode( $content ) . $title . '</div><div id="' . $pBarID . '" class="' . $titlestrip . ' jquery-ui-like ' . $color . '-bar"><div class="main-pbar"></div></div></div>';
	$output .= '<script type="text/javascript">
				jQuery(document).ready(function () { mainProgressBar( "' . $pBarID . '",' . $percent . ',"' . $title . '"); } );
				jQuery(window).scroll( function () { mpb_updateScroll("' . $pBarID . '",' . $percent . ',"' . $title . '"); } );';
	$output .= '</script>';

	return $output;
}



/* Quotes
 *
 -------------------------------------------------------------- */
add_shortcode( 'tds-pullquote', 'tdshortcode_pullquote' );
add_shortcode( 'tds-quotesymbol', 'tdshortcode_quote_symbol' );
add_shortcode( 'tds-quote', 'tdshortcode_quote' );

// Pullquotes
// [pullquote left|right]content[/pullquote]
//
$tdshortcode_pullquote_types = array('left', 'right');

function tdshortcode_pullquote( $atts, $content = null ) {
	global $tdshortcode_pullquote_types;

	$type = tdshortcode_validate_type( $atts, $tdshortcode_pullquote_types, 'left' );

	return '<div class="tds-pullquote ' . $type . '">' . do_shortcode( $content ) . '</div>';
}

// Quote symbol
// [quote-symbol symbol1|symbol2|symbol3|symbol4|symbol5]content[/pullquote]
//
$tdshortcode_quote_symbol_types = array('symbol1', 'symbol2', 'symbol3', 'symbol4', 'symbol5');

function tdshortcode_quote_symbol( $atts, $content = null ) {
	global $tdshortcode_quote_symbol_types;

	$type = tdshortcode_validate_type( $atts, $tdshortcode_quote_symbol_types, 'left' );

	return '<span class="tds-quote-symbol ' . $type . '"></span>';
}

// Quote block shortcode
// [quote]content[/quote]
//
function tdshortcode_quote( $atts, $content = null, $tag ) {
	return '<div class="tds-quote">' . do_shortcode( $content ) . '</div>';
}


/* Quotes Rotator - separate file
 *
 -------------------------------------------------------------- */


/*
 * Rotating Texts
 -------------------------------------------------------------- */
add_shortcode('tds-rotatorpanel', 'tdshortcode_rotatorpanel');
add_shortcode('tds-rotatorblock', 'tdshortcode_rotatorblock');

function tdshortcode_rotatorpanel( $atts, $content = null, $tag ) {
	extract( shortcode_atts(
				array(
					'duration' => '10000',
					'transitionspeed' => '2000',
				), $atts)
			);
	$transitionspeed = $transitionspeed/2;
	static $inc = 0;
	$inc++;
	$tnID = "rpID" . $inc;
	$output = '<div id="'.$tnID.'" class="tds-scroller">'.do_shortcode( $content ).'</div>';
	$output .= '<div class="tds-scriptblk"></div><script type="text/javascript">
				jQuery(document).ready(function() {
					setupRotator("#'.$tnID.'",'.$duration.','.$transitionspeed.');
					});
				</script>';
	return $output;
}

function tdshortcode_rotatorblock( $atts, $content = null, $tag ) {
	$output = '<div class="tds-textitem">'.do_shortcode( $content ).'</div>';
	return $output;
}


/*
 * Rotating Words
 -------------------------------------------------------------- */
add_shortcode('tds-rotatingwords', 'tdshortcode_rotatingwords');
add_shortcode('tds-word', 'tdshortcode_word');

function tdshortcode_rotatingwords( $atts, $content = null, $tag ) {
	extract( shortcode_atts(
				array(
					'words' => '6'
				), $atts)
			);

	$addtlclass = 'words' . $words;

	$output = '<span class="rw-words rw-words-1 '.$addtlclass.'">'.do_shortcode( $content ).'</span>';
	return $output;
}

function tdshortcode_word( $atts, $content = null, $tag ) {
	extract( shortcode_atts(
				array(
					'color' => '#000000'
				), $atts)
			);
	$output = '<span style="color:'.$color.'">'.do_shortcode( $content ).'</span>';
	return $output;
}


/* Section - separate file
 -------------------------------------------------------------- */

/*
 * Tabs
 -------------------------------------------------------------- */
add_shortcode( 'tds-tabs', 'tdshortcode_tabs' );
add_shortcode( 'tds-tab', 'tdshortcode_tab' );

// Tabs
// [tabs][tab title="title"]content[/tab][/tabs]
//
$tdshortcode_tabs_position = array('top', 'left', 'right');

function tdshortcode_tabs( $atts, $content = null, $tag ) {
	global $tdshortcode_tabs_position;
	extract( shortcode_atts(
				array(
					'titlefontsize' => '',
					'titlebordercoloractive' => '',
					'titlebordercolorhover' => '',
				), $atts )
			);
	static $inc = 0;
	$inc++;
	$itemID = "tabsPnl" . $inc;

	$position = tdshortcode_validate_type( $atts, $tdshortcode_tabs_position, null );
	$output .= '<style type="text/css" scoped>
					#'.$itemID.' .tds-tab-title {
						font-size: '.$titlefontsize.';
					}
					div#'.$itemID.' > .titles > div:hover{
						 border-color:'.$titlebordercolorhover.';
					}
					div#'.$itemID.' > .titles > div.active {
						 border-color:'.$titlebordercoloractive.';
					}
				</style>';
	$output .= '<div id="'.$itemID.'" class="tds-tabs ' . $position . '">';
	$output .= '<div class="titles"></div>';
	$output .= '<div class="content"></div>';
	$output .= do_shortcode( $content );
	$output .= '</div>';

	return $output;
}

function tdshortcode_tab( $atts, $content = null, $tag ) {
	extract( shortcode_atts(
				array(
					'title' => 'Tab',
					'icon' => '',
				), $atts )
			);
	if($icon != ''){
		$icontag = tds_get_fontawsomeicontag($icon) . '&nbsp;';
	}else {
		$icontag = '';
	}
	
	$output = '<div class="tds-tab-title">' .$icontag  .$title . '</div>';
	$output .= '<div class="tds-tab">' . do_shortcode( $content ) . '</div>';

	return $output;
}



/*
 * TD – latest post
 -------------------------------------------------------------- */
add_shortcode( 'tds-blogposts', 'tdshortcode_blogpost' );
add_shortcode( 'tds-latestposts', 'tdshortcode_latestpost' );

// Latest Post Shortcode
// [latestposts title="Latest Posts" category="all" number="10" orderby="latest|popular|random" ]
//
function tdshortcode_latestpost( $atts, $content = null ) {

	extract( shortcode_atts(
				array(
					'title'  => '',
					'category' => '',
					'number' => '10',
					'orderby' => 'date',
					'showmeta' => 'yes',
					'imagesize' => 'large',
					'titleicon' => ''
				), $atts)
			);

	$output = '';
	
	if($titleicon != ''){
		$icontag = tds_get_fontawsomeicontag($titleicon) . '&nbsp;';
	}else {
		$icontag = '';
	}

	if ( $title ) {
		$output .= '<h4>' .$icontag. $title . '</h4>';
	}

	if ( $category == '' || $category == 'all' ) {
		$args = array('category_name' => '');
	} else {
		$args = array('category_name' => $category);
	}

	if ( $orderby == 'random' ) {
		$orderby = 'rand';
	} elseif ( $orderby == 'popular' ) {
		$orderby = 'comment_count';
	} else {
		$orderby = 'date';
	}

	if($imagesize == 'thumb') {
		$imagesize = 'thumbnail';
	}

	if($imagesize == 'thumbnail' || $imagesize == 'medium') {
		$imgclass = $imagesize . 'left-align';
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


	$r = new WP_Query( apply_filters( 'tdshortcode_latestpost_args', $queryargs, $atts ) );

	if ( $r->have_posts() ) {

		$output .= '<ul class="tds_postWidget_posts">';

		while ( $r->have_posts() ) {
			$r->the_post();

			$output .= '<li>';
			if( has_post_thumbnail() ) {
				$output .= '<a href="' . get_permalink() . '" title="' . get_the_title() . '">';
				$output .= get_the_post_thumbnail( null, $imagesize, array( 'class' => $imagesize . ' thumb left-align' ) );
				$output .= '</a>';
			}

			$output .= '<a  class="post-title" href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a>';

			if ( $showmeta == 'yes' ) {
				
				$output .= '<span class="tds_postWidget_meta"><span>' . get_the_date() . '</span><br>';

				$category = get_the_category();

				if( $category[0] ){
					$output .= '<a class="cat" href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a> <br>';
				}

				$output .= 'by <em>' . get_the_author() . '</em></span>';
			}
			$output .= '</li>';
		}

	$output .= '</ul>';

	} else {
		$output .= '<p>' . __( 'No posts found.', 'tdshortcodes' ) . '</p>';
	}

	// Reset the global $the_post as this query will have stomped on it
	wp_reset_postdata();

	return $output;

}

// Blog Post Shortcode
// [blogposts title="Latest Blog Posts" category="all" number="10" orderby="latest|popular|random" image="thumbnail|medium|large" ]
//
function tdshortcode_blogpost( $atts, $content = null) {

	extract( shortcode_atts(
				array(
					'title'  => '',
					'category' => '',
					'number' => '10',
					'words'  => '55',
					'count'  => '55',
					'orderby' => 'date',
					'image'  => 'thumbnail',
					'showmeta'  => 'yes',
					'titleicon' => ''
				), $atts)
			);

	$output = '';

	if($titleicon != ''){
		$icontag = tds_get_fontawsomeicontag($titleicon) . '&nbsp;';
	}else {
		$icontag = '';
	}

	if ( $title ) {
		$output .= '<h4>' .$icontag. $title . '</h4>';
	}

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

	$words = (int) $count;

	if ( ! $image )
		$image = "large";

	$queryargs = array(
		'posts_per_page'   		=> $number,
		'no_found_rows'   		=> true,
		'post_status'    		=> 'publish',
		'ignore_sticky_posts'  	=> true,
		'order'     			=> 'desc',
		'orderby'     			=> $orderby
	);

	$queryargs = array_merge( $queryargs, $args );


	$r = new WP_Query( apply_filters( 'tdshortcode_latestpost_args', $queryargs, $atts ) );


	if ($r->have_posts()) {

		$output .= '<ul class="tds_postWidget_posts">';

		while ( $r->have_posts() ) {

			$r->the_post();

			$output .= '<li class="item-entry">';

			if( has_post_thumbnail() ){
				$output .= get_the_post_thumbnail( null, $image, array( 'class' => $image . ' thumbs left-align' ) );
			}

			$output .= '<h4><a  class="post-title" href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h4><div class="item">';

			$output .= '<div class="tds_postWidget_meta">';

			$num_comments = get_comments_number();

			if ( $num_comments == 0 ) {
				$comments = '<span class="num">0</span> ';
			} elseif ( $num_comments > 1 ) {
				$comments = '<span class="num">' . $num_comments . '</span>';
			} else {
				$comments = '<span class="num">1</span> ';
			}

			if ($showmeta == 'yes' ) {
				$output .= '<span>' . get_the_date() . '</span> <span class="sep"> | </span> <span>'.tds_get_fontawsomeicontag('user').' <a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">' . get_the_author() . '</a></span> ';

				$output .= ' <span class="sep"> | </span> '.tds_get_fontawsomeicontag('comments').' <a href="' . get_comments_link() .'"><span class="comment">'. $comments.'</span></a>';
			}

			$output .= '</div><p>' . tdshortcodes_limited_excerpt($words) . ' </p>';
			$output .= '<div class="title-row"></div>';

			$output .= '<div class="tds_postWidget_meta">';
			$output .= '<a class="button small alignright" href="' . get_permalink() . '"><i class="icon-plus-sign"></i>  ' . __( ' Read more', 'tdshortcodes' ).'</a>';

			if ( $showmeta == 'yes' ) {
				$category = get_the_category();

				if($category[0]){
					$output .= tds_get_fontawsomeicontag('bookmark').' <a class="cat" href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a> ';
				}

				$tags = get_the_tag_list( '',',','' );

				if ( $tags ) {
					$output .= '<br/> '.tds_get_fontawsomeicontag('tags'). $tags;
				}

			}

			$output .= '</div></div>';

			$output .= '</li>';
		}

		$output .= '</ul>';
		$output .= '<script type="text/javascript" src="' . TDS_PLUGIN_URL . 'js/tdac-slider.js"></script>';

	} else {
		$output .= '<p>' . __( 'No posts found.', 'tdshortcodes' ) . '</p>';
	}

	// Reset the global $the_post as this query will have stomped on it
	wp_reset_postdata();


	return $output;

}



/*
 * Thumbnail slider - separate file
 -------------------------------------------------------------- */


/*
 * Timed Notification - separate file
 -------------------------------------------------------------- */


/*
 * Toggles
 -------------------------------------------------------------- */
add_shortcode( 'tds-toggle', 'tdshortcode_toggle' );
add_shortcode( 'tds-togglecontent', 'tdshortcode_toggle_content' );

// Toggle
// [toggle]
// [toggle_content title="title" subtitle="subtitle"]
// [/toggle_content]
// [/toggle]
//
function tdshortcode_toggle( $atts, $content = null, $tag ) {
	$output  = '<ul class="tds-toggle">';
	$output .= do_shortcode( $content );
	$output .= '</ul>';

	return $output;
}

function tdshortcode_toggle_content( $atts, $content = null, $tag ) {
	extract( shortcode_atts(
				array(
					'title' => '',
					'subtitle' => '',
				), $atts )
			);

	$output = '<li>';
	$output .= '<div class="toggle-header">'.tds_get_fontawsomeicontag('plus','icon').' <span class="title">' . $title . '</span><span class="subtitle">' . $subtitle . '</span></div>';

	$output .= '<div class="content">';
	$output .= do_shortcode( wpautop( $content ) );
	$output .= '</div>';

	$output .= '</li>';

	return $output;
}


/*
 * Toggle Divider
 -------------------------------------------------------------- */
// Toggle
// [toggle]
// [toggle_content title="title" subtitle="subtitle"]
// [/toggle_content]
// [/toggle]
//
class tds_toggledivider_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tds-toggledivider', array(__CLASS__, 'tds_toggledivider_shortcode_handle'));
		//add_action('init', array(__CLASS__, 'register_script'));
		//add_action('wp_footer', array(__CLASS__, 'print_script'));
	}

	static function tds_toggledivider_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract( shortcode_atts(
				array(
					'title' => 'CLICK ME TO SEE THE CONTENT',
					'titlebgcolor' => '#CCCCCC',
					'titletextcolor' => '#000000',
					'titlefontsize' => '20px',
					'contentbgcolor' => '',
					'contenttextcolor' => '',
				), $atts )
			);
		$output  = '<div class="tds-toggledivider">';
		$output .= '<div class="tds-toggledivider-title"><a href="javascript:void(0);" style="background-color:'.$titlebgcolor.'; font-size:'.$titlefontsize.'; color:'.$titletextcolor.';">' . $title . ' <i class="active fa fa-angle-down"></i></a></div>';
		$output .= '<div class="tds-toggledivider-content" style="display:none; background-color:'.$contentbgcolor.'; color:'.$contenttextcolor.'" >';
		$output .= do_shortcode( $content );
		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}

	static function register_script() {

	}

	static function print_script() {
		if ( ! self::$add_script )
			return;
	}
}
tds_toggledivider_shortcode::init();



/*
 * Vertical Timeline - separate file
 -------------------------------------------------------------- */


?>