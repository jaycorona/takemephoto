<?php

/*
 * A Timed Notification shortcode
 * Usage: [tds-timenotification duration="30"]content here[/tds-timenotification]
 */

class tdf_timed_notification_shortcode {
	static $add_script;

	static function init() {
		add_shortcode('tds-timenotification', array(__CLASS__, 'tdf_timed_notification_shortcode_handle'));

		add_action('init', array(__CLASS__, 'register_script'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));
	}

	static function tdf_timed_notification_shortcode_handle($atts, $content = null, $tag) {
		self::$add_script = true;

		extract( shortcode_atts(
				array(
					'icon' => '',
					'iconcolor' => '#FFFFFF',
					'textcolor' => '#7D5912',
					'backgroundcolor' => '#FFE691',
					'bordercolor' => '#F6DB7B',
					'progressbarcolor' => '#FFFFFF',
					'duration' => '20'
				), $atts)
			);
		static $inc = 0;
		$inc++;
		$tnID = "tnID" . $inc;

		$output  = 	'<div id="'.$tnID.'" class="tds-timenotifyblk" style="background-color:'.$backgroundcolor.'; border-color:'.$bordercolor.'; ">';
		$output  .= '<div class="tds-tncontent">';
		if(!empty($icon)){
			$output  .= '<div class="tds-tniconblk" style="color:'.$iconcolor.';">'.tds_get_fontawsomeicontag($icon,'icon-4x').'</div>';
		}
		$output  .= '<div class="tds-tnmcontent" style="color:'.$textcolor.';">'.do_shortcode( $content ).'</div>';
		$output  .= '</div><div class="tdsclrboth"></div>';
		$output  .= '<div class="tds-tnprogbar-blk"><div class="tds-tnprogbar" style="background-color:'.$progressbarcolor.';"></div></div>';
		$output  .= '</div>';

		$output .= '<script type="text/javascript">
					jQuery(document).ready(function() {
						jQuery("#'.$tnID.'").timeNotification(this, '.$duration.');
						});
					</script>';

		return $output;

	}

	static function register_script() {
		wp_register_script('timed-notification', plugins_url('js/shortcode-timed-notification.js', __FILE__), array('jquery'), '', true);
	}

	static function print_script() {
		if ( ! self::$add_script )
			return;

		wp_print_scripts('timed-notification');
	}
}

tdf_timed_notification_shortcode::init();

?>