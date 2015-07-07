<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */
?>

<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php do_action('core_theme_hook_before_entry_content'); ?>

		<div class="theme-td-folio">

			<?php if ( has_post_thumbnail() ) : ?>

				<div class="grid box-six">
					<div class="item-image grid col-eleven ">
							<?php the_post_thumbnail('post-excerpt-full'); ?>
					</div>
				</div>

				<div class="grid box-six">

			<?php else : ?>

				<div class="grid box-twelve">

			<?php endif; ?>
				<header class="entry-header">
					<div class="grid-right box-three text-right">
					<?php create_td_post_nav(); ?>
					</div>
					<div class="clear"></div>
				</header><!-- .entry-header -->

				<?php if ( is_archive() ) : // Only display Excerpts for Search ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
				<?php else : ?>
				<div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', THEME_SLUG ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', THEME_SLUG ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
				<?php endif; ?>

			</div>
		</div>


		<?php do_action('core_theme_hook_after_entry_content'); ?>

	</article><!-- #post-## -->

<?php endwhile; // end of the loop. ?>
