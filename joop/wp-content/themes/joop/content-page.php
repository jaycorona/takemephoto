<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_singular() ) : ?>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php core_theme_hook_entry_header(); ?>
		<div class="clear"></div>
	</header><!-- .entry-header -->

	<?php endif; ?>

	<?php do_action('core_theme_hook_before_entry_content'); ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', THEME_SLUG ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<?php do_action('core_theme_hook_after_entry_content'); ?>


	<footer class="entry-meta entry-footer">
		<?php edit_post_link( __( 'Edit', THEME_SLUG ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->


</article><!-- #post-## -->
