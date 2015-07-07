<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_singular() ) : ?>

	<header class="entry-header">
		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>

		<?php core_theme_hook_entry_header(); ?>

	</header><!-- .entry-header -->

	<?php endif; ?>

	<?php do_action('core_theme_hook_before_entry_content'); ?>

	<?php if ( is_archive() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', THEME_SLUG ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', THEME_SLUG ), 'after' => '</div>', 'link_before'      => '<span>', 'link_after'       => '</span>', ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta entry-footer">
		<?php do_action('core_theme_hook_entry_footer'); ?>
	</footer><!-- .entry-meta -->

	<?php do_action('core_theme_hook_after_entry_content'); ?>

	<?php get_template_part('author', 'content'); ?>

</article><!-- #post-## -->
