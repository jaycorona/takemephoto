	<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */


$odd_even = ($wp_query->current_post % 2 == 0) ? 'item-even' : 'item-odd';
$post_size = 'small';//core_options_get('post_width', get_post_type());
$post_size_thumbs = 'post-excerpt-small';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('item ' . $odd_even); ?>>

	<div class="grid box-twelve">

		<?php if ( has_post_thumbnail() && core_options_get('featured_img') ) : ?>

			<?php

				if ( $post_size == 'small' && $odd_even == 'item-odd') {
					$item_class = 'grid-right box-four fit';
				} else if ( $post_size == 'small' && $odd_even == 'item-even') {
					$item_class = 'grid box-four';
				} else if ( $post_size == 'medium' && $odd_even == 'item-odd') {
					$item_class = 'grid-right box-eight fit';
				} else if ( $post_size == 'medium' && $odd_even == 'item-even') {
					$item_class = 'grid box-eight';
				} else {
					$item_class = 'grid box-twelve';
				}
			?>

			<div class="preview-image <?php echo $item_class; ?>">
				<div class="item-image ">
					<?php
						if ( ! $post_size == 'full' ) {
							$post_size_thumbs = 'post-excerpt-small';
						}

						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
					?>

					<a data-rel="prettyPhoto" href="<?php echo $large_image_url[0]; ?>" title="<?php echo the_title_attribute('echo=0'); ?>">
						<?php the_post_thumbnail($post_size_thumbs); ?>
					</a>

					<div class="item-image-hover">
						<div class="item-image-wrap">
							<?php //edit_post_link( __( 'Edit', THEME_SLUG ), '<span class="edit-link">', '</span>' ); ?>
							<a data-rel="prettyPhoto" class="fa fa-search" href="<?php echo $large_image_url[0]; ?>" title="View larger image"></a>
							<a class="fa fa-share"  href="<?php the_permalink(); ?>" title="Open in new tab" rel="bookmark" target="_blank"></a>

							<?php
								$icon = core_theme_get_post_format();
								$post_format = false === get_post_format() ? 'Standard' : ucfirst(get_post_format());
							?>
							<a class="<?php echo $icon; ?>"  href="#" title="<?php echo $post_format;?>" rel="bookmark" target="_blank"></a>

						</div><!-- .item-image-wrap -->
					</div><!-- .item-image-hover -->
				</div><!-- .item-image -->
			</div><!-- .preview-image -->

		<?php else: ?>

			<?php //display nothing ?>

		<?php endif; ?>


		<?php if ( has_post_thumbnail() && core_options_get('featured_img') ) : ?>

			<?php
				if ( $post_size == 'small' && $odd_even == 'item-odd') {
					$item_class = 'grid-right box-eight';
				} else if ( $post_size == 'small' && $odd_even == 'item-even') {
					$item_class = 'grid box-eight fit';
				} else if ( $post_size == 'medium' && $odd_even == 'item-odd') {
					$item_class = 'grid-right box-four';
				} else if ( $post_size == 'medium' && $odd_even == 'item-even'){
					$item_class = 'grid box-four fit';
				} else {
					$item_class = 'grid box-twelve';
				}
			?>

		<?php else : ?>

			<?php $item_class = 'grid box-twelve'; ?>

		<?php endif; ?>


		<div class="item-content <?php echo $item_class; ?>">

			<header class="entry-header">
				<?php //if ( core_options_get('titles')  ) : ?>

					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( '%s', THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

				<?php //endif; ?>

				<?php core_theme_hook_entry_header(); ?>

			</header><!-- .entry-header -->

			<?php do_action('core_theme_hook_before_entry_content'); ?>

			<?php if ( is_archive() ) : // display Excerpts for Search and Archives ?>

				<div class="entry-summary">

					<?php
						if ( limited_excerpt(20) != '' ) :
							if ( $post_size == 'full' )
								echo '<p>'.limited_excerpt(110).'...</p>';
							else if ( $post_size == 'medium' )
								echo '<p>'.limited_excerpt(25).'...</p>';
							else
								echo '<p>'.limited_excerpt(65).'...</p>';
						endif;
					?>

					<p><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><span><?php _e('Read more', THEME_SLUG); ?> <i class="fa fa-angle-double-right"></i></span></a></p>

					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', THEME_SLUG ), 'after' => '</div>' ) ); ?>

				</div><!-- .entry-summary -->

			<?php else : ?>

				<div class="entry-content">
					<?php

						if ( limited_excerpt(20) != '' ) :
							if ( $post_size == 'full' )
								echo '<p>'.limited_excerpt(110).'...</p>';
							else if ( $post_size == 'medium' )
								echo '<p>'.limited_excerpt(25).'...</p>';
							else
								echo '<p>'.limited_excerpt(65).'...</p>';
						endif;
					?>
					<p><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><span><?php _e('Read more', THEME_SLUG); ?> <i class="fa fa-angle-double-right"></i></span></a></p>
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', THEME_SLUG ), 'after' => '</div>' ) ); ?>
					<div class="clear"></div>
				</div><!-- .entry-content -->
			<?php endif; ?>

			<footer class="entry-meta entry-footer">
				<?php do_action('core_theme_hook_entry_footer'); ?>
			</footer><!-- .entry-meta -->

			<?php do_action('core_theme_hook_after_entry_content'); ?>

		</div><!-- .item-content -->
		<div class="clear"></div>
	</div><!-- .grid box-twelve -->
	<div class="clear"></div>
</article><!-- #post-## -->
