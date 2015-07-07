<?php

if (!defined('CORE_VERSION'))
	die();


if ( ! function_exists( 'core_theme_preview_box' ) ) {
/**
 * Header first row
 */
	function core_theme_preview_box(){

		$colorOpacity = core_options_get('color_top_nav_opacity');
		if ( core_options_get('show_preview_box', 'theme') ) {
	?>
		<div id="preview-box-container" class="preview-box">
        	<div id="preview-box">
                <div class="optionlist">
                    <div class="row-blk">
                        <div>
                    		News Scroller BG 
                        </div>
                        <div>
                            <input id="prevNewsBGColor" name="" class="core-option-color-input" type="hidden" value="">
                            <div id="cp_prevNewsBGColor" class="core-option-color" ></div>
						</div>
                    </div>
                     <div class="row-blk">
                        <div>
                    		News Scroller Text
                        </div>
                        <div>
                            <input id="prevNewsTextColor" name="" class="core-option-color-input" type="hidden" value="">
                            <div id="cp_prevNewsTextColor" class="core-option-color" ></div>
						</div>
                    </div>
                    <div class="row-blk">
                        <div>
                    		Top Icons Color
                        </div>
                        <div>
                            <input id="prevHeadIconsColor" name="" class="core-option-color-input" type="hidden" value="#ffffff">
                            <div id="cp_prevHeadIconsColor" class="core-option-color" ></div>
						</div>
                    </div>
                    <div class="row-blk">
                        <div>
                    		Menu Background Color
                        </div>
                        <div>
                            <input id="prevMenuBGColor" class="core-option-color-input" type="hidden" >
                            <div id="cp_prevMenuBGColor" class="core-option-color" ></div>
						</div>
                    </div>
                    <div class="row-blk">
                        <div>
                    		Menu BG Opacity
                        </div>
                        <div class="pb-opacityblk">
                        	<input id="prevMenuBGOpacity" class="core-option-number-input pb-inputopacity" type="text" value="<?php echo $colorOpacity; ?>" data-step="1" data-min="0" data-max="100">
							<div class="core-option-number-up"></div>
                            <div class="core-option-number-down"></div>
                        </div>
                    </div>
                    <div class="row-blk">
                        <div>
                    		Menu Font color
                        </div>
                        <div>
                            <input id="prevMenuFontColor" name="" class="core-option-color-input" type="hidden" value="#ffffff">
                            <div id="cp_prevMenuFontColor" class="core-option-color" ></div>
						</div>
                    </div>
                     <div class="row-blk">
                        <div>
                    		Breadcrumb BG
                        </div>
                        <div>
                            <input id="prevBreadcrumbBGColor" class="core-option-color-input" type="hidden" value="#ffffff">
                            <div id="cp_prevBreadcrumbBGColor" class="core-option-color" ></div>
						</div>
                    </div>
                    <div class="row-blk">
                        <div>
                    		Breadcrumb Text
                        </div>
                        <div>
                            <input id="prevBCTxtColor" name="" class="core-option-color-input" type="hidden" value="#ffffff">
                            <div id="cp_prevBCTxtColor" class="core-option-color" ></div>
						</div>
                    </div>
                    <div class="row-blk">
                        <div>
                    		Breadcrumb Text Hover
                        </div>
                        <div>
                            <input id="prevBCTxtHoverColor" name="" class="core-option-color-input" type="hidden" value="#ffffff">
                            <div id="cp_prevBCTxtHoverColor" class="core-option-color" ></div>
						</div>
                    </div>
                    <div class="row-blk">
                        <div>
                    		Content Background
                        </div>
                        <div>
                            <input id="prevContentBGColor" name="" class="core-option-color-input" type="hidden" value="">
                            <div id="cp_prevContentBGColor" class="core-option-color" ></div>
						</div>
                    </div>
                    <div class="row-blk">
                        <div>
                    		Paragraphs
                        </div>
                        <div>
                            <input id="prevPFontColor" name="" class="core-option-color-input" type="hidden" value="#ffffff">
                            <div id="cp_prevPFontColor" class="core-option-color" ></div>
						</div>
                    </div>
                    <div class="row-blk">
                        <div>
                    		Links
                        </div>
                        <div>
                            <input id="prevLinkColor" name="" class="core-option-color-input" type="hidden" value="#ffffff">
                            <div id="cp_prevLinkColor" class="core-option-color" ></div>
						</div>
                    </div>
                    
                    <div class="row-blk">
                        <div>
                    		Footer Background
                        </div>
                        <div>
                            <input id="prevFooterBGColor" class="core-option-color-input" type="hidden" value="#ffffff">
                            <div id="cp_prevFooterBGColor" class="core-option-color" ></div>
						</div>
                    </div>
                    <div class="row-blk">
                        <div>
                    		Footer Social Icons
                        </div>
                        <div>
                            <input id="prevFooterSocialColor" name="" class="core-option-color-input" type="hidden" value="#ffffff">
                            <div id="cp_prevFooterSocialColor" class="core-option-color" ></div>
						</div>
                    </div>
                    <div class="row-blk">
                        <div>
                    		Footer Menu
                        </div>
                        <div>
                            <input id="prevFooterMenuColor" name="" class="core-option-color-input" type="hidden" value="#ffffff">
                            <div id="cp_prevFooterMenuColor" class="core-option-color" ></div>
						</div>
                    </div>
                    <div class="row-blk">
                        <div>
                    		Footer Copyright
                        </div>
                        <div>
                            <input id="prevFooterCopyrightColor" name="" class="core-option-color-input" type="hidden" value="#ffffff">
                            <div id="cp_prevFooterCopyrightColor" class="core-option-color" ></div>
						</div>
                    </div>
                    
                    
                    <div class="row-blk">
                        <div>
                        Heading 1
                        </div>
                        <div>
                            <input id="prevH1FontColor" class="core-option-color-input" type="hidden" value="">
                            <div id="cp_prevH1FontColor" class="core-option-color" ></div>
						</div>
                    </div>
                	<div class="row-blk">
                        <div>
                        Heading 2
                        </div>
                        <div>
                            <input id="prevH2FontColor" class="core-option-color-input" type="hidden" value="">
                            <div id="cp_prevH2FontColor" class="core-option-color" ></div>
						</div>
                    </div>
                	<div class="row-blk">
                        <div>
                        Heading 3
                        </div>
                        <div>
                            <input id="prevH3FontColor" class="core-option-color-input" type="hidden" value="">
                            <div id="cp_prevH3FontColor" class="core-option-color" ></div>
						</div>
                    </div>
                	<div class="row-blk">
                        <div>
                        Heading 4
                        </div>
                        <div>
                            <input id="prevH4FontColor" class="core-option-color-input" type="hidden" value="">
                            <div id="cp_prevH4FontColor" class="core-option-color" ></div>
						</div>
                    </div>
                	<div class="row-blk">
                        <div>
                        Heading 5
                        </div>
                        <div>
                            <input id="prevH5FontColor" class="core-option-color-input" type="hidden" value="">
                            <div id="cp_prevH5FontColor" class="core-option-color" ></div>
						</div>
                    </div>
                    <div class="row-blk">
                        <div>
                        Heading 6
                        </div>
                        <div>
                            <input id="prevH6FontColor" class="core-option-color-input" type="hidden" value="">
                            <div id="cp_prevH6FontColor" class="core-option-color" ></div>
						</div>
                    </div>
					<div class="clear"></div>
                </div>
        
            </div>
            
            <div id="preview-box-toggle"><i class="fa fa-chevron-right"></i></div>
        
		</div>

	<?php
		}
	} // core_theme_social_row()
}
add_action('core_theme_hook_after_container', 'core_theme_preview_box');

