<?php

//if ( ! is_user_logged_in() || ! current_user_can( 'edit_posts' ) )
//	die();
require('../../../wp-load.php');
//require_once 'your-path-to/wp-config.php'
//require('./fonts/fontawesome.php');


$shortcode_categories = array(

	// Animated Icon Grid
	__('Animated Icon Grid', 'tdshortcodes') => array(
		__('3 Columns Icon Grid', 'tdshortcodes') => array(
			'description' => __('Inserts an animated icon grid. Columns limits only to 3 - 5.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-icongrid-panel color=\"#47a3da\" columns=\"3\" iconsize=\"10em\" ]\n[tds-icongrid link=\"http://\" icon=\"".tds_get_fontawsomeicontag('cogs','','',true)."\" title=\"Title Here\" subtitle=\"Subtitle Here\"]\n[tds-icongrid link=\"http://\" icon=\"".tds_get_fontawsomeicontag('cogs','','',true)."\" title=\"Title Here\" subtitle=\"Subtitle Here\"]\n[tds-icongrid link=\"http://\" icon=\"".tds_get_fontawsomeicontag('cogs','','',true)."\" title=\"Title Here\" subtitle=\"Subtitle Here\"]\n[/tds-icongrid-panel]",
		),
		__('4 Columns Icon Grid', 'tdshortcodes') => array(
			'description' => __('Inserts an animated icon grid. Columns limits only to 3 - 5.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-icongrid-panel color=\"#47a3da\" columns=\"4\" iconsize=\"7em\" ]\n[tds-icongrid link=\"http://\" icon=\"".tds_get_fontawsomeicontag('cogs','','',true)."\" title=\"Title Here\" subtitle=\"Subtitle Here\"]\n[tds-icongrid link=\"http://\" icon=\"".tds_get_fontawsomeicontag('cogs','','',true)."\" title=\"Title Here\" subtitle=\"Subtitle Here\"]\n[tds-icongrid link=\"http://\" icon=\"".tds_get_fontawsomeicontag('cogs','','',true)."\" title=\"Title Here\" subtitle=\"Subtitle Here\"]\n[tds-icongrid link=\"http://\" icon=\"".tds_get_fontawsomeicontag('cogs','','',true)."\" title=\"Title Here\" subtitle=\"Subtitle Here\"]\n[/tds-icongrid-panel]",
		),
		__('5 Columns Icon Grid', 'tdshortcodes') => array(
			'description' => __('Inserts an animated icon grid. Columns limits only to 3 - 5.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-icongrid-panel color=\"#47a3da\" columns=\"5\" iconsize=\"5em\" ]\n[tds-icongrid link=\"http://\" icon=\"".tds_get_fontawsomeicontag('cogs','','',true)."\" title=\"Title Here\" subtitle=\"Subtitle Here\"]\n[tds-icongrid link=\"http://\" icon=\"".tds_get_fontawsomeicontag('cogs','','',true)."\" title=\"Title Here\" subtitle=\"Subtitle Here\"]\n[tds-icongrid link=\"http://\" icon=\"".tds_get_fontawsomeicontag('cogs','','',true)."\" title=\"Title Here\" subtitle=\"Subtitle Here\"]\n[tds-icongrid link=\"http://\" icon=\"".tds_get_fontawsomeicontag('cogs','','',true)."\" title=\"Title Here\" subtitle=\"Subtitle Here\"]\n[tds-icongrid link=\"http://\" icon=\"".tds_get_fontawsomeicontag('cogs','','',true)."\" title=\"Title Here\" subtitle=\"Subtitle Here\"]\n[/tds-icongrid-panel]",
		)
	),

	// Animated Image
	__('Animated Image', 'tdshortcodes') => array(
		__('Animated Image', 'tdshortcodes') => array(
			'description' => __('Inserts an animated image shortcode with a custom animation effects.', 'tdshortcodes' ) . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-image src=\"image url\" alt=\"alt text\" title=\"image title\" animation=\"fadeIn\" ]",
		),
	),

	// Boxed Image
	__('Boxed Image', 'tdshortcodes') => array(
		__('Boxed image', 'tdshortcodes') => array(
			'description' => __('Inserts a boxed image.', 'tdshortcodes'),
			'shortcode' => "[tds-boxed]\n[tds-image src=\"image-url\"]\n[/tds-boxed]\n"
		),
		__('Boxed image with title', 'tdshortcodes') => array(
			'description' => __('Inserts a boxed image with title.', 'tdshortcodes'),
			'shortcode' => "[tds-boxed]\n[tds-image src=\"image-url\"]\n[tds-heading 1 align=\"center\"]Image Box Title[/tds-heading]\n[/tds-boxed]\n"
		),
		__('Boxed image with title and content', 'tdshortcodes') => array(
			'description' => __('Inserts a boxed image with title and content.', 'tdshortcodes'),
			'shortcode' => "[tds-boxed]\n[tds-image src=\"image-url\"]\n[tds-heading 1 align=\"center\"]Image Box Title[/tds-heading]\n\nPut your content here\n\n[/tds-boxed]\n"
		),
		__('Boxed image complete', 'tdshortcodes') => array(
			'description' => __('Inserts a boxed image, the full package.', 'tdshortcodes'),
			'shortcode' => "[tds-boxed textcolor=\"#FFFFFF\" bordercolor=\"#FFFFFF\" borderopacity=\"40\" shadowcolor=\"#000000\" shadowopacity=\"80\" link=\"#your-link\" newwindow=\"false\"]\n[tds-image src=\"image-url\"]\n[tds-heading 1 align=\"center\"]Image Box Title[/tds-heading]\n\nPut your content here\n\n[/tds-boxed]\n"
		),
	),

	// Boxed Slider
	__('Boxed Slider', 'tdshortcodes') => array(
		__('Boxed slider', 'tdshortcodes') => array(
			'description' => __('Inserts a boxed slider.', 'tdshortcodes'),
			'shortcode' => "[tds-boxed-slider delay=\"1000\" duration=\"7000\" transition=\"600\"]\n[tds-image src=\"image-url\"]\n[tds-image src=\"image-url\"]\n[tds-image src=\"image-url\"]\n[/tds-boxed-slider]\n"
		),
		__('Boxed slider with title', 'tdshortcodes') => array(
			'description' => __('Inserts a boxed slider with title.', 'tdshortcodes'),
			'shortcode' => "[tds-boxed-slider delay=\"1000\" duration=\"7000\" transition=\"600\"]\n[tds-image src=\"image-url\"]\n[tds-image src=\"image-url\"]\n[tds-image src=\"image-url\"]\n\n[tds-heading 1 align=\"center\"]Image Box Title[/tds-heading]\n[/tds-boxed-slider]\n"
		),
		__('Boxed slider with title and content', 'tdshortcodes') => array(
			'description' => __('Inserts a boxed slider with title and content.', 'tdshortcodes'),
			'shortcode' => "[tds-boxed-slider delay=\"1000\" duration=\"7000\" transition=\"600\"]\n[tds-image src=\"image-url\"]\n[tds-image src=\"image-url\"]\n[tds-image src=\"image-url\"]\n\n[tds-heading 1 align=\"center\"]Image Box Title[/tds-heading]\n\nPut your content here\n\n[/tds-boxed-slider]\n"
		),
		__('Boxed slider complete', 'tdshortcodes') => array(
			'description' => __('Inserts a boxed slider, the full package.', 'tdshortcodes'),
			'shortcode' => "[tds-boxed-slider delay=\"1000\" duration=\"7000\" transition=\"600\" textcolor=\"#FFFFFF\" bordercolor=\"#FFFFFF\" borderopacity=\"40\" shadowcolor=\"#000000\" shadowopacity=\"80\" link=\"#your-link\" newwindow=\"false\"]\n[tds-image src=\"image-url\"]\n[tds-image src=\"image-url\"]\n[tds-image src=\"image-url\"]\n\n[tds-heading 1 align=\"center\"]Image Box Title[/tds-heading]\n\nPut your content here\n\n[/tds-boxed-slider]\n"
		),
	),

	// Buttons
	__('Buttons', 'tdshortcodes') => array(
		__('Small button', 'tdshortcodes') => array(
			'description' => __('Inserts a small button.', 'tdshortcodes'),
			'shortcode' => '[tds-button small link="#" newwindow="false"]button text[/tds-button]',
		),
		__('Medium button', 'tdshortcodes') => array(
			'description' => __('Inserts a medium sized button. ', 'tdshortcodes'),
			'shortcode' => '[tds-button medium link="#" newwindow="false"]button text[/tds-button]',
		),
		__('Large button', 'tdshortcodes') => array(
			'description' => __('Inserts a large button. ', 'tdshortcodes'),
			'shortcode' => '[tds-button large link="#" newwindow="false"]button text[/tds-button]',
		),
		__('Small button with Icon', 'tdshortcodes') => array(
			'description' => __('Inserts a small button with font awesome icon. ', 'tdshortcodes'),
			'shortcode' => '[tds-button small link="#" icon="'.tds_get_fontawsomeicontag("cog","","",true).'" newwindow="false"]button text[/tds-button]',
		),
		__('Medium button with Icon', 'tdshortcodes') => array(
			'description' => __('Inserts a medium sized button with font awesome icon. ', 'tdshortcodes'),
			'shortcode' => '[tds-button medium link="#" icon="'.tds_get_fontawsomeicontag("cog","","",true).'" newwindow="false"]button text[/tds-button]',
		),
		__('Large button with Icon', 'tdshortcodes') => array(
			'description' => __('Inserts a large button with font awesome icon.', 'tdshortcodes'),
			'shortcode' => '[tds-button large link="#" icon="'.tds_get_fontawsomeicontag("cog","","",true).'" newwindow="false"]button text[/tds-button]',
		),
		__('Button w/ Slide Down Effect (Small)', 'tdshortcodes') => array(
			'description' => __('Inserts a button with Slide Down Effect.', 'tdshortcodes'),
			'shortcode' => '[tds-buttonslidedown link="#" color="#EDEDED" textcolor="#7D7B6D" colorhover="#000000" textcolorhover="#FFFFFF" bordercolor="#f9f9f9" small newwindow="false"]button text[/tds-buttonslidedown]',
		),
		__('Button w/ Slide Down Effect (Medium)', 'tdshortcodes') => array(
			'description' => __('Inserts a button with Slide Down Effect.', 'tdshortcodes'),
			'shortcode' => '[tds-buttonslidedown link="#" color="#EDEDED" textcolor="#7D7B6D" colorhover="#000000" textcolorhover="#FFFFFF" bordercolor="#f9f9f9" medium newwindow="false"]button text[/tds-buttonslidedown]',
		),
		__('Button w/ Slide Down Effect (Large)', 'tdshortcodes') => array(
			'description' => __('Inserts a button with Slide Down Effect.', 'tdshortcodes'),
			'shortcode' => '[tds-buttonslidedown link="#" color="#EDEDED" textcolor="#7D7B6D" colorhover="#000000" textcolorhover="#FFFFFF" bordercolor="#f9f9f9" large newwindow="false"]button text[/tds-buttonslidedown]',
		),
		__('Button w/ Slide Down Effect (X Large)', 'tdshortcodes') => array(
			'description' => __('Inserts a button with Slide Down Effect.', 'tdshortcodes'),
			'shortcode' => '[tds-buttonslidedown link="#" color="#EDEDED" textcolor="#7D7B6D" colorhover="#000000" textcolorhover="#FFFFFF" bordercolor="#f9f9f9" xlarge newwindow="false"]button text[/tds-buttonslidedown]',
		),
		__('Button w/ Slide Down Effect &amp; Icon (Small)', 'tdshortcodes') => array(
			'description' => __('Inserts a button with Slide Down Effect.', 'tdshortcodes'),
			'shortcode' => '[tds-buttonslidedown link="#" icon="'.tds_get_fontawsomeicontag("cog","","",true).'" color="#EDEDED" textcolor="#7D7B6D" colorhover="#000000" textcolorhover="#FFFFFF" bordercolor="#f9f9f9" small newwindow="false"]button text[/tds-buttonslidedown]',
		),
		__('Button w/ Slide Down Effect &amp; Icon (Medium)', 'tdshortcodes') => array(
			'description' => __('Inserts a button with Slide Down Effect.', 'tdshortcodes'),
			'shortcode' => '[tds-buttonslidedown link="#" icon="'.tds_get_fontawsomeicontag("cog","","",true).'" color="#EDEDED" textcolor="#7D7B6D" colorhover="#000000" textcolorhover="#FFFFFF" bordercolor="#f9f9f9" medium newwindow="false"]button text[/tds-buttonslidedown]',
		),
		__('Button w/ Slide Down Effect &amp; Icon (Large)', 'tdshortcodes') => array(
			'description' => __('Inserts a button with Slide Down Effect.', 'tdshortcodes'),
			'shortcode' => '[tds-buttonslidedown link="#" icon="'.tds_get_fontawsomeicontag("cog","","",true).'" color="#EDEDED" textcolor="#7D7B6D" colorhover="#000000" textcolorhover="#FFFFFF" bordercolor="#f9f9f9" large newwindow="false"]button text[/tds-buttonslidedown]',
		),
		__('Button w/ Slide Down Effect &amp; Icon (X Large)', 'tdshortcodes') => array(
			'description' => __('Inserts a button with Slide Down Effect.', 'tdshortcodes'),
			'shortcode' => '[tds-buttonslidedown link="#" icon="'.tds_get_fontawsomeicontag("cog","","",true).'"  color="#EDEDED" textcolor="#7D7B6D" colorhover="#000000" textcolorhover="#FFFFFF" bordercolor="#f9f9f9" xlarge newwindow="false"]button text[/tds-buttonslidedown]',
		),


		__('Button Transparent (Small)', 'tdshortcodes') => array(
			'description' => __('Inserts a transparent button.', 'tdshortcodes'),
			'shortcode' => '[tds-buttontransparent small link="#" textcolor="#ffffff" textcolorhover="#000000" buttoncolor="#000000" buttoncolorhover="#ff0000" bordercolor="#888888" bordersize="4px" bgcolortransparency="30" bgcolorhovertransparency="80" newwindow="true" ]button text[/tds-buttontransparent]',
		),
		__('Button Transparent (Medium)', 'tdshortcodes') => array(
			'description' => __('Inserts a transparent button.', 'tdshortcodes'),
			'shortcode' => '[tds-buttontransparent medium link="#" textcolor="#ffffff" textcolorhover="#000000" buttoncolor="#000000" buttoncolorhover="#ff0000" bordercolor="#888888" bordersize="4px" bgcolortransparency="30" bgcolorhovertransparency="80" newwindow="true" ]button text[/tds-buttontransparent]',
		),
		__('Button Transparent  (Large)', 'tdshortcodes') => array(
			'description' => __('Inserts a transparent button.', 'tdshortcodes'),
			'shortcode' => '[tds-buttontransparent large link="#" textcolor="#ffffff" textcolorhover="#000000" buttoncolor="#000000" buttoncolorhover="#ff0000" bordercolor="#888888" bordersize="4px" bgcolortransparency="30" bgcolorhovertransparency="80" newwindow="true" ]button text[/tds-buttontransparent]',
		),
		__('Button Transparent  (X Large)', 'tdshortcodes') => array(
			'description' => __('Inserts a transparent button.', 'tdshortcodes'),
			'shortcode' => '[tds-buttontransparent xlarge link="#" textcolor="#ffffff" textcolorhover="#000000" buttoncolor="#000000" buttoncolorhover="#ff0000" bordercolor="#888888" bordersize="4px" bgcolortransparency="30" bgcolorhovertransparency="80" newwindow="true" ]button text[/tds-buttontransparent]',
		),
		__('Button Transparent (Medium) w/ icon', 'tdshortcodes') => array(
			'description' => __('Inserts a transparent button.', 'tdshortcodes'),
			'shortcode' => '[tds-buttontransparent medium link="#" icon="'.tds_get_fontawsomeicontag("cog","","",true).'" textcolor="#ffffff" textcolorhover="#000000" buttoncolor="#000000" buttoncolorhover="#ff0000" bordercolor="#888888" bordersize="4px" bgcolortransparency="30" bgcolorhovertransparency="80" newwindow="true" ]button text[/tds-buttontransparent]',
		),
	),

	// Caption
	__('Caption', 'tdshortcodes') => array(
		__('Caption image with hover effects', 'tdshortcodes') => array(
			'description' => __('Caption with 7 hover effects with: <br> <strong>moveDown</strong>,<br> <strong>moveUp</strong>,<br> <strong>slideUp</strong>,<br> <strong>flip</strong>,<br> <strong>zoomIn</strong>,<br> <strong>zoomOut</strong> and<br> <strong>expand</strong>. <br><br>Example:<br> [tds-caption moveDown] <br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.', 'tdshortcodes'),
			'shortcode' => "[tds-caption slideUp bordercolor=\"#ccc\" bordersize=\"1px\"]\n[tds-image src=\"" .TDS_PLUGIN_URL ."inc/images/td-framework.png\" title=\"Image Title\" alt=\"Alt Text\"]\n[tds-info backgroundcolor=\"#2C3F52\"]\n[tds-header 5 color=\"#FFFFFF\"]Image Title[/tds-header]\n[tds-author textcolor=\"#ED4E6E\"]The Author[/tds-author]\n[tds-button medium link=\"#\" newwindow=\"false\" none]button text[/tds-button]\n[/tds-info]\n[/tds-caption]",
		),
		// *** removed using icon effects
		//__('Caption icon with hover effects', 'tdshortcodes') => array(
		//	'description' => __('Caption with 7 hover effects with: <br> <strong>moveDown</strong>,<br> <strong>moveUp</strong>,<br> <strong>slideUp</strong>,<br> <strong>flip</strong>,<br> <strong>zoomIn</strong>,<br> <strong>zoomOut</strong> and<br> <strong>expand</strong>. <br><br>Example:<br> [tds-caption moveDown]', 'tdshortcodes'),
		//	'shortcode' => "[tds-caption slideUp]\n[tds-icon name=\"fa-camera\" 4x]\n[tds-info backgroundcolor=\"#2C3F52\" textcolor=\"#ED4E6E\"]\n[tds-header 5]Image Title[/tds-header]\n[tds-author textcolor=\"#ED4E6E\"]The Author[/tds-author]\n[tds-button medium link=\"#\" newwindow=\"false\" none]button text[/tds-button]\n[/tds-info]\n[/tds-caption]",
		//	),
	),

	// Code
	__('Code', 'tdshortcodes') => array(
		__('Code', 'tdshortcodes') => array(
			'description' => __('Display a shortcode inside this block.', 'tdshortcodes'),
			'shortcode' => '[tds-code]shortcode here[/tds-code]',
		)
	),

	// Columns
	__('Columns', 'tdshortcodes') => array(
		__('1 column', 'tdshortcodes') => array(
			'description' => __('Inserts one columns in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns]\n[tds-column full]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('2 columns', 'tdshortcodes') => array(
			'description' => __('Inserts two columns in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns]\n[tds-column half]\n\nContent here\n\n[/tds-column]\n[tds-column half last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('1/3 - 2/3', 'tdshortcodes') => array(
			'description' => __('Inserts two columns, one a third and the other two thirds, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns]\n[tds-column third]\n\nContent here\n\n[/tds-column]\n[tds-column twothird last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('2/3 - 1/3', 'tdshortcodes') => array(
			'description' => __('Inserts two columns, one two thirds and the other a third, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns]\n[tds-column twothird]\n\nContent here\n\n[/tds-column]\n[tds-column third last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('1/4 - 3/4', 'tdshortcodes') => array(
			'description' => __('Inserts two columns, one a fourth and the other three fourths, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns]\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[tds-column threefourth last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('1/4 - 1/4 - 1/2', 'tdshortcodes') => array(
			'description' => __('Inserts two columns, one a fourth and the other three fourths, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns]\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[tds-column half last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('1/4 - 1/2 - 1/4', 'tdshortcodes') => array(
			'description' => __('Inserts two columns, one a fourth and the other three fourths, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns]\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[tds-column half last]\n\nContent here\n\n[/tds-column]\n\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('1/2 - 1/4 - 1/4', 'tdshortcodes') => array(
			'description' => __('Inserts two columns, one a fourth and the other three fourths, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns]\n[tds-column half last]\n\nContent here\n\n[/tds-column]\n\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('3/4 - 1/4', 'tdshortcodes') => array(
			'description' => __('Inserts two columns, one three fourths and the other a fourth, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns]\n[tds-column threefourth]\n\nContent here\n\n[/tds-column]\n[tds-column fourth last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('3 columns', 'tdshortcodes') => array(
			'description' => __('Inserts three columns in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns]\n[tds-column third]\n\nContent here\n\n[/tds-column]\n[tds-column third]\n\nContent here\n\n[/tds-column]\n[tds-column third last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('4 columns', 'tdshortcodes') => array(
			'description' => __('Inserts four columns in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns]\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[tds-column fourth last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('5 columns', 'tdshortcodes') => array(
			'description' => __('Inserts five columns in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns]\n[tds-column fifth]\n\nContent here\n\n[/tds-column]\n[tds-column fifth]\n\nContent here\n\n[/tds-column]\n[tds-column fifth]\n\nContent here\n\n[/tds-column]\n[tds-column fifth]\n\nContent here\n\n[/tds-column]\n[tds-column fifth last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Custom 2 columns', 'tdshortcodes') => array(
			'description' => __("1. Insert the default column shortcode, which also can be changed into 3/4/5 columns  2. Then insert only the URL of your favourite background image. 3. Choose your own personal text color  4. Set your own image size (default settings are: 100 % and 150 px), which can be made larger or smaller", 'tdshortcodes'),
			'shortcode' => "[tds-customcolumns image=\"image url\" textcolor=\"#FFFFFF\" backgroundcolor=\"#FFFFFF\" width=\"100\" height=\"150\"]\n[tds-column half]\n\nContent here\n\n[/tds-column]\n[tds-column half last]\n\nContent here\n\n[/tds-column]\n[/tds-customcolumns]\n",
		),

		//Animated Columns
		__('Animated 1 columns', 'tdshortcodes') => array(
			'description' => __('Inserts one animated columns in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns]\n[tds-column full animation=fadeIn]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),

		__('Animated 2 columns', 'tdshortcodes') => array(
			'description' => __('Inserts two animated columns in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns]\n[tds-column half animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column half last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 1/3 - 2/3', 'tdshortcodes') => array(
			'description' => __('Inserts two animated columns, one a third and the other two thirds, in which you can place further content. ', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns]\n[tds-column third animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column twothird last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 2/3 - 1/3', 'tdshortcodes') => array(
			'description' => __('Inserts two animated columns, one two thirds and the other a third, in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns]\n[tds-column twothird animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column third last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 1/4 - 3/4', 'tdshortcodes') => array(
			'description' => __('Inserts two animated columns, one a fourth and the other three fourths, in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns]\n[tds-column fourth animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column threefourth last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 3/4 - 1/4', 'tdshortcodes') => array(
			'description' => __('Inserts two animated columns, one three fourths and the other a fourth, in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns]\n[tds-column threefourth animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column fourth last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 3 columns', 'tdshortcodes') => array(
			'description' => __('Inserts three animated columns in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns]\n[tds-column third animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column third animation=fadeIn]\n\nContent here\n\n[/tds-column]\n[tds-column third last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 4 columns', 'tdshortcodes') => array(
			'description' => __('Inserts four animated columns in which you can place further content. ', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns]\n[tds-column fourth animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column fourth animation=fadeIn]\n\nContent here\n\n[/tds-column]\n[tds-column fourth animation=fadeIn]\n\nContent here\n\n[/tds-column]\n[tds-column fourth last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 5 columns', 'tdshortcodes') => array(
			'description' => __('Inserts five animated columns in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns]\n[tds-column fifth animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column fifth animation=fadeIn]\n\nContent here\n\n[/tds-column]\n[tds-column fifth animation=fadeIn]\n\nContent here\n\n[/tds-column]\n[tds-column fifth animation=fadeIn]\n\nContent here\n\n[/tds-column]\n[tds-column fifth last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated Custom 2 columns', 'tdshortcodes') => array(
			'description' => __("1. Insert the default animated column shortcode, which also can be changed into 3/4/5 columns  2. Then insert only the URL of your favourite background image. 3. Choose your own personal text color  4. Set your own image size (default settings are: 100 % and 150 px), which can be made larger or smaller ", 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-customcolumns image=\"image url\" textcolor=\"#FFFFFF\" backgroundcolor=\"#FFFFFF\" width=\"100\" height=\"150\" animation=fadeInLeft]\n[tds-column half]\n\nContent here\n\n[/tds-column]\n[tds-column half last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-customcolumns]\n",
		)
	),

	// Columns (divider)
	__('Columns (divider)', 'tdshortcodes') => array(
		__('2 columns + divider', 'tdshortcodes') => array(
			'description' => __('Inserts two columns separated by a divider line in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns divider]\n[tds-column half]\n\nContent here\n\n[/tds-column]\n[tds-column half last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('1/3 - 2/3 + divider', 'tdshortcodes') => array(
			'description' => __('Inserts two columns, one a third and the other two thirds, separated by a divider line in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns divider]\n[tds-column third]\n\nContent here\n\n[/tds-column]\n[tds-column twothird last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('2/3 - 1/3 + divider', 'tdshortcodes') => array(
			'description' => __('Inserts two columns, one two thirds and the other a third, separated by a divider line in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns divider]\n[tds-column twothird]\n\nContent here\n\n[/tds-column]\n[tds-column third last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('1/4 - 3/4 + divider', 'tdshortcodes') => array(
			'description' => __('Inserts two columns, one a fourth and the other three fourths, separated by a divider line in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns divider]\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[tds-column threefourth last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('3/4 - 1/4 + divider', 'tdshortcodes') => array(
			'description' => __('Inserts two columns, one three fourths and the other a fourth, separated by a divider line in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns divider]\n[tds-column threefourth]\n\nContent here\n\n[/tds-column]\n[tds-column fourth last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('3 columns + divider', 'tdshortcodes') => array(
			'description' => __('Inserts three columns separated by a divider line in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns divider]\n[tds-column third]\n\nContent here\n\n[/tds-column]\n[tds-column third]\n\nContent here\n\n[/tds-column]\n[tds-column third last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('4 columns + divider', 'tdshortcodes') => array(
			'description' => __('Inserts four columns separated by a divider line in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns divider]\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[tds-column fourth]\n\nContent here\n\n[/tds-column]\n[tds-column fourth last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('5 columns + divider', 'tdshortcodes') => array(
			'description' => __('Inserts five columns separated by a divider line in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-columns divider]\n[tds-column fifth]\n\nContent here\n\n[/tds-column]\n[tds-column fifth]\n\nContent here\n\n[/tds-column]\n[tds-column fifth]\n\nContent here\n\n[/tds-column]\n[tds-column fifth]\n\nContent here\n\n[/tds-column]\n[tds-column fifth last]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),

		//Animated Columns with divider
		__('Animated 2 columns + divider', 'tdshortcodes') => array(
			'description' => __('Inserts two animated columns separated by a divider line in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns divider]\n[tds-column half animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column half last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 1/3 - 2/3 + divider', 'tdshortcodes') => array(
			'description' => __('Inserts two animated columns, one a third and the other two thirds, separated by a divider line in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns divider]\n[tds-column third animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column twothird last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 2/3 - 1/3 + divider', 'tdshortcodes') => array(
			'description' => __('Inserts two animated columns, one two thirds and the other a third, separated by a divider line in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns divider]\n[tds-column twothird animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column third last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 1/4 - 3/4 + divider', 'tdshortcodes') => array(
			'description' => __('Inserts two animated columns, one a fourth and the other three fourths, separated by a divider line in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns divider]\n[tds-column fourth animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column threefourth last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 3/4 - 1/4 + divider', 'tdshortcodes') => array(
			'description' => __('Inserts two animated columns, one three fourths and the other a fourth, separated by a divider line in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns divider]\n[tds-column threefourth animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column fourth last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 3 columns + divider', 'tdshortcodes') => array(
			'description' => __('Inserts three animated columns separated by a divider line in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns divider]\n[tds-column third animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column third animation=fadeIn]\n\nContent here\n\n[/tds-column]\n[tds-column third last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 4 columns + divider', 'tdshortcodes') => array(
			'description' => __('Inserts four animated columns separated by a divider line in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns divider]\n[tds-column fourth animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column fourth animation=fadeIn]\n\nContent here\n\n[/tds-column]\n[tds-column fourth animation=fadeIn]\n\nContent here\n\n[/tds-column]\n[tds-column fourth last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),
		__('Animated 5 columns + divider', 'tdshortcodes') => array(
			'description' => __('Inserts five animated columns separated by a divider line in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-columns divider]\n[tds-column fifth animation=fadeInLeft]\n\nContent here\n\n[/tds-column]\n[tds-column fifth animation=fadeIn]\n\nContent here\n\n[/tds-column]\n[tds-column fifth animation=fadeIn]\n\nContent here\n\n[/tds-column]\n[tds-column fifth animation=fadeIn]\n\nContent here\n\n[/tds-column]\n[tds-column fifth last animation=fadeInRight]\n\nContent here\n\n[/tds-column]\n[/tds-columns]\n",
		),

	),

	// Columns with full height
	__('Columns (fullheight)', 'tdshortcodes') => array(
		__('1 column', 'tdshortcodes') => array(
			'description' => __('Inserts one fullheight column in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn full]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('2 columns', 'tdshortcodes') => array(
			'description' => __('Inserts two fullheight columns in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn one half]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one half last]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('1/3 - 2/3', 'tdshortcodes') => array(
			'description' => __('Inserts two fullheight columns, one a third and the other two thirds, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn one third]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn two third last]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('2/3 - 1/3', 'tdshortcodes') => array(
			'description' => __('Inserts two fullheight columns, one two thirds and the other a third, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn two third]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one third last]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('1/4 - 3/4', 'tdshortcodes') => array(
			'description' => __('Inserts two fullheight columns, one a fourth and the other three fourths, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn one fourth]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn three fourth last]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('3/4 - 1/4', 'tdshortcodes') => array(
			'description' => __('Inserts two fullheight columns, one three fourths and the other a fourth, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn three fourth]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fourth last]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('3 columns', 'tdshortcodes') => array(
			'description' => __('Inserts three fullheight columns in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn one third]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one third]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one third last]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('4 columns', 'tdshortcodes') => array(
			'description' => __('Inserts four fullheight columns in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn one fourth]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fourth]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fourth]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fourth last]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('5 columns', 'tdshortcodes') => array(
			'description' => __('Inserts five fullheight columns in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn one fifth]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fifth]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fifth]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fifth]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fifth last]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('Custom column', 'tdshortcodes') => array(
			'description' => __('Inserts one fullheight column with background image, backgroundcolor, textcolor, opacity and width.', 'tdshortcodes'),
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn image=imageurl backgroundcolor=#e5e5e5 textcolor=#666 backgroundopacity=85 width=30%]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn image=imageurl backgroundcolor=#e5e5e5 textcolor=#666 backgroundopacity=85 width=70%]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),


		//Animated Columns
		__('Animated 1 columns', 'tdshortcodes') => array(
			'description' => __('Inserts one animated fullheight columns in which you can place further content.', 'tdshortcodes'). "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn full animation=fadeIn]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),

		__('Animated 2 columns', 'tdshortcodes') => array(
			'description' => __('Inserts two animated fullheight columns in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn one half animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one half last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('Animated 1/3 - 2/3', 'tdshortcodes') => array(
			'description' => __('Inserts two animated fullheight columns, one a third and the other two thirds, in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn one third animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn two third last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('Animated 2/3 - 1/3', 'tdshortcodes') => array(
			'description' => __('Inserts two animated fullheight columns, one two thirds and the other a third, in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn two third animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one third last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('Animated 1/4 - 3/4', 'tdshortcodes') => array(
			'description' => __('Inserts two animated fullheight columns, one a fourth and the other three fourths, in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn one fourth animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn three fourth last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('Animated 3/4 - 1/4', 'tdshortcodes') => array(
			'description' => __('Inserts two animated fullheight columns, one three fourths and the other a fourth, in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn three fourth animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fourth last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('Animated 3 columns', 'tdshortcodes') => array(
			'description' => __('Inserts three animated fullheight columns in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn one third animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one third animation=fadeIn]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one third last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('Animated 4 columns', 'tdshortcodes') => array(
			'description' => __('Inserts four animated fullheight columns in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn one fourth animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fourth animation=fadeIn]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fourth animation=fadeIn]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fourth last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),
		__('Animated 5 columns', 'tdshortcodes') => array(
			'description' => __('Inserts five animated fullheight columns in which you can place further content.', 'tdshortcodes'). "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn one fifth animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fifth animation=fadeIn]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fifth animation=fadeIn]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fifth animation=fadeIn]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\t[tds-splitcolumn one fifth last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),

		__('Custom animated column', 'tdshortcodes') => array(
			'description' => __('Inserts one fullheight animated column with background image, backgroundcolor, textcolor, opacity and width.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-splitlayout]\n\t[tds-splitcolumn animation=fadeIn image=imageurl backgroundcolor=#e5e5e5 textcolor=#666 backgroundopacity=85 width=30%]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n\n\t[tds-splitcolumn animation=fadeIn image=imageurl backgroundcolor=#e5e5e5 textcolor=#666 backgroundopacity=85 width=70%]\n\n\tContent here\n\n\t[/tds-splitcolumn]\n[/tds-splitlayout]\n",
		),

	),

	// Columns with custom height
	__('Custom Height Columns)', 'tdshortcodes') => array(
		__('1 column', 'tdshortcodes') => array(
			'description' => __('Inserts one custom height column in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn full]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('2 columns', 'tdshortcodes') => array(
			'description' => __('Inserts two custom height columns in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn one half]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one half last]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('1/3 - 2/3', 'tdshortcodes') => array(
			'description' => __('Inserts two custom height columns, one a third and the other two thirds, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn one third]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn two third last]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('2/3 - 1/3', 'tdshortcodes') => array(
			'description' => __('Inserts two custom height columns, one two thirds and the other a third, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn two third]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one third last]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('1/4 - 3/4', 'tdshortcodes') => array(
			'description' => __('Inserts two custom height columns, one a fourth and the other three fourths, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn one fourth]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn three fourth last]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('3/4 - 1/4', 'tdshortcodes') => array(
			'description' => __('Inserts two custom height columns, one three fourths and the other a fourth, in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn three fourth]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fourth last]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('3 columns', 'tdshortcodes') => array(
			'description' => __('Inserts three custom height columns in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn one third]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one third]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one third last]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('4 columns', 'tdshortcodes') => array(
			'description' => __('Inserts four custom height columns in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn one fourth]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fourth]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fourth]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fourth last]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('5 columns', 'tdshortcodes') => array(
			'description' => __('Inserts five custom height columns in which you can place further content.', 'tdshortcodes'),
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn one fifth]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fifth]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fifth]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fifth]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fifth last]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('Custom column', 'tdshortcodes') => array(
			'description' => __('Inserts one custom height column with background image, backgroundcolor, textcolor, opacity and width.', 'tdshortcodes'),
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn image=imageurl backgroundcolor=#e5e5e5 textcolor=#666 backgroundopacity=85 width=30%]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn image=imageurl backgroundcolor=#e5e5e5 textcolor=#666 backgroundopacity=85 width=70%]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),


		//Animated Columns
		__('Animated 1 columns', 'tdshortcodes') => array(
			'description' => __('Inserts one animated custom height columns in which you can place further content.', 'tdshortcodes'). "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn full animation=fadeIn]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),

		__('Animated 2 columns', 'tdshortcodes') => array(
			'description' => __('Inserts two animated custom height columns in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn one half animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one half last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('Animated 1/3 - 2/3', 'tdshortcodes') => array(
			'description' => __('Inserts two animated custom height columns, one a third and the other two thirds, in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn one third animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn two third last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('Animated 2/3 - 1/3', 'tdshortcodes') => array(
			'description' => __('Inserts two animated custom height columns, one two thirds and the other a third, in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn two third animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one third last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('Animated 1/4 - 3/4', 'tdshortcodes') => array(
			'description' => __('Inserts two animated custom height columns, one a fourth and the other three fourths, in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn one fourth animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn three fourth last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('Animated 3/4 - 1/4', 'tdshortcodes') => array(
			'description' => __('Inserts two animated custom height columns, one three fourths and the other a fourth, in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn three fourth animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fourth last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('Animated 3 columns', 'tdshortcodes') => array(
			'description' => __('Inserts three animated custom height columns in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn one third animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one third animation=fadeIn]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one third last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('Animated 4 columns', 'tdshortcodes') => array(
			'description' => __('Inserts four animated custom height columns in which you can place further content.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn one fourth animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fourth animation=fadeIn]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fourth animation=fadeIn]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fourth last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),
		__('Animated 5 columns', 'tdshortcodes') => array(
			'description' => __('Inserts five animated custom height columns in which you can place further content.', 'tdshortcodes'). "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn one fifth animation=fadeInLeft]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fifth animation=fadeIn]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fifth animation=fadeIn]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fifth animation=fadeIn]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\t[tds-customheightcolumn one fifth last animation=fadeInRight]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),

		__('Custom animated column', 'tdshortcodes') => array(
			'description' => __('Inserts one custom height animated column with background image, backgroundcolor, textcolor, opacity and width.', 'tdshortcodes') . "
				<br><br><strong>Attention seekers:</strong>

				flash, bounce, shake, tada, swing, wobble, wiggle, pulse

				<br><br><strong>Flippers (currently Webkit, Firefox, & IE10 only):</strong>

				flip, flipInX, flipOutX, flipInY, flipOutY

				<br><br><strong>Fading entrances:</strong>

				fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig

				<br><br><strong>Fading exits:</strong>

				fadeOut, fadeOutUp, fadeOutDown, fadeOutLeft, fadeOutRight, fadeOutUpBig, fadeOutDownBig, fadeOutLeftBig, fadeOutRightBig

				<br><br><strong>Bouncing entrances:</strong>

				bounceIn, bounceInDown, bounceInUp, bounceInLeft, bounceInRight

				<br><br><strong>Bouncing exits:</strong>

				bounceOut, bounceOutDown, bounceOutUp, bounceOutLeft, bounceOutRight

				<br><br><strong>Rotating entrances:</strong>

				rotateIn, rotateInDownLeft, rotateInDownRight, rotateInUpLeft, rotateInUpRight

				<br><br><strong>Rotating exits:</strong>

				rotateOut, rotateOutDownLeft, rotateOutDownRight, rotateOutUpLeft, rotateOutUpRight

				<br><br><strong>Lightspeed:</strong>

				lightSpeedIn, lightSpeedOut

				<br><br><strong>Specials:</strong>

				hinge, rollIn, rollOut

				<br><br>Some animations is using CSS 3 transform which may not work smoothly in IE9 or later versions.",
			'shortcode' => "[tds-customheightcolumns height=\"240px\"]\n\t[tds-customheightcolumn animation=fadeIn image=imageurl backgroundcolor=#e5e5e5 textcolor=#666 backgroundopacity=85 width=30%]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n\n\t[tds-customheightcolumn animation=fadeIn image=imageurl backgroundcolor=#e5e5e5 textcolor=#666 backgroundopacity=85 width=70%]\n\n\tContent here\n\n\t[/tds-customheightcolumn]\n[/tds-customheightcolumns]\n",
		),

	),

	// Counter
	__('Counter', 'tdshortcodes') => array(
		__('Counter', 'tdshortcodes') => array(
			'description' => __('Inserts a counter. You can also insert other shortcodes below the counter', 'tdshortcodes'),
			'shortcode' => "[tdf-counter number=\"500\" delay=\"2000\" color=\"#000000\" size=\"50px\"]\n\n[tds-separator color=\"#c50000\" thickness=\"1\" width=\"50%\"]\n[tds-icon name=\"fa-circle-thin\" size=\"2x\"]\n[/tds-separator]\n\n[tds-header 4 color=\"#000\"]Web Development[/tds-header]\n\n[/tdf-counter]",
		),
	),

	// Dividers
	__('Dividers', 'tdshortcodes') => array(
		__('Icon Separator', 'tdshortcodes') => array(
			'description' => __('Inserts a horizontal separator line with an icon.', 'tdshortcodes'),
			'shortcode' => '[tds-separator color=#c50000 thickness=1 width=50%][tds-icon name=fa-circle-thin size="2x"][/tds-separator]',
		),
		__('Text Separator', 'tdshortcodes') => array(
			'description' => __('Inserts a horizontal separator line with a text.', 'tdshortcodes'),
			'shortcode' => '[tds-separator color=#c50000 thickness=1 width=50%] your text [/tds-separator]',
		),
		__('Dotted', 'tdshortcodes') => array(
			'description' => __('Inserts a dotted divider line.', 'tdshortcodes'),
			'shortcode' => '[tds-divider dotted thickness=10]',
		),
		__('Invisible Spacer 20px', 'tdshortcodes') => array(
			'description' => __('Inserts a spacer of 20 pixels high. Perfect to create space between columns.', 'tdshortcodes'),
			'shortcode' => '[tds-divider invisible thickness=10]',
		),
		__('Slashed', 'tdshortcodes') => array(
			'description' => __('Inserts a slashed tall divider line.', 'tdshortcodes'),
			'shortcode' => '[tds-divider slashed thickness=10]',
		),
		__('Solid', 'tdshortcodes') => array(
			'description' => __('Inserts a solid divider line.', 'tdshortcodes'),
			'shortcode' => '[tds-divider solid thickness=10]',
		),
		__('To top', 'tdshortcodes') => array(
			'description' => __('Inserts a solid divider line with a button that scrolls the page to the top.', 'tdshortcodes'),
			'shortcode' => '[tds-divider totop thickness=10]',
		),
		__('Custom Color', 'tdshortcodes') => array(
			'description' => __('Inserts a solid divider line with color.', 'tdshortcodes'),
			'shortcode' => '[tds-divider solid color=#c50000 thickness=10 width=100%]',
		),
		__('Align Left', 'tdshortcodes') => array(
			'description' => __('Inserts a solid divider line with color and align left .', 'tdshortcodes'),
			'shortcode' => '[tds-divider solid color=#c50000 thickness=10 width=100% align=left]',
		),
		__('Align Right', 'tdshortcodes') => array(
			'description' => __('Inserts a solid divider line with color and align right .', 'tdshortcodes'),
			'shortcode' => '[tds-divider solid color=#c50000 thickness=10 width=100% align=right]',
		),
	),

	// Dropcaps
	__('Dropcaps', 'tdshortcodes') => array(
		__('Red dropcap', 'tdshortcodes') => array(
			'description' => __('Inserts a red dropcap.', 'tdshortcodes'),
			'shortcode' => '[tds-dropcap red]A[/tds-dropcap]',
		),
		__('Green dropcap', 'tdshortcodes') => array(
			'description' => __('Inserts a green dropcap.', 'tdshortcodes'),
			'shortcode' => '[tds-dropcap green]A[/tds-dropcap]',
		),
		__('Blue dropcap', 'tdshortcodes') => array(
			'description' => __('Inserts a blue dropcap.', 'tdshortcodes'),
			'shortcode' => '[tds-dropcap blue]A[/tds-dropcap]',
		),
		__('White dropcap', 'tdshortcodes') => array(
			'description' => __('Inserts a white dropcap.', 'tdshortcodes'),
			'shortcode' => '[tds-dropcap white]A[/tds-dropcap]',
		),
		__('Black dropcap', 'tdshortcodes') => array(
			'description' => __('Inserts a black dropcap.', 'tdshortcodes'),
			'shortcode' => '[tds-dropcap black]A[/tds-dropcap]',
		),
		__('Grey dropcap', 'tdshortcodes') => array(
			'description' => __('Inserts a grey dropcap.', 'tdshortcodes'),
			'shortcode' => '[tds-dropcap grey]A[/tds-dropcap]',
		),
	),

	// Headings
	__('Headings', 'tdshortcodes') => array(
		__('Padded heading 1', 'tdshortcodes') => array(
			'description' => __('Inserts a padded heading.', 'tdshortcodes'),
			'shortcode' => "[tds-header 1]text[/tds-header]",
		),
		__('Padded heading 2', 'tdshortcodes') => array(
			'description' => __('Inserts a padded heading.', 'tdshortcodes'),
			'shortcode' => "[tds-header 2]text[/tds-header]",
		),
		__('Padded heading 3', 'tdshortcodes') => array(
			'description' => __('Inserts a padded heading.', 'tdshortcodes'),
			'shortcode' => "[tds-header 3]text[/tds-header]",
		),
		__('Padded heading 4', 'tdshortcodes') => array(
			'description' => __('Inserts a padded heading.', 'tdshortcodes'),
			'shortcode' => "[tds-header 4]text[/tds-header]",
		),
		__('Padded heading 5', 'tdshortcodes') => array(
			'description' => __('Inserts a padded heading.', 'tdshortcodes'),
			'shortcode' => "[tds-header 5]text[/tds-header]",
		),
		__('Padded heading 6', 'tdshortcodes') => array(
			'description' => __('Inserts a padded heading.', 'tdshortcodes'),
			'shortcode' => "[tds-header 6]text[/tds-header]",
		),
	),

	// Icons
	__('Icons', 'tdshortcodes') => array(),

	// Image gallery
	__('Image gallery', 'tdshortcodes') => array(
		__('Image gallery, 2 columns', 'tdshortcodes') => array(
			'description' => __('Inserts an image gallery with 2 columns.', 'tdshortcodes'),
			'shortcode' => "[tds-gallery columns=\"2\"]\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n[/tds-gallery]",
		),
		__('Image gallery, 3 columns', 'tdshortcodes') => array(
			'description' => __('Inserts an image gallery with 3 columns.', 'tdshortcodes'),
			'shortcode' => "[tds-gallery columns=\"3\"]\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n[/tds-gallery]",
		),
		__('Image gallery, 4 columns', 'tdshortcodes') => array(
			'description' => __('Inserts an image gallery with 4 columns.', 'tdshortcodes'),
			'shortcode' => "[tds-gallery columns=\"4\"]\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n[/tds-gallery]",
		),
		__('Image gallery, 6 columns', 'tdshortcodes') => array(
			'description' => __('Inserts an image gallery with 6 columns.', 'tdshortcodes'),
			'shortcode' => "[tds-gallery columns=\"6\"]\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n<img src=\"image url\" title=\"image title\" alt=\"image description\">\n[/tds-gallery]",
		),
	),

	// Image Menu
	__('Image Menu', 'tdshortcodes') => array(
		__('Image Menu Panel', 'tdshortcodes') => array(
			'description' => __('inserts Image Menu. Image dimension must be width = 75px  and height = 350px ', 'tdshortcodes'),
			'shortcode' => "[tds-imagemenupanel]\n[tds-imagemenu imageurl=\"image url\" imagepreviewurl=\"image url\" title=\"title here\" subtitle=\"subtitle here\"]content here[/tds-imagemenu]\n[tds-imagemenu imageurl=\"image url\" imagepreviewurl=\"image url\" title=\"title here\" subtitle=\"subtitle here\"]content here[/tds-imagemenu]\n[/tds-imagemenupanel]",
		),
		__('Image Menu', 'tdshortcodes') => array(
			'description' => __('inserts Single Image Menu. Will only work inside [tds-imagemenupanel]. Image dimension must be width = 75px  and height = 350px ', 'tdshortcodes'),
			'shortcode' => "[tds-imagemenu imageurl=\"image url\" imagepreviewurl=\"image url\" title=\"title here\" subtitle=\"subtitle here\"]content here[/tds-imagemenu]\n",
		)
	),

	// Lists
	__('Lists', 'tdshortcodes') => array(
		__('Balloon', 'tdshortcodes') => array(
			'description' => __('A list with balloon icon bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list balloon]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('Circle', 'tdshortcodes') => array(
			'description' => __('A list with circular bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list circle]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('Creditcard', 'tdshortcodes') => array(
			'description' => __('A list with creditcard icon bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list creditcard]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('Dot', 'tdshortcodes') => array(
			'description' => __('A list with dotted bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list dots]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('File', 'tdshortcodes') => array(
			'description' => __('A list with file icon bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list file]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('Mail', 'tdshortcodes') => array(
			'description' => __('A list with mail icon bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list mail]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('Info', 'tdshortcodes') => array(
			'description' => __('A list with info icon bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list info]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('Minus', 'tdshortcodes') => array(
			'description' => __('A list with minus sign bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list minus]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('Phone', 'tdshortcodes') => array(
			'description' => __('A list with phone icon bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list phone]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('Plus', 'tdshortcodes') => array(
			'description' => __('A list with plus sign bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list plus]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('Question', 'tdshortcodes') => array(
			'description' => __('A list with question icon bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list question]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('Square', 'tdshortcodes') => array(
			'description' => __('A list with square bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list square]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('Support', 'tdshortcodes') => array(
			'description' => __('A list with "support" icon bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list support]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('V', 'tdshortcodes') => array(
			'description' => __('A list with tick bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list v]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('Warning', 'tdshortcodes') => array(
			'description' => __('A list with warning icon bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list warning]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
		__('X', 'tdshortcodes') => array(
			'description' => __('A list with cross bullets.', 'tdshortcodes'),
			'shortcode' => "[tds-list x]\nitem 1\nitem 2\nitem 3\nitem 4\n[/tds-list]",
		),
	),

	// Notifications
	__('Notifications', 'tdshortcodes') => array(
		__('Warning', 'tdshortcodes') => array(
			'description' => __('A warning notification.', 'tdshortcodes'),
			'shortcode' => '[tds-notify warn]Text here[/tds-notify]',
		),
		__('Info', 'tdshortcodes') => array(
			'description' => __('An informative notification.', 'tdshortcodes'),
			'shortcode' => '[tds-notify info]Text here[/tds-notify]',
		),
		__('Textbox white', 'tdshortcodes') => array(
			'description' => __('An informative White box notification.', 'tdshortcodes'),
			'shortcode' => '[tds-notify textbox-white]Text here[/tds-notify]',
		),
		__('Textbox black', 'tdshortcodes') => array(
			'description' => __('An informative Black box notification.', 'tdshortcodes'),
			'shortcode' => '[tds-notify textbox-black]Text here[/tds-notify]',
		),
		__('Textbox grey', 'tdshortcodes') => array(
			'description' => __('An informative Grey box notification.', 'tdshortcodes'),
			'shortcode' => '[tds-notify textbox-grey]Text here[/tds-notify]',
		),
		__('Ok', 'tdshortcodes') => array(
			'description' => __('A positive notification.', 'tdshortcodes'),
			'shortcode' => '[tds-notify ok]Text here[/tds-notify]',
		),
		__('Question', 'tdshortcodes') => array(
			'description' => __('A question notification.', 'tdshortcodes'),
			'shortcode' => '[tds-notify question]Text here[/tds-notify]',
		),
		__('Error', 'tdshortcodes') => array(
			'description' => __('An error notification.', 'tdshortcodes'),
			'shortcode' => '[tds-notify error]Text here[/tds-notify]',
		),
		__('Custom', 'tdshortcodes') => array(
			'description' => __('A custom notification.', 'tdshortcodes'),
			'shortcode' => '[tds-notify custom bg="#000000" color="#FFFFFF" align="center" transparency="100" bordersize="0px" bordercolor="#000" width="100%" ]Text here[/tds-notify]',
		),
		__('Custom with Icon', 'tdshortcodes') => array(
			'description' => __('A custom notification.', 'tdshortcodes'),
			'shortcode' => '[tds-notify custom bg="#000000" color="#FFFFFF" icon="'.tds_get_fontawsomeicontag("cog","","",true).'" iconcolor="#ffffff" iconbgcolor="#a7a7a7" align="center" transparency="100" bordersize="0px" bordercolor="#000" width="100%"]Text here[/tds-notify]',
		),
	),

	// Price Table
	__('Price Table ', 'tdshortcodes') => array(
		__('Price Table (1 Column)', 'tdshortcodes') => array(
			'description' => __('Inserts a Price Table.', 'tdshortcodes'),
			'shortcode' => "[tds-pricetable columns=\"1\"]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[/tds-pricetable]",
		),
		__('Price Table (2 Columns)', 'tdshortcodes') => array(
			'description' => __('Inserts a Price Table.', 'tdshortcodes'),
			'shortcode' => "[tds-pricetable columns=\"2\"]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[/tds-pricetable]",
		),
		__('Price Table (3 Column)', 'tdshortcodes') => array(
			'description' => __('Inserts a Price Table.', 'tdshortcodes'),
			'shortcode' => "[tds-pricetable columns=\"3\"]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[/tds-pricetable]",
		),
		__('Price Table (4 Column)', 'tdshortcodes') => array(
			'description' => __('Inserts a Price Table.', 'tdshortcodes'),
			'shortcode' => "[tds-pricetable columns=\"4\"]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[/tds-pricetable]",
		),
		__('Price Table (5 Column)', 'tdshortcodes') => array(
			'description' => __('Inserts a Price Table.', 'tdshortcodes'),
			'shortcode' => "[tds-pricetable columns=\"5\"]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[tds-pricetable_column  title=\"title\" subtitle=\"subtitle\" titlefontcolor=\"#efefef\" titlebgcolor=\"#000000\" titlefontsize=\"22px\" toplisttitle=\"toplisttitle\" toplistsubtitle=\"toplistsubtitle\" toplistfontcolor=\"#ffffff\" toplistbgcolor=\"#a2a2a2\" toplistfontsize=\"30px\" backgroundcolor=\"#ffffff\"  fontcolor=\"#7D7D7D\"]\n[tds-pricetable_content]\n[tds-list none]\nlist 1\nlist 2\nlist 3\nlist 4\n[/tds-list]\n[/tds-pricetable_content]\n[tds-pricetable_button buttoncolor=\"#999999\" buttonfontcolor=\"#ffffff\" buttonlink=\"#\" buttontitle=\"Button Title\"]Register Here![/tds-pricetable_button]\n[/tds-pricetable_column]\n[/tds-pricetable]",
		),
	),

	// Progress Bar
	__('Progress Bar', 'tdshortcodes') => array(
		__('Progress Bar Gray', 'tdshortcodes') => array(
			'description' => __('Inserts a Progress Bar Gray.', 'tdshortcodes'),
			'shortcode' => '[tds-progressbar title="Progress Bar" percent="100" color="gray" hidetitle="no"][/tds-progressbar]',
		),
		__('Progress Bar Orange', 'tdshortcodes') => array(
			'description' => __('Inserts a Progress Bar Gray.', 'tdshortcodes'),
			'shortcode' => '[tds-progressbar title="Progress Bar" percent="100" color="orange" hidetitle="no"][/tds-progressbar]',
		),
		__('Progress Bar Silver', 'tdshortcodes') => array(
			'description' => __('Inserts a Progress Bar Gray.', 'tdshortcodes'),
			'shortcode' => '[tds-progressbar title="Progress Bar" percent="100" color="silver" hidetitle="no"][/tds-progressbar]',
		),
		__('Progress Bar Green', 'tdshortcodes') => array(
			'description' => __('Inserts a Progress Bar Gray.', 'tdshortcodes'),
			'shortcode' => '[tds-progressbar title="Progress Bar" percent="100" color="green" hidetitle="no"][/tds-progressbar]',
		),
		__('Progress Bar Blue', 'tdshortcodes') => array(
			'description' => __('Inserts a Progress Bar Gray.', 'tdshortcodes'),
			'shortcode' => '[tds-progressbar title="Progress Bar" percent="100" color="blue" hidetitle="no"][/tds-progressbar]',
		),
		__('Progress Bar Yellow', 'tdshortcodes') => array(
			'description' => __('Inserts a Progress Bar Gray.', 'tdshortcodes'),
			'shortcode' => '[tds-progressbar title="Progress Bar" percent="100" color="yellow" hidetitle="no"][/tds-progressbar]',
		),
		__('Progress Bar Red', 'tdshortcodes') => array(
			'description' => __('Inserts a Progress Bar Gray.', 'tdshortcodes'),
			'shortcode' => '[tds-progressbar title="Progress Bar" percent="100" color="red" hidetitle="no"][/tds-progressbar]',
		),
		__('Progress Bar Aqua', 'tdshortcodes') => array(
			'description' => __('Inserts a Progress Bar Gray.', 'tdshortcodes'),
			'shortcode' => '[tds-progressbar title="Progress Bar" percent="100" color="aqua" hidetitle="no"][/tds-progressbar]',
		),
		__('Progress Bar Teal', 'tdshortcodes') => array(
			'description' => __('Inserts a Progress Bar Gray.', 'tdshortcodes'),
			'shortcode' => '[tds-progressbar title="Progress Bar" percent="100" color="teal" hidetitle="no"][/tds-progressbar]',
		),
		__('Progress Bar Purple', 'tdshortcodes') => array(
			'description' => __('Inserts a Progress Bar Gray.', 'tdshortcodes'),
			'shortcode' => '[tds-progressbar title="Progress Bar" percent="100" color="purple" hidetitle="no"][/tds-progressbar]',
		),
		__('Progress Bar Pink', 'tdshortcodes') => array(
			'description' => __('Inserts a Progress Bar Gray.', 'tdshortcodes'),
			'shortcode' => '[tds-progressbar title="Progress Bar" percent="100" color="pink" hidetitle="no"][/tds-progressbar]',
		)

	),

	// Quotes
	__('Quotes', 'tdshortcodes') => array(
		__('Quote block', 'tdshortcodes') => array(
			'description' => __('Inserts a block which is styled like a quote.', 'tdshortcodes'),
			'shortcode' => '[tds-quote]content here[/tds-quote]',
		),
		__('Pullquote left', 'tdshortcodes') => array(
			'description' => __('Inserts a left-aligned pullquote block.', 'tdshortcodes'),
			'shortcode' => '[tds-pullquote left]content here[/tds-pullquote]',
		),
		__('Pullquote right', 'tdshortcodes') => array(
			'description' => __('Inserts a right-aligned pullquote block.', 'tdshortcodes'),
			'shortcode' => '[tds-pullquote right]content here[/tds-pullquote]',
		),
		__('Quote symbol 1', 'tdshortcodes') => array(
			'description' => __('Inserts a quote symbol image, which will be placed like a dropcap.', 'tdshortcodes'),
			'shortcode' => '[tds-quotesymbol symbol1]',
		),
		__('Quote symbol 2', 'tdshortcodes') => array(
			'description' => __('Inserts a quote symbol image, which will be placed like a dropcap.', 'tdshortcodes'),
			'shortcode' => '[tds-quotesymbol symbol2]',
		),
		__('Quote symbol 3', 'tdshortcodes') => array(
			'description' => __('Inserts a quote symbol image, which will be placed like a dropcap.', 'tdshortcodes'),
			'shortcode' => '[tds-quotesymbol symbol3]',
		),
		__('Quote symbol 4', 'tdshortcodes') => array(
			'description' => __('Inserts a quote symbol image, which will be placed like a dropcap.', 'tdshortcodes'),
			'shortcode' => '[tds-quotesymbol symbol4]',
		),
		__('Quote symbol 5', 'tdshortcodes') => array(
			'description' => __('Inserts a quote symbol image, which will be placed like a dropcap.', 'tdshortcodes'),
			'shortcode' => '[tds-quotesymbol symbol5]',
		),
		__('Quotes Rotator', 'tdshortcodes') => array(
			'description' => __('Inserts a Quotes Rotator.', 'tdshortcodes'),
			'shortcode' => "[tds-quotesrotator-panel fontsize=\"30px\" progressbarcolor=\"#47A3DA\"]\n[tds-quotesrotator author=\"Author here\" imageurl=\"\"]Quote here...[/tds-quotesrotator]\n[tds-quotesrotator author=\"Author here\" imageurl=\"\"]Quote here...[/tds-quotesrotator]\n[/tds-quotesrotator-panel]",
		)
	),

	// Scroll to Section
	__('Scroll To Section', 'tdshortcodes') => array(
		__('Button', 'tdshortcodes') => array(
			'description' => __('Inserts a button with sroll to section effect. For more options on button, check button shortcode. <br /><br />Note: This must be paired with section. SectionID must be unique and the same on button and target section.', 'tdshortcodes'),
			'shortcode' => '[tds-button medium icon="'.tds_get_fontawsomeicontag("cog","","",true).'" scrollto="SectionID"]button text[/tds-button]',
		),
		__('Button w/ Slide Down Effect', 'tdshortcodes') => array(
			'description' => __('Inserts a button with sroll to section effect. For more options on button, check button shortcode.<br /><br />Note: This must be paired with section. SectionID must be unique and the same on button and target section', 'tdshortcodes'),
			'shortcode' => '[tds-buttonslidedown color="#EDEDED" textcolor="#7D7B6D" colorhover="#000000" textcolorhover="#FFFFFF" bordercolor="#f9f9f9" medium scrollto="SectionID"]button text[/tds-buttonslidedown]',
		),
		__('Button Transparent', 'tdshortcodes') => array(
			'description' => __('Inserts a button with sroll to section effect. For more options on button, check button shortcode.<br /><br />Note: This must be paired with section. SectionID must be unique and the same on button and target section', 'tdshortcodes'),
			'shortcode' => '[tds-buttontransparent medium textcolor="#ffffff" textcolorhover="#000000" buttoncolor="#000000" buttoncolorhover="#ff0000" bordercolor="#888888" bordersize="4px" bgcolortransparency="30" bgcolorhovertransparency="80" scrollto="SectionID"]button text[/tds-buttontransparent]',
		),
		__('Section', 'tdshortcodes') => array(
			'description' => __('Inserts a section for scroll to section effect. For more options on section, check section shortcode. <br /><br />Note: This must be paired with button. SectionID must be unique and the same on button and target section', 'tdshortcodes'),
			'shortcode' => "[tds-section background=\"#000000\" textcolor=\"#FFFFFF\" id=\"SectionID\" opacity=\"100\"]content here[/tds-section]",
		),
		__('Section with a background image', 'tdshortcodes') => array(
			'description' => __('Inserts a section for scroll to section effect. For more options on section, check section shortcode. <br /><br />Note: This must be paired with button. SectionID must be unique and the same on button and target section', 'tdshortcodes'),
			'shortcode' => "[tds-section background=\"#FFFFFF\" textcolor=\"#000000\" id=\"SectionID\" backgroundimageurl=\"".TDS_PLUGIN_URL."images/bg-bubbles.jpg\" opacity=\"100\"]content here[/tds-section]",
		),
	),


	// Section
	__('Section', 'tdshortcodes') => array(
		__('Section Separator', 'tdshortcodes') => array(
			'description' => __('Inserts a section separator shortcode, direction down', 'tdshortcodes'),
			'shortcode' => "[tds-section-separator background=\"#FFFFFF\" opacity=\"80\"]",
		),
		__('Section Separator Down', 'tdshortcodes') => array(
			'description' => __('Inserts a section separator shortcode, direction down', 'tdshortcodes'),
			'shortcode' => "[tds-section-separator down background=\"#FFFFFF\" opacity=\"80\"]",
		),
		__('Section', 'tdshortcodes') => array(
			'description' => __('Inserts a section shortcode where you can have 100% width a custom background and text color.', 'tdshortcodes'),
			'shortcode' => "[tds-section background=\"#000000\" textcolor=\"#FFFFFF\" opacity=\"80\"]content here[/tds-section]",
		),
		__('Section with a background image', 'tdshortcodes') => array(
			'description' => __('Inserts a section with background image and parallax scrolling effect.', 'tdshortcodes'),
			'shortcode' => "[tds-section parallax=\"false\" background=\"#FFFFFF\" textcolor=\"#000000\" backgroundimageurl=\"".TDS_PLUGIN_URL."images/bg-bubbles.jpg\" ]content here[/tds-section]",
		),
		__('Section with a background image and a parallax effect', 'tdshortcodes') => array(
			'description' => __('Inserts a section with background image and parallax scrolling effect.', 'tdshortcodes'),
			'shortcode' => "[tds-section background=\"#FFFFFF\" textcolor=\"#000000\" backgroundimageurl=\"".TDS_PLUGIN_URL."images/bg-bubbles.jpg\" ]content here[/tds-section]",
		),
		__('Section with a sequence background image and a parallax effect', 'tdshortcodes') => array(
			'description' => __('Inserts a section with sequence background image and parallax scrolling effect.', 'tdshortcodes'),
			'shortcode' => "[tds-section background=\"#FFFFFF\" textcolor=\"#000000\"]\n[tds-sequence]\ninsert image sequence here\n[/tds-sequence]\n\ncontent here\n\n[/tds-section]",
		),
		__('Section Full Screen', 'tdshortcodes') => array(
			'description' => __('Inserts a section short code perfect for using a full screen video background.', 'tdshortcodes'),
			'shortcode' => "[tds-section fullscreen]content here[/tds-section]",
		),
	),

	// Special Shortcodes
	__('Special Shortcodes', 'tdshortcodes') => array(

		// Category Blog Posts
		__('Category Blog Posts', 'tdshortcodes') => array(
			'description' 	=> __('Inserts a list of latest posts in a grid style format. You select which category to display, limit the number of posts.', 'tdshortcodes'),
			'shortcode' 	=> '[tds-archive category="all" number="10" orderby="latest" showmeta="yes" ]',
		),

		// Custom Latest Posts
		__('Custom Latest Posts', 'tdshortcodes') => array(
			'description' 	=> __('Inserts a list of latest posts in a blog style format. You put a custom title, select which category to display, limit the number of posts, limit the number of words and use thumbnail, medium or large as the size of the featured image.', 'tdshortcodes'),
			'shortcode' 	=> '[tds-blogposts title="Latest Blog Posts" category="all" number="10" count="55" orderby="latest" image="thumbnail" showmeta="yes" titleicon=""]',
		),

		// Highlight
		__('Highlight', 'tdshortcodes') => array(
			'description' 	=> __('Inserts a highlighted text shortcode.', 'tdshortcodes'),
			'shortcode' 	=> '[tds-highlight bg="#000000" color="#FFFFFF" padding="0"]highlighted text[/tds-highlight]'
		),

		// Latest Posts
		__('Latest Posts', 'tdshortcodes') => array(
			'description' 	=> __('Inserts a list of latest posts.', 'tdshortcodes'),
			'shortcode' 	=> '[tds-latestposts title="Latest Posts" category="_name" number="10" orderby="latest" showmeta="yes" imagesize="thumbnail" titleicon=""]',
		),

		// Login Form
		__('Login Form', 'tdshortcodes') => array(
			'description' 	=> __('Inserts a WP Login Form.', 'tdshortcodes'),
			'shortcode' 	=> '[tds-loginform redirect="http://www.home-url.com"]'
		),

		// Popular Posts
		__('Popular Posts', 'tdshortcodes') => array(
			'description' 	=> __('Inserts a list of popular posts.', 'tdshortcodes'),
			'shortcode' 	=> '[tds-latestposts title="Popular Posts" category="_name" number="10" orderby="popular" showmeta="yes" imagesize="thumbnail" titleicon=""]',
		),

		// Portfolio
		__('Portfolio', 'tdshortcodes') => array(
			'description' 	=> __('Inserts a Portfolio block.', 'tdshortcodes'),
			'shortcode' 	=> '[tds-portfolio category="all" number="15"]'
		),

		// Random Posts
		__('Random Posts', 'tdshortcodes') => array(
			'description' 	=> __('Inserts a list of random posts.', 'tdshortcodes'),
			'shortcode'		=> '[tds-latestposts title="Random Posts" category="_name" number="10" orderby="random" showmeta="yes" imagesize="thumbnail" titleicon=""]',
		),

		// Expanding Posts
		__('Expanding Posts', 'tdshortcodes') => array(
			'description' 	=> __('Inserts an expanding posts menu.', 'tdshortcodes'),
			'shortcode'		=> '[tds-expanding-posts category="all" limit="6" lines="5" height="440" background="#FFFFFF" color="#000000" titlecolor="#FFFFFF" linkcolor="#079BEB" linkhover="#666666" buttoncolor="#e5e5e5" buttonhovercolor"="#e5e5e5" buttontextcolor="#000000" buttontexthovercolor="#666666" hoveroverlay="#000000" opacity="85"]',
		),

		// Thumbnail Post Slider
		__('Thumbnail Post Slider', 'tdshortcodes') => array(
			'description' => __('Inserts an Accordion-Carousel Thumbnail slider.', 'tdshortcodes'),
			'shortcode' => '[tds-thumbnailslider category="all" number="20" background="#CCC" textcolor="#000" words="10" bordersize="" bordercolor=""]',
		),

		// Thumbnail Product Slider
		__('Thumbnail Product Slider', 'tdshortcodes') => array(
			'description' 	=> __('Inserts an Accordion-Carousel Thumbnail slider.', 'tdshortcodes'),
			'shortcode' 	=> '[tds-thumbnailslider post_type="product" category="all" number="20" background="#CCC" textcolor="#000" characters="50" bordersize="" bordercolor=""]',
		),
	),

	// Tabs
	__('Tabs', 'tdshortcodes') => array(
		__('Tab block', 'tdshortcodes') => array(
			'description' => __('Inserts a tabbed content block. Use [tds-tab] shortcodes to add more tabs.', 'tdshortcodes'),
			'shortcode' => "[tds-tabs titlefontsize=\"16px\" titlebordercoloractive=\"\" titlebordercolorhover=\"\"]\n[tds-tab title=\"Title here\" icon=\"\"]Content here[/tds-tab]\n[/tds-tabs]",
		),
		__('Left Tab block', 'tdshortcodes') => array(
			'description' => __('Inserts a tabbed content block with tab titles on the left. Use [tds-tab] shortcodes to add more tabs.', 'tdshortcodes'),
			'shortcode' => "[tds-tabs titlefontsize=\"16px\" titlebordercoloractive=\"\" titlebordercolorhover=\"\" left]\n[tds-tab title=\"Title here\" icon=\"\"]Content here[/tds-tab]\n[/tds-tabs]",
		),
		__('Right Tab block', 'tdshortcodes') => array(
			'description' => __('Inserts a tabbed content block with tab titles on the left. Use [tds-tab] shortcodes to add more tabs.', 'tdshortcodes'),
			'shortcode' => "[tds-tabs titlefontsize=\"16px\" titlebordercoloractive=\"\" titlebordercolorhover=\"\" right]\n[tds-tab title=\"Title here\"  icon=\"\"]Content here[/tds-tab]\n[/tds-tabs]",
		),
		__('Single tab', 'tdshortcodes') => array(
			'description' => __('A single tab. This needs to be placed inside a [tds-tabs] shortcode (and not inside another [tds-tab] shortcode) to work.', 'tdshortcodes'),
			'shortcode' => '[tds-tab title="Title here"  icon=\"\"]Content here[/tds-tab]',
		),
	),

	// Text Rotator
	__('Text Rotator', 'tdshortcodes') => array(
		__('Text Rotator', 'tdshortcodes') => array(
			'description' => __('Inserts Text Rotator.', 'tdshortcodes'),
			'shortcode' => "[tds-rotatorpanel duration=\"10000\" transitionspeed=\"3000\"]\n[tds-rotatorblock]content here 1st block[/tds-rotatorblock]\n[tds-rotatorblock]content here 2nd block[/tds-rotatorblock]\n[tds-rotatorblock]content here 3rd block[/tds-rotatorblock]\n[/tds-rotatorpanel]",
		),
		__('Text Rotator Block', 'tdshortcodes') => array(
			'description' => __('Inserts Text Rotator. This will only work in side [tds-rotatorpanel] shortcode', 'tdshortcodes'),
			'shortcode' => '[tds-rotatorblock]content here block[/tds-rotatorblock]',
		),
	),

	// Timed Notification
	__('Timed Notification', 'tdshortcodes') => array(
		__('Timed Notification', 'tdshortcodes') => array(
			'description' => __('Inserts time notification. You can change options for duration, icon, iconcolor, textcolor, backgroundcolor, bordercolor and progressbarcolor.<br /><br /><br />note: progressbar color is 50% opacity.', 'tdshortcodes'),
			'shortcode' => '[tds-timenotification duration="30" textcolor="#7D5912" backgroundcolor="#FFE691" bordercolor="#F6DB7B" progressbarcolor="#FFFFFF"]content here[/tds-timenotification]',
		),
		__('Timed Notification with icon', 'tdshortcodes') => array(
			'description' => __('Inserts time notification. You can change options for duration, icon, iconcolor, textcolor, backgroundcolor, bordercolor and progressbarcolor.<br /><br /><br />note: progressbar color is 50% opacity.', 'tdshortcodes'),
			'shortcode' => '[tds-timenotification duration="30" icon="fa-info-circle" iconcolor="#FFFFFF" textcolor="#7D5912" backgroundcolor="#FFE691" bordercolor="#F6DB7B" progressbarcolor="#FFFFFF"]content here[/tds-timenotification]',
		),
	),

	// Toggle
	__('Toggle', 'tdshortcodes') => array(
		__('Toggle block', 'tdshortcodes') => array(
			'description' => __('Inserts a toggled content block. Use [tds-togglecontent] shortcodes to add more content sections.', 'tdshortcodes'),
			'shortcode' => "[tds-toggle]\n[tds-togglecontent title=\"Title here\" subtitle=\"Optional subtitle here\"]Content here[/tds-togglecontent]\n[/tds-toggle]",
		),
		__('Single toggle section', 'tdshortcodes') => array(
			'description' => __('A single toggle content section. This needs to be placed inside a [tds-toggle] shortcode (and not inside another [tds-togglecontent] shortcode) to work.', 'tdshortcodes'),
			'shortcode' => '[tds-togglecontent title="Title here" subtitle="Optional subtitle here"]Content here[/tds-togglecontent]',
		),

		// Toggle Divider
		__('Toggle Divider', 'tdshortcodes') => array(
			'description' => __('Inserts toggle divider.', 'tdshortcodes'),
			'shortcode' => '[tds-toggledivider title="CLICK ME TO SEE THE CONTENT" contenttextcolor="#000000" titlebgcolor="#CCCCCC" titletextcolor="#000000" titlefontsize="20px" contentbgcolor=""]Content here[/tds-toggledivider]',
		),
	),

	// Vertical Timeline
	__('Vertical Timeline', 'tdshortcodes') => array(
		__('Vertical Timeline', 'tdshortcodes') => array(
			'description' => __('Inserts vertical timeline.', 'tdshortcodes'),
			'shortcode' => "[tds-verticaltimeline-panel bgcolor1=\"#6cbfee\" bgcolor2=\"#3594cb\" timefontsize=\"30px\" titlecolor=\"#ffffff\"]\n[tds-verticaltimeline title=\"Title here\" date=\"01/01/2013\" time=\"00:00\" icon=\"icon-calendar\"]Content here[/tds-verticaltimeline]\n[tds-verticaltimeline title=\"Title here\" date=\"01/01/2013\" time=\"00:00\" icon=\"icon-calendar\"]Content here[/tds-verticaltimeline]\n[tds-verticaltimeline title=\"Title here\" date=\"01/01/2013\" time=\"00:00\" icon=\"icon-calendar\"]Content here[/tds-verticaltimeline]\n[/tds-verticaltimeline-panel]",
		)
	),

);


foreach ($fontawesomeicons as $iconname => $iconclass) {
    $shortcode_categories['Icons'][$iconclass] = array (
			'description' => 'Inserts an icon '.$iconname.' shortcode. [tds-icon name='.$iconclass.' size=default] <br><br>You can increase the size by using 2x, 3x, 4x.<br><br>You can also add animation=fadeIn, fadeInUp, fadeInDown, fadeInLeft, fadeInRight, fadeInUpBig, fadeInDownBig, fadeInLeftBig, fadeInRightBig',
			'shortcode' => '[tds-icon name='.$iconclass.']',

    );
}
// Outputs a category list
//

function core_shortcodes_overlay_categories() {
	global $shortcode_categories;

	foreach ( $shortcode_categories as $category => $shortcodes ) {
		echo '<li data-category="', sanitize_title_with_dashes( $category ), '">', $category, '</li>';
	}
}

// Outputs categories and their shortcodes
//
function core_shortcodes_overlay_shortcodes() {
	global $shortcode_categories;

	foreach ( $shortcode_categories as $category => $shortcodes ) {
		echo '<ul class="shortcodes-', sanitize_title_with_dashes( $category ), '">';

		foreach ( $shortcodes as $name => $shortcode ) {
			if ( ! preg_match( '/fa/', $name ) ){
				echo '<li data-description=\'', $shortcode['description'], '\' data-shortcode=\'', $shortcode['shortcode'], '\'>', $name, '</li>';
			} else {
				echo '<li data-description=\'', $shortcode['description'], '\' data-shortcode=\'', $shortcode['shortcode'], '\' class=\'icon\'>'.tds_get_fontawsomeicontag($name).'</li>';
			}
		}
		echo '</ul>';
	}
}


?>
<!doctype html>
<html>
<head>
<title>Shortcodes</title>
<link rel="stylesheet" href="<?php echo plugins_url(); ?>/td-shortcodes/css/font-awesome.min.css">
<?php /*?><link rel="stylesheet" href="<?php echo THEME_URI; ?>/tdframework/css/font-awesome-ie7.min.css"><?php */?>
<style type="text/css">
	#categories {
		vertical-align: top;
		width: 130px;
		display: inline-block;
		margin: 0;
		padding: 10px;
	}

	#categories > li {
		cursor: pointer;
		padding: 5px;
		margin: 0;
	}

	#categories > li:hover {
		background-color: #21759B;
		color: #fff;
	}

	#shortcodes {
		vertical-align: top;
		width: 260px;
		display: inline-block;
		margin: 0;
		padding: 10px;
		border-left: 1px solid #ddd;
		height: 90%;
	}

	#shortcodes > ul {
		display: none;
	}

	#shortcodes > ul > li {
		cursor: pointer;
		padding: 5px;
		margin: 0;
	}

	#shortcodes > ul > li.icon {
		display: inline-block;
	}

	#shortcodes > ul > li:hover {
		background-color: #21759B;
		color: #fff;
	}

	#description {
		vertical-align: top;
		width: 160px;
		display: inline-block;
		margin: 0;
		padding: 10px;
		border-left: 1px solid #ddd;
		height: 90%;
	}

	#description > p {
		padding: 5px;
	}

	h1 {
		font-size: 1.1em;
		margin: 10px 0;
		padding: 5px;
	}
	.shortcodes-icons li i:before{
		color:#000;
	}
</style>
<script type="text/javascript">
	var ANIMATION_SPEED = 100;

	// Show a category's shortcodes
	jQuery('#categories > li').click(function() {
		var category = jQuery(this).attr('data-category');

		jQuery('#shortcodes > ul').slideUp(ANIMATION_SPEED);
		jQuery('#shortcodes > .shortcodes-' + category).stop(true, false).show(ANIMATION_SPEED);
	});

	// Show description when hovering over a shortcode
	jQuery('#shortcodes > ul > li').hover(function() {
		var description = jQuery(this).attr('data-description');

		jQuery('#description > p').fadeOut(ANIMATION_SPEED, function() {
			jQuery(this).html(description);
			jQuery(this).fadeIn(ANIMATION_SPEED);
		});
	});

	// Insert shortcode
	jQuery('#shortcodes > ul > li').click(function() {
		var shortcode = jQuery(this).attr('data-shortcode');
		window.send_shortcode(shortcode);
	});
	
	var catH = jQuery('#categories').height();
	var shortH = jQuery('#shortcodes').height();
	var descH = jQuery('#description').height();
	var heightArray = [catH,shortH,descH];
	var maxheightArray = Math.max.apply(Math, heightArray);
	jQuery('#categories').css({height:maxheightArray});
	jQuery('#shortcodes').css({height:maxheightArray});
	jQuery('#description').css({height:maxheightArray});
	
	
	var tbWH = jQuery(window).height()- 130;
	
	jQuery('#TB_ajaxContent').css({width:640, height:tbWH});
	
	
	jQuery('#TB_window').load(function () {
		var tbWH = jQuery('#TB_window').height();
		var tbWW = jQuery('#TB_window').width();
		alert(tbWH);
		jQuery('#shorcodePanel').css({height:tbWH, width:tbWW});
	});
	
		
	function getList(){
		jQuery( ".temp i" ).each(function() {
			var Temp = jQuery(this).attr("class").replace('fa fa-', '');
			var text = '"'+Temp+'" => '+ '"fa-' + Temp + '",<br />'
			jQuery( ".inner" ).append(text);
		});
	}
	jQuery( document ).ready(function(){
		getList();
		
	});
</script>
</head>

<body>
	<div id="shorcodePanel">
        <ul id="categories">
        	<li><strong><?php _e( 'Categories', 'tdshortcodes' ); ?></strong></li>
            <?php core_shortcodes_overlay_categories(); ?>
        </ul>
    
        <div id="shortcodes">
            <p style="margin-top: 0"><strong><?php _e( 'Shortcodes', 'tdshortcodes' ); ?></strong></p>
            <?php core_shortcodes_overlay_shortcodes(); ?>
        </div>
    
        <div id="description">
            <p style="margin-top: 30px"><strong><?php _e( 'Description', 'tdshortcodes' ); ?></strong></p>
            
        </div>
    </div>
    
    
</body>
</html>

<!-- script use to autofill icon list
<script type="text/javascript">
	function getList(){
		jQuery( ".temp i" ).each(function() {
			var Temp = jQuery(this).attr("class").replace('fa fa-', '');
			var text = '"'+Temp+'" => '+ '"fa-' + Temp + '",<br />'
			jQuery( ".inner" ).append(text);
		});
	}
	jQuery( document ).ready(function(){
		getList();
		
	});</ script>


<div class="temp" style="display:none;">
</div>
<div class="inner">
</div>-->
    
