<?php
/**
 * The template for displaying posts in the Quote post format.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php do_action('core_theme_hook_before_entry_content'); ?>

		<div class="entry-content">
			<?php

				$the_content = get_the_content();

				printf(do_shortcode('<blockquote> <i class="icon-quote-left alignleft"></i> %1$s <i class="icon-quote-right alignright"></i></blockquote>'), wpautop($the_content));

			?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', THEME_SLUG ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta entry-footer">
			<?php do_action('core_theme_hook_entry_footer'); ?>
		</footer><!-- .entry-meta -->

		<?php do_action('core_theme_hook_after_entry_content'); ?>

	</div>
	<div class="clear"></div>


</article><!-- #post -->