function core_prevbox_enqueue_scripts() {
	wp_enqueue_script('preview-box', CORE_URI. '/includes/previewbox/previewbox.js', '', '', true);
	wp_enqueue_script('core-options', CORE_URI. '/options/options.js', '', '', true);
	wp_enqueue_script('core-colorpicker', CORE_URI . '/includes/colorpicker/colorpicker.js', '', '', true);
	wp_enqueue_style('core-colorpicker', CORE_URI . '/includes/colorpicker/colorpicker.css');
	wp_enqueue_style('preview-box-css', CORE_URI . '/includes/previewbox/previewbox.css');
}
add_action('wp_enqueue_scripts', 'core_prevbox_enqueue_scripts');

if ( ! function_exists( 'core_theme_preview_box_styles' ) ) {
/**
 * Social icons Styles
 */
	function core_theme_preview_box_styles(){


		$bg_colors = array(
			'scroller_bg' 			=> array('#cp_prevNewsBGColor'),
			'scroller_text' 		=> array('#cp_prevNewsTextColor'),
			'social_icons_text' 	=> array('#cp_prevHeadIconsColor'),
			'color_top_main_bg' 	=> array('#cp_prevMenuBGColor'),
			'color_top_menu_text' 	=> array('#cp_prevMenuFontColor'),
			'color_breadcrumb_bg' 	=> array('#cp_prevBreadcrumbBGColor'),
			'color_breadcrumb_text' => array('#cp_prevBCTxtColor'),
			'color_breadcrumb_text_hover' => array('#cp_prevBCTxtHoverColor'),
			'color_content_background' => array('#cp_prevContentBGColor'),
			'color_paragraphs'   	=> array('#cp_prevPFontColor'),
			'color_links'         	=> array('#cp_prevLinkColor'),
			'footer_icons_text' 	=> array('#cp_prevFooterSocialColor'),
			'footer_menu_link' 		=> array('#cp_prevFooterMenuColor'),
			'footer_menu_bg' 		=> array('#cp_prevFooterBGColor'),
			'footer_copyright' 		=> array('#cp_prevFooterCopyrightColor'),
			'color_heading1' 		=> array('#cp_prevH1FontColor'),
			'color_heading2'	 	=> array('#cp_prevH2FontColor'),
			'color_heading3' 		=> array('#cp_prevH3FontColor'),
			'color_heading4' 		=> array('#cp_prevH4FontColor'),
			'color_heading5' 		=> array('#cp_prevH5FontColor'),
			'color_heading6' 		=> array('#cp_prevH6FontColor'),
		);


		apply_colors('background-color', $bg_colors);

	} // core_theme_social_icon_styles()
}
add_action('core_theme_hook_styles', 'core_theme_preview_box_styles');

?>