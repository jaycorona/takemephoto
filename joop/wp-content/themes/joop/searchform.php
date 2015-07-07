<?php
/**
 * The template for displaying search forms
 *
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */
?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="screen-reader-text"><?php _ex( 'Search', 'assistive text', THEME_SLUG ); ?></label>
		<input type="submit" class="submit button" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', THEME_SLUG ); ?>" />
		<input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'What are you looking for &hellip;', 'placeholder', THEME_SLUG ); ?>" />
		<div class="clear"></div>
	</form>
