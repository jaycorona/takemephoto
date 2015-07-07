<?php

global $theme_page_options;

// Register post\page option sections
// Post\page option for themes
//

$theme_page_options = new CoreOptionHandler(THEME_SLUG . '-page-options', THEME_NAME . ' options', array('page'));
core_options_handler_register($theme_page_options);

$group = new CoreOptionGroup('general', __('General', THEME_SLUG));
$theme_page_options->group_add($group);

// Other options
$section = new CoreOptionSection('options');
$group->section_add($section);

//Background Set-up
$option = new CoreOption('background_setup', __('Page Background', THEME_SLUG), 'select', __('You can have a background image or a slider in the background.', THEME_SLUG), 'none','bg-options');
$option->parameters = array('none' => 'none', 'image' => 'Image', 'slider' => 'Slider');
$section->option_add($option);

// Background Slider if setup is slider
$option = new CoreOption('background_slider', __('Background Slider', THEME_SLUG), 'sliders', __('Use slider that is only applicable for background (ex. fullscreen slider).', THEME_SLUG),null,'bg-slider');
$section->option_add($option);

// Background image
$section->option_add(new CoreOption('background_image', __('Background image', THEME_SLUG), 'image', __('This background image will override the one defined under theme options.', THEME_SLUG), null,'bg-img'));

// Custom content section
$section->option_add(new CoreOption('custom_content', __('Subtitle', THEME_SLUG), 'text-multiline', __('Any HTML put here will be included in it\'s own block above the content.', THEME_SLUG)));

?>
