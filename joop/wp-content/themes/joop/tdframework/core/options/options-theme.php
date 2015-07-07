<?php

if (!defined('CORE_VERSION'))
	die();


// Theme options nonce action
define('CORE_THEME_OPTIONS_ACTION', THEME_SLUG. '-options-save');


// Stores options that were passed through POST
// AJAX callback
//
function core_options_theme_save() {
	global $core_theme_options;

	// Verify nonce
	if (!wp_verify_nonce($_POST['core-options-nonce'], CORE_THEME_OPTIONS_ACTION)) {
		echo 'Invalid nonce.';
		die();
	}

	// Update registered options if they exist in the request, otherwise delete them
	foreach ($core_theme_options as $option_slug => $option) {
		$key = $option->key;

		// Checkboxes are false if not defined, true if they are
		if ($option->type == 'checkbox'){
			$value = isset($_POST[$key]);
			update_option($key, $value);

		//} else if ($option->type == 'button'){
			// do nothing!

		// Other option types
		} else if (isset($_POST[$key])) {
			$value = $option->import($_POST[$key]);
			update_option($key, $value);
		} else {
			delete_option($key);
		}
	}

	echo __('Options saved succesfully.', THEME_SLUG);
	die();
}
add_action('wp_ajax_core_options_theme_save', 'core_options_theme_save');

// Outputs all registered core theme options
//
function core_options_theme_output() {
	global $core_theme_options_handler;
	global $core_theme_options;

	// Sort option groups alphabetically
	ksort($core_theme_options_handler->groups);

	// Select visible group
	$page = THEME_SLUG . '-options-' . $core_theme_options_handler->default_group;

	echo '<div id="core-theme-option-container">'; //<h2><i id="icon-themes" class="icon32"> </i> Responsive Theme Options</h2>';

	// Form header
 	echo '<form method="post" id="core-theme-options-form" name="core-theme-options-form">';

	// WordPress nonce
	echo '<input type="hidden" name="core-options-nonce" value="', wp_create_nonce(CORE_THEME_OPTIONS_ACTION), '">';

	echo '<div id="core-theme-options">';

	// Output navigation links
	echo '<div id="sidebar">';

	// Output the Theme logo
	echo '<div class="core-theme-logo"></div>';

	echo '<ul id="navigation">';
	foreach ($core_theme_options_handler->groups as $group) {
		$group->output_link();
	}
	echo '</ul>';
	do_action('core_options_sidebar');
	echo '</div>';

	echo '<div id="content">';

	// Groups
	foreach ($core_theme_options_handler->groups as $group) {
		$visible = (THEME_SLUG . '-options-' .$group->slug) == $page;
		$group->output(true, $visible, true);
	}

	// Submit button
	echo '<div class="core-option-theme-buttons">';
	echo '<input type="button" id="core-options-submit" class="core-option-submit" name="core-options-submit" value="Save changes">';

	// AJAX elements
	echo '<input type="hidden" name="action" value="core_options_theme_save">';
	echo '<div id="core-options-busy"><i class="fa fa-spinner fa-spin"></i></div>';
	echo '<div id="core-options-result"></div>';
	echo '</div>';

	echo '</div>';
	echo '<div class="clear"></div>';
	echo '</div>';

	echo '</form></div>';
}


// Output all options for export
function options_get_all_options() {
	global $core_theme_options;

	$all_options = array();

	foreach ($core_theme_options as $option_slug => $option) {
		$key = $option->key;

		$all_options[$key] = get_option($key, $option->default);
	}

	//return base64_encode( serialize( $all_options ) );
}

// update import data
function options_update_export_option() {
	$all_options = options_get_all_options();

	if ( get_option( 'core_ei_export' ) !== false ) {
		update_option('core_ei_export', $all_options);
	}
}
//add_action('admin_init', 'options_update_export_option');

// update all options with the import function
function core_options_import_settings() {
	global $core_theme_options;

	if ( isset($_POST['ei_settings']) && $_POST['ei_settings'] !== '' ) {
		//$ei_settings = unserialize( base64_decode( $_POST['ei_settings'] ) );
		$i = 0;
		foreach ($ei_settings as $option_name => $option_value) {
				if ( update_option($option_name, $option_value) )
					$i++;

				update_option($option_name, $option_value);
		}

		echo $i . __(' Options imported succesfully. ', THEME_SLUG);
	} else {
		echo __('Options import failed!', THEME_SLUG);
	}

	die();
}
//add_action('wp_ajax_core_options_import_settings', 'core_options_import_settings');


// Output all default options
function core_options_reset_settings() {
	global $core_theme_options;
	$i = 0;

	foreach ($core_theme_options as $option_slug => $option) {
		$key = $option->key;

		if ( update_option($option_name, $option_value) ) {
			$i++;
		}
		update_option($key, $option->default);
	}

	echo $i . __(' options Reset to defaults.', THEME_SLUG);
	die();
}
//add_action('wp_ajax_core_options_reset_settings', 'core_options_reset_settings');

?>