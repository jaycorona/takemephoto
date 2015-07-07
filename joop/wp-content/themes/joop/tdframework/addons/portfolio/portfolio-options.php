<?php

	/* =Core Theme Produtcs product options
	-------------------------------------------------------------- */

	global $theme_portfolio_options, $theme_portfolio_layout, $theme_portfolio_specs, $theme_portfolio_sizes, $theme_portfolio_videos;

	// Register core theme product option sections
	//
	// Options
	$theme_portfolio_layout = new CoreOptionHandler(THEME_SLUG . '-td-folio-layout', __('Folio Options', THEME_SLUG) , array('portfolio'));
	core_options_handler_register($theme_portfolio_layout);

	$group = new CoreOptionGroup('td_layout_options', __('General', THEME_SLUG));
	$theme_portfolio_layout->group_add($group);

	// options
	$section = new CoreOptionSection('td_layout');
	$group->section_add($section);

	$section->option_add(new CoreOption('layout', __('Layout', THEME_SLUG), 'layout', null, $core_layout_default));

	//Background Set-up
	$option = new CoreOption('background_setup', __('Page Background', THEME_SLUG), 'select', __('You can have a background image or a slider in the background.', THEME_SLUG), 'image','bg-options');
	$option->parameters = array('none' => 'none', 'image' => 'Image', 'slider' => 'Slider');
	$section->option_add($option);

	// Background Slider if setup is slider
	$option = new CoreOption('background_slider', __('Background Slider', THEME_SLUG), 'sliders', __('Use slider that is only applicable for background (ex. fullscreen slider).', THEME_SLUG),null,'bg-slider');
	$section->option_add($option);

	// Background image
	$section->option_add(new CoreOption('background_image', __('Background image', THEME_SLUG), 'image', __('This background image will override the one defined under theme options.', THEME_SLUG), THEME_URI . '/images/default-bg.jpg','bg-img'));

	$section->option_add(new CoreOption('custom_content' , __('Subtitle', THEME_SLUG), 'text-multiline', __('Any HTML put here will be included in it\'s own block above the content.', THEME_SLUG)));

	$producttab = get_option('core_folio_tab_size');
	if ($producttab != 0 || $producttab != ''):
		$theme_portfolio_options = new CoreOptionHandler(THEME_SLUG . '-td-folio-tabs', __('Folio Tabs', THEME_SLUG) , array('portfolio'));
		core_options_handler_register($theme_portfolio_options);

		$group = new CoreOptionGroup('tab_foliotab_section', __('General', THEME_SLUG));
		$theme_portfolio_options->group_add($group);

		// options
		$section = new CoreOptionSection('tab_foliotab');
		$group->section_add($section);

		//$producttab = core_options_get('folio_tab_size','theme');
		for ($tabs=1; $tabs<=$producttab; $tabs++){
			$producttabname = get_option('core_folio_tab'.$tabs.'_name');
			$section->option_add(new CoreOption('td_folio_tab'.$tabs, $producttabname, 'text-multiline', __('Any HTML put here will be included in the content.', THEME_SLUG)));
		}
	endif;

?>