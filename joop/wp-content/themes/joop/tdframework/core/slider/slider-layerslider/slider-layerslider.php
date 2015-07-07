<?php

// Slider definition
$slider = array(
	'name' => __('LayerSlider WP', THEME_SLUG),
	'supportsLayers' => false,
	'supportsSlides' => false,
	'output' => 'theme_slider_layersliderwp_output',

	// General settings
	'options' => array(
		'description' => array(
			'type' => 'string',
			'title' => __('Info', THEME_SLUG),
			//'default' => '100%',
			'description' => __('Please edit this slider in the LayerSlider WP section.', THEME_SLUG),
		),
	),
);

// Register
core_slider_register($slider);


// Outputs the Layer Slider code
//
function theme_slider_layersliderwp_output($settings) {
	$slider_settings = $settings['settings'];

	echo do_shortcode();

}

// Displays the LayerSlider WP
function display_layersliderwp($id, $value, $option){
	// Get WPDB Object
	global $wpdb;

	// Table name
	$table_name = $wpdb->prefix . "layerslider";

	// Get sliders
	$sliders = $wpdb->get_results( "SELECT * FROM $table_name
										WHERE flag_hidden = '0' AND flag_deleted = '0'
										ORDER BY id ASC LIMIT 200" );
	if(!empty($sliders)) {
		foreach($sliders as $key => $item) {
			$name = empty($item->name) ? 'Unnamed' : $item->name;
			$shortcode = "[layerslider id='" . $item->id . "']";
			if ($shortcode == $value)
				$selected = ' selected';
			else
				$selected = '';

			echo '<option value="', $shortcode, '" ', $selected, '>', $name, ' (LayerSlider WP)</option>';
		}
	}
}


?>