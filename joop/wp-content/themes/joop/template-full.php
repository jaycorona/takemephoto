<?php
/*
 * Template Name: Full Width Template
 *
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */
?>

<?php if ( have_posts() ) : ?>

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php do_action('core_theme_hook_before_entry_content'); ?>

			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', THEME_SLUG ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->

			<?php do_action('core_theme_hook_after_entry_content'); ?>


			<footer class="entry-meta entry-footer">
				<?php edit_post_link( __( 'Edit', THEME_SLUG ), '<span class="sep"> / </span><span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
				<div class="footer-divider">
				</div>

			<div class="footer-divider"></div>

		</article><!-- #post-## -->

	<?php endwhile; ?>

<?php else : ?>

	<?php get_template_part( '404', 'page' ); ?>

<?php endif; ?>

<?php wp_reset_postdata(); ?>