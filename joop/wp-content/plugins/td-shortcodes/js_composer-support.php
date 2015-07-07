<?php
/*
 * Visual Composer support
 *
 */

// Visual Composer Mapping
if ( function_exists('vc_map') ) {
	
	//
	// Code 
	vc_map( array(
	   "name" => __("TD Block", 'tdshortcodes'),
	   "base" => "tds-block",
	   "class" => "tds-shortcode",
	   "icon"      => "icon-tds",
	   "category" => __('Theme Dutch', 'tdshortcodes'),
	   "params" => array(
	      array(
		      "type" => "textarea_html",
		      "holder" => "div",
		      "heading" => __("Text", 'tdshortcodes'),
		      "param_name" => "content",
		      "value" => " ",
		      "description" => __("Add TD Shortcodes using the TD Shortcodes manager.", 'tdshortcodes')
		    )
	   )
	) );

	//
	// Login Form 
	/*
	vc_map( array(
	   "name" => __("Login Form", 'tdshortcodes'),
	   "base" => "tds-loginform",
	   "class" => "tds-shortcode",
	   "icon"      => "icon-tds",
	   "category" => __('Theme Dutch', 'tdshortcodes'),
	   "params" => array(
	      array(
	         "type" => "textfield",
	         "holder" => "span",
	         "heading" => __("Redirect Url", 'tdshortcodes'),
	         "param_name" => "redirect",
	         "value" => esc_url( home_url( "/" ) ),
	         "description" => __("Enter redirect url.", 'tdshortcodes')
	      )
	   )
	) );

	//
	// Quote
	vc_map( array(
	   "name" => __("Quotes", 'tdshortcodes'),
	   "base" => "tds-quote",
	   "class" => "tds-shortcode",
	   "icon"      => "icon-tds",
	   "category" => __('Theme Dutch', 'tdshortcodes'),
	   "params" => array(
	      array(
	         "type" => "textarea_html",
	         "class" => "",
	         "heading" => __("Content", 'tdshortcodes'),
	         "param_name" => "content",
	         "value" => __("<p>I am quote block. Click edit button to change this text.</p>", 'tdshortcodes'),
	         "description" => __("Enter your content.", 'tdshortcodes')
	      )
	   )
	) );

	//
	// Thumbnail Slider
	vc_map( array(
	   "name" => __("Thumbnail Slider", 'tdshortcodes'),
	   "base" => "tds-thumbnailslider",
	   "class" => "tds-shortcode",
	   "icon"      => "icon-tds",
	   "category" => __('Theme Dutch', 'tdshortcodes'),
	   "params" => array(
	   	  array(
	         "type" => "dropdown",
	         "heading" => __("Post Type", 'tdshortcodes'),
	         "param_name" => "post_type",
	         "value" => array('post' => 'Posts', 'product' => 'Products'),
	      ),
	   	   array(
	            "type" => "textfield",
	            "heading" => __("Categories", 'tdshortcodes'),
	            "param_name" => "category",
	            "value" => "all",
	            "description" => __("Enter categories separated by commas.", 'tdshortcodes')
	        ),
	   	  array(
	         "type" => "dropdown",
	         "heading" => __("Number of Posts", 'tdshortcodes'),
	         "param_name" => "number",
	         "value" => array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20),
	      ),
	      array(
	            "type" => "textfield",
	            "heading" => __("Word Count", 'tdshortcodes'),
	            "param_name" => "words",
	            "value" => "10",
	        ),
	      array(
	         "type" => "colorpicker",
	         "heading" => __("Background", 'tdshortcodes'),
	         "param_name" => "background",
	         "description" => __("Choose background color", 'tdshortcodes')
	      ),
	      array(
	         "type" => "colorpicker",
	         "heading" => __("Text Color", 'tdshortcodes'),
	         "param_name" => "textcolor",
	         "description" => __("Choose text color", 'tdshortcodes')
	      )
	   )
	) );


	//
	// Code 
	vc_map( array(
	   "name" => __("Code", 'tdshortcodes'),
	   "base" => "tds-code",
	   "class" => "tds-shortcode",
	   "icon"      => "icon-tds",
	   "category" => __('Theme Dutch', 'tdshortcodes'),
	   "params" => array(
	      array(
	         "type" => "textarea_raw_html",
	         "holder" => "div",
	         "class" => "",
	         "heading" => __("Content", 'tdshortcodes'),
	         "param_name" => "content",
	         "value" => __("<p>I am test [code]code[/code] block. Click edit button to change this text.</p>", 'tdshortcodes'),
	         "description" => __("Enter your code.", 'tdshortcodes')
	      )
	   )
	) );

	//
	// Display shortcode
	vc_map( array(
	   "name" => __("Padded Heading", 'tdshortcodes'),
	   "base" => "tds-header",
	   "class" => "tds-shortcode",
	   "icon"      => "icon-tds",
	   "category" => __('Theme Dutch', 'tdshortcodes'),
	   "params" => array(
	      array(
	            "type" => "textfield",
	            "heading" => __("Heading Title", 'tdshortcodes'),
	            "param_name" => "content",
	            "value" => "Heading Title",
	        ),
	      array(
	         "type" => "dropdown",
	         "heading" => __("Heading", 'tdshortcodes'),
	         "param_name" => "style",
	         "value" => array(1,2,3,4,5,6),
	      ),
	   )
	) );

	*/


}


?>